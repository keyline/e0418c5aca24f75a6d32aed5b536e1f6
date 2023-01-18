<?php
namespace App\Controllers\admin;
use App\Controllers\BaseController;
use App\Models\CommonModel;
use DB;
class Manage_quize_questions extends BaseController {

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
            'module'        => 'Quize Question',
            'controller'    => 'Manage_quize_questions',
            'table_name'    => 'abp_quiz_questions',
            'primary_key'   => 'question_id'
        );
    }
    public function index()
    {
        $data['moduleDetail']       = $this->data;
        $title                      = 'Manage '.$this->data['module'];
        $page_name                  = 'quiz_questions/list';        
        $order_by[0]                = array('field' => $this->data['primary_key'], 'type' => 'desc');
        $data['rows']               = $this->data['model']->find_data($this->data['table_name'], 'array', ['question_active!=' => 3 ], '', '', '', $order_by);        
        // pr($data['rows']);
        echo $this->layout_after_login($title,$page_name,$data);
    }
    public function add()
    {
        $data['moduleDetail']       = $this->data;
        $data['action']             = 'Add';
        $title                      = $data['action'].' '.$this->data['module'];
        $page_name                  = 'quiz_questions/add-edit';
        $data['titles']               = $this->data['model']->find_data('abp_quizzes', 'array', ['is_active!=' => 3 ], '', '', '');
        $data['row'] = [];
        if($this->request->getMethod() == 'post') {
            // $url= $this->request->getPost('quize_video');
            // parse_str( parse_url( $url, PHP_URL_QUERY ), $my_array_of_vars );
            // $vedio_code= $my_array_of_vars['v'];

            // pr($this->request->getPost());

            /* image upload */
            $file = $this->request->getFile('quize_image');
            $originalName = $file->getClientName();
            $fieldName = 'quize_image';
            if($originalName!='') {
                $upload_array = $this->common_model->upload_single_file($fieldName,$originalName,'quizeImage','image');
                if($upload_array['status']) {
                    $quize_image = $upload_array['newFilename'];
                }else {
                    $this->session->setFlashdata('msg1', $upload_array['message']);
                    return redirect()->to(current_url());
                }
            }
            // else {
            //     $this->session->setFlashdata('msg1', 'Please upload an image');
            //     return redirect()->to('/admin/'.$this->data['controller'].'/add');
            //     return redirect()->to(current_url());
            // }

            /* image upload */

                if($this->request->getFile('quize_image') == ''){
                    // echo 'hi';die;
                    $postData   = array(
                        'question_quiz_id'                  => $this->request->getPost('quize_title'),
                        'question_type'                     => $this->request->getPost('type'),
                        'quiz_description_txt'              => $this->request->getPost('quize_description'),
                        // 'abp_video_link'                    => $this->request->getPost('quize_video'),
                        'abp_video_code'                    => $this->request->getPost('quize_video'),
                        'question_addded_time'              => date('Y-m-d h:i:s')
                        );
                }
                else{
                    // echo 'hello';die;
                    $postData   = array(
                        'question_quiz_id'                  => $this->request->getPost('quize_title'),
                        'question_type'                     => $this->request->getPost('type'),
                        'quiz_description_txt'              => $this->request->getPost('quize_description'),
                        'question_attachment_title'         => $quize_image,
                        'question_addded_time'              => date('Y-m-d h:i:s')
                        );
                }
            
            // pr($postData);
            $advertisment     = $this->data['model']->save_data($this->data['table_name'], $postData, '', $this->data['primary_key']);
            $function_name = $this->request->getPost('function_name');
            $choice_is_right = $this->request->getPost('choice_is_right');
                if(count($function_name)>0){
                    for($f=0;$f<count($function_name);$f++){
                        if($function_name[$f] != ''){
                            $postData2 = [
                                    'choice_question_id'                                => $advertisment,
                                    'choice_description'                                => $function_name[$f],
                                    'choice_is_right'                                   => $choice_is_right[$f],
                            ];
                            $this->common_model->save_data('abp_quiz_question_choices', $postData2, '', 'choice_id');
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
        $data['moduleDetail']       = $this->data;
        $data['action']             = 'Edit';
        $title                      = $data['action'].' '.$this->data['module'];
        $page_name                  = 'quiz_questions/add-edit';        
        $conditions                 = array($this->data['primary_key']=>$id);
        $data['row']                = $this->data['model']->find_data($this->data['table_name'], 'row', $conditions);
        // pr($data['row']);
        $data['titles']               = $this->data['model']->find_data('abp_quizzes', 'array', ['is_active!=' => 3 ], '', '', '');
        if($this->request->getMethod() == 'post') {
            /* image upload */
            $file = $this->request->getFile('quize_image');
            $originalName = $file->getClientName();
            $fieldName = 'quize_image';
            if($originalName!='') {
                if($data['row']->question_attachment_title!='') {
                    unlink('uploads/quizeImage/'.$data['row']->question_attachment_title);  
                }                

                $upload_array = $this->common_model->upload_single_file($fieldName,$originalName,'quizeImage','image');
                if($upload_array['status']) {
                    $quize_image = $upload_array['newFilename'];
                } else {
                    $this->session->setFlashdata('msg1', $upload_array['message']);
                    return redirect()->to(current_url());
                }
            } else {
                $quize_image = $data['row']->question_attachment_title;
            }
            /* image upload */
            $postData   = array(
                'question_quiz_id'                  => $this->request->getPost('quize_title'),
                'question_type'                     => $this->request->getPost('type'),
                'quiz_description_txt'              => $this->request->getPost('quize_description'),
                'question_attachment_title'         => $quize_image,
                'question_addded_time'              => date('Y-m-d h:i:s')
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
                            'question_active' => 3
                        );
        $updateData = $this->common_model->save_data($this->data['table_name'],$postData,$id,$this->data['primary_key']);
        $this->session->setFlashdata('success_message', $this->data['module'].' deleted successfully');
        return redirect()->to('/admin/'.$this->data['controller']);
    }
    public function deactive($id)
    {
        $postData = array(
                            'question_active' => 0
                        );
        $updateData = $this->common_model->save_data($this->data['table_name'],$postData,$id,$this->data['primary_key']);
        $this->session->setFlashdata('success_message', $this->data['module'].' deactivated successfully');
        return redirect()->to('/admin/'.$this->data['controller']);
    }
    public function active($id)
    {
        $postData = array(
                            'question_active' => 1
                        );
        $updateData = $this->common_model->save_data($this->data['table_name'],$postData,$id,$this->data['primary_key']);
        $this->session->setFlashdata('success_message', $this->data['module'].' activated successfully');
        return redirect()->to('/admin/'.$this->data['controller']);
    }
}