
<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/classes/active_record.php';

class complaint extends active_record {
		
public $id;
public $to_c;
public $to_u;
public $from_c;
public $from_u;
public $body;
public $type;
public $to_alt;

	public function get_by_id($id)
	{
		return $this->find_by_id($id);
	}

}