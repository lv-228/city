
<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/classes/active_record.php';

class user extends active_record {
		
public $id;
public $first_name;
public $second_name;
public $last_name;
public $email;
public $birth_date;
public $login;
public $pas;
public $img;

	public function get_by_id($id)
	{
		return $this->find_by_id($id);
	}

}