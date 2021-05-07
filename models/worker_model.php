
<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/classes/active_record.php';

class worker extends active_record {
		
public $id;
public $full_name;
public $company;
public $position;
public $auto_reg;
public $email;

	public function get_by_id($id)
	{
		return $this->find_by_id($id);
	}

}