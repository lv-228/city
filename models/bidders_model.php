
<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/classes/active_record.php';

class bidders extends active_record {
		
public $id;
public $tender_id;
public $company_id;
public $price;
public $description;

	public function get_by_id($id)
	{
		return $this->find_by_id($id);
	}

}