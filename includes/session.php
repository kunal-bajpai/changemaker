<?php

    class Session {
    
        private $user, $loggedIn;
        protected static $userClass, $userTable, $sessionVar, $loginPage, $userField;
        
        function __construct()
        {
            if ( php_sapi_name() !== 'cli' ){
                if ( version_compare(phpversion(), '5.4.0', '>=') ) {
                    if(session_status() !== PHP_SESSION_ACTIVE)
                        session_start();
                } else
                    if(session_id() === '')
                        session_start();
            }
            $this->update_session();
        }
        
        public function require_login() //redirect to a certain page if not logged in
        {
          if(!$this->loggedIn)
            header("location:".static::$loginPage);
        }
        
        public function logged_in_user() //return logged in user
        {
          if($this->loggedIn)
            return $this->user;
          else
            return false;
        }
        
        public function login($user) //log in a user
        {
            $userField=static::$userField;
            $_SESSION[static::$sessionVar]=$user->$userField;
            $this->user=$user;
            $this->loggedIn=true;
            Log::log_action("Logged in");
        }
        
        public function logout() //log out a user
        {
          Log::log_action("Logged out");
          unset($_SESSION[static::$sessionVar]);
          unset($this->user);
          $this->loggedIn=false;
        }
        
        public function update_session() //update attributes of session object according to session state
        {
          if(isset($_SESSION[static::$sessionVar]))
          {
              $userClass=static::$userClass;
            $result_user=$userClass::find_by_sql("SELECT * FROM ".static::$userTable." WHERE ".static::$userField."='".$_SESSION[static::$sessionVar]."'");
            $this->user=$result_user[0];
            $this->loggedIn=true;
          }
          else
          {
            unset($this->user);
            $this->loggedIn=false;
          }
        }
        
        public function is_logged_in() //return true if a user is logged in
        {
          return $this->loggedIn;
        }
    }
    $session=new Session();
?>