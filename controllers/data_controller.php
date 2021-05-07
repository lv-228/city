<?php
require_once 'controller.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/models/owner_service_model.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/models/discount_card_model.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/models/document_model.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/models/worker_model.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/models/baner_model.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/models/company_document_model.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/classes/file_system.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/models/complaint_type_model.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/models/complaint_model.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/models/company_model.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/models/fine_model.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/models/requests_model.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/models/tender_model.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/models/bidders_model.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/models/user_model.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/models/news_model.php';


/**
 * 
 */
class data_controller extends controller
{
	public static $post = 
	[
		'delete_a_ticket' => 
		[
			'ticket_id'
		],
		'delete_a_card' =>
		[
			'card_id'
		],
		'create_a_card' =>
		[
			'num'
		],
		'bind_card' =>
		[
			'number'
		],
		'delete_u_doc' =>
		[
			'did'
		],
		'add_staff' =>
		[
			'full_name',
			'auto_reg',
			'position',
			'email'
		],
		'add_c_doc' =>
		[
			'number',
			'type'
		],
		'delete_c_doc' =>
		[
			'cdid'
		],
		'create_adver' =>
		[
			'start_date',
			'end_date',
			'text',
			'MAX_FILE_SIZE',
		],
		'delete_adver' =>
		[
			'bid'
		],
		'create_complaint' =>
		[
			'company',
			'type',
			'des'
		],
		'create_fine' =>
		[
			'doc',
			'type',
			'des',
			'price'

		],
		'delete_fine' =>
		[
			'fine_id'
		],
		'create_request' =>
		[
			'from',
			'usr',
			'type',
			'desc',
		],
		'delete_request' =>
		[
			'req_id'
		],
		'create_tender' =>
		[
			'name',
			'ttype',
			'description'
		],
		'answer_request' =>
		[
			'rid',
			'status',
			'answer'
		],
		'part_in_tender' =>
		[
			'tid',
			'price',
			'description'
		],
		'delete_user' =>
		[
			'user_id'
		],
		'delete_complaint' =>
		[
			'cid'
		],
		'delete_news' =>
		[
			'nid'
		],
		'declare_winner' =>
		[
			'tid',
			'cid'
		],
		'add_u_doc' =>
		[
			'numbers',
			'type'
		],
		'add_c_img' =>
		[
			'cid',
			'MAX_FILE_SIZE',
		]
	];

	public function delete_a_ticket($vars)
	{
		$owner_service = new owner_service();
		$owner_service->delete_by_id($vars['post']['ticket_id']);
		header('Location:' . $_SERVER['HTTP_REFERER']);
	}

	public function delete_a_card($vars)
	{
		$card = new discount_card();
		$card->delete_by_id($vars['post']['card_id']);
		header('Location:' . $_SERVER['HTTP_REFERER']);
	}

	public function create_a_card($vars)
	{
		//var_dump($vars);die;
		$card = new discount_card();
		$card->owner         = 'null';
		$card->serial_number = $vars['post']['num'];
		$card->company       = 21;
		$card->save();
		header('Location:' . $_SERVER['HTTP_REFERER']);
	}

	public function bind_card($vars)
	{
		$card       = new discount_card();
		$exist_card = $card->db_query('SELECT * FROM discount_card WHERE serial_number = ' . $vars['post']['number'] . ' AND OWNER is NULL');
		if($exist_card)
		{
			//var_dump('UPDATE discount_card WHERE id = ' . $exist_card[0]['id'] . ' SET owner = ' . $_SESSION['uid']);die;
			$card->db_query('UPDATE discount_card SET owner = ' . $_SESSION['uid'] . ' WHERE id = ' . $exist_card[0]['id']);
		}
		else
			$_SESSION['message'] = ['msg' => 'Bind card failed! Card not exists!', 'type' => 'warning'];
		header('Location:' . $_SERVER['HTTP_REFERER']);
	}

	public function order_ticket($vars)
	{
		var_dump($vars);
	}

	public function delete_u_doc($vars)
	{
		$doc = new document();
		$doc->delete_by_id($vars['post']['did']);
		header('Location:' . $_SERVER['HTTP_REFERER']);
	}

	public function add_staff($vars)
	{
		$worker            = new worker();
		$worker->full_name = $vars['post']['full_name'];
		$worker->company   = $_SESSION['uid'];
		$worker->position  = $vars['post']['position'];
		$worker->auto_reg  = $vars['post']['auto_reg'];
		$worker->email     = $vars['post']['email'];

		$worker->save();
		header('Location:' . $_SERVER['HTTP_REFERER']);
	}

	public function add_c_doc($vars)
	{
		$company_document          = new company_document();
		$company_document->company = $_SESSION['uid'];
		$company_document->nubmers = $vars['post']['number'];
		$company_document->type    = $vars['post']['type'];
		$company_document->save();
		header('Location:' . $_SERVER['HTTP_REFERER']);
	}

	public function delete_c_doc($vars)
	{
		$c_doc = new company_document();
		$c_doc->delete_by_id($vars['post']['cdid']);
		header('Location:' . $_SERVER['HTTP_REFERER']);
	}

	public function create_adver($vars)
	{
		$baner = new baner();
		$file  = new file_system();
		$file               = new file_system();
		$config             = $baner->getConfig();
		$file->uploadfile   = $config['upload_dir'];
		$baner->adver_text  = $vars['post']['text'];
		$baner->img         = $file->save_file();
		$baner->owner       = $_SESSION['uid'];
		$baner->start_date  = $vars['post']['start_date'];
		$baner->end_date    = $vars['post']['end_date'];
		$baner->save();
		header('Location:' . $_SERVER['HTTP_REFERER']);
 	}

 	public function delete_adver($vars)
 	{
 		$baner = new baner();
 		$baner->delete_by_id($vars['post']['bid']);
 		header('Location:' . $_SERVER['HTTP_REFERER']);
 	}

 	public function create_complaint($vars)
 	{
 		$complaint         = new complaint();
 		$company           = new company();
 		$complaint_type    = new complaint_type();
 		$complaint->to_c   = $vars['post']['company'];
 		$complaint->from_u = $_SESSION['uid'];
 		$complaint->body   = $vars['post']['des'];
 		$complaint->type   = $vars['post']['type'];
 		$complaint->to_u   = 'null';
 		$complaint->from_c = 'null';
 		$complaint->to_alt = 'null';
 		$complaint->save();
 		header('Location:' . $_SERVER['HTTP_REFERER']);
 	}

 	public function create_fine($vars)
 	{
 		$fine              = new fine();
 		$fine->document    = $vars['post']['doc'];
 		$fine->type        = $vars['post']['type'];
 		$fine->description = $vars['post']['des'];
 		$fine->price       = $vars['post']['price'];
 		$fine->save();
 		header('Location:' . $_SERVER['HTTP_REFERER']);
 	}

 	public function delete_fine($vars)
 	{
 		$fine = new fine();
 		$fine->delete_by_id($vars['post']['fine_id']);
 		header('Location:' . $_SERVER['HTTP_REFERER']);
 	}

 	public function create_request($vars)
 	{
 		$request           = new requests();
 		$request->type     = $vars['post']['type'];
 		$request->descript = $vars['post']['desc'];
 		if($vars['post']['from'] == 'user')
 		{
 			$request->owner_u = $_SESSION['uid'];
 			$request->owner_c = 'null';
 		}
 		elseif($vars['post']['from'] == 'company')
 		{
 			$request->owner_c = $_SESSION['uid'];
 			$request->owner_u = 'null';
 		}
 		$request->status = 2;
 		$request->answer = 'null';
 		$request->save();
 		header('Location:' . $_SERVER['HTTP_REFERER']);
 	}

 	public function delete_request($vars)
 	{
 		$request = new requests();
 		$request->delete_by_id($vars['post']['req_id']);
 		header('Location:' . $_SERVER['HTTP_REFERER']);
 	}

 	public function create_tender($vars)
 	{
 		$tender              = new tender();
 		$tender->name        = $vars['post']['name'];
 		$tender->type        = $vars['post']['ttype'];
 		$tender->description = $vars['post']['description'];
 		$tender->winner      = 'null';
 		$tender->save();
 		header('Location:' . $_SERVER['HTTP_REFERER']);
 	}

 	public function answer_request($vars)
 	{
 		//var_dump($vars);die;
 		$request      = new requests();
 		$request->db_query('UPDATE requests SET answer = \'' . $vars['post']['answer'] . '\', status = ' . $vars['post']['status'] . ' WHERE id = ' . $vars['post']['rid']);
 		header('Location:' . $_SERVER['HTTP_REFERER']);
 	}

 	public function part_in_tender($vars)
 	{
 		$bidders              = new bidders();
 		$bidders->tender_id   = $vars['post']['tid'];
 		$bidders->company_id  = $_SESSION['uid'];
 		$bidders->price       = $vars['post']['price'];
 		$bidders->description = $vars['post']['description'];
 		$bidders->save();
 		header('Location:' . $_SERVER['HTTP_REFERER']);
 	}

 	public function delete_user($vars)
 	{
 		$user = new user();
 		$user->delete_by_id($vars['post']['user_id']);
 		header('Location:' . $_SERVER['HTTP_REFERER']);
 	}

 	public function delete_complaint($vars)
 	{
 		$complaint = new complaint();
 		$complaint->delete_by_id($vars['post']['cid']);
 		header('Location:' . $_SERVER['HTTP_REFERER']);
 	}

 	public function delete_news($vars)
 	{
 		$news = new news();
 		$news->delete_by_id($vars['post']['nid']);
 		header('Location:' . $_SERVER['HTTP_REFERER']);
 	}

 	public function declare_winner($vars)
 	{
 		$tender = new tender();
 		$tender->db_query('UPDATE tender SET winner = ' . $vars['post']['cid'] . ' WHERE id = ' . $vars['post']['tid']);
 		header('Location:' . $_SERVER['HTTP_REFERER']);
 	}

 	public function add_u_doc($vars)
 	{
 		$document          = new document();
		$document->owner   = $_SESSION['uid'];
		$document->numbers = $vars['post']['numbers'];
		$document->type    = $vars['post']['type'];
		$document->save();
		header('Location:' . $_SERVER['HTTP_REFERER']);
 	}

 	public function add_c_img($vars)
 	{
 		//var_dump($vars);
 		$company = new company();
 		$file    = new file_system();
 		$config  = $company->getConfig();
 		$file->uploadfile = $config['upload_dir'];
 		//var_dump(expression)
 		$company->db_query('UPDATE company SET img = ' . '\'' . $file->save_file() . '\'' . ' WHERE id = ' . $vars['post']['cid']);
 		header('Location:' . $_SERVER['HTTP_REFERER']);
 	}
}

data_controller::do();