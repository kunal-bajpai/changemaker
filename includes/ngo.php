<?php
    class Ngo extends User {
        protected static $tableName='ngos', $usernameField='username', $passwordField='password';
        
        public function find_projects()
        {
            return Project::find_by_sql("SELECT * FROM projects WHERE ngo_id={$this->id}");
        }
        
        public function find_causes()
        {
            return Cause::find_by_sql("SELECT causes.id,causes.name,causes.tagline FROM causes JOIN ngo_cause ON ngo_cause.cause_id=causes.id WHERE ngo_cause.ngo_id={$this->id}");
        }
        
        public function supports_cause($cause)
        {
            global $db;
            if($db->num_rows($db->query("SELECT * FROM ngo_cause WHERE ngo_id='{$this->id}' AND cause_id='{$cause->id}'"))>0)
                return true;
            else
                return false;
        }
        
        public function support_cause($cause)
        {
            global $db;
            if(!$this->supports_cause($cause))
                $db->query("INSERT INTO ngo_cause (cause_id,ngo_id) values ('{$cause->id}','{$this->id}');");
        }
        
        public function unsupport_cause($cause)
        {
            global $db;
            if($this->supports_cause($cause))
                $db->query("DELETE FROM ngo_cause WHERE cause_id='{$cause->id}' AND ngo_id='{$this->id}';");
        }
    }
?>