<?php

class file_system
{
	public function save_file()
	{
		//var_dump($_FILES);die;
		if($_FILES['img']['error'] == 2)
		{
			$_SESSION['message'] = ['Error! Large file size!', 'danger'];
			return false;
		}
		file_system::check_filename($_FILES['img']['name']);
		$uploadfile = $_SERVER['DOCUMENT_ROOT'] . file_system::getConfig()['upload_dir'] . preg_replace('/\s+/', '', basename(time() . $_FILES['img']['name']));
		if(!move_uploaded_file($_FILES['img']['tmp_name'], $uploadfile))
		{
			throw new Exception('Error! Can\'t download file!', 1);
		}
		else
			return $uploadfile;
	}

	public static function check_filename($file_name)
	{
		if(stristr($file_name, 'php'))
		{
			throw new Exception('Error! Wrong file extension!', 1);
		}
		return true;
	}

	public function check_extension($file_name,array $permit_extensions)
	{
		$extension = stristr($file_name, '.');
		$extension = str_replace('.', '', $extension);
		$new_name = stristr($file_name, '.', true);
		if(in_array($extension, $permit_extensions))
		{
			return false;
		}
		if(!$new_name)
			throw new Exception('Error! File extension not found!', 1);
		else
			return $new_name . $extension;
	}

	public static function getConfig()
	{
		$config = file_get_contents($_SERVER['DOCUMENT_ROOT'] . '/config.json');
		return json_decode($config, true);
	}
}