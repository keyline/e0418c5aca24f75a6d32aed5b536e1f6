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
            'module'        => 'Media',
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
            $page_name                  = 'medias/add';
            $data['row']                = [];
            $data['functions']          = [];
            $data['seasons']            = $this->data['model']->find_data('abp_seasons', 'array', ['published' => 1]);
            $data['shows']              = $this->data['model']->find_data('abp_shows', 'array', ['published' => 1]);
            if (strtolower($this->request->getMethod()) === 'post') {
                $rules = [
                'media_code' => 'required',
                    ];
                if (! $this->validate($rules)) {
                    echo $this->layout_after_login($title, $page_name, $data);
                }

                //Fetching JW Platfor API here
                $jwplatform = new Manage_jwplatformapis();
                $mediaData  = $jwplatform->getMediaByCode($this->request->getPost('media_code'));

                /**************** image upload ******************/
                // $file = $this->request->getFile('client_logo');
                // $originalName = $file->getClientName();
                // $fieldName = 'client_logo';
                // if ($originalName!='') {
                //     $upload_array = $this->common_model->upload_single_file($fieldName, $originalName, 'media', 'image');
                //     if ($upload_array['status']) {
                //         $client_logo = $upload_array['newFilename'];
                //     } else {
                //         $this->session->setFlashdata('error_message', $upload_array['message']);
                //         return redirect()->to(current_url());
                //     }
                // } else {
                //     $this->session->setFlashdata('error_message', 'Please upload an image');
                //     return redirect()->to(current_url());
                // }
                /**************** image upload ******************/

                $postedData = [
                    'show_id'                       => $this->request->getPost('show_id'),
                    'season_id'                     => $this->request->getPost('season_id'),
                    'media_code'                    => $this->request->getPost('media_code'),
                    'media_title'                   => $mediaData->metadata->title,
                    'media_embed_code'              => '',
                    'media_description'             => $mediaData->metadata->description,
                    'media_publish_start_day'       => strtoupper(date_format(date_create($mediaData->metadata->publish_start_date), "l")),
                    'media_publish_start_datetime'  => $this->getISTDateTimeFrmUTC($mediaData->metadata->publish_start_date),
                    'media_publish_end_datetime'    => $mediaData->metadata->publish_end_date,
                    'media_publish_utc_datetime'    => $mediaData->metadata->publish_start_date, //$mediaData->created,
                    'media_category'                => $mediaData->metadata->category,
                    // 'media_placeholder_image_txt'   => $client_logo,
                    'media_author'                  => $mediaData->metadata->author,
                    'media_permalink'               => '',
                    'media_type'                    => $mediaData->type,
                    'media_created_datetime'        => date('Y-m-d h:i:s')
                ];
                // pr($postedData);
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
        $data['seasons']            = $this->data['model']->find_data('abp_seasons', 'array', ['published' => 1]);
        $data['shows']              = $this->data['model']->find_data('abp_shows', 'array', ['published' => 1]);
        if ($this->request->getMethod() == 'post') {
            $postData = [
                'media_code'                        => $this->request->getPost('media_code'),
                'media_title'                       => $this->request->getPost('media_title'),
                'media_embed_code'                  => $this->request->getPost('media_embed_code'),
                'media_description'                 => $this->request->getPost('media_desc'),
                'media_publish_start_day'           => strtoupper(date_format(date_create($this->request->getPost('media_pub_start_time')), "l")),
                'media_publish_start_datetime'      => $this->getISTDateTimeFrmUTC($this->request->getPost('media_pub_start_time')),
                'media_publish_end_datetime'        => $this->request->getPost('media_pub_end_time'),
                'media_publish_utc_datetime'        => $this->request->getPost('media_pub_utc_time'),
                'media_category'                    => $this->request->getPost('media_cat'),
                'media_author'                      => $this->request->getPost('media_auth'),
                'media_permalink'                   => $this->request->getPost('media_per'),
                'media_updated_datetime'            => date('Y-m-d h:i:s')
            ];
            // pr($postData);
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
    public function getDataFromJwPlayer($media_code)
    {
        $this->common_model = new CommonModel();
        //Fetching JW Platfor API here
        $jwplatform = new Manage_jwplatformapis();
        $mediaData  = $jwplatform->getMediaByCode($media_code);
        $postedData = [
            'media_code'                    => $media_code,
            'media_title'                   => $mediaData->metadata->title,
            'media_description'             => $mediaData->metadata->description,
            'media_publish_start_day'       => strtoupper(date_format(date_create($mediaData->metadata->publish_start_date), "l")),
            'media_publish_start_datetime'  => $this->getISTDateTimeFrmUTC($mediaData->metadata->publish_start_date),
            'media_publish_end_datetime'    => $mediaData->metadata->publish_end_date,
            'media_publish_utc_datetime'    => $mediaData->metadata->publish_start_date, //$mediaData->created,
            'media_category'                => $mediaData->metadata->category,
            'media_author'                  => $mediaData->metadata->author,
            'media_type'                    => $mediaData->type,
            'media_updated_datetime'        => date('Y-m-d h:i:s')
        ];
        // pr($postedData);
        $record     = $this->common_model->save_data('abp_jwplatform_medias', $postedData, $media_code, 'media_code');
        $this->session->setFlashdata('success_message', 'Media is Successfully Fetched From JWPlayer !!!');
        return redirect()->to('/admin/manage_medias');
    }

    public function getISTDateTimeFrmUTC($datetimeString="")
    {
        try {
            //code...
            $utc = new \DateTime($datetimeString);
            //Changing to IST
            $tz =new \DateTimeZone('+0530');
            $utc->setTimezone($tz);
            return $utc->format('Y-m-d H:i:s');
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
