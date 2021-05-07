<?php

require_once 'controller.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/models/news_model.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/models/baner_model.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/models/company_model.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/models/c_type_model.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/models/discount_card_model.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/models/user_model.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/models/doc_type_model.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/models/worker_model.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/models/company_document_model.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/models/tender_model.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/models/ten_type_model.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/models/complaint_model.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/models/complaint_type_model.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/models/baner_model.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/models/f_type_model.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/models/fine_model.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/models/req_type_model.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/models/news_type_model.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/models/requests_model.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/models/req_type_model.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/models/requests_status_model.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/models/bidders_model.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/models/c_type_model.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/models/document_model.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/models/user_model.php';

/**
 * 
 */
class page_controller extends controller
{
	
	public static $get = 
	[
		'company_list' => 
		[
			'name' => false
		],
		'company_fine' =>
		[
			'cid' => false
		],
		'found_tender' =>
		[
			'tname'
		],
		'news' =>
		[
			'nid'
		],
		'request' =>
		[
			'rid'
		],
		'tender' =>
		[
			'tid'
		]
	];

	public function main()
	{
		$news      = new news();
		$news_list = $news->db_query('SELECT *, news.id as news_id, news.img as nimg, user.id as user_id, news_type.descript as news_type FROM news, user, news_type WHERE news.author = user.id AND news.type = news_type.id ORDER BY public_date DESC LIMIT 5');
		//var_dump($news_list);die;
		$baner        = new baner();
		$baner_data   = $baner->db_query('SELECT * FROM baner WHERE start_date <= \''. $GLOBALS["date"] . '\' AND end_date >= \'' . $GLOBALS["date"] . '\' LIMIT 1');
		$company      = new company();
		$company_data = $company->db_query('SELECT * FROM company ORDER BY id DESC LIMIT 5');
		page_controller::getView('main', ['page' => 'main_page.php', 'news' => $news_list, 'baner_data' => $baner_data, 'companys' => $company_data]);
	}

	public function registration()
	{
		$c_type      = new c_type();
		$c_type_data = $c_type->parse_query_result($c_type->find_all());
		page_controller::getView('main', ['page' => 'registration.php', 'c_type' => $c_type_data]);
	}

	public function apark()
	{
		$discount_cards = new discount_card();
		page_controller::getView('main', ['page' => 'apark.php', 'discount_obj' => $discount_cards]);
	}

	public function company_list($vars)
	{
		$company  = new company();
		if(!isset($vars['get']['name']))
			$companys = $company->find_all();
		else
			$companys = $company->db_query('SELECT * FROM company WHERE name = ' . '\'' . $vars['get']['name'] . '\'');
		page_controller::getView('main', ['page' => 'company_list.php', 'companys' => $companys]);
	}

	public function user_page($vars)
	{
		page_controller::getView('main', ['page' => 'user_page.php', 'user_obj' => new user(), 'doc_obj' => new doc_type()]);
	}

	public function company_page($vars)
	{
		page_controller::getView('main', ['page' => 'company_page.php', 'company_obj' => new company(), 'worker_obj' => new worker(), 'doc_type_obj' => new doc_type(), 'company_doc_obj' => new company_document()]);
	}

	public function tender_list($vars)
	{
		page_controller::getView('main', ['page' => 'tender_list.php', 'tender_obj' => new tender(), 'ten_type_obj' => new ten_type()]);
	}

	public function company_fine($vars)
	{
		page_controller::getView('main', ['page' => 'company_fine.php', 'complaint_obj' => new complaint(), 'company_obj' => new company(), 'complaint_type_obj' => new complaint_type()]);
	}

	public function company_services()
	{
		page_controller::getView('main', ['page' => 'company_services.php']);
	}

	public function create_adver($vars)
	{
		page_controller::getView('main', ['page' => 'create_adver.php', 'baner_obj' => new baner()]);
	}

	public function create_complaint($vars)
	{
		page_controller::getView('main', ['page' => 'create_complaint.php', 'company_obj' => new company(), 'complaint_type_obj' => new complaint_type()]);
	}

	public function create_fine($vars)
	{
		page_controller::getView('main', ['page' => 'create_fine.php', 'f_type_obj' => new f_type(), 'company_obj' => new company(), 'fine_obj' => new fine()]);
	}

	public function create_request($vars)
	{
		page_controller::getView('main', ['page' => 'create_request.php', 'req_type_obj' => new req_type()]);
	}

	public function create_tender($vars)
	{
		page_controller::getView('main', ['page' => 'create_tender.php', 'tender_obj' => new tender(), 'ten_type_obj' => new ten_type()]);
	}

	public function found_tender($vars)
	{
		$tender  =  new tender();
		$tenders = $tender->db_query('SELECT * FROM tender WHERE name = ' . $vars['get']['tname']);
		page_controller::getView('main', ['page' => 'found_tender.php', 'tenders' => $tenders, 'ten_type_obj' => new ten_type()]);
	}

	public function news($vars)
	{
		$news = new news();
		$news_data = $news->get_by_id($vars['get']['nid']);
		page_controller::getView('main', ['page' => 'news.php', 'news' => $news_data, 'user' => new user(), 'news_type_obj' => new news_type()]);
	}

	public function news_list($vars)
	{
		page_controller::getView('main', ['page' => 'news_list.php', 'news_obj' => new news()]);
	}

	public function request($vars)
	{
		$request = new requests();
		$req_types = new req_type();
		$types = $req_types->parse_query_result($req_types->find_all());
		page_controller::getView('main', ['page' => 'request.php', 'request' => $request->get_by_id($vars['get']['rid']), 'req_types' => $types]);
	}

	public function request_list($vars)
	{
		$requests   = new requests();
		$req_status = new requests_status();
		$req_types  = new req_type();
		page_controller::getView('main', ['page' => 'request_list.php', 'request' => $requests->parse_query_result($requests->find_all()), 'req_status' => $req_status->parse_query_result($req_status->find_all()), 'req_types' => $req_types->parse_query_result($req_types->find_all())]);
	}

	public function tender($vars)
	{
		$tender   = new tender();
		$ten_type = new ten_type();
		$bidders  = new bidders();
		$c_type   = new c_type();
		$company  = new company();
		page_controller::getView('main', ['page' => 'tender.php', 'tenders' => $tender->get_by_id($vars['get']['tid']), 'ten_types' => $ten_type->parse_query_result($ten_type->find_all()), 'bidders' => $tender->db_query('SELECT * FROM bidders WHERE tender_id = ' . $vars['get']['tid']), 'c_types' => $c_type->parse_query_result($c_type->find_all()), 'part' => $bidders->db_query('SELECT * FROM bidders WHERE company_id = ' . $_SESSION['uid'] . ' AND tender_id = ' . $vars['get']['tid']), 'company_obj' => $company]);
	}

	public function user_fine($vars)
	{
		$document  = new document();
		$fine      = new fine();
		$f_type    = new f_type();
		$docs      = $document->db_query('SELECT * FROM document WHERE owner = ' . $_SESSION['uid']);
		if(!empty($docs))
		{
			$docs_id   = '';
			for($i=0; $i < (count($docs) - 1); $i++)
        		$docs_id .= '\'' . $docs[$i]['numbers'] . '\'' . ',';
    		$docs_id .= '\'' . $docs[$i]['numbers'] . '\'';
			$user_fine = $fine->db_query('SELECT * FROM fine WHERE document IN (' . $docs_id . ')');
		}

		page_controller::getView('main', ['page' => 'user_fine.php', 'fine' => isset($user_fine) ? $user_fine : false, 'f_types' => $f_type->find_all()]);
	}

	public function user_list($vars)
	{
		$user = new user();
		page_controller::getView('main', ['page' => 'user_list.php', 'users' => $user->find_all() ]);
	}
}

page_controller::do();