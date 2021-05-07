
<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/classes/active_record.php';

class discount_card extends active_record {
		
public $id;
public $owner;
public $serial_number;
public $company;

	public function get_by_id($id)
	{
		return $this->find_by_id($id);
	}

}