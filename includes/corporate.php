<?php
    class Corporate extends User {
        protected static $tableName='corporates', $usernameField='username', $passwordField='password';   
    
        public function find_projects()
        {
            return Project::find_by_sql("SELECT projects.id,projects.name,projects.tagline FROM projects JOIN proj_corp ON proj_corp.proj_id=projects.id WHERE proj_corp.corp_id={$this->id}");
        }
        
        public function supports_cause($cause)
        {
            global $db;
            if($db->num_rows($db->query("SELECT * FROM corp_cause WHERE corp_id='{$this->id}'"))>0)
                return true;
            else
                return false;
        }
        
        public function support_cause($cause)
        {
            global $db;
            if(!$this->supports_cause($cause))
                $db->query("INSERT INTO corp_cause (cause_id,corp_id) values ('{$cause->id}','{$this->id}');");
        }
        
        public function unsupport_cause($cause)
        {
            global $db;
            if($this->supports_cause($cause))
                $db->query("DELETE FROM corp_cause WHERE cause_id='{$cause->id}' AND corp_id='{$this->id}';");
        }
        
        public function supports_project($project)
        {
            global $db;
            if($db->num_rows($db->query("SELECT * FROM proj_corp WHERE corp_id='{$this->id}' AND proj_id='{$project->id}'"))>0)
                return true;
            else
                return false;
        }
        
        public function support_project($project)
        {
            global $db;
            if(!$this->supports_project($project))
                $db->query("INSERT INTO proj_corp (proj_id,corp_id) values ('{$project->id}','{$this->id}');");
        }
        
        public function unsupport_project($project)
        {
            global $db;
            if($this->supports_project($project))
                $db->query("DELETE FROM proj_corp WHERE proj_id='{$project->id}' AND corp_id='{$this->id}';");
        }
    }
?>