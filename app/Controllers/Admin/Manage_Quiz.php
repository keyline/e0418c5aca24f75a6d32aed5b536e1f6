<?php

namespace App\Controllers\admin;

use App\Controllers\BaseController;
use App\Models\CommonModel;
use DB;

class Manage_user extends BaseController
{
    private $model;  //This can be accessed by all class methods

    public function __construct()
    {
        $session = \Config\Services::session();
        if (!$session->get('is_admin_login')) {
            return redirect()->to('/Administrator');
        }
        $model = new CommonModel();
        $this->data = array(
            'model'         => $model,
            'session'       => $session,
            'module'        => 'Quiz',
            'controller'    => 'manage_quiz',
            'table_name'    => 'abp_quizzes',
            'primary_key'   => 'quiz_id'
        );
    }

    public function index()
    {
        $data['moduleDetail']       = $this->data;
        $title                      = 'Manage '.$this->data['module'];
        $page_name                  = 'quiz/list';
        $order_by[0]                = array('field' => $this->data['primary_key'], 'type' => 'desc');
        $data['rows']               = $this->data['model']->find_data($this->data['table_name'], 'array', ['is_active!=' => 1 ], '', '', '', $order_by);
        echo $this->layout_after_login($title, $page_name, $data);
    }

    public function add()
    {
        $data['moduleDetail']       = $this->data;
        $data['action']             = 'Add';
        $title                      = $data['action'].' '.$this->data['module'];
        $page_name                  = 'quiz/add-edit';
        $data['row'] = [];

        if ($this->request->getMethod() == 'post') {
        }
        echo $this->layout_after_login($title, $page_name, $data);
    }
}
