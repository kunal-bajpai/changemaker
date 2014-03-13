<?php
    abstract class User extends DatabaseObject {
        protected static $tableName="User",$usernameField='username',$passwordField='password'; 
 
        public function authenticate()
        {
          global $db;  
          $pass=$db->fetch_array($db->query("SELECT ".static::$passwordField." FROM ".static::$tableName." WHERE ".static::$usernameField."='".$this->username."' LIMIT 1"));
          if(md5($this->password)==$pass[0][0])
          {
            $result_id=$db->fetch_array($db->query("SELECT id FROM ".static::$tableName." WHERE ".static::$usernameField."='".$this->username."' LIMIT 1"));
            $this->id=$result_id[0][0];
            return true;
          }
          else
            return false;
        }
        
        public static function find_by_username($username)
        {
          $result_object= static::find_by_sql("SELECT * FROM ".static::$tableName." WHERE ".static::$usernameField."='{$username}';"); 
          return $result_object[0];
        }
    }
?>