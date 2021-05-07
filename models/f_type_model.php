
<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/classes/active_record.php';

class f_type extends active_record {
		
public $id;
public $descript;

	public function get_by_id($id)
	{
		return $this->find_by_id($id);
	}

}