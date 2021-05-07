
<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/classes/active_record.php';

class requests extends active_record {
		
public $id;
public $type;
public $descript;
public $owner_u;
public $owner_c;
public $status;
public $answer;

	public function get_by_id($id)
	{
		return $this->find_by_id($id);
	}

}