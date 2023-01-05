<?php
namespace App\Controllers\admin;
use App\Controllers\BaseController;
use App\Models\CommonModel;
class Manage_booking extends BaseController {

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
            'module'        => 'Bookings',
            'controller'    => 'manage_booking',
            'table_name'    => 'bookings',
            'primary_key'   => 'id'
        );
    }
    public function index() 
    {
        $data['moduleDetail']       = $this->data;
        $title                      = 'Manage '.$this->data['module'];
        $page_name                  = 'booking/booking-list';        
        $order_by[0]                = array('field' => $this->data['primary_key'], 'type' => 'desc');
        $data['bookings']           = $this->data['model']->find_data($this->data['table_name'], 'array', ['published!=' => 3 ], '', '', '', $order_by);        
        echo $this->layout_after_login($title,$page_name,$data);
    }
    public function download_csv() 
    {
        $this->common_model     = new CommonModel();
        $data['common_model']   = $this->common_model;
        $orderBy[0]             = ['field' => 'id', 'type' => 'DESC'];
        $data['bookings']       = $this->common_model->find_data('bookings', 'array', ['published!=' => 3], '', '', '', $orderBy);
        return view('admin/maincontents/booking/download-booking',$data);
    }
}