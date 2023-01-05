<?php
namespace App\Controllers\admin;
use App\Controllers\BaseController;
use App\Models\CommonModel;
class Manage_event_agenda extends BaseController {

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
            'module'        => 'Event Agenda',
            'controller'    => 'manage_event_agenda',
            'table_name'    => 'event_agenda',
            'primary_key'   => 'agenda_id'
        );
    }
    public function index() 
    {
        $data['moduleDetail']       = $this->data;
        $title                      = 'Manage '.$this->data['module'];
        $page_name                  = 'event/event_agenda';
        $order_by[0]                = array('field' => $this->data['primary_key'], 'type' => 'desc');
        $data['rows']               = $this->data['model']->find_data($this->data['table_name'], 'array', ['published!=' => 3 ], '', '', '', $order_by);
        // pr($data['rows']);
        echo $this->layout_after_login($title,$page_name,$data);
    }
    public function add()
    {
        $data['moduleDetail']       = $this->data;
        $data['action']             = 'Add';
        $title                      = $data['action'].' '.$this->data['module'];
        $page_name                  = 'event/add-edit-agenda';
        $data['row']                = [];
        if($this->request->getMethod() == 'post') {
            $session_name           = $this->request->getPost('session_name');
            $session_timing         = $this->request->getPost('session_timing');
            $session_title          = $this->request->getPost('session_title');
            $postData = array(
                    'agenda_date'               => $this->request->getPost('agenda_date'),
                    'agenda_day'                => $this->request->getPost('agenda_day'),
                    'agenda_title'              => $this->request->getPost('agenda_title'),
                    'agenda_venue'              => $this->request->getPost('agenda_venue'),
                    'session_name'              => json_encode(array_filter($session_name)),
                    'session_timing'            => json_encode(array_filter($session_timing)),
                    'session_title'             => json_encode(array_filter($session_title)),
                    'created_at'                => date('Y-m-d')
                    );
            // pr($postData);
            $event = $this->data['model']->save_data($this->data['table_name'], $postData, '', $this->data['primary_key']);
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
        $page_name                  = 'event/add-edit-agenda';        
        $conditions                 = array($this->data['primary_key']=>$id);
        $data['row']                = $this->data['model']->find_data($this->data['table_name'], 'row', $conditions);
        // pr($data['row']);
        if($this->request->getMethod() == 'post') {
            $session_name           = $this->request->getPost('session_name');
            $session_timing         = $this->request->getPost('session_timing');
            $session_title          = $this->request->getPost('session_title');
            $postData = array(
                    'agenda_date'               => $this->request->getPost('agenda_date'),
                    'agenda_day'                => $this->request->getPost('agenda_day'),
                    'agenda_title'              => $this->request->getPost('agenda_title'),
                    'agenda_venue'              => $this->request->getPost('agenda_venue'),
                    'session_name'              => json_encode(array_filter($session_name)),
                    'session_timing'            => json_encode(array_filter($session_timing)),
                    'session_title'             => json_encode(array_filter($session_title)),
                    'updated_at'                => date('Y-m-d')
                    );
            // pr($postData);
            $event = $this->common_model->save_data($this->data['table_name'], $postData, $id, $this->data['primary_key']);
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
}