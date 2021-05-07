
<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/classes/active_record.php';

class news extends active_record {
		
public $id;
public $news_text;
public $author;
public $img;
public $heading;
public $descript;
public $public_date;
public $type;

	public function get_by_id($id)
	{
		return $this->find_by_id($id);
	}

}