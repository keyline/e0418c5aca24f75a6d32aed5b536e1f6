<?php
namespace App\Controllers\admin;
use App\Controllers\BaseController;
use App\Models\CommonModel;
class User extends BaseController {
	public function __construct()
    {
        
    }
    public function index() 
    {
        if(!$this->session->get('is_admin_login')) {
            return redirect()->to('/Administrator');
        }
        $title                      = 'Dashboard';
        $page_name                  = 'Dashboard';
        $data['session']            = $this->session;
        $data['common_model']       = $this->common_model;

        $data['package_count']              = $this->common_model->find_data('package_plans', 'count');
        $data['event_zone_count']           = $this->common_model->find_data('event_zones', 'count');
        $data['member_type_count']          = $this->common_model->find_data('member_types', 'count');
        $data['event_cat_count']            = $this->common_model->find_data('event_categories', 'count');
        $data['event_count']                = $this->common_model->find_data('sms_events', 'count');
        $data['user_count']                 = $this->common_model->find_data('sms_users', 'count', ['user_type' => 'U']);
        $data['booking_count']              = $this->common_model->find_data('bookings', 'count', ['published' => 1]);
        $data['paid_booking_count']         = $this->common_model->find_data('bookings', 'count', ['payment_status' => 1, 'published' => 1]);
        $data['unpaid_booking_count']       = $this->common_model->find_data('bookings', 'count', ['payment_status' => 0, 'published' => 1]);
        echo $this->layout_after_login($title,$page_name,$data);
    }
    public function login() 
    { 
        $data['page_name'] = 'Login';
        $data['session'] = $this->session;
        $data['common_model'] = $this->common_model;
        if($this->request->getMethod() == 'post') {
            echo "papu";
            $input = $this->validate([
                'username' => 'required',
                'password' => 'required|min_length[5]'
            ]);
            if($input == true) {
                $conditions = array(
                    'username'=>$this->request->getPost('username'),
                    'password'=>md5($this->request->getPost('password')),
                    'published'=>1
                    );
                $record = $this->common_model->find_data('sms_users','row',$conditions);
                //print_r($record);die;
                if($record) {
                    $session_data = array(
                                        'user_id'=>$record->id,
                                        'user_type'=>$record->user_type,
                                        'username'=>$record->username,
                                        'email'=>$record->email,
                                        'is_admin_login'=>1
                                        );
                    $this->session->set($session_data);
                    $this->session->setFlashdata('success_message', 'Login success! Redirecting to dashboard');
                    return redirect()->to('/admin/user/');
                } else {
                    $this->session->setFlashdata('error_message', 'Invalid credentials');
                    return redirect()->to('/Administrator');
                }                
                
            } else {
                $data['validation'] = $this->validator;
            }
        }
        return view('admin/layout-before-login',$data);
    }
    public function logout()
    {
        $this->session->destroy();
        return redirect()->to('/Administrator');
    }
    public function site_setting()
    {
        if(!$this->session->get('is_admin_login')) {
            return redirect()->to('/Administrator');
        }
        $title = 'Site Setting';
        $page_name = 'site-setting';
        $data['session'] = $this->session;
        $data['common_model'] = $this->common_model;
        if($this->request->getMethod() == 'post') {
            $file = $this->request->getFile('site_logo');
            $originalName = $file->getClientName();
            $fieldName = 'site_logo';
            if($file!='') {
                $upload_array = $this->common_model->upload_single_file($fieldName,$originalName,'','image');
                if($upload_array['status']) {
                    $site_logo = $upload_array['newFilename'];
                } else {
                    $this->session->setFlashdata('msg1', $upload_array['message']);
                    return redirect()->to('/admin/user/site_setting');
                }
            } else {
                $site_setting = $this->common_model->find_data('sms_site_settings','row');
                $site_logo = $site_setting->site_logo;
            }
            $file = $this->request->getFile('site_favicon');
            $originalName = $file->getClientName();
            $fieldName = 'site_favicon';
            if($file!='') {
                $upload_array = $this->common_model->upload_single_file($fieldName,$originalName,'','image');
                if($upload_array['status']) {
                    $site_favicon = $upload_array['newFilename'];
                } else {
                    $this->session->setFlashdata('msg2', $upload_array['message']);
                    return redirect()->to('/admin/user/site_setting');
                }
            } else {
                $site_setting = $this->common_model->find_data('sms_site_settings','row');
                $site_favicon = $site_setting->site_favicon;
            }

            $file = $this->request->getFile('site_footer_logo');
            $originalName = $file->getClientName();
            $fieldName = 'site_footer_logo';
            if($file!='') {
                $upload_array = $this->common_model->upload_single_file($fieldName,$originalName,'','image');
                if($upload_array['status']) {
                    $site_footer_logo = $upload_array['newFilename'];
                } else {
                    $this->session->setFlashdata('msg3', $upload_array['message']);
                    return redirect()->to('/admin/user/site_setting');
                }
            } else {
                $site_setting = $this->common_model->find_data('sms_site_settings','row');
                $site_footer_logo = $site_setting->site_footer_logo;
            }

            $postData = array(
                    'site_name'=>$this->request->getPost('site_name'),
                    'site_description'=>$this->request->getPost('site_description'),
                    'admin_email'=>$this->request->getPost('admin_email'),
                    'site_address'=>$this->request->getPost('site_address'),
                    'site_phone'=>$this->request->getPost('site_phone'),
                    'whatsapp_no'=>$this->request->getPost('whatsapp_no'),
                    'site_state_code'=>$this->request->getPost('site_state_code'),
                    'site_gstn'=>$this->request->getPost('site_gstn'),
                    'site_pan'=>$this->request->getPost('site_pan'),
                    'facebook_link'=>$this->request->getPost('facebook_link'),
                    'twitter_link'=>$this->request->getPost('twitter_link'),
                    'linkedin_link'=>$this->request->getPost('linkedin_link'),
                    'instagram_link'=>$this->request->getPost('instagram_link'),
                    'youtube_link'=>$this->request->getPost('youtube_link'),
                    'pinterest_link'=>$this->request->getPost('pinterest_link'),
                    'establish_year'=>$this->request->getPost('establish_year'),
                    'site_logo'=>$site_logo,
                    'site_footer_logo'=>$site_footer_logo,
                    'site_favicon'=>$site_favicon,
                    'published'=>1
                    );
            //echo '<pre>';print_r($postData);die;
            $record = $this->common_model->save_data('sms_site_settings',$postData,1,'site_id');
            /* delete previous data */
            //$updateData = $this->common_model->delete_data('admin_timings',1,'site_id');
            /* delete previous data */
            // for($i=0;$i<7;$i++) {
            //     $day_no = $this->request->getPost('day_no');
            //     $day_name = $this->request->getPost('day_name');
            //     $from_time = $this->request->getPost('from_time');
            //     $to_time = $this->request->getPost('to_time');
            //     $postData = array(
            //         'site_id'=>1,
            //         'day_no'=>$day_no[$i],
            //         'day_name'=>$day_name[$i],
            //         'from_time'=>$from_time[$i],
            //         'to_time'=>$to_time[$i],
            //         'created_at'=>date('Y-m-d H:i:s'),
            //         'published'=>1
            //         );
            //     //echo '<pre>';print_r($postData);
            //     $record = $this->common_model->save_data('admin_timings',$postData,'','site_id');
            // }
            //die;
            $this->session->setFlashdata('success_message', 'Account setting updated successfully');
            return redirect()->to('/admin/user/site_setting');
        }
        
        echo $this->layout_after_login($title,$page_name,$data);
    }
    public function paymentSetting()
    {
        if(!$this->session->get('is_admin_login')) {
            return redirect()->to('/Administrator');
        }        
        if($this->request->getMethod() == 'post') {
            $postData = array(
                    'payment_gateway_mode'        => $this->request->getPost('payment_gateway_mode'),
                    'sandbox_secret_key'          => $this->request->getPost('sandbox_secret_key'),
                    'sandbox_publishable_key'     => $this->request->getPost('sandbox_publishable_key'),
                    'live_secret_key'             => $this->request->getPost('live_secret_key'),
                    'live_publishable_key'        => $this->request->getPost('live_publishable_key'),
                    );
            $record = $this->common_model->save_data('sms_site_settings',$postData,1,'site_id');
            $this->session->setFlashdata('success_message', 'Payment setting updated successfully');
            return redirect()->to('/admin/user/site_setting');
        }        
        echo $this->layout_after_login($title,$page_name,$data);
    }
    public function smsSetting()
    {
        if(!$this->session->get('is_admin_login')) {
            return redirect()->to('/Administrator');
        }        
        if($this->request->getMethod() == 'post') {
            $postData = array(
                    'authentication_key'        => $this->request->getPost('authentication_key'),
                    'sender_id'                 => $this->request->getPost('sender_id'),
                    'base_url'                  => $this->request->getPost('base_url')
                    );
            //echo '<pre>';print_r($postData);die;
            $record = $this->common_model->save_data('sms_site_settings',$postData,1,'site_id');
            $this->session->setFlashdata('success_message', 'SMS setting updated successfully');
            return redirect()->to('/admin/user/site_setting');
        }        
        echo $this->layout_after_login($title,$page_name,$data);
    }
    public function emailSetting()
    {
        if(!$this->session->get('is_admin_login')) {
            return redirect()->to('/Administrator');
        }        
        if($this->request->getMethod() == 'post') {
            $postData = array(
                    'from_email'        => $this->request->getPost('from_email'),
                    'from_name'         => $this->request->getPost('from_name'),
                    'smtp_host'         => $this->request->getPost('smtp_host'),
                    'smtp_username'     => $this->request->getPost('smtp_username'),
                    'smtp_password'     => $this->request->getPost('smtp_password'),
                    'smtp_port'         => $this->request->getPost('smtp_port'),
                    );
            $record = $this->common_model->save_data('sms_site_settings',$postData,1,'site_id');
            $this->session->setFlashdata('success_message', 'Email setting updated successfully');
            return redirect()->to('/admin/user/site_setting');
        }        
        echo $this->layout_after_login($title,$page_name,$data);
    }
    public function change_password()
    {
        if(!$this->session->get('is_admin_login')) {
            return redirect()->to('/Administrator');
        }
        if($this->request->getMethod() == 'post') {            
            $user_id = $this->session->get('user_id');
            $postData = array(
                    'password'=> md5($this->request->getPost('new_password')),
                    'password_original'=> $this->request->getPost('new_password')
                    );
            //echo '<pre>';print_r($postData);die;
            $record = $this->common_model->save_data('sms_users',$postData,$user_id,'id');
            
            $this->session->setFlashdata('success_message', 'Password changed successfully');
            return redirect()->to('/admin/user/change_password');
        }
        $title = 'Change Password';
        $page_name = 'change-password';
        $data['session'] = $this->session;
        $data['common_model'] = $this->common_model;
        echo $this->layout_after_login($title,$page_name,$data);
    }
    function check_old_password()
    {
        $session = \Config\Services::session();
        $old_password = $this->request->getPost('old_password');
        $user_id = $session->get('user_id');
        $conditions = array('id'=>$user_id);
        $userDetail = $this->common_model->find_data('sms_users','row',$conditions);
        $password_original = $userDetail->password_original;
        if($password_original==$old_password) {
            $status = 1;
            $return_msg = 'Old password matched';
        } else {
            $status = 0;
            $return_msg = 'Old password does not matched';
        }
        $data = array('status'=>$status, 'return_msg'=>$return_msg);
        header('Content-Type: application/json');
        echo json_encode($data);
    }
    public function forgot_password(){
        $site_setting       = $this->common_model->find_data('sms_site_settings','row');
        $user               = $this->common_model->find_data('sms_users','row');
        $admin_email        = $site_setting->admin_email;
        $emailTemplate      = $this->common_model->find_data('sms_email_template', 'row', ['slug' => 'forgot-password']);
        if($emailTemplate){
            $description1 = $emailTemplate->description;
            $description2 = str_replace("{{username}}",$user->name,$description1);
            $description3 = str_replace("{{password}}",$user->password_original,$description2);
            
            $this->common_model->sendEmail($user->email, $site_setting->site_name.' - Forgot Password', $description3);
            $this->session->setFlashdata('success_message', 'Login Credentials Has Been Sent To Registered Email !!!');
            return redirect()->to('/Administrator');
        }        
    }
}