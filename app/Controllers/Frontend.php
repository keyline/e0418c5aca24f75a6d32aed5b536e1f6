<?php

namespace App\Controllers;

use App\Models\CommonModel;
use App\Models\Menu;
use DB;

class Frontend extends BaseController
{
    public function __construct()
    {
        $session = \Config\Services::session();
        $db = \Config\Database::connect();
    }
    public function index()
    {
        $session = \Config\Services::session();

        // echo "<h1 style='text-align:center'>WEBSITE IS UNDER CONSTRUCTION. PLEASE STAY SOON. WE ARE COMING SOON ....</h1>";die;
        $title                      = 'Home';
        $this->common_model         = new CommonModel();
        $postData['common_model']   = $this->common_model;
        $page_name                  = 'home';
        $data                       = [];
        /**
         * added for checking fb logged in session
         * shuvadeep@keylines.net
         * 09/01/2023
         */
        if ($session->has('ulogin')) {
            $data['userData']= $session->get();
        }
        echo $this->front_layout($title, $page_name, $data);
    }
    public function details()
    {
        $title                      = 'Details';
        $this->common_model         = new CommonModel();
        $postData['common_model']   = $this->common_model;
        $page_name                  = 'details';
        $data                       = [];
        echo $this->front_layout($title, $page_name, $data);
    }
    public function dynamicPageContent()
    {
        if (!empty($_GET['page'])) {
            $page = trim($_GET['page']);
            if ($page == base_url()) {
                $viewName = "home";
            } else {
                $viewName = $page;
            }

            // $filePath           = APPPATH.'views/front/pages/'.$viewName.'.php';
            // $notFoundFilePath   = APPPATH.'views/front/pages/404.php';
            // $filename = $viewName.'.php';

            if ($this->curl_get_file_contents(base_url($viewName))) {
                $viewContent = view('front/pages/' . $viewName);
            } else {
                $viewContent = view('front/pages/not-found');
            }
            echo $viewContent;
        // echo $this->url_exists(base_url($viewName));die;
        // // echo $html = view('front/pages/details');

        // if(file_exists(realpath(APPPATH . 'views/front/pages/' . $filename))) {
            //     // include($filePath);
            //     echo 1;
        // } else {
            //     // include($notFoundFilePath);
            //     echo 0;
        // }
        // die;
        } else {
            $viewContent = view('front/pages/not-found');
            echo $viewContent;
        }
    }
    public function url_exists($url)
    {
        $array = get_headers($url);
        echo '<pre>';
        print_r($array);
        $string = $array[0];
        if (strpos($string, "200")) {
            return true;
        } else {
            return false;
        }
    }
    public function curl_get_file_contents($URL)
    {
        echo $URL;
        $c = curl_init();
        curl_setopt($c, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($c, CURLOPT_URL, $URL);
        $contents = curl_exec($c);
        curl_close($c);

        if ($contents) {
            return true;
        } else {
            return false;
        }
    }
    public function quiz()
    {
        $title                      = 'Quiz';
        $this->common_model         = new CommonModel();
        $postData['common_model']   = $this->common_model;
        $page_name                  = 'quiz';
        $data['row'] =[];
        $data['questions']          = $this->common_model->find_data('abp_quiz_questions', 'array', ['question_active!=' => 3 ], '', '', '');
        // pr($data['questions']);
        echo $this->front_layout($title, $page_name, $data);
    }
    public function quizData()
    {
        $session = \Config\Services::session();
        $userID = $data['user_id']            = $this->session->get('user_id');
        if ($this->request->getPost()) {
            // pr($this->request->getPost());
            $q = $this->request->getPost('question');
            $c  = $this->request->getPost('choice');
            $checkUser = $this->common_model->find_data('abp_user_question_answer', 'count', ['user_id' => $userID , 'answer_question_id=' => $q ]);
            $checkAnswer = $this->common_model->find_data('abp_quiz_question_choices', 'row', ['choice_question_id' => $q , 'choice_id=' => $c , 'question_active !=' => 3 ]);
            // pr($checkAnswer);
            if ($checkUser > 0) {
                return redirect()->to('/applied/');
            } else {
                $correct           = $this->common_model->find_data('abp_quiz_question_choices', 'row', ['choice_id' => $c ], '', '', '');
                if ($correct->choice_is_right == 1) {
                    $postData   = array(
                        'answer_question_id'                => $this->request->getPost('question'),
                        'answer_choice_id'                  => $this->request->getPost('choice'),
                        'anwser_choice_is_right'            => 1,
                        'user_id'                           => $userID,
                        'answer_datetime'                   => date('Y-m-d h:i:s')
                        );
                } else {
                    $postData   = array(
                        'answer_question_id'                => $this->request->getPost('question'),
                        'answer_choice_id'                  => $this->request->getPost('choice'),
                        'anwser_choice_is_right'            => 0,
                        'user_id'                           => $userID,
                        'answer_datetime'                   => date('Y-m-d h:i:s')
                        );
                }
                // pr($postData);
                $record = $this->common_model->save_data('abp_user_question_answer', $postData, '', 'answer_id');
                return redirect()->to('/thank-you/');
            }
        }
    }


    public function submitSubscribe()
    {
        $postData               = $this->request->getPost();
        $apiStatus              = false;
        $apiMessage             = "";
        $apiResponse            = [];
        $this->common_model     = new CommonModel();
        $email                  = $postData['email'];
        if ($email != '') {
            if ($this->validEmail($email)) {
                $checkEmail = $this->common_model->find_data('subscriber_list', 'count', ['email' => $email, 'published' => 1]);
                if ($checkEmail<=0) {
                    $this->common_model->save_data('subscriber_list', ['email' => $email], '', 'id');
                    $apiStatus              = true;
                    $apiMessage             = "Email Address Successfully Subscribed. Thank You !!!";
                } else {
                    $apiStatus              = false;
                    $apiMessage             = "Email Address Already Exists !!!";
                }
            } else {
                $apiStatus              = false;
                $apiMessage             = "Please Enter Valid Email Address To Subscribe !!!";
            }
        } else {
            $apiStatus              = false;
            $apiMessage             = "Please Enter Email Address To Subscribe !!!";
        }

        $data = ['status' => $apiStatus, 'message' => $apiMessage, 'response' => $apiResponse];
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($data);
    }
    public function page($slug)
    {
        $this->common_model         = new CommonModel();
        $postData['common_model']   = $this->common_model;
        $page_name                  = 'page-content';
        $data['staticContent']      = $this->common_model->find_data('sms_static_content', 'row', ['published' => 1, 'slug' => $slug]);
        $data['pageContent']        = $this->common_model->find_data('pages', 'row', ['published' => 1, 'slug' => $slug]);
        $title                      = $data['staticContent']->title;
        echo $this->front_layout($title, $page_name, $data);
    }
    public function contactUs()
    {
        $title                      = 'Contact Us';
        $this->common_model         = new CommonModel();
        $this->session              = \Config\Services::session();
        $postData['common_model']   = $this->common_model;
        $postData['session']        = $this->session;
        $page_name                  = 'contact-us';
        $data['banners']            = $this->common_model->find_data('sms_banners', 'array', ['published' => 1]);
        if ($this->request->getPost()) {
            $fields = [
                'enquiry_type'  => 'ENQUIRY',
                'name'          => $this->request->getPost('name'),
                'email'         => $this->request->getPost('email'),
                'phone'         => $this->request->getPost('mobile'),
                'comment'       => $this->request->getPost('description'),
            ];
            $html = view('front/mail_template/contact-template', $fields);
            //echo $html;die;
            $site_setting       = $this->common_model->find_data('sms_site_settings', 'row');
            if ($this->common_model->sendEmail(strtolower($this->request->getPost('email')), $site_setting->site_name. ' :: Contact Enquiry', $html)) {
                $this->common_model->save_data('sms_contact_enquiry', $fields, '', 'id');
                $this->session->setFlashdata('success_message', 'Your Enquiry Has Been Submitted Successfully. We Will Contact You Soon !!!');
            } else {
                $this->common_model->save_data('sms_contact_enquiry', $fields, '', 'id');
                $this->session->setFlashdata('error_message', 'Something Went Wrong !!!');
            }
            return redirect()->to('/contact-us/');
        }
        echo $this->front_layout($title, $page_name, $data);
    }
    public function thankYou()
    {
        $session = \Config\Services::session();
        $userID = $data['user_id']            = $this->session->get('user_id');
        $title                      = 'Thank you';
        $this->common_model         = new CommonModel();
        $data['common_model']       = $this->common_model;
        $page_name                  = 'thank-you';
        $data['allAnswers']           = $this->common_model->find_data('abp_user_question_answer', 'array', ['published!=' => 3 , 'user_id' => $userID ], '', '', '');
        // pr($data['allAnswers']);
        echo $this->front_layout($title, $page_name, $data);
        // echo 'Thank You';die;
    }
    public function Applied()
    {
        $title                      = 'Applied';
        $this->common_model         = new CommonModel();
        $data['common_model']       = $this->common_model;
        $page_name                  = 'applied';
        echo $this->front_layout($title, $page_name, $data);
    }
    public function event($slug)
    {
        $title                      = 'Event';
        $this->common_model         = new CommonModel();
        $data['common_model']       = $this->common_model;
        $page_name                  = 'event';
        $eventOrderBy[0]            = ['field' => 'rank', 'type' => 'ASC'];
        $data['banners']            = $this->common_model->find_data('sms_banners', 'array', ['published' => 1]);
        $data['event']              = $this->common_model->find_data('sms_events', 'row', ['published' => 1, 'slug' => $slug]);
        $data['eventAgendas1']      = $this->common_model->find_data('event_agenda', 'array', ['published' => 1, 'event_id' => $data['event']->id, 'agenda_day' => 1], '', '', '', $eventOrderBy);
        $data['eventAgendas2']      = $this->common_model->find_data('event_agenda', 'array', ['published' => 1, 'event_id' => $data['event']->id, 'agenda_day' => 2], '', '', '', $eventOrderBy);
        $data['eventAgendas3']      = $this->common_model->find_data('event_agenda', 'array', ['published' => 1, 'event_id' => $data['event']->id, 'agenda_day' => 3], '', '', '', $eventOrderBy);
        echo $this->front_layout($title, $page_name, $data);
    }
    public function videoGallery()
    {
        $title                      = 'Explore Video Gallery';
        $this->common_model         = new CommonModel();
        $postData['common_model']   = $this->common_model;
        $page_name                  = 'video-gallery';
        $orderBy[0]                 = ['field' => 'id', 'type' => 'DESC'];
        $data['videos']             = $this->common_model->find_data('video_gallery', 'array', ['published' => 1, 'event_id' => 1], '', '', '', $orderBy);
        $data['pageContent']        = $this->common_model->find_data('pages', 'row', ['published' => 1, 'slug' => 'video-gallery']);
        echo $this->front_layout($title, $page_name, $data);
    }
    public function speakers()
    {
        $title                      = 'Speakers';
        $this->common_model         = new CommonModel();
        $postData['common_model']   = $this->common_model;
        $page_name                  = 'speakers';
        $orderBy[0]                 = ['field' => 'rank', 'type' => 'ASC'];
        $data['speakers']           = $this->common_model->find_data('speakers', 'array', ['published' => 1], '', '', '', $orderBy);
        $data['pageContent']        = $this->common_model->find_data('pages', 'row', ['published' => 1, 'slug' => 'video-gallery']);
        echo $this->front_layout($title, $page_name, $data);
    }
    public function event_category()
    {
        $title                      = 'Event Category';
        $this->common_model         = new CommonModel();
        $postData['common_model']   = $this->common_model;
        $page_name                  = 'event-category';
        $orderBy[0]                 = ['field' => 'rank', 'type' => 'ASC'];
        $data['speakers']           = $this->common_model->find_data('speakers', 'array', ['published' => 1], '', '', '', $orderBy);
        $data['pageContent']        = $this->common_model->find_data('pages', 'row', ['published' => 1, 'slug' => 'event-category']);
        echo $this->front_layout($title, $page_name, $data);
    }
    public function signup()
    {
        $title                      = 'Sign Up';
        $this->common_model         = new CommonModel();
        $postData['common_model']   = $this->common_model;
        $page_name                  = 'signup';
        $data['banners']            = $this->common_model->find_data('sms_banners', 'array', ['published' => 1]);
        echo $this->front_layout($title, $page_name, $data);
    }
    public function signupPost()
    {
        $postData               = $this->request->getPost();
        $this->common_model     = new CommonModel();
        $check_phone            = $this->common_model->find_data('sms_users', 'count', ['mobile' => $postData['mobile'], 'published!=' => 3]);
        if ($check_phone>0) {
            $this->response_to_json(false, "Mobile Number Already Exists !!!", []);
        } else {
            $check_email            = $this->common_model->find_data('sms_users', 'count', ['email' => $postData['emailAddress'], 'published!=' => 3]);
            if ($check_email<=0) {
                if ($postData['password'] == $postData['confirm_password']) {
                    $fields = [
                        'user_type'         => 'U',
                        'name'              => $postData['name'],
                        'lname'             => $postData['lname'],
                        'company_name'      => $postData['company_name'],
                        'designation'       => $postData['designation'],
                        'mobile'            => $postData['mobile'],
                        'office_no'         => $postData['office_no'],
                        'email'             => $postData['emailAddress'],
                        'username'          => $postData['emailAddress'],
                        'password'          => md5($postData['password']),
                        'password_original' => $postData['password'],
                        'published'         => 1
                    ];
                    $html = view('front/mail_template/registration-template', $fields);
                    //echo $html;die;
                    $site_setting       = $this->common_model->find_data('sms_site_settings', 'row');
                    $this->common_model->sendEmail(strtolower($postData['emailAddress']), $site_setting->site_name. ' :: Registration Complete', $html);
                    //pr($fields);
                    $this->common_model->save_data('sms_users', $fields, '', 'id');
                    $this->response_to_json(true, "Registration Completed Successfully !!!", []);
                } else {
                    $this->response_to_json(false, "Password & Confirm Password Not Matched !!!", []);
                }
            } else {
                $this->response_to_json(false, "Email Already Exists !!!", []);
            }
        }
    }
    public function signin()
    {
        $title                      = 'Sign In';
        $this->common_model         = new CommonModel();
        $postData['common_model']   = $this->common_model;
        $page_name                  = 'signin';
        $data['banners']            = $this->common_model->find_data('sms_banners', 'array', ['published' => 1]);
        $data['plans']              = $this->common_model->find_data('package_plans', 'array', ['published' => 1]);
        echo $this->front_layout($title, $page_name, $data);
    }
    public function forgotPassword()
    {
        $title                      = 'Forgot Password';
        $this->common_model         = new CommonModel();
        $postData['common_model']   = $this->common_model;
        $page_name                  = 'forgot-password';
        $data['banners']            = $this->common_model->find_data('sms_banners', 'array', ['published' => 1]);
        echo $this->front_layout($title, $page_name, $data);
    }
    public function forgotPasswordPost()
    {
        $postData               = $this->request->getPost();
        $this->common_model     = new CommonModel();
        $check_user             = $this->common_model->find_data('sms_users', 'row-array', ['email' => $postData['emailAddress'], 'published!=' => 3]);
        if (!$check_user) {
            $this->response_to_json(false, "User Is Not Registered With Us !!!", []);
        } else {
            $maildata = $check_user;
            $html = view('front/mail_template/forgot-password-template', $maildata);
            //echo $html;die;
            $site_setting       = $this->common_model->find_data('sms_site_settings', 'row');
            $this->common_model->sendEmail(strtolower($check_user['email']), $site_setting->site_name. ' :: Forgot Password', $html);
            $this->response_to_json(true, "Login Credentials Has Been Successfully Send To Your Registered Email Address !!!", []);
        }
    }
    public function signinPost()
    {
        $postData               = $this->request->getPost();
        $this->session          = \Config\Services::session();
        $this->common_model     = new CommonModel();
        $checkuser              = $this->common_model->find_data('sms_users', 'row', ['email' => $postData['emailAddress'], 'password' => md5($postData['password']), 'published' => 1]);
        if (empty($checkuser)) {
            $this->response_to_json(false, "Invalid Credentials !!!", []);
        } else {
            $session_data = array(
                                'user_id'           => $checkuser->id,
                                'user_type'         => $checkuser->user_type,
                                'name'              => $checkuser->name.' '.$checkuser->lname,
                                'email'             => $checkuser->email,
                                'mobile'            => $checkuser->mobile,
                                'is_user_login'     => 1
                                );
            $this->session->set($session_data);
            $this->response_to_json(true, "Signed In Successfully.", $checkuser);
        }
    }
    public function signOut()
    {
        $this->session                  = \Config\Services::session();
        $apiStatus                      = true;
        $apiMessage                     = 'Sign Out Successfully !!!';
        $apiResponse                    = [];
        $this->session->destroy();
        $apiResponse['redirectUrl']     = base_url('signin');
        $this->response_to_json($apiStatus, $apiMessage, $apiResponse);
    }
    public function dashboard()
    {
        $this->session              = \Config\Services::session();
        if (!$this->session->get('is_user_login')) {
            return redirect()->to(base_url('/signin'));
        }
        $title                      = 'Dashboard';
        $this->common_model         = new CommonModel();
        $postData['common_model']   = $this->common_model;
        $postData['session']        = $this->session;
        $page_name                  = 'dashboard';
        $data['user_id']            = $this->session->get('user_id');
        $data['user']               = $this->common_model->find_data('sms_users', 'row', ['id' => $data['user_id']]);
        echo $this->front_layout($title, $page_name, $data);
    }
    public function profile()
    {
        $this->session              = \Config\Services::session();
        if (!$this->session->get('is_user_login')) {
            return redirect()->to(base_url('/signin'));
        }
        $title                      = 'Profile';
        $this->common_model         = new CommonModel();
        $postData['common_model']   = $this->common_model;
        $postData['session']        = $this->session;
        $page_name                  = 'profile';
        $data['user_id']            = $this->session->get('user_id');
        $data['user']               = $this->common_model->find_data('sms_users', 'row', ['id' => $data['user_id']]);
        echo $this->front_layout($title, $page_name, $data);
    }
    public function profilePost()
    {
        $this->session          = \Config\Services::session();
        $user_id                = $this->session->get('user_id');
        $postData               = $this->request->getPost();
        $this->common_model     = new CommonModel();
        $check_phone            = $this->common_model->find_data('sms_users', 'count', ['mobile' => $postData['mobile'], 'published!=' => 3, 'id!=' => $user_id]);
        if ($check_phone>0) {
            $this->response_to_json(false, "Mobile Number Already Exists !!!", []);
        } else {
            $fields = [
                    'name'              => $postData['name'],
                    'lname'             => $postData['lname'],
                    'company_name'      => $postData['company_name'],
                    'designation'       => $postData['designation'],
                    'mobile'            => $postData['mobile'],
                    'office_no'         => $postData['office_no'],
                    'updated_at'        => date('Y-m-d H:i:s')
                ];
            $this->common_model->save_data('sms_users', $fields, $user_id, 'id');
            $session_data = array(
                                'name'              => $postData['name'].' '.$postData['lname'],
                                'mobile'            => $postData['mobile']
                                );
            $this->session->set($session_data);
            $this->response_to_json(true, "Profile Updated Successfully !!!", []);
        }
    }
    public function changePassword()
    {
        $this->session              = \Config\Services::session();
        if (!$this->session->get('is_user_login')) {
            return redirect()->to(base_url('/signin'));
        }
        $title                      = 'Change Password';
        $this->common_model         = new CommonModel();
        $postData['common_model']   = $this->common_model;
        $postData['session']        = $this->session;
        $page_name                  = 'change-password';
        $data['user_id']            = $this->session->get('user_id');
        $data['user']               = $this->common_model->find_data('sms_users', 'row', ['id' => $data['user_id']]);
        echo $this->front_layout($title, $page_name, $data);
    }
    public function changePasswordPost()
    {
        $this->session          = \Config\Services::session();
        $user_id                = $this->session->get('user_id');
        $postData               = $this->request->getPost();
        $this->common_model     = new CommonModel();
        $checkUser            = $this->common_model->find_data('sms_users', 'row', ['id' => $user_id]);
        if (empty($checkUser)) {
            $this->response_to_json(false, "Authenticate User !!!", []);
        } else {
            if ($checkUser->password == md5($postData['old_password'])) {
                $fields = [
                        'password'          => md5($postData['new_password']),
                        'password_original' => $postData['new_password'],
                        'updated_at'        => date('Y-m-d H:i:s')
                    ];
                $this->common_model->save_data('sms_users', $fields, $user_id, 'id');
                $this->response_to_json(true, "Password Updated Successfully !!!", []);
            } else {
                $this->response_to_json(false, "Incorrect Old Password !!!", []);
            }
        }
    }
    public function bookingList()
    {
        $this->session              = \Config\Services::session();
        if (!$this->session->get('is_user_login')) {
            return redirect()->to(base_url('/signin'));
        }
        $title                      = 'Ticket Booking List';
        $this->common_model         = new CommonModel();
        $postData['common_model']   = $this->common_model;
        $postData['session']        = $this->session;
        $page_name                  = 'booking-list';
        $data['user_id']            = $this->session->get('user_id');
        $data['user']               = $this->common_model->find_data('sms_users', 'row', ['id' => $data['user_id']]);
        $orderBy[0]                 = ['field' => 'id', 'type' => 'DESC'];
        $data['bookings']           = $this->common_model->find_data('bookings', 'array', ['user_id' => $data['user_id']], '', '', '', $orderBy);
        echo $this->front_layout($title, $page_name, $data);
    }
    public function newBooking()
    {
        $this->session              = \Config\Services::session();
        if (!$this->session->get('is_user_login')) {
            return redirect()->to(base_url('/signin'));
        }
        $title                      = 'New Booking';
        $this->common_model         = new CommonModel();
        $postData['common_model']   = $this->common_model;
        $postData['session']        = $this->session;
        $page_name                  = 'new-booking';
        $data['user_id']            = $this->session->get('user_id');
        $data['user']               = $this->common_model->find_data('sms_users', 'row', ['id' => $data['user_id']]);
        $data['plans']              = $this->common_model->find_data('package_plans', 'array', ['published' => 1]);
        if ($this->request->getPost()) {
            /* booking number generate */
            $orderBy[0] = ['field' => 'id', 'type' => 'DESC'];
            $checkBooking = $this->common_model->find_data('bookings', 'row', '', '', '', '', $orderBy);
            if ($checkBooking) {
                $slNo               = $checkBooking->sl_no+1;
                $booking_no         = 'INFOCOM/'.date('Y').'/'.str_pad($slNo, 5, 0, STR_PAD_LEFT);
            } else {
                $slNo               = 1;
                $booking_no         = 'INFOCOM/'.date('Y').'/'.str_pad($slNo, 5, 0, STR_PAD_LEFT);
            }
            /* booking number generate */
            $subtotal = 0.00;
            $plan_id = $this->request->getPost('plan_id');
            if (!empty($plan_id)) {
                for ($k=0;$k<count($plan_id);$k++) {
                    $plan = $this->common_model->find_data('package_plans', 'row', ['id' => $plan_id[$k]]);
                    if ($plan) {
                        $subtotal += $plan->package_price;
                    }
                }
            }
            $qty            = count($this->request->getPost('booking_name'));
            $bookingAmount  = $subtotal * $qty;
            if ($qty >= 3) {
                $discountPercent    = 20.00;
            } else {
                $discountPercent    = 0.00;
            }
            $discountAmount         = ($bookingAmount * $discountPercent)/100;
            $discountedAmount       = ($bookingAmount - $discountAmount);
            $gstPercent             = 18.00;
            $gstAmount              = ($discountedAmount * $gstPercent)/100;
            $grandTotal             = $discountedAmount + $gstAmount;
            $fields = [
                'event_id'              => 1,
                'sl_no'                 => $slNo,
                'booking_no'            => $booking_no,
                'user_id'               => $this->session->get('user_id'),
                'booking_date'          => date('Y-m-d'),
                'booking_time'          => date('H:i:s'),
                'booking_day'           => json_encode($this->request->getPost('plan_id')),
                'booking_name'          => json_encode($this->request->getPost('booking_name')),
                'booking_email'         => json_encode($this->request->getPost('booking_email')),
                'booking_phone'         => json_encode($this->request->getPost('booking_phone')),
                'booking_company'       => json_encode($this->request->getPost('booking_company')),
                'booking_designation'   => json_encode($this->request->getPost('booking_designation')),
                'qty'                   => $qty,
                'booking_amount'        => $bookingAmount,
                'discount_percent'      => $discountPercent,
                'discount_amount'       => $discountAmount,
                'discounted_amount'     => $discountedAmount,
                'gst_percent'           => $gstPercent,
                'gst_amount'            => $gstAmount,
                'grand_total'           => $grandTotal,
            ];
            //pr($fields);
            $booking_id = $this->common_model->save_data('bookings', $fields, '', 'id');
            return redirect()->to(base_url('checkout/'.encoded($booking_id)));
        }
        echo $this->front_layout($title, $page_name, $data);
    }
    public function checkout($booking_id)
    {
        $this->session              = \Config\Services::session();
        if (!$this->session->get('is_user_login')) {
            return redirect()->to(base_url('/signin'));
        }
        $title                      = 'Checkout';
        $this->common_model         = new CommonModel();
        $postData['common_model']   = $this->common_model;
        $postData['session']        = $this->session;
        $page_name                  = 'checkout';
        $data['user_id']            = $this->session->get('user_id');
        $data['user']               = $this->common_model->find_data('sms_users', 'row', ['id' => $data['user_id']]);
        $booking_id                 = decoded($booking_id);
        $data['booking']            = $this->common_model->find_data('bookings', 'row', ['id' => $booking_id]);

        $data['return_url']         = base_url('frontend/callback');
        $data['surl']               = base_url('payment-success/'.encoded($booking_id));
        $data['furl']               = base_url('payment-failure/'.encoded($booking_id));

        echo $this->front_layout($title, $page_name, $data);
    }
    // initialized cURL Request
    private function get_curl_handle($payment_id, $amount)
    {
        $url = 'https://api.razorpay.com/v1/payments/'.$payment_id.'/capture';
        $key_id = RAZOR_KEY_ID;
        $key_secret = RAZOR_KEY_SECRET;
        $fields_string = "amount=$amount";
        //cURL Request
        $ch = curl_init();
        //set the url, number of POST vars, POST data
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_USERPWD, $key_id.':'.$key_secret);
        curl_setopt($ch, CURLOPT_TIMEOUT, 60);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
        curl_setopt($ch, CURLOPT_CAINFO, dirname(__FILE__).'/ca-bundle.crt');
        return $ch;
    }
    // callback method
    public function callback()
    {
        // !empty($this->request->getPost('razorpay_payment_id')) &&
        if (!empty($this->request->getPost('merchant_order_id'))) {
            $razorpay_payment_id = $this->request->getPost('razorpay_payment_id');
            $merchant_order_id = $this->request->getPost('merchant_order_id');
            $currency_code = 'INR';
            $amount = $this->request->getPost('merchant_total');
            $success = false;
            $error = '';
            //echo '<pre>';print_r($_POST);die;
            try {
                $ch = $this->get_curl_handle($razorpay_payment_id, $amount);
                //execute post
                $result = curl_exec($ch);
                $http_status = curl_getinfo($ch, CURLINFO_HTTP_CODE);

                if ($result === false) {
                    $success = false;
                    $error = 'Curl error: '.curl_error($ch);
                } else {
                    $response_array = json_decode($result, true);
                    echo "<pre>";
                    print_r($response_array);
                    exit;
                    die;
                    //Check success response
                    if ($http_status === 200 and isset($response_array['error']) === false) {
                        $success = true;
                    } else {
                        $success = false;
                        // echo "<pre>";print_r($response_array);exit;
                        if (!empty($response_array['error']['code'])) {
                            $error = $response_array['error']['code'].':'.$response_array['error']['description'];
                        } else {
                            $error = 'RAZORPAY_ERROR:Invalid Response <br/>'.$result;
                        }
                    }
                }
                //close connection
                curl_close($ch);
            } catch (Exception $e) {
                $success = false;
                $error = 'OPENCART_ERROR:Request to Razorpay Failed';
            }
            if ($success === true) {
                // if(!empty($this->session->userdata('ci_subscription_keys'))) {
                //     $this->session->unset_userdata('ci_subscription_keys');
                // }
                $booking_id = $response_array['description'];
                //echo '<pre>';print_r($response_array);die;
                /* update payment */
                $paymentData = [
                    'payment_status' => 1,
                    'payment_mode' => 'Razor Pay',
                    'txn_id' => $response_array['id'],
                    'payment_date_time' => date('Y-m-d H:i:s')
                ];
                $this->common_model->save_data('bookings', $paymentData, $booking_id, 'id');
                $booking            = $this->common_model->find_data('bookings', 'row-array', ['id' => $booking_id]);
                $maildata           = $booking;
                $html               = view('front/mail_template/booking-template', $maildata);

                $user               = $this->common_model->find_data('sms_users', 'row', ['id' => $booking['user_id']]);
                //pr($user);
                $site_setting       = $this->common_model->find_data('sms_site_settings', 'row');
                $this->common_model->sendEmail(strtolower($user->email), $site_setting->site_name. ' :: Booking Successfully Completed', $html);

                /* update payment */
                if ($success === true) {
                    return redirect()->to(base_url('payment-success/'.encoded($booking_id)));
                } else {
                    return redirect()->to(base_url('payment-failure/'.encoded($booking_id)));
                }
            } else {
                //redirect($this->request->getPost('merchant_furl_id'));
                //redirect(base_url().'order-success/'.urlencode(base64_encode($booking_id)));
            }
        } else {
            echo 'An error occured. Contact site administrator, please!';
        }
    }

    public function callback_payment($razorpay_payment_id, $merchant_order_id, $merchant_trans_id, $merchant_product_info_id, $merchant_total, $merchant_amount)
    {
        // !empty($this->request->getPost('razorpay_payment_id')) &&
        $razorpay_payment_id        = decoded($razorpay_payment_id);
        $merchant_order_id          = decoded($merchant_order_id);
        $merchant_trans_id          = decoded($merchant_trans_id);
        $merchant_product_info_id   = decoded($merchant_product_info_id);
        $merchant_total             = decoded($merchant_total);
        $merchant_amount            = decoded($merchant_amount);
        $currency_code              = 'INR';
        $amount                     = $merchant_total;
        $success                    = false;
        $error                      = '';
        //echo $amount;

        try {
            $ch = $this->get_curl_handle($razorpay_payment_id, $amount);
            //execute post
            $result = curl_exec($ch);
            $http_status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            //echo '<pre>';print_r($result);die;
            if ($result === false) {
                $success = false;
                $error = 'Curl error: '.curl_error($ch);
            } else {
                $response_array = json_decode($result, true);
                //echo "<pre>";print_r($response_array);exit;die;
                //Check success response
                if ($http_status === 200 and isset($response_array['error']) === false) {
                    $success = true;
                } else {
                    $success = false;
                    // echo "<pre>";print_r($response_array);exit;
                    if (!empty($response_array['error']['code'])) {
                        $error = $response_array['error']['code'].':'.$response_array['error']['description'];
                    } else {
                        $error = 'RAZORPAY_ERROR:Invalid Response <br/>'.$result;
                    }
                }
            }
            //close connection
            curl_close($ch);
        } catch (Exception $e) {
            $success = false;
            $error = 'OPENCART_ERROR:Request to Razorpay Failed';
        }
        if ($success === true) {
            // if(!empty($this->session->userdata('ci_subscription_keys'))) {
            //     $this->session->unset_userdata('ci_subscription_keys');
            // }
            $booking_id = $response_array['description'];
            //echo '<pre>';print_r($response_array);die;
            /* update payment */
            $paymentData = [
                'payment_status' => 1,
                'payment_mode' => 'Razor Pay',
                'txn_id' => $response_array['id'],
                'payment_date_time' => date('Y-m-d H:i:s')
            ];
            $this->common_model->save_data('bookings', $paymentData, $booking_id, 'id');
            $booking            = $this->common_model->find_data('bookings', 'row-array', ['id' => $booking_id]);
            $maildata           = $booking;
            $html               = view('front/mail_template/booking-template', $maildata);

            $user               = $this->common_model->find_data('sms_users', 'row', ['id' => $booking['user_id']]);
            //pr($user);
            $site_setting       = $this->common_model->find_data('sms_site_settings', 'row');
            $this->common_model->sendEmail(strtolower($user->email), $site_setting->site_name. ' :: Booking Successfully Completed', $html);

            /* update payment */
            if ($success === true) {
                return redirect()->to(base_url('payment-success/'.encoded($booking_id)));
            } else {
                return redirect()->to(base_url('payment-failure/'.encoded($booking_id)));
            }
        } else {
            //redirect($this->request->getPost('merchant_furl_id'));
            //redirect(base_url().'order-success/'.urlencode(base64_encode($booking_id)));
        }
    }
    public function paymentSuccess($id)
    {
        $this->session              = \Config\Services::session();
        if (!$this->session->get('is_user_login')) {
            return redirect()->to(base_url('/signin'));
        }
        $title                      = 'Payment Success';
        $this->common_model         = new CommonModel();
        $postData['common_model']   = $this->common_model;
        $postData['session']        = $this->session;
        $page_name                  = 'payment-success';
        $data['user_id']            = $this->session->get('user_id');
        $data['user']               = $this->common_model->find_data('sms_users', 'row', ['id' => $data['user_id']]);
        $booking_id                 = decoded($id);
        $data['booking']            = $this->common_model->find_data('bookings', 'row', ['id' => $booking_id]);
        echo $this->front_layout($title, $page_name, $data);
    }
    public function paymentFailure($id)
    {
        $this->session              = \Config\Services::session();
        if (!$this->session->get('is_user_login')) {
            return redirect()->to(base_url('/signin'));
        }
        $title                      = 'Payment Failure';
        $this->common_model         = new CommonModel();
        $postData['common_model']   = $this->common_model;
        $postData['session']        = $this->session;
        $page_name                  = 'payment-failure';
        $data['user_id']            = $this->session->get('user_id');
        $data['user']               = $this->common_model->find_data('sms_users', 'row', ['id' => $data['user_id']]);
        $booking_id                 = decoded($id);
        $data['booking']            = $this->common_model->find_data('bookings', 'row', ['id' => $booking_id]);
        echo $this->front_layout($title, $page_name, $data);
    }

    public function wishlist()
    {
        $this->session              = \Config\Services::session();
        if (!$this->session->get('is_user_login')) {
            return redirect()->to(base_url('/signin'));
        }
        $title                      = 'Wishlist';
        $this->common_model         = new CommonModel();
        $postData['common_model']   = $this->common_model;
        $postData['session']        = $this->session;
        $page_name                  = 'wishlist';
        $data['user_id']            = $this->session->get('user_id');
        $data['user']               = $this->common_model->find_data('sms_users', 'row', ['id' => $data['user_id']]);
        echo $this->front_layout($title, $page_name, $data);
    }

    public function phoneCheck()
    {
        $postData               = $this->request->getPost();
        $this->common_model     = new CommonModel();
        $check_phone            = $this->common_model->find_data('sms_users', 'count', ['mobile' => $postData['mobile'], 'published!=' => 3]);
        if ($check_phone>0) {
            $this->response_to_json(false, "Mobile Number Already Exists !!!", []);
        } else {
            $this->response_to_json(true, "Mobile Number Available !!!", []);
        }
    }
    public function emailCheck()
    {
        $postData               = $this->request->getPost();
        $this->common_model     = new CommonModel();
        $check_email            = $this->common_model->find_data('sms_users', 'count', ['email' => $postData['email'], 'published!=' => 3]);
        if ($check_email>0) {
            $this->response_to_json(false, "Email Already Exists !!!", []);
        } else {
            $this->response_to_json(true, "Email Available !!!", []);
        }
    }
    public function validEmail($email)
    {
        // First, we check that there's one @ symbol, and that the lengths are right
        if (!preg_match("/^[^@]{1,64}@[^@]{1,255}$/", $email)) {
            // Email invalid because wrong number of characters in one section, or wrong number of @ symbols.
            return false;
        }
        // Split it into sections to make life easier
        $email_array = explode("@", $email);
        $local_array = explode(".", $email_array[0]);
        for ($i = 0; $i < sizeof($local_array); $i++) {
            if (!preg_match("/^(([A-Za-z0-9!#$%&'*+\/=?^_`{|}~-][A-Za-z0-9!#$%&'*+\/=?^_`{|}~\.-]{0,63})|(\"[^(\\|\")]{0,62}\"))$/", $local_array[$i])) {
                return false;
            }
        }
        if (!preg_match("/^\[?[0-9\.]+\]?$/", $email_array[1])) { // Check if domain is IP. If not, it should be valid domain name
            $domain_array = explode(".", $email_array[1]);
            if (sizeof($domain_array) < 2) {
                return false; // Not enough parts to domain
            }
            for ($i = 0; $i < sizeof($domain_array); $i++) {
                if (!preg_match("/^(([A-Za-z0-9][A-Za-z0-9-]{0,61}[A-Za-z0-9])|([A-Za-z0-9]+))$/", $domain_array[$i])) {
                    return false;
                }
            }
        }

        return true;
    }
    public function setCookie()
    {
        helper('cookie');
        $base_url = base_url();
        $this->response->setCookie('infocom', $base_url, 360000, "indiainfocom.com");
        //echo get_cookie("infocom");
        $this->response_to_json(true, "Successfully Consent !!!", []);
    }

    public function login_with_fb()
    {
    }
}
