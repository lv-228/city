
<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/classes/active_record.php';

class company extends active_record {
		
public $id;
public $login;
public $pas;
public $name;
public $legal_address;
public $physical_address;
public $phone;
public $email;
public $description;
public $type;
public $img;

	public function get_by_id($id)
	{
		return $this->find_by_id($id);
	}

}