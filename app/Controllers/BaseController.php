<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;
use App\Models\CommonModel;
use App\Models\Menu;
/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 */

class BaseController extends Controller
{
	/**
	 * An array of helpers to be loaded automatically upon
	 * class instantiation. These helpers will be available
	 * to all other controllers that extend BaseController.
	 *
	 * @var array
	 */
	protected $helpers = ['common_helper'];

	/**
	 * Constructor.
	 *
	 * @param RequestInterface  $request
	 * @param ResponseInterface $response
	 * @param LoggerInterface   $logger
	 */
	public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
	{
		// Do Not Edit This Line
		parent::initController($request, $response, $logger);

		//--------------------------------------------------------------------
		// Preload any models, libraries, etc, here.
		//--------------------------------------------------------------------
		// E.g.: $this->session = \Config\Services::session();
		$this->common_model = new CommonModel;
        $this->session = \Config\Services::session();
        $this->uri = new \CodeIgniter\HTTP\URI();
	}
	public function layout_after_login($title,$page_name,$data)
	{
        $data['session'] = \Config\Services::session();
        $data['common_model'] = new CommonModel;
        

		$data['site_setting'] = $this->common_model->find_data('sms_site_settings','row');

		$conditions = array('notification_access'=>1,'published'=>0);
		$order_by[0] = array('field'=>'notification_id ', 'type'=>'desc');
		$data['new_notifications'] = $this->common_model->find_data('sms_notification_list','array',$conditions,'','','',$order_by,3);

		// $conditions = array('notification_access'=>1,'published'=>1);
		// $data['new_notifications'] = $this->common_model->find_data('sms_notification_list','array',$conditions,'','','','',2);


		$data['title'] = $title.'-'.$data['site_setting']->site_name;
		$data['page_header'] = $title;

		$data['head'] = view('admin/elements/head',$data);
		$data['header'] = view('admin/elements/header',$data);
		$data['left_sidebar'] = view('admin/elements/left-sidebar',$data);
		$data['maincontent'] = view('admin/maincontents/'.$page_name,$data);
		return view('admin/layout-after-login',$data);
	}
	public function front_layout($title,$page_name,$data)
	{
        $data['session'] 			= \Config\Services::session();
        $data['common_model'] 		= new CommonModel;        
        $data['uri'] 				= new \CodeIgniter\HTTP\URI();
		$data['site_setting'] 		= $this->common_model->find_data('sms_site_settings','row');				 
		$data['title'] 				= $title.'-'.$data['site_setting']->site_name;
		$data['page_header'] 		= $title;
		$data['currentDay']         = strtoupper(date('l'));
		$currentDate                = date('Y-m-d');
        $currentTime                = date('H:i:s');
		$data['currentdateTime']    = $currentDate.'T'.$currentTime;

		$data['head'] 				= view('front/elements/head',$data);
		$data['header'] 			= view('front/elements/header',$data);		
		$data['maincontent'] 		= view('front/pages/'.$page_name,$data);
		return view('front/layout-front',$data);
	}
	public function layout_after_login_front($title,$page_name,$data)
	{
        $data['session'] = \Config\Services::session();
        $data['common_model'] = new CommonModel;

        $data['uri'] = new \CodeIgniter\HTTP\URI();
        if($this->request->uri->getSegment(1)=='provider') {
			$data['provider'] = $this->request->uri->getSegment(2);
		} else {
			$data['provider'] = "";
		}

		$data['site_setting'] = $this->common_model->find_data('sms_site_settings','row');
		$data['title'] = $title.'-'.$data['site_setting']->site_name;
		$data['page_header'] = $title;

		$order_by[0]  =array('field'=>'category_name', 'type'=>'asc');
       	$conditions = array('parent_id'=>0, 'published'=>1);
        $data['main_cats'] = $this->common_model->find_data('sms_category','array',$conditions,'','','',$order_by);

        $order_by[0]  =array('field'=>'category_name', 'type'=>'asc');
       	$conditions = array('parent_id>'=>0, 'published'=>1);
        $data['sub_cat_footers'] = $this->common_model->find_data('sms_category','array',$conditions,'','','',$order_by);

		$data['head'] = view('front/elements/head',$data);
		$data['header'] = view('front/elements/header',$data);
		$data['left_sidebar'] = view('front/elements/left-sidebar',$data);
		$data['footer'] = view('front/elements/footer',$data);
		$data['maincontent'] = view('front/pages/'.$page_name,$data);
		return view('front/layout-after-login-front',$data);
	}
	public function alert_success_message($sessionParam)
	{
		$session = \Config\Services::session();		
		$msg = $session->getFlashdata('success_message');
		$return_msg = '<div class="alert alert-success">'.$msg.'</div>';
		return $return_msg;
	}
	public function alert_error_message($sessionParam)
	{
		$session = \Config\Services::session();		
		$msg = $session->getFlashdata('error_message');
		$return_msg = '<div class="alert alert-danger">'.$msg.'</div>';
		return $return_msg;
	}
	/* For API Development */
		public function isJSON($string)
	    {        
	        $valid = is_string($string) && is_array(json_decode($string, true)) ? true : false;
	        if (!$valid) {
	            $this->response_to_json(FALSE, "Not JSON", 401);
	        }
	    }
	    /* Process json from request */
	    public function extract_json($key)
	    {
	        return json_decode($key, TRUE);
	    }
	    /* Methods to check all necessary fields inside a requested post body */
	    public function validateArray($keys, $arr)
	    {
	        return !array_diff_key(array_flip($keys), $arr);
	    }
	    /*
	     Set response message
	     response_to_json = set_response
	    */    
	    public function response_to_json($success = TRUE, $message = "success", $data = NULL, $extraField = NULL, $extraData = NULL)
	    {
	        $response = ["success" => $success, "message" => $message, "data" => $data];
	        if ($extraField != NULL && $extraData != NULL) {
	            $response[$extraField] = $extraData;
	        }
	        print json_encode($response);
	        die;
	    }
	    public function responseJSON($data)
	    {
	        print json_encode($data);
	        die;
	    }
	/* For API Development */
}
