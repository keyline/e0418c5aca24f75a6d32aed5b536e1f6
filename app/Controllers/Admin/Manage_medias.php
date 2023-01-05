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
        $this->db = \Config\Database::connect();
        $data['moduleDetail']       = $this->data;
        $title                      = 'Manage '.$this->data['module'];
        $page_name                  = 'medias/list';
        $order_by[0]                = array('field' => $this->data['primary_key'], 'type' => 'desc');
        $data['rows']               = $this->data['model']->find_data($this->data['table_name'], 'array', ['media_is_active!=' => 0 ], '', '', '', $order_by);
        // echo $this->db->getLastQuery();die;
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
                //$mediaData->metadata->author;
                //$mediaData->metadata->title;


                /* image upload */
                $file = $this->request->getFile('client_logo');
                $originalName = $file->getClientName();
                $fieldName = 'client_logo';
                if($originalName!='') {
                    $upload_array = $this->common_model->upload_single_file($fieldName,$originalName,'media','image');
                    if($upload_array['status']) {
                        $client_logo = $upload_array['newFilename'];
                    } else {
                        $this->session->setFlashdata('error_message', $upload_array['message']);
                        return redirect()->to(current_url());
                    }
                } else {
                    $this->session->setFlashdata('error_message', 'Please upload an image');
                    //return redirect()->to('/admin/'.$this->data['controller'].'/add');
                    return redirect()->to(current_url());
                }
                /* image upload */
                

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
                    'media_created_datetime'  => date('Y-m-d h:i:s'),
                    'media_updated_datetime' => date('Y-m-d h:i:s'),
                    'media_is_active' => '0'
                ];
                // pr($postedData);
                $advertisment     = $this->data['model']->save_data($this->data['table_name'], $postedData, '', $this->data['primary_key']);
                $this->session->setFlashdata('success_message', $this->data['module'].' inserted successfully');
                return redirect()->to('/admin/'.$this->data['controller']);
            }

        echo $this->layout_after_login($title, $page_name, $data);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
