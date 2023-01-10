<?php
/**
 * Managing JW platform medias
 */

namespace App\Controllers\admin;

use App\Controllers\BaseController;
use App\Models\CommonModel;
use DB;
use App\Controllers\Admin\Manage_jwplatformapis;

class Manage_medias extends BaseController
{
    private $model;

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
            'module'        => 'Medias',
            'controller'    => 'manage_medias',
            'table_name'    => 'abp_jwplatform_medias',
            'primary_key'   => 'media_id'
        );
    }

    public function index()
    {
        helper(['form', 'url']);
        $data['moduleDetail']       = $this->data;
        $title                      = 'Manage '.$this->data['module'];
        $page_name                  = 'medias/list';
        $order_by[0]                = array('field' => $this->data['primary_key'], 'type' => 'desc');
        $data['rows']               = $this->data['model']->find_data($this->data['table_name'], 'array', ['media_is_active!=' => 3 ], '', '', '', $order_by);
        echo $this->layout_after_login($title, $page_name, $data);
    }

    public function add()
    {
        try {
            $this->db = \Config\Database::connect();
            $data['moduleDetail']       = $this->data;
            $data['action']             = 'Add';
            $title                      = $data['action'].' '.$this->data['module'];
            $page_name                  = 'medias/add-edit';
            $data['row']                = [];
            $data['functions']          = [];
            if (strtolower($this->request->getMethod()) === 'post') {
                $rules = [
                'media_code' => 'required',
                // 'password' => 'required|min_length[10]',
                // 'passconf' => 'required|matches[password]',
                // 'email'    => 'required|valid_email',
                    ];
                if (! $this->validate($rules)) {
                    echo $this->layout_after_login($title, $page_name, $data);
                }

                //Fetching JW Platfor API here
                $jwplatform= new Manage_jwplatformapis();
                $mediaData= $jwplatform->getMediaByCode($this->request->getPost('media_code'));

                /**************** image upload ******************/
                $file = $this->request->getFile('client_logo');
                $originalName = $file->getClientName();
                $fieldName = 'client_logo';
                if ($originalName!='') {
                    $upload_array = $this->common_model->upload_single_file($fieldName, $originalName, 'media', 'image');
                    if ($upload_array['status']) {
                        $client_logo = $upload_array['newFilename'];
                    } else {
                        $this->session->setFlashdata('error_message', $upload_array['message']);
                        return redirect()->to(current_url());
                    }
                } else {
                    $this->session->setFlashdata('error_message', 'Please upload an image');
                    return redirect()->to(current_url());
                }
                /**************** image upload ******************/

                $postedData= [
                    'media_code' => $this->request->getPost('media_code'),
                    'media_title'=> $mediaData->metadata->title,
                    'media_embed_code' => '',
                    'media_description'=> $mediaData->metadata->description,
                    'media_publish_start_datetime'=> $mediaData->metadata->publish_start_date,
                    'media_publish_end_datetime' => $mediaData->metadata->publish_end_date,
                    'media_publish_utc_datetime'=> $mediaData->created,
                    'media_category' => $mediaData->metadata->category,
                    'media_placeholder_image_txt'=> $client_logo,
                    'media_author' => $mediaData->metadata->author,
                    'media_permalink' => '',
                    'media_type'    => $mediaData->type,
                    'media_created_datetime'  => date('Y-m-d h:i:s')
                ];
                $record     = $this->data['model']->save_data($this->data['table_name'], $postedData, '', $this->data['primary_key']);
                $this->session->setFlashdata('success_message', $this->data['module'].' inserted successfully');
                return redirect()->to('/admin/'.$this->data['controller']);
            }
            echo $this->layout_after_login($title, $page_name, $data);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    public function edit($id)
    {
        $data['moduleDetail']       = $this->data;
        $data['action']             = 'Edit';
        $title                      = $data['action'].' '.$this->data['module'];
        $page_name                  = 'medias/edit';
        $conditions                 = array($this->data['primary_key']=>$id);
        $data['row']                = $this->data['model']->find_data($this->data['table_name'], 'row', $conditions);
        if ($this->request->getMethod() == 'post') {
            /****************** image upload *****************/
            $file = $this->request->getFile('client_logo');
            $originalName = $file->getClientName();
            $fieldName = 'client_logo';
            if ($originalName!='') {
                if ($data['row']->media_placeholder_image_txt!='') {
                    unlink('uploads/media/'.$data['row']->media_placeholder_image_txt);
                }
                $upload_array = $this->common_model->upload_single_file($fieldName, $originalName, 'media', 'image');
                if ($upload_array['status']) {
                    $client_logo = $upload_array['newFilename'];
                } else {
                    $this->session->setFlashdata('error_message', $upload_array['message']);
                    return redirect()->to(current_url());
                }
            } else {
                $client_logo = $data['row']->media_placeholder_image_txt;
            }
            /****************** image upload *****************/

            $postData= [
                'media_code' => $this->request->getPost('media_code'),
                'media_title'=> $this->request->getPost('media_title'),
                'media_embed_code' => $this->request->getPost('media_embed_code'),
                'media_description'=> $this->request->getPost('media_desc'),
                'media_publish_start_datetime'=> $this->request->getPost('media_pub_start_time'),
                'media_publish_end_datetime' => $this->request->getPost('media_pub_end_time'),
                'media_publish_utc_datetime'=> $this->request->getPost('media_pub_utc_time'),
                'media_category' => $this->request->getPost('media_cat'),
                'media_placeholder_image_txt'=> $client_logo,
                'media_author' => $this->request->getPost('media_auth'),
                'media_permalink' => $this->request->getPost('media_per'),
                'media_updated_datetime' => date('Y-m-d h:i:s')
            ];
            $record = $this->common_model->save_data($this->data['table_name'], $postData, $id, $this->data['primary_key']);
            $this->session->setFlashdata('success_message', $this->data['module'].' updated successfully');
            return redirect()->to('/admin/'.$this->data['controller']);
        }
        echo $this->layout_after_login($title, $page_name, $data);
    }
    public function confirm_delete($id)
    {
        $postData = array(
                            'media_is_active' => 3
                        );
        $updateData = $this->common_model->save_data($this->data['table_name'], $postData, $id, $this->data['primary_key']);
        $this->session->setFlashdata('success_message', $this->data['module'].' deleted successfully');
        return redirect()->to('/admin/'.$this->data['controller']);
    }
    public function deactive($id)
    {
        $postData = array(
                            'media_is_active' => 0
                        );
        $updateData = $this->common_model->save_data($this->data['table_name'], $postData, $id, $this->data['primary_key']);
        $this->session->setFlashdata('success_message', $this->data['module'].' deactivated successfully');
        return redirect()->to('/admin/'.$this->data['controller']);
    }
    public function active($id)
    {
        $postData = array(
                            'media_is_active' => 1
                        );
        $updateData = $this->common_model->save_data($this->data['table_name'], $postData, $id, $this->data['primary_key']);
        $this->session->setFlashdata('success_message', $this->data['module'].' activated successfully');
        return redirect()->to('/admin/'.$this->data['controller']);
    }
    public function details($id)
    {
        $data['moduleDetail']       = $this->data;
        $data['action']             = 'Detail';
        $title                      = $data['action'].' '.$this->data['module'];
        $page_name                  = 'medias/details';
        $conditions                 = array($this->data['primary_key']=>$id);
        $data['row']                = $this->data['model']->find_data($this->data['table_name'], 'row', $conditions);
        echo $this->layout_after_login($title, $page_name, $data);
    }
}
