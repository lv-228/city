
<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/classes/active_record.php';

class tender extends active_record {
		
public $id;
public $name;
public $description;
public $type;
public $winner;

	public function get_by_id($id)
	{
		return $this->find_by_id($id);
	}

}