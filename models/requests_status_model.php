
<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/classes/active_record.php';

class requests_status extends active_record {
		
public $id;
public $status;

	public function get_by_id($id)
	{
		return $this->find_by_id($id);
	}

}