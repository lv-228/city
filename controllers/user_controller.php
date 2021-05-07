<?php

require_once 'controller.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/classes/user.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/models/user_model.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/models/company_model.php';

class user_controller extends controller
{
	public static $post = 
	[
		'auth' =>
		[
			'login',
			'pas',
			'type'
		],
		'create_user' =>
		[
			'login',
			'pas',
			'first_name',
			'second_name',
			'last_name',
			'email',
			'birth_date'
		],
		'create_company' =>
		[
			'login',
			'pas',
			'name',
			'legal_address',
			'physical_address',
			'phone',
			'email',
			'description',
			'type',
			//'img'
		]
	];
	public function auth($vars)
	{
		//var_dump($vars);die;
		if($vars['post']['type'] == 'user')
		{
			$user = user_class::getInstance();
			$user->set_hash('sha512');
			$user->set_table('user');
			$user->set_login_field('login');
			$user->set_pass_field('pas');
			$user->set_role_field('role');
			$db_info = $user->authentication($vars['post']['login'], $vars['post']['pas'], ['login' => 'test']);
		}
		if($vars['post']['type'] == 'com')
		{
			$user = user_class::getInstance();
			$user->set_hash('sha512');
			$user->set_table('company');
			$user->set_login_field('login');
			$user->set_pass_field('pas');
			$db_info = $user->authentication($vars['post']['login'], $vars['post']['pas'], ['login' => 'test'], 'company');
		}

		header('Location:index.php?page_controller=main');
	}

	public function logout()
	{
		user_controller::unset_array($_SESSION);
		header('Location:index.php?page_controller=main');
	}

	public function create_user($vars)
	{
		$user      = new user();
		$connector = $user->create_and_return_connector();
		$vars['post']['pas'] = hash('sha512', $vars['post']['pas']);
		$query     = user_class::generate_query('user', $vars['post']);
		$result    = $connector->query($query);
		$insert_id = $connector->lastInsertId();
		if(isset($user->get_by_id($insert_id)[0]))
		{
			$_SESSION['message'] = ['msg' => 'Registration succsess', 'type' => 'warning'];
			$user->db_query('INSERT INTO user_right VALUES(null, 4, '. $insert_id .')');
		}
		else
			$_SESSION['message'] = ['msg' => 'Registration failed! Login or email exists', 'type' => 'warning'];
		header('Location:' . $_SERVER['HTTP_REFERER']);
	}

	public function create_company($vars)
	{
		$company             = new company();
		$user                = new user();
		$connector           = $company->create_and_return_connector();
		$vars['post']['pas'] = hash('sha512', $vars['post']['pas']);
		$query               = user_class::generate_query('company', $vars['post']);
		$result              = $connector->query($query);
		var_dump($query);die;
		if(!empty($user->get_by_id($connector->lastInsertId())))
			$_SESSION['message'] = ['msg' => 'Registration succsess', 'type' => 'warning'];
		//else
			//$_SESSION['message'] = ['msg' => 'Registration failed! Login or email exists', 'type' => 'warning'];
		header('Location:' . $_SERVER['HTTP_REFERER']);
	}
}

user_controller::do();