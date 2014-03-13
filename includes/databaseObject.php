<?php

class DatabaseObject{

public $ID,$fields;

public function __construct()
{
if(!isset($this->fields))
  $this->populate_fields();
}

public function get_values() //get all post and get variables in the object
{
  if(isset($_POST))
    foreach($_POST as $key=>$value)
      $this->$key=$value;
  if(isset($_GET))
    foreach($_GET as $key=>$value)
      $this->$key=$value;
}

public function populate_fields() //save all db fields of this object as an array
{
  global $db;
  $result=$db->query("SHOW FIELDS FROM ". static::$tableName);
  $result_array=$db->fetch_array($result);
  foreach($result_array as $row)
    if($row[0]!='ID')
      $this->fields[]=$row[0];
}

public static function find_by_id($ID)
{
  $result_object = self::find_by_sql("SELECT * FROM ".static::$tableName." WHERE id={$ID}");
  return $result_object[0];
}

public static function find_all() //return an array of all objects
{
  return self::find_by_sql("SELECT * FROM ".static::$tableName);
}

public function find_random($num)
{
    return self::find_by_sql("SELECT * FROM ".static::$tableName." ORDER BY RAND() LIMIT {$num}");
}

public static function find_by_sql($query) //return an array of found objects
{
  global $db;
  $result=$db->query($query);
  if($db->num_rows($result)>0)
    return static::instantiate($result);
  else 
    return NULL;
}

public static function instantiate($result) //take a result set and return an array of objects with values from result set as its attributes
{
  global $db;
  $result_set=$db->fetch_array($result);
  foreach($result_set as $row)
  {
    $obj=new static;
    foreach($row as $key=>$value)
      $obj->$key=$value;
    $result_objects[]=$obj;
  }  
  return $result_objects;
}

public function create() //insert the object into database with each attribute inserted in fields
{
  global $db;
  $sql="INSERT INTO ".static::$tableName." (";
  if(is_array($this->fields))
	  foreach($this->fields as $field)
	    $sql.=$field.",";
  $sql=substr($sql,0,strlen($sql)-1);
  $sql.=") values (";
  if(is_array($this->fields))
	  foreach($this->fields as $field)
	    $sql.="'".$db->escape_value($this->$field)."',";
  $sql=substr($sql,0,strlen($sql)-1);
  $sql.=");";
  if($db->query($sql))
  {
    $this->id=$db->insert_id();
    Log::log_action("New entry in ".static::$tableName." (id=".$this->id.")");
    return true;
  }
  else
    return false;
}

public function update() //update existing record
{
  global $db;
  $sql="UPDATE ".static::$tableName." SET ";
  foreach($this->fields as $field)
    if(isset($this->$field))
          $sql.=$field." = '".$db->escape_value($this->$field)."',";
  $sql=substr($sql,0,strlen($sql)-1);
  $sql.=" WHERE id='".$this->id."'";
  if($db->query($sql))
  {
    Log::log_action("Entry updated in ".static::$tableName." (id=".$this->id.")");
    return true;
  }
  else
    return false;
}

public function save() //if a record exists then update it else create it
{
  if(isset($this->id))
    return $this->update();
  else
    return $this->create();
}

public function delete() //delete a record from the db
{
  global $db;
  $sql="DELETE FROM ".static::$tableName.' WHERE ID='.$this->ID;
  if($db->query($sql))
  {
    Log::log_action("Entry deleted from ".static::$tableName." (ID=".$this->ID.")");
    return true;
  }
  else
    return false;
}
}

?>