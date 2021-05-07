
<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/classes/active_record.php';

class owner_service extends active_record {
		
public $id;
public $service_id;
public $user;
public $relese_date;

	public function get_by_id($id)
	{
		return $this->find_by_id($id);
	}
}