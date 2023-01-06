<?php
namespace App\Controllers;
use App\Models\Recycler;
use App\Models\CommonModel;
class Api extends BaseController
{
    /* 
    phone check
    Author : Subhomoy 
    */
    public function checkPhone()
    {
        $siteSetting    = $this->common_model->find_data('sms_site_settings', 'row');
        if(!$siteSetting->access_app){
            $this->response_to_json(FALSE, "This App is Not Accesible Now !!!");
        }
        $this->isJSON(file_get_contents('php://input'));
        $postData = $this->extract_json(file_get_contents('php://input'));        
        $requiredFields =['key', 'phone'];
        if (!$this->validateArray($requiredFields, $postData)):
            $this->response_to_json(FALSE, "All data are not present");
        endif;
        $this->db                       = \Config\Database::connect();
        $this->common_model             = new CommonModel();
        $apiStatus                      = TRUE;
        $apiMessage                     = '';
        $apiResponse                    = [];             
        $checkData                      = $this->common_model->find_data('sms_users', 'row', ['mobile' => $postData['phone'], 'published!=' => 3]);
        if(!$checkData){
            $otp                        = rand(1000,9999);
            $messageBody                = "Dear User, ".$otp." is your verification OTP for registration at ECOEX PORTAL. Do not share this OTP with anyone for security reasons.";        
            $siteSetting    = $this->common_model->find_data('sms_site_settings', 'row');            
            $username = $postData['phone'];
            $this->common_model->sendSMSABP($postData['phone'], $otp);
            
            $fields = [
                'user_type'         => 'U',
                'name'              => '',
                'mobile'            => $postData['phone'],
                'email'             => '',
                'username'          => $postData['phone'],
                'password'          => '',
                'password_original' => '',
                'verify_otp'        => $otp
            ];
            //pr($fields);
            $user_id                    = $this->common_model->save_data('sms_users', $fields, '', 'id');
            $apiStatus                  = TRUE;
            $apiMessage                 = 'Please Enter One Time Password Sent To Given Mobile Number !!!';
            $apiResponse                = ['user_id' => $user_id];
        } else {
            if($checkData->name == ''){
                $otp                        = rand(1000,9999);
                $this->common_model->sendSMSABP($postData['phone'], $otp);
                $this->common_model->save_data('sms_users', ['verify_otp' => $otp], $postData['phone'], 'mobile');
                $apiMessage                 = 'Please Enter One Time Password Sent To Given Mobile Number !!!';
                $apiResponse                = ['user_id' => $checkData->id];
            } else {
                $apiStatus                  = FALSE;
                $apiMessage                 = 'Mobile Number Already Exists !!!';
            }            
        }
        $this->response_to_json($apiStatus ,$apiMessage, $apiResponse);
    }
    /* 
    otp validate
    Author : Subhomoy 
    */
    public function otpValidate()
    {
        $siteSetting    = $this->common_model->find_data('sms_site_settings', 'row');
        if(!$siteSetting->access_app){
            $this->response_to_json(FALSE, "This App is Not Accesible Now !!!");
        }
        $this->isJSON(file_get_contents('php://input'));
        $postData = $this->extract_json(file_get_contents('php://input'));        
        $requiredFields =['key', 'user_id', 'otp'];
        if (!$this->validateArray($requiredFields, $postData)):
            $this->response_to_json(FALSE, "All data are not present");
        endif;
        $this->db                       = \Config\Database::connect();
        $this->common_model             = new CommonModel();
        $apiStatus                      = TRUE;
        $apiMessage                     = '';
        $apiResponse                    = [];             
        $checkUser                      = $this->common_model->find_data('sms_users', 'row', ['id' => $postData['user_id'], 'published!=' => 3]);
        if($checkUser){
            $verify_otp                 = $checkUser->verify_otp;
            if($verify_otp == $postData['otp']){
                $this->common_model->save_data('sms_users', ['published' => 1, 'verify_otp' => 0], $postData['user_id'], 'id');
                $apiStatus                  = TRUE;
                $apiMessage                 = 'OTP Validated Successfully !!!';
                $apiResponse                = ['user_id' => $postData['user_id']];
            } else {
                $apiStatus                  = FALSE;
                $apiMessage                 = 'Invalid OTP !!!';
            }            
        } else {
            $apiStatus                  = FALSE;
            $apiMessage                 = 'User Not Found !!!';
        }
        $this->response_to_json($apiStatus ,$apiMessage, $apiResponse);
    }
    /* sign up
    Author : Subhomoy 
    */
    public function signup()
    {
        $siteSetting    = $this->common_model->find_data('sms_site_settings', 'row');
        if(!$siteSetting->access_app){
            $this->response_to_json(FALSE, "This App is Not Accesible Now !!!");
        }
        $this->isJSON(file_get_contents('php://input'));
        $postData = $this->extract_json(file_get_contents('php://input'));        
        $requiredFields =['key', 'user_id', 'fname', 'lname', 'email', 'password', 'confirm_password', 'company_name', 'designation'];
        if (!$this->validateArray($requiredFields, $postData)):
            $this->response_to_json(FALSE, "All data are not present");
        endif;        
        $this->db                       = \Config\Database::connect();
        $this->common_model             = new CommonModel();
        $apiStatus                      = TRUE;
        $apiMessage                     = '';
        $apiResponse                    = [];
        $user_id                        = $postData['user_id'];
        $email                          = $postData['email'];
        $password                       = $postData['password'];
        $confirm_password               = $postData['confirm_password'];
        if($password != $confirm_password){
            $apiStatus                  = FALSE;
            $apiMessage                 = 'Password & Confirm Password Does Not Matched !!!';
        } else {
            $checkEmail                 = $this->common_model->find_data('sms_users', 'count', ['email' => $email]);
            if($checkEmail>0){
                $apiStatus                  = FALSE;
                $apiMessage                 = 'Email Already Exists. Use Other Email !!!';
            } else {
                if(!$this->passwordFormatCheck($postData['password'])){
                    $apiStatus                  = FALSE;
                    $apiMessage                 = 'Password Should Contain One Capital Letter,One Small Letter,One Number & [!@#$%^&*] Anyone As Special Character !!!';
                } else {
                    $fields = [
                        'name'              => $postData['fname'],
                        'lname'             => $postData['lname'],
                        'company_name'      => $postData['company_name'],
                        'designation'       => $postData['designation'],
                        'email'             => $postData['email'],
                        'password'          => md5($postData['password']),
                        'password_original' => $postData['password']
                    ];
                    //pr($fields);
                    $this->common_model->save_data('sms_users', $fields, $user_id, 'id');
                    $checkUser                 = $this->common_model->find_data('sms_users', 'row', ['id' => $user_id]);
                    if($checkUser){
                        $apiStatus                  = TRUE;
                        $apiMessage                 = 'SignUp Successfully !!!';
                        $apiResponse                = $checkUser;
                    } else {
                        $apiStatus                  = FALSE;
                        $apiMessage                 = 'User Not Found !!!';
                    }
                }                
            }
        }        
        $this->response_to_json($apiStatus ,$apiMessage, $apiResponse);
    }    
    /* 
    email check
    Author : Subhomoy 
    */
    public function checkEmail()
    {
        $siteSetting    = $this->common_model->find_data('sms_site_settings', 'row');
        if(!$siteSetting->access_app){
            $this->response_to_json(FALSE, "This App is Not Accesible Now !!!");
        }
        $this->isJSON(file_get_contents('php://input'));
        $postData = $this->extract_json(file_get_contents('php://input'));        
        $requiredFields =['key', 'email', 'user_id'];
        if (!$this->validateArray($requiredFields, $postData)):
            $this->response_to_json(FALSE, "All data are not present");
        endif;
        $this->db                       = \Config\Database::connect();
        $this->common_model             = new CommonModel();
        $apiStatus                      = TRUE;
        $apiMessage                     = '';
        $apiResponse                    = [];
        $user_id                        = $postData['user_id'];
        $checkData                      = $this->common_model->find_data('sms_users', 'count', ['email' => $postData['email']]);
        if($checkData<=0){
            $subject    = 'India Infocom :: Email Verification';
            $otp        = rand(1000,9999); 
            $mailBody   = $otp.' is your One Time Password for Infocom App. Please use the Password to verify email address'; 
            $this->common_model->sendEmail($postData['email'], $subject, $mailBody);
            $this->common_model->save_data('sms_users', ['verify_email' => $otp], $user_id, 'id');
            //die;
            $apiStatus                  = TRUE;
            $apiMessage                 = 'Please Enter One Time Password Sent To Given Email Address !!!';
            $apiResponse                = ['user_id' => $user_id];
        } else {
            $apiStatus                  = FALSE;
            $apiMessage                 = 'Email Address Already Exists !!!';
        }
        $this->response_to_json($apiStatus ,$apiMessage, $apiResponse);
    }
    /* 
    otp validate
    Author : Subhomoy 
    */
    public function otpEmailValidate()
    {
        $siteSetting    = $this->common_model->find_data('sms_site_settings', 'row');
        if(!$siteSetting->access_app){
            $this->response_to_json(FALSE, "This App is Not Accesible Now !!!");
        }
        $this->isJSON(file_get_contents('php://input'));
        $postData = $this->extract_json(file_get_contents('php://input'));        
        $requiredFields =['key', 'user_id', 'otp'];
        if (!$this->validateArray($requiredFields, $postData)):
            $this->response_to_json(FALSE, "All data are not present");
        endif;
        $this->db                       = \Config\Database::connect();
        $this->common_model             = new CommonModel();
        $apiStatus                      = TRUE;
        $apiMessage                     = '';
        $apiResponse                    = [];             
        $checkUser                      = $this->common_model->find_data('sms_users', 'row', ['id' => $postData['user_id']]);
        if($checkUser){
            $verify_email               = $checkUser->verify_email;
            if($verify_email == $postData['otp']){
                $this->common_model->save_data('sms_users', ['published' => 1, 'verify_email' => 0], $postData['user_id'], 'id');
                $apiStatus                  = TRUE;
                $apiMessage                 = 'OTP Validated Successfully !!!';
                $apiResponse                = ['user_id' => $postData['user_id']];
            } else {
                $apiStatus                  = FALSE;
                $apiMessage                 = 'Invalid OTP !!!';
            }            
        } else {
            $apiStatus                  = FALSE;
            $apiMessage                 = 'User Not Found !!!';
        }
        $this->response_to_json($apiStatus ,$apiMessage, $apiResponse);
    }
    /* 
    otp resend
    Author : Subhomoy 
    */
    public function otpResend()
    {
        $siteSetting    = $this->common_model->find_data('sms_site_settings', 'row');
        if(!$siteSetting->access_app){
            $this->response_to_json(FALSE, "This App is Not Accesible Now !!!");
        }
        $this->isJSON(file_get_contents('php://input'));
        $postData = $this->extract_json(file_get_contents('php://input'));        
        $requiredFields =['key', 'user_id'];
        if (!$this->validateArray($requiredFields, $postData)):
            $this->response_to_json(FALSE, "All data are not present");
        endif;
        $this->db                       = \Config\Database::connect();
        $this->common_model             = new CommonModel();
        $apiStatus                      = TRUE;
        $apiMessage                     = '';
        $apiResponse                    = [];             
        $checkUser                      = $this->common_model->find_data('sms_users', 'row', ['id' => $postData['user_id']]);
        if($checkUser){
            $mobile                     = $checkUser->mobile;
            $email                      = $checkUser->email;
            $otp                        = rand(1000,9999);
            $messageBody                = "Dear ".$checkUser->name.", ".$otp." is your verification OTP for registration at ECOEX PORTAL. Do not share this OTP with anyone for security reasons.";        
            $siteSetting                = $this->common_model->find_data('sms_site_settings', 'row');
            $this->common_model->save_data('sms_users', ['verify_otp' => $otp], $postData['user_id'], 'id');
            $username                   = $mobile;
            //$this->common_model->sendSMS($username, $messageBody);
            $this->common_model->sendSMSABP($username, $otp);
            $responseText               = 'Mobile Number';
            $apiStatus                  = TRUE;
            $apiMessage                 = 'OTP Resend Successfully. Please Verify Your '.$responseText.' !!!';
            $apiResponse                = ['user_id' => $postData['user_id'], 'phone' => $checkUser->mobile];
        } else {
            $apiStatus                  = FALSE;
            $apiMessage                 = 'User Not Found !!!';
        }
        $this->response_to_json($apiStatus ,$apiMessage, $apiResponse);
    }
    /* 
    signin
    Author : Subhomoy 
    */
    public function signin()
    {
        $siteSetting    = $this->common_model->find_data('sms_site_settings', 'row');
        if(!$siteSetting->access_app){
            $this->response_to_json(FALSE, "This App is Not Accesible Now !!!");
        }
        $this->isJSON(file_get_contents('php://input'));
        $postData = $this->extract_json(file_get_contents('php://input'));        
        $requiredFields =['key', 'username', 'password', 'device_type', 'device_token'];
        if (!$this->validateArray($requiredFields, $postData)):
            $this->response_to_json(FALSE, "All data are not present");
        endif;
        $this->db                           = \Config\Database::connect();
        $this->common_model                 = new CommonModel();
        $apiStatus                          = TRUE;
        $apiMessage                         = '';
        $apiResponse                        = [];
        $username                           = $postData['username'];
        $password                           = $postData['password'];        
        $checkUser                          = $this->db->query("select * from sms_users where user_type = 'U' and published = 1 and password = md5('$password') and (email = '$username' or mobile = '$username')")->getRow();
        if($checkUser){
            $user_id                        = $checkUser->id;
            $fields                         = [
                'user_id'           => $user_id,
                'device_type'       => $postData['device_type'],
                'device_token'      => $postData['device_token']
            ];
            $this->common_model->save_data('user_devices', $fields, '', 'id'); 
            $apiStatus                      = TRUE;
            $apiMessage                     = 'SignIn Successfully !!!';
            $apiResponse                    = $checkUser;
        } else {
            $apiStatus                      = FALSE;
            $apiMessage                     = 'Invalid Credentials !!!';
        }
        $this->response_to_json($apiStatus ,$apiMessage, $apiResponse);
    }
    /* 
    signout
    Author : Subhomoy 
    */
    public function signout()
    {
        $this->isJSON(file_get_contents('php://input'));
        $postData = $this->extract_json(file_get_contents('php://input'));        
        $requiredFields =['key', 'user_id'];
        if (!$this->validateArray($requiredFields, $postData)):
            $this->response_to_json(FALSE, "All data are not present");
        endif;
        $this->db                           = \Config\Database::connect();
        $this->common_model                 = new CommonModel();
        $apiStatus                          = TRUE;
        $apiMessage                         = '';
        $apiResponse                        = [];             
        $checkUser                         = $this->common_model->find_data('sms_users', 'row', ['id' => $postData['user_id']]);
        if($checkUser){
            $user_id                        = $checkUser->id;            
            $this->common_model->delete_data('user_devices', $user_id, 'user_id'); 
            $apiStatus                      = TRUE;
            $apiMessage                     = 'SignOut Successfully !!!';
            $apiResponse                    = [];
        } else {
            $apiStatus                      = FALSE;
            $apiMessage                     = 'Unauthenticated User !!!';
        }
        $this->response_to_json($apiStatus ,$apiMessage, $apiResponse);
    }
    /* 
    edit profile
    Author : Subhomoy 
    */
    public function editProfile()
    {
        $this->isJSON(file_get_contents('php://input'));
        $postData = $this->extract_json(file_get_contents('php://input'));        
        $requiredFields =['key', 'user_id'];
        if (!$this->validateArray($requiredFields, $postData)):
            $this->response_to_json(FALSE, "All data are not present");
        endif;
        $this->db                           = \Config\Database::connect();
        $this->common_model                 = new CommonModel();
        $apiStatus                          = TRUE;
        $apiMessage                         = '';
        $apiResponse                        = [];             
        $checkUser                          = $this->common_model->find_data('sms_users', 'row', ['id' => $postData['user_id']]);
        if($checkUser){
            $profile                        = [
                'fname'             => $checkUser->name,
                'lname'             => $checkUser->lname,
                'mobile'            => $checkUser->mobile,
                'email'             => $checkUser->email,
                'company_name'      => $checkUser->company_name,
                'designation'       => $checkUser->designation,
                'office_no'         => (($checkUser->office_no!=null)?$checkUser->office_no:''),
            ];
            $apiStatus                      = TRUE;
            $apiMessage                     = 'Data Available !!!';
            $apiResponse                    = $profile;
        } else {
            $apiStatus                      = FALSE;
            $apiMessage                     = 'Unauthenticated User !!!';
        }
        $this->response_to_json($apiStatus ,$apiMessage, $apiResponse);
    }
    /* 
    update profile
    Author : Subhomoy 
    */
    public function updateProfile()
    {
        $this->isJSON(file_get_contents('php://input'));
        $postData = $this->extract_json(file_get_contents('php://input'));        
        $requiredFields =['key', 'user_id', 'fname', 'lname', 'email', 'company_name', 'designation', 'office_no'];
        if (!$this->validateArray($requiredFields, $postData)):
            $this->response_to_json(FALSE, "All data are not present");
        endif;
        $this->db                           = \Config\Database::connect();
        $this->common_model                 = new CommonModel();
        $apiStatus                          = TRUE;
        $apiMessage                         = '';
        $apiResponse                        = [];        
        $fields = [
                'name'                          => $postData['fname'],
                'lname'                         => $postData['lname'],
                'email'                         => $postData['email'],
                'company_name'                  => $postData['company_name'],
                'designation'                   => $postData['designation'],
                'office_no'                     => $postData['office_no'],
                'updated_at'                    => date('Y-m-d H:i:s')
            ];
        //pr($fields);
        $this->common_model->save_data('sms_users', $fields, $postData['user_id'], 'id');
        $checkUser                          = $this->common_model->find_data('sms_users', 'row', ['id' => $postData['user_id']]);
        if($checkUser){            
            $apiStatus                      = TRUE;
            $apiMessage                     = 'Profile Updated Successfully !!!';
            $apiResponse                    = $checkUser;
        } else {
            $apiStatus                      = FALSE;
            $apiMessage                     = 'Unauthenticated User !!!';
        }
        $this->response_to_json($apiStatus ,$apiMessage, $apiResponse);
    }
    /* 
    change password
    Author : Subhomoy 
    */
    public function changePassword()
    {
        $this->isJSON(file_get_contents('php://input'));
        $postData = $this->extract_json(file_get_contents('php://input'));        
        $requiredFields =['key', 'user_id', 'old_password', 'new_password', 'confirm_password'];
        if (!$this->validateArray($requiredFields, $postData)):
            $this->response_to_json(FALSE, "All data are not present");
        endif;
        $this->db                           = \Config\Database::connect();
        $this->common_model                 = new CommonModel();
        $apiStatus                          = TRUE;
        $apiMessage                         = '';
        $apiResponse                        = [];
        $getUser                            = $this->common_model->find_data('sms_users', 'row', ['id' => $postData['user_id']]);
        if($getUser){
            if($getUser->password != md5($postData['old_password'])){
                $apiStatus                      = FALSE;
                $apiMessage                     = 'Old Password Does Not Matched !!!';
            } else {
                if($postData['new_password'] != $postData['confirm_password']){
                    $apiStatus                      = FALSE;
                    $apiMessage                     = 'New & Confirm Password Does Not Matched !!!';
                } else {
                    $fields = [
                            'password'                          => md5($postData['new_password']),
                            'password_original'                 => $postData['new_password'],
                            'updated_at'                        => date('Y-m-d H:i:s')
                        ];
                    //pr($fields);
                    $this->common_model->save_data('sms_users', $fields, $postData['user_id'], 'id');
                    $checkUser                      = $this->common_model->find_data('sms_users', 'row', ['id' => $postData['user_id']]);
                    $apiStatus                      = TRUE;
                    $apiMessage                     = 'Password Changed Successfully !!!';
                    $apiResponse                    = $checkUser;
                }
            }            
        } else {
            $apiStatus                      = FALSE;
            $apiMessage                     = 'Unauthenticated User !!!';
        }        
        $this->response_to_json($apiStatus ,$apiMessage, $apiResponse);
    }
    /* 
    Booking List
    Author : Subhomoy
    */
    public function bookingList()
    {
        $this->isJSON(file_get_contents('php://input'));
        $postData = $this->extract_json(file_get_contents('php://input'));        
        $requiredFields =['key', 'user_id'];
        if (!$this->validateArray($requiredFields, $postData)):
            $this->response_to_json(FALSE, "All data are not present");
        endif;
        $this->db                           = \Config\Database::connect();
        $this->common_model                 = new CommonModel();
        $apiStatus                          = TRUE;
        $apiMessage                         = '';
        $apiResponse                        = [];             
        $checkUser                          = $this->common_model->find_data('sms_users', 'row', ['id' => $postData['user_id']]);
        if($checkUser){
            $orderBy[0]                     = ['field' => 'id', 'type' => 'DESC'];
            $bookingRows                    = $this->common_model->find_data('bookings', 'array', ['user_id' => $postData['user_id']], '', '', '', $orderBy);
            $bookings                       = [];
            if($bookingRows){
                foreach($bookingRows as $bookingRow){
                    $planName = [];
                    $booking_day = json_decode($bookingRow->booking_day);
                    if(!empty($booking_day)){ for($p=0;$p<count($booking_day);$p++){
                        $plan = $this->common_model->find_data('package_plans', 'row', ['id' => $booking_day[$p]]);
                        if($plan){
                            $planName[] = $plan->package_name;
                        }
                    } }
                    $booking_for = [];
                    $booking_name = json_decode($bookingRow->booking_name);
                    $booking_email = json_decode($bookingRow->booking_email);
                    $booking_phone = json_decode($bookingRow->booking_phone);
                    $booking_company = json_decode($bookingRow->booking_company);
                    $booking_designation = json_decode($bookingRow->booking_designation);
                    if(!empty($booking_name)){ for($i=0;$i<count($booking_name);$i++){
                        $booking_for[] = $booking_name[$i].'||'.$booking_email[$i].'||'.$booking_phone[$i].'||'.$booking_company[$i].'||'.$booking_designation[$i];
                    } }
                    $bookings[]                       = [
                        'booking_no'            => $bookingRow->booking_no,
                        'booking_date'          => date_format(date_create($bookingRow->booking_date), "M d, Y"),
                        'booking_time'          => date_format(date_create($bookingRow->booking_time), "h:i A"),
                        'payment_status'        => (($bookingRow->payment_status)?'PAID':'UNPAID'),
                        'payment_mode'          => $bookingRow->payment_mode,
                        'txn_id'                => $bookingRow->txn_id,
                        'payment_date_time'     => date_format(date_create($bookingRow->payment_date_time), "M d, Y h:i A"),
                        'booking_amount'        => $bookingRow->booking_amount,
                        'discount_percent'      => $bookingRow->discount_percent,
                        'discount_amount'       => $bookingRow->discount_amount,
                        'discounted_amount'     => $bookingRow->discounted_amount,
                        'gst_percent'           => $bookingRow->gst_percent,
                        'gst_amount'            => $bookingRow->gst_amount,
                        'grand_total'           => $bookingRow->grand_total,
                        'booking_day'           => implode(", ", $planName),
                        'booking_for'           => $booking_for,
                    ];
                }
            }
            $profile                        = [
                'name'              => $checkUser->name,
                'mobile'            => $checkUser->mobile,
                'email'             => $checkUser->email,
                'profile_image'     => (($checkUser->profile_image!='')?base_url('uploads/users/'.$checkUser->profile_image):base_url('uploads/no-user-image.jpg')),
                'bookings'          => $bookings
            ];
            $apiStatus                      = TRUE;
            $apiMessage                     = 'Data Available !!!';
            $apiResponse                    = $profile;
        } else {
            $apiStatus                      = FALSE;
            $apiMessage                     = 'Unauthenticated User !!!';
        }
        $this->response_to_json($apiStatus ,$apiMessage, $apiResponse);
    }
    /* 
    Wishlist List
    Author : Subhomoy
    */
    public function wishlist()
    {
        $this->isJSON(file_get_contents('php://input'));
        $postData = $this->extract_json(file_get_contents('php://input'));        
        $requiredFields =['key', 'user_id'];
        if (!$this->validateArray($requiredFields, $postData)):
            $this->response_to_json(FALSE, "All data are not present");
        endif;
        $this->db                           = \Config\Database::connect();
        $this->common_model                 = new CommonModel();
        $apiStatus                          = TRUE;
        $apiMessage                         = '';
        $apiResponse                        = [];             
        $checkUser                          = $this->common_model->find_data('sms_users', 'row', ['id' => $postData['user_id']]);
        if($checkUser){
            $orderBy[0]                     = ['field' => 'ev_ag_id', 'type' => 'ASC'];
            $rows                           = $this->common_model->find_data('user_wishlist', 'array', ['user_id' => $postData['user_id']], '', '', '', $orderBy);
            $wish_list                      = [];
            if($rows){
                foreach($rows as $row){
                    $eventAgenda        = $this->common_model->find_data('event_agenda', 'row', ['agenda_id' => $row->agenda_id]);
                    $eventAgendaDetails = $this->common_model->find_data('event_agenda_details', 'row', ['ev_ag_id' => $row->ev_ag_id]);
                    $wish_list[] = [
                        'agenda_name'           => (($eventAgenda)?$eventAgenda->agenda_title:''),
                        'agenda_date'           => (($eventAgenda)?date_format(date_create($eventAgenda->agenda_date), "F d, Y"):''),
                        'agenda_day'            => (($eventAgenda)?'DAY '.$eventAgenda->agenda_day:''),
                        'agenda_name'           => (($eventAgenda)?$eventAgenda->agenda_title:''),
                        'hall_number'           => (($eventAgendaDetails)?$eventAgendaDetails->hall_number:''),
                        'from_time'             => (($eventAgendaDetails)?date_format(date_create($eventAgendaDetails->from_time), "h:i A"):''),
                        'to_time'               => (($eventAgendaDetails)?(($eventAgendaDetails->to_time!='')?date_format(date_create($eventAgendaDetails->to_time), "h:i A"):'Onwards'):''),
                        'subject_line'          => (($eventAgendaDetails)?$eventAgendaDetails->subject_line:''),
                        'ev_ag_id'              => (($eventAgendaDetails)?$eventAgendaDetails->ev_ag_id:''),
                    ];
                }
            }
            $apiStatus                      = TRUE;
            $apiMessage                     = 'Data Available !!!';
            $apiResponse                    = $wish_list;
        } else {
            $apiStatus                      = FALSE;
            $apiMessage                     = 'Unauthenticated User !!!';
        }
        $this->response_to_json($apiStatus ,$apiMessage, $apiResponse);
    }
    /* 
    Add To Wishlist
    Author : Subhomoy
    */
    public function addToWishlist()
    {
        $this->isJSON(file_get_contents('php://input'));
        $postData = $this->extract_json(file_get_contents('php://input'));        
        $requiredFields =['key', 'user_id', 'ev_ag_id'];
        if (!$this->validateArray($requiredFields, $postData)):
            $this->response_to_json(FALSE, "All data are not present");
        endif;
        $this->db                           = \Config\Database::connect();
        $this->common_model                 = new CommonModel();
        $apiStatus                          = TRUE;
        $apiMessage                         = '';
        $apiResponse                        = [];             
        $checkUser                          = $this->common_model->find_data('sms_users', 'row', ['id' => $postData['user_id']]);
        if($checkUser){
            $checkWishlist                  = $this->common_model->find_data('user_wishlist', 'row', ['user_id' => $postData['user_id'], 'ev_ag_id' => $postData['ev_ag_id']]);
            if($checkWishlist){
                $this->common_model->delete_data('user_wishlist', $postData['ev_ag_id'], 'ev_ag_id');
                $apiMessage                     = 'Removed From Wishlist !!!';
            } else {
                $eventAgendaDetails             = $this->common_model->find_data('event_agenda_details', 'row', ['ev_ag_id' => $postData['ev_ag_id']]);
                if($eventAgendaDetails){
                    $event_id   = $eventAgendaDetails->event_id;
                    $agenda_id  = $eventAgendaDetails->agenda_id;
                } else {
                    $event_id   = 0;
                    $agenda_id  = 0;
                }
                $fields = [
                    'user_id'       => $postData['user_id'],
                    'event_id'      => $event_id,
                    'agenda_id'     => $agenda_id,
                    'ev_ag_id'      => $postData['ev_ag_id'],
                    'created_at'    => date('Y-m-d H:i:s'),
                    'published'     => 1
                ];
                $this->common_model->save_data('user_wishlist', $fields, '', 'id');
                $apiMessage                     = 'Added To Wishlist !!!';
            }                       
            $apiStatus                      = TRUE;            
        } else {
            $apiStatus                      = FALSE;
            $apiMessage                     = 'Unauthenticated User !!!';
        }
        $this->response_to_json($apiStatus ,$apiMessage, $apiResponse);
    }
    /* 
    Add To Wishlist
    Author : Subhomoy
    */
    public function eventDetails(){
        $this->isJSON(file_get_contents('php://input'));
        $postData = $this->extract_json(file_get_contents('php://input'));        
        $requiredFields =['key', 'user_id', 'event_id'];
        if (!$this->validateArray($requiredFields, $postData)):
            $this->response_to_json(FALSE, "All data are not present");
        endif;
        $this->db                           = \Config\Database::connect();
        $this->common_model                 = new CommonModel();
        $apiStatus                          = TRUE;
        $apiMessage                         = '';
        $apiResponse                        = [];
        $checkUser                          = $this->common_model->find_data('sms_users', 'row', ['id' => $postData['user_id']]);
        if($checkUser){
            $event                          = $this->common_model->find_data('sms_events', 'row', ['id' => $postData['event_id']]);
            if($event){
                $eventCategory              = $this->common_model->find_data('event_categories', 'row', ['id' => $event->category_id]);
                $eventGroupBy[0]            = 'agenda_day';
                $eventDays                  = $this->common_model->find_data('event_agenda', 'array', ['event_id' => $postData['event_id']], 'agenda_day', '', $eventGroupBy);
                $agenda                     = [];                
                if($eventDays){
                    foreach($eventDays as $eventDay){
                        $eventOrderBy[0]                = ['field' => 'rank', 'type' => 'ASC'];
                        $eventAgendas                   = $this->common_model->find_data('event_agenda', 'array', ['event_id' => $postData['event_id'], 'agenda_day' => $eventDay->agenda_day], '', '', '', $eventOrderBy);
                        if($eventAgendas){
                            foreach($eventAgendas as $eventAgenda){
                                $agendaTopics = $this->common_model->find_data('event_agenda_details', 'array', ['agenda_id' => $eventAgenda->agenda_id, 'published' => 1]);
                                $topics                     = [];
                                if($agendaTopics){
                                    foreach($agendaTopics as $agendaTopic){
                                        $checkUserWishlist = $this->common_model->find_data('user_wishlist', 'count', ['user_id' => $postData['user_id'], 'ev_ag_id' => $agendaTopic->ev_ag_id]);
                                        if($checkUserWishlist>0){
                                            $is_wishlist = 1;
                                        } else {
                                            $is_wishlist = 0;
                                        }
                                        $topics[] = [
                                            'ev_ag_id'      => $agendaTopic->ev_ag_id,
                                            'hall_number'   => $agendaTopic->hall_number,
                                            'from_time'     => date_format(date_create($agendaTopic->from_time), "h:i A"),
                                            'to_time'       => (($agendaTopic)?(($agendaTopic->to_time!='')?date_format(date_create($agendaTopic->to_time), "h:i A"):'Onwards'):''),
                                            'subject_line'  => $agendaTopic->subject_line,
                                            'is_wishlist'   => $is_wishlist,
                                        ];
                                    }
                                }
                                $agenda[] = [
                                    'day'               => strtoupper('Day '.$eventDay->agenda_day),
                                    'title'             => $eventAgenda->agenda_title,
                                    'venue'             => $eventAgenda->agenda_venue,
                                    'rank'              => $eventAgenda->rank,
                                    'agenda_date'       => date_format(date_create($eventAgenda->agenda_date), "F d, Y"),
                                    'agenda_id'         => $eventAgenda->agenda_id,
                                    'topics'            => $topics,
                                ];
                            }
                        }
                    }
                }
                //pr($eventDays);
                $apiResponse                = [
                    'event_id'                  => $event->id,
                    'category_id'               => $event->category_id,
                    'category_name'             => (($eventCategory)?$eventCategory->name:''),
                    'title'                     => $event->title,
                    'event_date'                => $event->event_date,
                    'event_venue'               => $event->event_venue,
                    'event_theme'               => $event->event_theme,
                    'overview_description'      => $event->overview_description,
                    'conference_desscription'   => $event->conference_desscription,
                    'agenda'                    => $agenda,
                ];
            } else {
                $apiStatus                  = FALSE;
                $apiMessage                 = 'Event Not Found !!!';
            }
        } else {
            $apiStatus                      = FALSE;
            $apiMessage                     = 'Unauthenticated User !!!';
        }
        $this->response_to_json($apiStatus ,$apiMessage, $apiResponse);
    }
    /* 
    Static Page Content
    Author : Subhomoy
    */
    public function pageContent(){
        $this->isJSON(file_get_contents('php://input'));
        $postData = $this->extract_json(file_get_contents('php://input'));        
        $requiredFields =['key', 'user_id', 'slug'];
        if (!$this->validateArray($requiredFields, $postData)):
            $this->response_to_json(FALSE, "All data are not present");
        endif;
        $this->db                           = \Config\Database::connect();
        $this->common_model                 = new CommonModel();
        $apiStatus                          = TRUE;
        $apiMessage                         = '';
        $apiResponse                        = [];             
        $checkUser                          = $this->common_model->find_data('sms_users', 'row', ['id' => $postData['user_id']]);
        if($checkUser){
            $staticContent                  = $this->common_model->find_data('sms_static_content', 'row', ['slug' => $postData['slug']]);
            if($staticContent){
                $apiMessage                         = 'Data Available !!!';
                $apiResponse                        = [
                    'title'         => $staticContent->title,
                    'description'   => $staticContent->description,
                ];
            }
        } else {
            $apiStatus                      = FALSE;
            $apiMessage                     = 'Unauthenticated User !!!';
        }
        $this->response_to_json($apiStatus ,$apiMessage, $apiResponse);
    }
    /* 
    Account Delete
    Author : Subhomoy
    */
    public function accountDelete(){
        $this->isJSON(file_get_contents('php://input'));
        $postData = $this->extract_json(file_get_contents('php://input'));        
        $requiredFields =['key', 'user_id', 'delete_reason'];
        if (!$this->validateArray($requiredFields, $postData)):
            $this->response_to_json(FALSE, "All data are not present");
        endif;
        $this->db                           = \Config\Database::connect();
        $this->common_model                 = new CommonModel();
        $apiStatus                          = TRUE;
        $apiMessage                         = '';
        $apiResponse                        = [];             
        $checkUser                          = $this->common_model->find_data('sms_users', 'row', ['id' => $postData['user_id']]);
        if($checkUser){
            //$this->common_model->save_data('sms_users', ['published' => 3, 'delete_reason' => $postData['delete_reason']], $postData['user_id'], 'id');
            $subject    = 'Account Delete';
            $name       = $checkUser->name.' '.$checkUser->lname;
            $mailBody   = 'Dear '.$name.', Your Account Has Been Deleted Successfully Due to '.$postData['delete_reason'].' !!!';
            $this->common_model->sendEmail($checkUser->email, $subject, $mailBody);
            $this->common_model->delete_data('sms_users', $postData['user_id'], 'id');
            $apiStatus                      = TRUE;
            $apiMessage                     = 'Account Deleted Successfully !!!';
        } else {
            $apiStatus                      = FALSE;
            $apiMessage                     = 'Unauthenticated User !!!';
        }
        $this->response_to_json($apiStatus ,$apiMessage, $apiResponse);
    }
    /* 
    Password Format Check [one capital,one small,one number and one special character]
    Author : Subhomoy
    */
    public function passwordFormatCheck($password){
        //echo $password;die;
        if(preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%^&*]{8,12}$/', $password)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
}
