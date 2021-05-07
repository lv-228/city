
<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/classes/active_record.php';

class document extends active_record {
		
public $id;
public $type;
public $numbers;
public $owner;

	public function get_by_id($id)
	{
		return $this->find_by_id($id);
	}

}