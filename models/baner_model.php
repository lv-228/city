
<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/classes/active_record.php';

class baner extends active_record {
		
public $id;
public $adver_text;
public $img;
public $owner;
public $start_date;
public $end_date;

	public function get_by_id($id)
	{
		return $this->find_by_id($id);
	}

}