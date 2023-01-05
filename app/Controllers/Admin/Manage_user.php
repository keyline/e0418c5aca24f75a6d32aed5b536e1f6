<?php
namespace App\Controllers\admin;
use App\Controllers\BaseController;
use App\Models\CommonModel;
use DB;
class Manage_user extends BaseController {

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
            'module'        => 'User',
            'controller'    => 'manage_user',
            'table_name'    => 'sms_users',
            'primary_key'   => 'id'
        );
    }
    public function index() 
    {
        $data['moduleDetail']       = $this->data;
        $title                      = 'Manage '.$this->data['module'];
        $page_name                  = 'user/list';        
        $order_by[0]                = array('field' => $this->data['primary_key'], 'type' => 'desc');
        $data['rows']               = $this->data['model']->find_data($this->data['table_name'], 'array', ['published!=' => 3 , 'user_type' => 'U'], '', '', '', $order_by);
        // pr($data['rows']);   
        echo $this->layout_after_login($title,$page_name,$data);
    }
    public function add()
    {
        $data['moduleDetail']       = $this->data;
        $data['action']             = 'Add';
        $title                      = $data['action'].' '.$this->data['module'];
        $page_name                  = 'user/add-edit';        
        $data['row'] = [];
        if($this->request->getMethod() == 'post') {            
            /* profile image upload */
                $file           = $this->request->getFile('profile_image');
                $originalName   = $file->getClientName();
                $fieldName      = 'profile_image';
                if($originalName!='') {
                    $upload_array = $this->common_model->upload_single_file($fieldName,$originalName,'users','image');
                    if($upload_array['status']) {
                        $profile_image = $upload_array['newFilename'];
                    } else {
                        $this->session->setFlashdata('msg1', $upload_array['message']);
                        return redirect()->to(current_url());
                    }
                } else {
                    $this->session->setFlashdata('msg1', 'Please upload an image');                    
                    return redirect()->to(current_url());
                }
            /* profile image upload */
            $postData   = array(
                                'user_type'                 =>'U',
                                'name'                      => $this->request->getPost('name'),
                                'lname'                     => $this->request->getPost('lname'),
                                'mobile'                    => $this->request->getPost('mobile'),
                                'email'                     => $this->request->getPost('email'),
                                'username'                  => $this->request->getPost('email'),
                                'password'                  => md5($this->request->getPost('password')),
                                'password_original'         => $this->request->getPost('password'),
                                'profile_image'             => $profile_image,
                                );
            //pr($postData);
            $record     = $this->data['model']->save_data($this->data['table_name'], $postData, '', $this->data['primary_key']);            
            $this->session->setFlashdata('success_message', $this->data['module'].' inserted successfully');
            return redirect()->to('/admin/'.$this->data['controller']);
        }
        echo $this->layout_after_login($title,$page_name,$data);
    }
    public function edit($id)
    {
        $data['moduleDetail']       = $this->data;
        $data['action']             = 'Edit';
        $title                      = $data['action'].' '.$this->data['module'];
        $page_name                  = 'user/add-edit';        
        $conditions                 = array($this->data['primary_key']=>$id);
        $data['row']                = $this->data['model']->find_data($this->data['table_name'], 'row', $conditions);

        if($this->request->getMethod() == 'post') {            
            /* image upload */
            $file = $this->request->getFile('profile_image');
            $originalName = $file->getClientName();
            $fieldName = 'profile_image';
            if($originalName!='') {           

                $upload_array = $this->common_model->upload_single_file($fieldName,$originalName,'users','image');
                if($upload_array['status']) {
                    $profile_image = $upload_array['newFilename'];
                } else {
                    $this->session->setFlashdata('msg1', $upload_array['message']);
                    return redirect()->to(current_url());
                }
            } else {
                $profile_image = $data['row']->profile_image;
            }
            /* image upload */
            $postData   = array(
                                'user_type'                 =>'U',
                                'name'                      => $this->request->getPost('name'),
                                'lname'                     => $this->request->getPost('lname'),
                                'mobile'                    => $this->request->getPost('mobile'),
                                'email'                     => $this->request->getPost('email'),
                                'username'                  => $this->request->getPost('email'),
                                'password'                  => md5($this->request->getPost('password')),
                                'password_original'         => $this->request->getPost('password'),
                                'profile_image'             => $profile_image
                                );
            $record = $this->common_model->save_data($this->data['table_name'], $postData, $id, $this->data['primary_key']);
            $this->session->setFlashdata('success_message', $this->data['module'].' updated successfully');
            return redirect()->to('/admin/'.$this->data['controller']);
        }        
        echo $this->layout_after_login($title,$page_name,$data);
    }
    public function confirm_delete($id)
    {
        $postData = array(
                            'published' => 3
                        );
        $updateData = $this->common_model->save_data($this->data['table_name'],$postData,$id,$this->data['primary_key']);
        $this->session->setFlashdata('success_message', $this->data['module'].' deleted successfully');
        return redirect()->to('/admin/'.$this->data['controller']);
    }
    public function deactive($id)
    {
        $postData = array(
                            'published' => 0
                        );
        $updateData = $this->common_model->save_data($this->data['table_name'],$postData,$id,$this->data['primary_key']);
        $this->session->setFlashdata('success_message', $this->data['module'].' deactivated successfully');
        return redirect()->to('/admin/'.$this->data['controller']);
    }
    public function active($id)
    {
        $postData = array(
                            'published' => 1
                        );
        $updateData = $this->common_model->save_data($this->data['table_name'],$postData,$id,$this->data['primary_key']);
        $this->session->setFlashdata('success_message', $this->data['module'].' activated successfully');
        return redirect()->to('/admin/'.$this->data['controller']);
    }
    public function booking_list($id) 
    {
        $data['moduleDetail']       = $this->data;
        $data['user']               = $this->data['model']->find_data($this->data['table_name'], 'row', ['id' => $id]);
        $title                      = 'Manage Bookings Of '.$data['user']->name.' '.$data['user']->lname.' ('.$data['user']->mobile.')';
        $page_name                  = 'user/booking-list';        
        $order_by[0]                = array('field' => 'id', 'type' => 'desc');
        $data['bookings']           = $this->data['model']->find_data('bookings', 'array', ['user_id' => $id], '', '', '', $order_by);        
        echo $this->layout_after_login($title,$page_name,$data);
    }
    public function wishlist($id) 
    {
        $data['moduleDetail']       = $this->data;
        $data['user']               = $this->data['model']->find_data($this->data['table_name'], 'row', ['id' => $id]);
        $title                      = 'Manage Wishlist Of '.$data['user']->name.' '.$data['user']->lname.' ('.$data['user']->mobile.')';
        $page_name                  = 'user/wishlist';        
        $order_by[0]                = array('field' => 'id', 'type' => 'desc');
        $data['bookings']           = $this->data['model']->find_data('user_event_wishlist', 'array', ['user_id' => $id], '', '', '', $order_by);        
        echo $this->layout_after_login($title,$page_name,$data);
    }
    public function download_csv() 
    {
        $this->common_model     = new CommonModel();
        $data['common_model']   = $this->common_model;
        $data['users']          = $this->common_model->find_data('sms_users', 'array', ['published!=' => 3, 'user_type' => 'U']);
        return view('admin/maincontents/user/download-user',$data);
    }
    public function view_videoList($id) 
    {
        echo 'USERID iS : '. $id; 
    }
}