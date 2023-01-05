<?php
namespace App\Controllers\admin;
use App\Controllers\BaseController;
use App\Models\CommonModel;
use DB;
class Manage_contact extends BaseController {

    private $model;  //This can be accessed by all class methods
	public function __construct()
    {
        $session = \Config\Services::session();
        if(!$session->get('is_admin_login')) {
            return redirect()->to('/Administrator');
        }
        $model = new CommonModel();
        $this->data = array(
            'model'         => $model,
            'session'       => $session,
            'module'        => 'Contact',
            'controller'    => 'manage_contact',
            'table_name'    => 'sms_contact_enquiry',
            'primary_key'   => 'id'
        );
    }
    public function enquiry_form() 
    {
        $data['moduleDetail']       = $this->data;
        $title                      = 'Manage Contact Enquiry Form Listing';
        $page_name                  = 'contact-enquiry/enquiry-form';
        $order_by[0]                = array('field' => $this->data['primary_key'], 'type' => 'desc');
        $data['rows']               = $this->data['model']->find_data($this->data['table_name'], 'array', ['published!=' => 3, 'enquiry_type' => 'ENQUIRY'], '', '', '', $order_by);
        echo $this->layout_after_login($title,$page_name,$data);
    }
    public function feedback_form() 
    {
        $data['moduleDetail']       = $this->data;
        $title                      = 'Manage Contact Feedback Form Listing';
        $page_name                  = 'contact-enquiry/feedback-form';
        $order_by[0]                = array('field' => $this->data['primary_key'], 'type' => 'desc');
        $data['rows']               = $this->data['model']->find_data($this->data['table_name'], 'array', ['published!=' => 3, 'enquiry_type' => 'FEEDBACK'], '', '', '', $order_by);
        echo $this->layout_after_login($title,$page_name,$data);
    }
    public function download_csv() 
    {
        $data['moduleDetail']       = $this->data;
        $title                      = 'Downlaod CSV';               
        $order_by[0]                = array('field' => 'id', 'type' => 'desc');
        $data['rows']               = $this->data['model']->find_data('sms_contact_enquiry', 'array', ['published!=' => 3, 'enquiry_type=' => 'ENQUIRY'], '', '', '', $order_by);
        return view('admin/maincontents/contact-enquiry/download-csv',$data);
    }
    public function download_csv2()
    {
        $data['moduleDetail']       = $this->data;
        $title                      = 'Downlaod CSV';               
        $order_by[0]                = array('field' => 'id', 'type' => 'desc');
        $data['rows']               = $this->data['model']->find_data('sms_contact_enquiry', 'array', ['published!=' => 3, 'enquiry_type=' => 'FEEDBACK'], '', '', '', $order_by);
        return view('admin/maincontents/contact-enquiry/download_csv2',$data);
    }
}