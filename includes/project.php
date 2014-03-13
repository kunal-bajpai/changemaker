<?php
    class Project extends DatabaseObject {
        protected static $tableName='projects';
        
        public function find_corporates()
        {
            return Corporate::find_by_sql("SELECT corporates.name, corporates.id FROM corporates JOIN proj_corp ON proj_corp.corp_id=corporates.id WHERE proj_corp.proj_id={$this->id};");
        }
        
        public function find_related_projects($num)
        {
            return self::find_by_sql("SELECT * FROM projects WHERE cause_id={$this->cause_id} ORDER BY RAND() LIMIT {$num}");
        }

        public function supporters()
        {
            global $db;
            return $db->num_rows($db->query("SELECT * FROM vol_proj WHERE proj_id='{$this->id}'"));
        }
    }
?>