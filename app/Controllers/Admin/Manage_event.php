<?php
namespace App\Controllers\admin;
use App\Controllers\BaseController;
use App\Models\CommonModel;
class Manage_event extends BaseController {

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
            'module'        => 'Events',
            'controller'    => 'manage_event',
            'table_name'    => 'sms_events',
            'primary_key'   => 'id'
        );
    }
    public function index() 
    {
        $data['moduleDetail']       = $this->data;
        $title                      = 'Manage '.$this->data['module'];
        $page_name                  = 'event/list';        
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
        $page_name                  = 'event/add-edit';        
        $data['row']                = [];
        $data['cats']               = $this->common_model->find_data('event_categories', 'array', ['published' => 1]);
        $data['eventImages']        = [];
        if($this->request->getMethod() == 'post') {            
            $slug = strtolower($this->data['model']->clean($this->request->getPost('title')));
            /* event banner */
            $file = $this->request->getFile('event_banner');
            $originalName = $file->getClientName();
            $fieldName = 'event_banner';
            if($originalName!='') {
                $upload_array = $this->common_model->upload_single_file($fieldName,$originalName,'events','image');
                if($upload_array['status']) {
                    $event_banner = $upload_array['newFilename'];
                } else {
                    $this->session->setFlashdata('error_message', $upload_array['message']);
                    return redirect()->to(current_url());
                }
            } else {
                $this->session->setFlashdata('error_message', 'Please upload an event banner');
                return redirect()->to(current_url());
            }
            /* event banner */
            /**************** event images **************/
                $banner_image_array     = $this->request->getFiles('event_images')['event_images'];
                $images                 = $this->common_model->commonFileArrayUpload('events', $banner_image_array, 'image');
                if(!empty($images)){
                    $event_images = $images;
                } else {
                    $this->session->setFlashdata('msg1', 'Please upload an image');
                    return redirect()->to(current_url());
                }
                //pr($event_images);
            /**************** event images **************/
            $postData   = array(
                                'category_id'               => $this->request->getPost('category_id'),
                                'title'                     => $this->request->getPost('title'),
                                'slug'                      => $slug,
                                'event_date'                => $this->request->getPost('event_date'),
                                'event_venue'               => $this->request->getPost('event_venue'),
                                'event_theme'               => $this->request->getPost('event_theme'),
                                'overview_description'      => $this->request->getPost('overview_description'),
                                'conference_desscription'   => $this->request->getPost('conference_desscription'),
                                'event_banner'              => $event_banner,                                
                                );
            //pr($postData);
            $event_id     = $this->data['model']->save_data($this->data['table_name'], $postData, '', $this->data['primary_key']);

            if(count($event_images)>0){
                for($i=0;$i<count($event_images);$i++){
                    $postData2  = array(
                                    'event_id'              => $event_id,
                                    'event_image'           => $event_images[$i]
                                );
                    $this->data['model']->save_data('event_images',$postData2,'','id');
                }
            }

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
        $page_name                  = 'event/add-edit';        
        $conditions                 = array($this->data['primary_key']=>$id);
        $data['row']                = $this->data['model']->find_data($this->data['table_name'], 'row', $conditions);
        $data['cats']               = $this->common_model->find_data('event_categories', 'array', ['published' => 1]);
        $data['eventImages']        = $this->common_model->find_data('event_images', 'array', ['published' => 1, 'event_id' => $id]);
        if($this->request->getMethod() == 'post') {            
            $slug = strtolower($this->data['model']->clean($this->request->getPost('title')));
            /* event banner */            
                $file = $this->request->getFile('event_banner');
                $originalName = $file->getClientName();
                $fieldName = 'event_banner';
                if($originalName!='') {
                    $upload_array = $this->common_model->upload_single_file($fieldName,$originalName,'events','image');
                    if($upload_array['status']) {
                        $event_banner = $upload_array['newFilename'];
                    } else {
                        $this->session->setFlashdata('msg1', $upload_array['message']);
                        return redirect()->to(current_url());
                    }
                } else {
                    $event_banner = $data['row']->event_banner;
                }
            /* event banner */
            /**************** event images **************/
                $banner_image_array     = $this->request->getFiles('event_images')['event_images'];
                $images                 = $this->common_model->commonFileArrayUpload('events', $banner_image_array, 'image');
                if(!empty($images)){
                    $event_images = $images;
                } else {
                    $event_images = [];
                }
                //pr($event_images);
            /**************** event images **************/
            $postData   = array(
                                'category_id'               => $this->request->getPost('category_id'),
                                'title'                     => $this->request->getPost('title'),
                                'slug'                      => $slug,
                                'event_date'                => $this->request->getPost('event_date'),
                                'event_venue'               => $this->request->getPost('event_venue'),
                                'event_theme'               => $this->request->getPost('event_theme'),
                                'overview_description'      => $this->request->getPost('overview_description'),
                                'conference_desscription'   => $this->request->getPost('conference_desscription'),
                                'event_banner'              => $event_banner,
                                'updated_at'                => date('Y-m-d h:i:s')
                                );
            //pr($postData);
            $this->common_model->save_data($this->data['table_name'], $postData, $id, $this->data['primary_key']);
            $event_id = $id;
            if(count($event_images)>0){
                for($i=0;$i<count($event_images);$i++){
                    $postData2  = array(
                                    'event_id'              => $event_id,
                                    'event_image'           => $event_images[$i]
                                );
                    $this->data['model']->save_data('event_images',$postData2,'','id');
                }
            }

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
    public function delete_single_image($id,$event_id)
    {
        $this->common_model->delete_data('event_images',$id,'id');
        $this->session->setFlashdata('success_message', $this->data['module'].' image deleted successfully');
        return redirect()->to('/admin/'.$this->data['controller'].'/edit/'.$event_id);
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
    public function manage_image() 
    {
        $data['moduleDetail']       = $this->data;
        $title                      = 'Manage Images';
        $page_name                  = 'blog/manage-images';        
        $order_by[0]                = array('field' => 'id', 'type' => 'desc');
        $data['rows']               = $this->data['model']->find_data('sms_images', 'array', ['published!=' => 3], '', '', '', $order_by);

        if($this->request->getMethod() == 'post') {
            /* category images upload */
            $category_images_array  = $this->request->getFiles('image_file')['image_file'];
            $images                 = $this->data['model']->commonFileArrayUpload('editor_images', $category_images_array, 'image');
            if(!empty($images)){
                $image_file = $images;
            } else {
                $this->session->setFlashdata('msg1', 'Please upload an image');
                return redirect()->to(current_url());
            }
            //pr($image_file);
            /* category images upload */
            if(count($image_file)>0){
                for($k=0;$k<count($image_file);$k++){
                    $postData   = array(
                                        'image_file'                => $image_file[$k]
                                        );
                    $record     = $this->data['model']->save_data('sms_images', $postData, '', 'id');
                }
            }                        
            $this->session->setFlashdata('success_message', 'Images inserted successfully');
            return redirect()->to('/admin/'.$this->data['controller'].'/manage_image');
        }

        echo $this->layout_after_login($title,$page_name,$data);
    }
    public function booking_list($id) 
    {
        $data['moduleDetail']       = $this->data;
        $data['event']              = $this->data['model']->find_data($this->data['table_name'], 'row', ['id' => $id]);
        $title                      = 'Manage Bookings Of '.$data['event']->title;
        $page_name                  = 'event/booking-list';        
        $order_by[0]                = array('field' => 'id', 'type' => 'desc');
        $data['bookings']           = $this->data['model']->find_data('bookings', 'array', ['event_id' => $id], '', '', '', $order_by);        
        echo $this->layout_after_login($title,$page_name,$data);
    }
    public function viewEvent($id) 
    {
        $data['moduleDetail']       = $this->data;
        $title                      = 'View '.$this->data['module'];
        $page_name                  = 'event/viewEvent';        
        $order_by[0]                = array('field' => $this->data['primary_key'], 'type' => 'desc');
        $data['rows']               = $this->data['model']->find_data($this->data['table_name'], 'array', ['published!=' => 3 ], '', '', '', $order_by);
        $data['eventImages']        = $this->common_model->find_data('event_images', 'array', ['published' => 1, 'event_id' => $id]);
        echo $this->layout_after_login($title,$page_name,$data);
    }
    /* video gallery */
        public function video_list($id) 
        {
            $data['moduleDetail']       = $this->data;
            $data['event']              = $this->data['model']->find_data($this->data['table_name'], 'row', ['id' => $id]);
            $title                      = 'Manage Video Gallery Of '.$data['event']->title;
            $page_name                  = 'event/video-list';        
            $order_by[0]                = array('field' => 'id', 'type' => 'desc');
            $data['rows']               = $this->data['model']->find_data('video_gallery', 'array', ['event_id' => $id, 'published!=' => 3], '', '', '', $order_by);
            echo $this->layout_after_login($title,$page_name,$data);
        }
        public function video_add($id)
        {
            $data['moduleDetail']       = $this->data;
            $data['action']             = 'Add';
            $title                      = $data['action'].' '.$this->data['module'].' Gallery Video';
            $page_name                  = 'event/add-edit-video';
            $data['row']                = [];
            $data['event_id']           = $id;
            $data['event']              = $this->data['model']->find_data($this->data['table_name'], 'row', ['id' => $id]);
            if($this->request->getMethod() == 'post') {
                $link_array = explode("?v=", $this->request->getPost('video_link'));
                $video_code = $link_array[1];
                $postData   = array(
                                    'event_id'                  => $id,
                                    'video_title'               => $this->request->getPost('video_title'),
                                    'video_code'                => $video_code,
                                    'video_link'                => $this->request->getPost('video_link'),
                                    'video_description'         => $this->request->getPost('video_description'),
                                    'is_home_page'              => $this->request->getPost('is_home_page'),
                                    );
                //pr($postData);
                $event_id     = $this->data['model']->save_data('video_gallery', $postData, '', 'id');
                $this->session->setFlashdata('success_message', 'Event Gallery Video inserted successfully');
                return redirect()->to('/admin/'.$this->data['controller'].'/video_list/'.$id);
            }
            echo $this->layout_after_login($title,$page_name,$data);
        }
        public function video_edit($id, $video_id)
        {
            $data['moduleDetail']       = $this->data;
            $data['action']             = 'Edit';
            $title                      = $data['action'].' '.$this->data['module'];
            $page_name                  = 'event/add-edit-video';        
            $data['row']                = $this->data['model']->find_data('video_gallery', 'row', ['id' => $video_id]);
            $data['event_id']           = $id;
            $data['event']              = $this->data['model']->find_data($this->data['table_name'], 'row', ['id' => $id]);
            if($this->request->getMethod() == 'post') {
                $link_array = explode("?v=", $this->request->getPost('video_link'));
                $video_code = $link_array[1];
                $postData   = array(
                                    'event_id'                  => $id,
                                    'video_title'               => $this->request->getPost('video_title'),
                                    'video_code'                => $video_code,
                                    'video_link'                => $this->request->getPost('video_link'),
                                    'video_description'         => $this->request->getPost('video_description'),
                                    'is_home_page'              => $this->request->getPost('is_home_page'),
                                    );
                //pr($postData);
                $event_id     = $this->data['model']->save_data('video_gallery', $postData, $video_id, 'id');
                $this->session->setFlashdata('success_message', 'Event Gallery Video updated successfully');
                return redirect()->to('/admin/'.$this->data['controller'].'/video_list/'.$id);
            }
            echo $this->layout_after_login($title,$page_name,$data);
        }
        public function video_delete($id, $video_id)
        {
            $postData = array(
                                'published' => 3
                            );
            $updateData = $this->common_model->save_data('video_gallery', $postData, $video_id, 'id');
            $this->session->setFlashdata('success_message', 'Event Gallery Video deleted successfully');
            return redirect()->to('/admin/'.$this->data['controller'].'/video_list/'.$id);
        }
        public function video_deactive($id, $video_id)
        {
            $postData = array(
                                'published' => 0
                            );
            $updateData = $this->common_model->save_data('video_gallery', $postData, $video_id, 'id');
            $this->session->setFlashdata('success_message', 'Event Gallery Video deactivated successfully');
            return redirect()->to('/admin/'.$this->data['controller'].'/video_list/'.$id);
        }
        public function video_active($id, $video_id)
        {
            $postData = array(
                                'published' => 1
                            );
            $updateData = $this->common_model->save_data('video_gallery', $postData, $video_id, 'id');
            $this->session->setFlashdata('success_message', 'Event Gallery Video deactivated successfully');
            return redirect()->to('/admin/'.$this->data['controller'].'/video_list/'.$id);
        }
        public function video_hide_from_home_page($id, $video_id)
        {
            $postData = array(
                                'is_home_page' => 0
                            );
            $updateData = $this->common_model->save_data('video_gallery', $postData, $video_id, 'id');
            $this->session->setFlashdata('success_message', 'Event Gallery Video hide from home page successfully');
            return redirect()->to('/admin/'.$this->data['controller'].'/video_list/'.$id);
        }
        public function video_show_from_home_page($id, $video_id)
        {
            $postData = array(
                                'is_home_page' => 1
                            );
            $updateData = $this->common_model->save_data('video_gallery', $postData, $video_id, 'id');
            $this->session->setFlashdata('success_message', 'Event Gallery Video show in home page successfully');
            return redirect()->to('/admin/'.$this->data['controller'].'/video_list/'.$id);
        }
    /* video gallery */
    /* image gallery */
        public function image_list($id) 
        {
            $data['moduleDetail']       = $this->data;
            $data['event']              = $this->data['model']->find_data($this->data['table_name'], 'row', ['id' => $id]);
            $title                      = 'Manage Image Gallery Of '.$data['event']->title;
            $page_name                  = 'event/image-list';        
            $order_by[0]                = array('field' => 'id', 'type' => 'desc');
            $data['rows']               = $this->data['model']->find_data('image_gallery', 'array', ['event_id' => $id, 'published!=' => 3], '', '', '', $order_by);
            echo $this->layout_after_login($title,$page_name,$data);
        }
        public function image_add($id)
        {
            $data['moduleDetail']       = $this->data;
            $data['action']             = 'Add';
            $title                      = $data['action'].' '.$this->data['module'].' Gallery Image';
            $page_name                  = 'event/add-edit-image';
            $data['row']                = [];
            $data['event_id']           = $id;
            $data['event']              = $this->data['model']->find_data($this->data['table_name'], 'row', ['id' => $id]);
            if($this->request->getMethod() == 'post') {
                /* event gallery image */
                    $file = $this->request->getFile('image_file');
                    $originalName = $file->getClientName();
                    $fieldName = 'image_file';
                    if($originalName!='') {
                        $upload_array = $this->common_model->upload_single_file($fieldName,$originalName,'gallery','image');
                        if($upload_array['status']) {
                            $image_file = $upload_array['newFilename'];
                        } else {
                            $this->session->setFlashdata('error_message', $upload_array['message']);
                            return redirect()->to(current_url());
                        }
                    } else {
                        $this->session->setFlashdata('error_message', 'Please upload an event gallery image');
                        return redirect()->to(current_url());
                    }
                /* event gallery image */
                $postData   = array(
                                    'event_id'                  => $id,
                                    'image_title'               => $this->request->getPost('image_title'),
                                    'image_file'                => $image_file,
                                    'image_description'         => $this->request->getPost('image_description'),
                                    'is_home_page'              => $this->request->getPost('is_home_page'),
                                    );
                //pr($postData);
                $event_id     = $this->data['model']->save_data('image_gallery', $postData, '', 'id');
                $this->session->setFlashdata('success_message', 'Event Gallery Image inserted successfully');
                return redirect()->to('/admin/'.$this->data['controller'].'/image_list/'.$id);
            }
            echo $this->layout_after_login($title,$page_name,$data);
        }
        public function image_edit($id, $video_id)
        {
            $data['moduleDetail']       = $this->data;
            $data['action']             = 'Edit';
            $title                      = $data['action'].' '.$this->data['module'].' Gallery Image';
            $page_name                  = 'event/add-edit-image';        
            $data['row']                = $this->data['model']->find_data('image_gallery', 'row', ['id' => $video_id]);
            $data['event_id']           = $id;
            $data['event']              = $this->data['model']->find_data($this->data['table_name'], 'row', ['id' => $id]);
            if($this->request->getMethod() == 'post') {
                /* event banner */            
                    $file = $this->request->getFile('image_file');
                    $originalName = $file->getClientName();
                    $fieldName = 'image_file';
                    if($originalName!='') {
                        $upload_array = $this->common_model->upload_single_file($fieldName,$originalName,'gallery','image');
                        if($upload_array['status']) {
                            $image_file = $upload_array['newFilename'];
                        } else {
                            $this->session->setFlashdata('msg1', $upload_array['message']);
                            return redirect()->to(current_url());
                        }
                    } else {
                        $image_file = $data['row']->image_file;
                    }
                /* event banner */
                $postData   = array(
                                    'event_id'                  => $id,
                                    'image_title'               => $this->request->getPost('image_title'),
                                    'image_file'                => $image_file,
                                    'image_description'         => $this->request->getPost('image_description'),
                                    'is_home_page'              => $this->request->getPost('is_home_page'),
                                    );
                //pr($postData);
                $event_id     = $this->data['model']->save_data('image_gallery', $postData, $video_id, 'id');
                $this->session->setFlashdata('success_message', 'Event Gallery Image updated successfully');
                return redirect()->to('/admin/'.$this->data['controller'].'/image_list/'.$id);
            }
            echo $this->layout_after_login($title,$page_name,$data);
        }
        public function image_delete($id, $video_id)
        {
            $postData = array(
                                'published' => 3
                            );
            $updateData = $this->common_model->save_data('image_gallery', $postData, $video_id, 'id');
            $this->session->setFlashdata('success_message', 'Event Gallery Image deleted successfully');
            return redirect()->to('/admin/'.$this->data['controller'].'/image_list/'.$id);
        }
        public function image_deactive($id, $video_id)
        {
            $postData = array(
                                'published' => 0
                            );
            $updateData = $this->common_model->save_data('image_gallery', $postData, $video_id, 'id');
            $this->session->setFlashdata('success_message', 'Event Gallery Image deactivated successfully');
            return redirect()->to('/admin/'.$this->data['controller'].'/image_list/'.$id);
        }
        public function image_active($id, $video_id)
        {
            $postData = array(
                                'published' => 1
                            );
            $updateData = $this->common_model->save_data('image_gallery', $postData, $video_id, 'id');
            $this->session->setFlashdata('success_message', 'Event Gallery Image deactivated successfully');
            return redirect()->to('/admin/'.$this->data['controller'].'/image_list/'.$id);
        }
        public function image_hide_from_home_page($id, $video_id)
        {
            $postData = array(
                                'is_home_page' => 0
                            );
            $updateData = $this->common_model->save_data('image_gallery', $postData, $video_id, 'id');
            $this->session->setFlashdata('success_message', 'Event Gallery Image hide from home page successfully');
            return redirect()->to('/admin/'.$this->data['controller'].'/image_list/'.$id);
        }
        public function image_show_from_home_page($id, $video_id)
        {
            $postData = array(
                                'is_home_page' => 1
                            );
            $updateData = $this->common_model->save_data('image_gallery', $postData, $video_id, 'id');
            $this->session->setFlashdata('success_message', 'Event Gallery Image show in home page successfully');
            return redirect()->to('/admin/'.$this->data['controller'].'/image_list/'.$id);
        }
    /* image gallery */
    /* event agenda */
       public function agenda_list($id) 
        {
            $data['moduleDetail']       = $this->data;
            $data['event']              = $this->data['model']->find_data($this->data['table_name'], 'row', ['id' => $id]);
            $title                      = 'Manage Event Agenda Of '.$data['event']->title;
            $page_name                  = 'event/agenda-list';
            $order_by[0]                = array('field' => 'rank', 'type' => 'asc');
            //$groupBy[0]                 = 'agenda_title';
            $data['rows']               = $this->data['model']->find_data('event_agenda', 'array', ['event_id' => $id, 'published!=' => 3], '', '', '', $order_by);
            echo $this->layout_after_login($title,$page_name,$data);
        }
        public function agenda_add($id)
        {
            $data['moduleDetail']       = $this->data;
            $data['action']             = 'Add';
            $title                      = $data['action'].' '.$this->data['module'].' Agenda';
            $page_name                  = 'event/add-edit-agenda';
            $data['row']                = [];
            $data['event_id']           = $id;
            $data['event']              = $this->data['model']->find_data($this->data['table_name'], 'row', ['id' => $id]);
            if($this->request->getMethod() == 'post') {
                //pr($this->request->getPost());
                $postData   = array(
                                    'event_id'                  => $id,
                                    'agenda_date'               => $this->request->getPost('agenda_date'),
                                    'agenda_day'                => $this->request->getPost('agenda_day'),
                                    'agenda_title'              => $this->request->getPost('agenda_title'),
                                    'agenda_venue'              => $this->request->getPost('agenda_venue'),
                                    'rank'                      => $this->request->getPost('rank'),
                                    );                
                $agenda_id      = $this->data['model']->save_data('event_agenda', $postData, '', 'agenda_id');
                /* event agenda details */
                $hall_number    = $this->request->getPost('hall_number');
                $from_time      = $this->request->getPost('from_time');
                $to_time        = $this->request->getPost('to_time');
                $is_wishlist    = $this->request->getPost('is_wishlist');
                $subject_line   = $this->request->getPost('subject_line');
                if(!empty($is_wishlist)){
                    for($a=0;$a<count($is_wishlist);$a++){
                        //if($subject_line[$a] != ''){
                            $postData2   = array(
                                                'event_id'                  => $id,
                                                'agenda_id'                 => $agenda_id,
                                                'hall_number'               => $hall_number[$a],
                                                'from_time'                 => $from_time[$a],
                                                'to_time'                   => $to_time[$a],
                                                'is_wishlist'               => $is_wishlist[$a],
                                                'subject_line'              => $subject_line[$a]
                                                );
                            //pr($postData2);
                            $this->data['model']->save_data('event_agenda_details', $postData2, '', 'ev_ag_id');
                        //}
                    }
                }
                /* event agenda details */
                $this->session->setFlashdata('success_message', 'Event Agenda inserted successfully');
                return redirect()->to('/admin/'.$this->data['controller'].'/agenda_list/'.$id);
            }
            echo $this->layout_after_login($title,$page_name,$data);
        }
        public function agenda_edit($id, $agenda_id)
        {
            $data['moduleDetail']       = $this->data;
            $data['action']             = 'Edit';
            $title                      = $data['action'].' '.$this->data['module'].' Agenda';
            $page_name                  = 'event/add-edit-agenda';
            $data['row']                = $this->data['model']->find_data('event_agenda', 'row', ['agenda_id' => $agenda_id]);
            $data['event_id']           = $id;
            $data['event']              = $this->data['model']->find_data($this->data['table_name'], 'row', ['id' => $id]);
            if($this->request->getMethod() == 'post') {
                //pr($this->request->getPost());
                $postData   = array(
                                    'event_id'                  => $id,
                                    'agenda_date'               => $this->request->getPost('agenda_date'),
                                    'agenda_day'                => $this->request->getPost('agenda_day'),
                                    'agenda_title'              => $this->request->getPost('agenda_title'),
                                    'agenda_venue'              => $this->request->getPost('agenda_venue'),
                                    'rank'                      => $this->request->getPost('rank'),
                                    );                
                $this->data['model']->save_data('event_agenda', $postData, $agenda_id, 'agenda_id');                
                $this->data['model']->save_data('event_agenda_details', ['published' => 3], $agenda_id, 'agenda_id');
                /* event agenda details */
                $ev_ag_id       = $this->request->getPost('ev_ag_id');
                $hall_number    = $this->request->getPost('hall_number');
                $from_time      = $this->request->getPost('from_time');
                $to_time        = $this->request->getPost('to_time');
                $is_wishlist    = $this->request->getPost('is_wishlist');
                $subject_line   = $this->request->getPost('subject_line');
                //pr($this->request->getPost());
                if(!empty($is_wishlist)){
                    for($a=0;$a<count($is_wishlist);$a++){
                        //if($from_time[$a] != '' && $subject_line[$a] != ''){
                            if($ev_ag_id[$a] != ''){
                                $postData2   = array(
                                                    'event_id'                  => $id,
                                                    'agenda_id'                 => $agenda_id,
                                                    'hall_number'               => $hall_number[$a],
                                                    'from_time'                 => $from_time[$a],
                                                    'to_time'                   => $to_time[$a],
                                                    'is_wishlist'               => $is_wishlist[$a],
                                                    'subject_line'              => $subject_line[$a],
                                                    'published'                 => 1
                                                    );                
                                $this->data['model']->save_data('event_agenda_details', $postData2, $ev_ag_id[$a], 'ev_ag_id');
                            } else {
                                $postData2   = array(
                                                    'event_id'                  => $id,
                                                    'agenda_id'                 => $agenda_id,
                                                    'hall_number'               => $hall_number[$a],
                                                    'from_time'                 => $from_time[$a],
                                                    'to_time'                   => $to_time[$a],
                                                    'is_wishlist'               => $is_wishlist[$a],
                                                    'subject_line'              => $subject_line[$a],
                                                    'published'                 => 1
                                                    );                
                                $this->data['model']->save_data('event_agenda_details', $postData2, '', 'ev_ag_id');
                            }
                        //}
                    }
                }
                //pr($postData2);
                /* event agenda details */
                $this->session->setFlashdata('success_message', 'Event Agenda updated successfully');
                return redirect()->to('/admin/'.$this->data['controller'].'/agenda_list/'.$id);
            }
            echo $this->layout_after_login($title,$page_name,$data);
        }
        public function agenda_delete($id, $agenda_id)
        {
            $postData = array(
                                'published' => 3
                            );
            $updateData = $this->common_model->save_data('event_agenda', $postData, $agenda_id, 'agenda_id');
            $this->session->setFlashdata('success_message', 'Event Agenda deleted successfully');
            return redirect()->to('/admin/'.$this->data['controller'].'/agenda_list/'.$id);
        }
    /* event agenda */    
}