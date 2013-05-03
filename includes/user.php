<?php

require_once(LIB_PATH.DS.'database.php');

class User extends DatabaseObject {
	
	protected static $table_name="user";
	protected static $db_fields = array('Card Number','Name', 'Email id','Password','Mobile Number','Department');
	
	public $Card_Number;
	public $email;
	public $Name;
	public $Password;
    public $mobile;
    public $dept;
	
	

	// Common Database Methods
	public static function find_all() {
		return self::find_by_sql("SELECT * FROM ".self::$table_name);
  	}
  
  	public static function find_by_id($id=0) {
    		$result_array = self::find_by_sql("SELECT * FROM ".self::$table_name." WHERE `Card Number`={$id} LIMIT 1");
		return !empty($result_array) ? array_shift($result_array) : false;
  	}
  
  	public static function find_by_sql($sql="") {
    		global $database;
    		$result_set = $database->query($sql);
    		$object_array = array();
    		while ($row = $database->fetch_array($result_set)) {
      			$object_array[] = self::instantiate($row);
    		}
    		return $object_array;
  	}
  	

	public static function count_all() {
	  	global $database;
	  	$sql = "SELECT COUNT(*) FROM ".self::$table_name;
    		$result_set = $database->query($sql);
	  	$row = $database->fetch_array($result_set);
    		return array_shift($row);
	}

	private static function instantiate($record) {
		// Could check that $record exists and is an array
    		$object = new self;
		// Simple, long-form approach:
		$object->Card_Number = $record['Card Number'];
		$object->Name 	= $record['Name'];
		$object->email= $record['Email id'];
		$object->Password = $record['Password'];
		$object->mobile = $record['Mobile Number'];
		$object->dept = $record['Department'];
		// More dynamic, short-form approach:
		/*foreach($record as $attribute=>$value){
		  	if($object->has_attribute($attribute)) {
			$object->$attribute = $value;
			}

		}*/
		return $object;
	}
	
	private function has_attribute($attribute) {
	  	// We don't care about the value, we just want to know if the key exists
	  	// Will return true or false
	  	return array_key_exists($attribute, $this->attributes());
	}

	protected function attributes() { 
		// return an array of attribute names and their values
	  	$attributes = array();
	  	$attributes['Card Number']=$this->Card_Number;
		$attributes['Name']=$this->Name;
		$attributes['Email id']=$this->email;
		$attributes['Password']=$this->Password; 
                $attributes['Mobile Number']=$this->mobile;
		$attributes['Department']=$this->dept;
		return $attributes;
	}
	
	protected function sanitized_attributes() {
	  	global $database;
		$clean_attributes = array();
	  	// sanitize the values before submitting
	  	// Note: does not alter the actual value of each attribute
	  	foreach($this->attributes() as $key => $value){
	    	$clean_attributes[$key] = $database->escape_value($value);
	  	}
	  	return $clean_attributes;
	}
	
	public function save() {
	  	// A new record won't have an id yet.
	  	return isset($this->Card_Number) ? $this->update() : $this->create();
	}
	
	public function create() {
		global $database;
		// Don't forget your SQL syntax and good habits:
		// - INSERT INTO table (key, key) VALUES ('value', 'value')
		// - single-quotes around all values
		// - escape all values to prevent SQL injection
		$attributes = $this->sanitized_attributes();
	  	$sql = "INSERT INTO ".self::$table_name." (";
		$sql .= join(", ", array_keys($attributes));
	  	$sql .= ") VALUES ('";
		$sql .= join("', '", array_values($attributes));
		$sql .= "')";
	  	if($database->query($sql)) {
	    	$this->Card_Number = $database->insert_id();
	    	return true;
	  	} else {
	    	return false;
	  	}
	}

	public function update() {
	  	global $database;
		// Don't forget your SQL syntax and good habits:
		// - UPDATE table SET key='value', key='value' WHERE condition
		// - single-quotes around all values
		// - escape all values to prevent SQL injection
		$attributes = $this->sanitized_attributes();
		$attribute_pairs = array();
		foreach($attributes as $key => $value) {
		  	$attribute_pairs[] = "`{$key}`='{$value}'";
		}
		$sql = "UPDATE ".self::$table_name." SET ";
		$sql .= join(", ", $attribute_pairs);
		$sql .= " WHERE `Card Number`=". $database->escape_value($this->Card_Number);
	  	if(! $database->query($sql))
		{
			echo "error";
		}
	  	return ($database->affected_rows() == 1) ? true : false;
	}

	public function delete() {
		global $database;
		// Don't forget your SQL syntax and good habits:
		// - DELETE FROM table WHERE condition LIMIT 1
		// - escape all values to prevent SQL injection
		// - use LIMIT 1
	  	$sql = "DELETE FROM ".self::$table_name;
	  	$sql .= " WHERE `Card Number`=". $database->escape_value($this->Card_Number);
	  	$sql .= " LIMIT 1";
	  	$database->query($sql);
	  	return ($database->affected_rows() == 1) ? true : false;
	
		// NB: After deleting, the instance of User still 
		// exists, even though the database entry does not.
		// This can be useful, as in:
		//   echo $user->first_name . " was deleted";
		// but, for example, we can't call $user->update() 
		// after calling $user->delete().
	}
	



}

?>
