<?php
namespace App\Controllers\admin;
use App\Libraries\HTMLLibrary;
use App\Controllers\BaseController;
use App\Models\CommonModel;
use DB;
class Manage_poll extends BaseController {

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
            'module'        => 'Poll',
            'controller'    => 'manage_poll',
            'table_name'    => 'sms_poll',
            'primary_key'   => 'id'
        );
    }
    public function index()
    {
        $data['moduleDetail']       = $this->data;
        $title                      = 'Manage '.$this->data['module'];
        $page_name                  = 'poll/list';
        $order_by[0]                = array('field' => $this->data['primary_key'], 'type' => 'desc');
        $data['rows']               = $this->data['model']->find_data($this->data['table_name'], 'array', ['published!=' => 3 ], '', '', '', $order_by);
        echo $this->layout_after_login($title,$page_name,$data);
    }
    public function add()
    {
        $this->db                   = \Config\Database::connect();
        $htmlLibrary                = new HTMLLibrary();
        $data['moduleDetail']       = $this->data;
        $data['action']             = 'Add';
        $title                      = $data['action'].' '.$this->data['module'];
        $page_name                  = 'poll/add-edit';
        $data['row']                = [];
        $data['functions']          = [];

        if($this->request->getMethod() == 'post') {
            // pr($this->request->getPost());
            $postData = [
                'poll_title'                      => $htmlLibrary->purifierConfig()->purify($this->request->getPost('poll_title')),
                'created_at'                      => date('Y-m-d h:i:s')
            ];
            // pr($postData);
        $poll_id = $this->common_model->save_data('sms_poll', $postData, '', 'id');
        /* function manage */
        $function_name = $this->request->getPost('function_name');
        if(count($function_name)>0){
            for($f=0;$f<count($function_name);$f++){
                if($function_name[$f] != ''){
                    $postData2 = [
                            'poll_id'                        => $poll_id,
                            'poll_option'                    => $htmlLibrary->purifierConfig()->purify($function_name[$f])
                    ];
                    $this->common_model->save_data('sms_poll_option', $postData2, '', 'id');
                }
            }
        }
        /* function manage */
            $this->session->setFlashdata('success_message', $this->data['module'].' inserted successfully');
            return redirect()->to('/admin/'.$this->data['controller']);
        }
        echo $this->layout_after_login($title,$page_name,$data);
    }
    public function edit($id)
    {
        $htmlLibrary                = new HTMLLibrary();
        $this->db                   = \Config\Database::connect();
        $data['moduleDetail']       = $this->data;
        $data['action']             = 'Edit';
        $title                      = $data['action'].' '.$this->data['module'];
        $page_name                  = 'poll/add-edit';        
        $conditions                 = array($this->data['primary_key']=>$id);
        $data['row']                = $this->data['model']->find_data($this->data['table_name'], 'row', $conditions);
        $data['functions']    = $this->common_model->find_data('sms_poll_option', 'array', ['published' => 1]);

        if($this->request->getMethod() == 'post') {
            // pr($this->request->getPost());die;
            $postData = [
                'poll_title'                        => $htmlLibrary->purifierConfig()->purify($this->request->getPost('poll_title')),
                'updated_at'                        => date('Y-m-d H:i:s')
              ];
            $poll_id = $this->common_model->save_data('sms_poll', $postData, $id, 'id');
            /* function manage */
                $function_name = $this->request->getPost('function_name');
                if(count($function_name)>0){
                    for($f=0;$f<count($function_name);$f++){
                        if($function_name[$f] != ''){
                            $postData2 = [
                                        'poll_id'                        => $poll_id,
                                        'poll_option'                    => $htmlLibrary->purifierConfig()->purify($function_name[$f])
                                    ];
                            // pr($postData2);
                            $this->common_model->save_data('sms_poll_option', $postData2, $poll_id , $this->data['primary_key']);
                            // echo $this->db->getLastQuery();die;
                        }
                    }
                }
            /* function manage */
            // $record = $this->common_model->save_data($this->data['table_name'], $postData, $id, $this->data['primary_key']);
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
}