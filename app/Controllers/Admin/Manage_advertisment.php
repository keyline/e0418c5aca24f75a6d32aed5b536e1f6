<?php
namespace App\Controllers\admin;
use App\Controllers\BaseController;
use App\Models\CommonModel;
use DB;
class Manage_advertisment extends BaseController {

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
            'module'        => 'Advertisment',
            'controller'    => 'manage_advertisment',
            'table_name'    => 'sms_advertisment',
            'primary_key'   => 'id'
        );
    }
    public function index()
    {
        $data['moduleDetail']       = $this->data;
        $title                      = 'Manage '.$this->data['module'];
        $page_name                  = 'banner/list';        
        $order_by[0]                = array('field' => $this->data['primary_key'], 'type' => 'desc');
        $data['rows']               = $this->data['model']->find_data($this->data['table_name'], 'array', ['published!=' => 3 ], '', '', '', $order_by);        
        echo $this->layout_after_login($title,$page_name,$data);
    }
    public function add()
    {
        $this->db = \Config\Database::connect();
        $data['moduleDetail']       = $this->data;
        $data['action']             = 'Add';
        $title                      = $data['action'].' '.$this->data['module'];
        $page_name                  = 'banner/add-edit';        
        $data['row'] = [];
        if($this->request->getMethod() == 'post') {            
            /* image upload */
            $file = $this->request->getFile('advertisment_image');
            $originalName = $file->getClientName();
            $fieldName = 'advertisment_image';
            if($originalName!='') {
                $upload_array = $this->common_model->upload_single_file($fieldName,$originalName,'banners','image');
                if($upload_array['status']) {
                    $advertisment_image = $upload_array['newFilename'];
                } else {
                    $this->session->setFlashdata('msg1', $upload_array['message']);
                    return redirect()->to(current_url());
                }
            } else {
                $this->session->setFlashdata('msg1', 'Please upload an image');
                //return redirect()->to('/admin/'.$this->data['controller'].'/add');
                return redirect()->to(current_url());
            }
            /* image upload */
            $postData   = array(
                                'Heading'                   => $this->request->getPost('heading'),
                                'url_link'                  => $this->request->getPost('url_link'),
                                'advertisment_image'        => $advertisment_image,
                                'position'                  => $this->request->getPost('position'),
                                'orientation'               => $this->request->getPost('orientation')
                                );
            /* image upload */
            // pr($postData);
            $advertisment     = $this->data['model']->save_data($this->data['table_name'], $postData, '', $this->data['primary_key']);
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
        $page_name                  = 'banner/add-edit';        
        $conditions                 = array($this->data['primary_key']=>$id);
        $data['row']                = $this->data['model']->find_data($this->data['table_name'], 'row', $conditions);
        
        if($this->request->getMethod() == 'post') {
            /* image upload */
            $file = $this->request->getFile('advertisment_image');
            $originalName = $file->getClientName();
            $fieldName = 'advertisment_image';
            if($originalName!='') {
                try{
                    
                }
                catch (\Throwable $th) {
                    if($data['row']->advertisment_image!='') {
                        unlink('uploads/banners/'.$data['row']->advertisment_image);  
                    } 
                }
                $upload_array = $this->common_model->upload_single_file($fieldName,$originalName,'banners','image');
                if($upload_array['status']) {
                    $advertisment_image = $upload_array['newFilename'];
                } else {
                    $this->session->setFlashdata('msg1', $upload_array['message']);
                    return redirect()->to(current_url());
                }
            } else {
                $advertisment_image = $data['row']->advertisment_image;
            }
            /* image upload */
            $postData = array(
                    'Heading'                   => $this->request->getPost('heading'),
                    'url_link'                  => $this->request->getPost('url_link'),
                    'advertisment_image'        => $advertisment_image,
                    'position'                  => $this->request->getPost('position'),
                    'orientation'               => $this->request->getPost('orientation'),
                    'updated_at'                => date('Y-m-d h:i:s')
                    );
            // pr($postData);
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