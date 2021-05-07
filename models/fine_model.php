
<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/classes/active_record.php';

class fine extends active_record {
		
public $id;
public $document;
public $type;
public $description;
public $price;

	public function get_by_id($id)
	{
		return $this->find_by_id($id);
	}

}