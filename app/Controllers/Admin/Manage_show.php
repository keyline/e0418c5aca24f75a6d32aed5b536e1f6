<?php
namespace App\Controllers\admin;
use App\Libraries\HTMLLibrary;
use App\Controllers\BaseController;
use App\Models\CommonModel;
use DB;
class Manage_show extends BaseController {

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
            'module'        => 'Show',
            'controller'    => 'manage_show',
            'table_name'    => 'abp_shows',
            'primary_key'   => 'id'
        );
    }
    public function index() 
    {
        $data['moduleDetail']       = $this->data;
        $title                      = 'Manage '.$this->data['module'];
        $page_name                  = 'show/list';
        $order_by[0]                = array('field' => $this->data['primary_key'], 'type' => 'desc');
        $data['rows']               = $this->data['model']->find_data($this->data['table_name'], 'array', ['published!=' => 3], '', '', '', $order_by);        
        echo $this->layout_after_login($title,$page_name,$data);
    }
    public function add()
    {
        $htmlLibrary                = new HTMLLibrary();
        $data['moduleDetail']       = $this->data;
        $data['action']             = 'Add';
        $title                      = $data['action'].' '.$this->data['module'];
        $page_name                  = 'show/add-edit';
        $data['row'] = [];
        if($this->request->getMethod() == 'post') {
            /* image upload */
            $file = $this->request->getFile('show_cover_image');
            $originalName   = $file->getClientName();
            $fieldName      = 'show_cover_image';
            if($originalName!='') {
                $upload_array = $this->common_model->upload_single_file($fieldName,$originalName,'show','image');
                if($upload_array['status']) {
                    $show_cover_image = $upload_array['newFilename'];
                } else {
                    $this->session->setFlashdata('error_message', $upload_array['message']);
                    return redirect()->to(current_url());
                }
            } else {
                $this->session->setFlashdata('error_message', 'Please upload an image');
                return redirect()->to(current_url());
            }
            /* image upload */
            $slug       =$this->data['model']->clean($this->request->getPost('show_title'));
            $postData   = array(
                                'show_title'                => $htmlLibrary->purifierConfig()->purify($this->request->getPost('show_title')),
                                'show_keyword'              => $htmlLibrary->purifierConfig()->purify($this->request->getPost('show_keyword')),
                                'show_metatag'              => $htmlLibrary->purifierConfig()->purify($this->request->getPost('show_metatag')),
                                'show_cover_image'          => $show_cover_image,
                                'show_slug'                 => $htmlLibrary->purifierConfig()->purify(strtolower($slug)),
                                );
            // pr($postData, false);
            $record     = $this->data['model']->save_data($this->data['table_name'], $postData, '', $this->data['primary_key']);
            $this->session->setFlashdata('success_message', $this->data['module'].' inserted successfully');
            return redirect()->to('/admin/'.$this->data['controller']);
        }
        echo $this->layout_after_login($title,$page_name,$data);
    }
    public function edit($id)
    {
        $htmlLibrary                = new HTMLLibrary();
        $data['moduleDetail']       = $this->data;
        $data['action']             = 'Edit';
        $title                      = $data['action'].' '.$this->data['module'];
        $page_name                  = 'show/add-edit';        
        $conditions                 = array($this->data['primary_key']=>$id);
        $data['row']                = $this->data['model']->find_data($this->data['table_name'], 'row', $conditions);

        if($this->request->getMethod() == 'post') {
            /* image upload */
            $file = $this->request->getFile('show_cover_image');
            $originalName = $file->getClientName();
            $fieldName = 'show_cover_image';
            if($originalName!='') {
                try{
                    
                }
                catch (\Throwable $th) {
                    if($data['row']->show_cover_image!='') {
                        unlink('uploads/show/'.$data['row']->show_cover_image);
                    } 
                }
                $upload_array = $this->common_model->upload_single_file($fieldName,$originalName,'show','image');
                if($upload_array['status']) {
                    $show_cover_image = $upload_array['newFilename'];
                } else {
                    $this->session->setFlashdata('error_message', $upload_array['message']);
                    return redirect()->to(current_url());
                }
            } else {
                $show_cover_image = $data['row']->show_cover_image;
            }
            /* image upload */
            $slug       =$this->data['model']->clean($this->request->getPost('show_title'));
            $postData = array(
                            'show_title'                => $htmlLibrary->purifierConfig()->purify($this->request->getPost('show_title')),
                            'show_keyword'              => $htmlLibrary->purifierConfig()->purify($this->request->getPost('show_keyword')),
                            'show_metatag'              => $htmlLibrary->purifierConfig()->purify($this->request->getPost('show_metatag')),
                            'show_cover_image'          => $show_cover_image,
                            'show_slug'                 => $htmlLibrary->purifierConfig()->purify(strtolower($slug)),
                            'updated_at'                => date('Y-m-d h:i:s')
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
}