<?php
    class Volunteer extends User {
        protected static $tableName='volunteers';  
        
        public function supports_cause($cause)
        {
            global $db;
            if($db->num_rows($db->query("SELECT * FROM vol_cause WHERE vol_id='{$this->id}'"))>0)
                return true;
            else
                return false;
        }
        
        public function support_cause($cause)
        {
            global $db;
            if(!$this->supports_cause($cause))
                $db->query("INSERT INTO vol_cause (cause_id,vol_id) values ('{$cause->id}','{$this->id}');");
        }
        
        public function unsupport_cause($cause)
        {
            global $db;
            if($this->supports_cause($cause))
                $db->query("DELETE FROM vol_cause WHERE cause_id='{$cause->id}' AND vol_id='{$this->id}';");
        }
        
        public function supports_project($project)
        {
            global $db;
            if($db->num_rows($db->query("SELECT * FROM vol_proj WHERE vol_id='{$this->id}' AND proj_id='{$project->id}'"))>0)
                return true;
            else
                return false;
        }
        
        public function support_project($project)
        {
            global $db;
            if(!$this->supports_project($project))
                $db->query("INSERT INTO vol_proj (proj_id,vol_id) values ('{$project->id}','{$this->id}');");
        }
        
        public function unsupport_project($project)
        {
            global $db;
            if($this->supports_project($project))
                $db->query("DELETE FROM vol_proj WHERE proj_id='{$project->id}' AND vol_id='{$this->id}';");
        }
        
        public function supports_ngo($ngo)
        {
            global $db;
            if($db->num_rows($db->query("SELECT * FROM vol_ngo WHERE vol_id='{$this->id}' AND ngo_id='{$ngo->id}'"))>0)
                return true;
            else
                return false;
        }
        
        public function support_ngo($ngo)
        {
            global $db;
            if(!$this->supports_ngo($ngo))
                $db->query("INSERT INTO vol_ngo (ngo_id,vol_id) values ('{$ngo->id}','{$this->id}');");
        }
        
        public function unsupport_ngo($ngo)
        {
            global $db;
            if($this->supports_ngo($ngo))
                $db->query("DELETE FROM vol_ngo WHERE ngo_id='{$ngo->id}' AND vol_id='{$this->id}';");
        }
    }
?>