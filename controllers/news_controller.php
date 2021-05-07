<?php
require_once 'controller.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/models/news_model.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/classes/file_system.php';

/**
 * 
 */
class news_controller extends controller
{
	public static $post = 
	[
		'create' => 
		[
			'news_text',
			'heading',
			'descript',
			'type',
			'MAX_FILE_SIZE',
		]
	];

	public function create_page()
	{
		$news  = new news();
		$types = $news->db_query('SELECT * FROM news_type');
		news_controller::getView('main', ['page' => 'create_news.php', 'types' => $types]);
	}

	public function create($vars)
	{
		unset($vars['post']['MAX_FILE_SIZE']);
		$news               = new news();
		$file               = new file_system();
		$config             = $news->getConfig();
		$file->uploadfile   = $config['upload_dir'];
		$data_array = array_merge($vars['post'], 
			[
				'author'      => $_SESSION['uid'],
				'public_date' => $GLOBALS['date'],
				'img'         => $file->save_file()
			]
		);
		$query      = news_controller::generate_query('news', $data_array);
		$news->db_query($query);
		header('Location:' . $_SERVER['HTTP_REFERER']);
	}
}

news_controller::do();