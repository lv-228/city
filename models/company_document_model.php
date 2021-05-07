
<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/classes/active_record.php';

class company_document extends active_record {
		
public $id;
public $company;
public $nubmers;
public $type;

	public function get_by_id($id)
	{
		return $this->find_by_id($id);
	}

}