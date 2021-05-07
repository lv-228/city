<?php
require_once 'controller.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/classes/model_generator.php';

/**
 * 
 */
class model_create extends controller
{
	public static $get = 
	[
		'get_table' => ['table_name']
	];

	public function get_table(array $get)
	{
		$table_data = array();
		$model_generator = new model_generator();
		echo 'table: ' . $get['get']['table_name'] . '<br>';
		$model_generator->create_model($get['get']['table_name']);
	}
}

model_create::do();