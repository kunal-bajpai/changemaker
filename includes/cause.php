<?php
    class Cause extends DatabaseObject {
        protected static $tableName='causes';
        
        public function find_projects()
        {
            return Project::find_by_sql("SELECT * FROM projects WHERE cause_id={$this->id} ORDER BY name ASC");
        }
        
        public function find_ngos()
        {
            return Ngo::find_by_sql("SELECT * FROM ngos JOIN ngo_cause ON ngos.id=ngo_cause.ngo_id WHERE ngo_cause.cause_id={$this->id} ORDER BY ngos.name ASC");
        }
        
        public function find_corporates()
        {
            return Corporate::find_by_sql("SELECT * FROM corporates JOIN corp_cause ON corporates.id=corp_cause.corp_id WHERE corp_cause.cause_id={$this->id} ORDER BY corporates.name ASC");
        }
        
        public function find_articles()
        {
            return Article::find_by_sql("SELECT id,head FROM articles WHERE cause_id={$this->id}");
        }
    }
?>