<?php

namespace App\Controllers;

use App\Models\CommonModel;
use App\Models\Menu;
use DB;

class Social_login extends BaseController
{
    protected $common_model;
    public function __construct()
    {
        $this->session = \Config\Services::session();
        $db = \Config\Database::connect();
        $this->common_model         = new CommonModel();
        require_once APPPATH . "ThirdParty/google-api-php-client/vendor/autoload.php";
    }

    public function index()
    {
        //$session = \Config\Services::session();

        // echo "<h1 style='text-align:center'>WEBSITE IS UNDER CONSTRUCTION. PLEASE STAY SOON. WE ARE COMING SOON ....</h1>";die;
        $title                      = 'Home';
        //$postData['common_model']   = $this->common_model;
        $page_name                  = 'home';
        $data                       = [];
        /**
         * added for checking fb logged in session
         * shuvadeep@keylines.net
         * 09/01/2023
         */
        if ($this->session->has('ulogin')) {
            $data['userData']= $this->session->get();
        }
        echo $this->front_layout($title, $page_name, $data);
    }

    public function saveUsersData()
    {
        // Decode json data and get user profile data
        $postData = json_decode($_POST['userData']);

        $this->session->set('view_data', 'Hi there I am from the session');

        // Preparing data for database insertion
        $userData['user_oauth_provider'] = $_POST['oauth_provider'];
        $userData['user_oauth_uid']         = $postData->id;
        $userData['user_first_name']     = $postData->first_name;
        $userData['user_last_name']         = $postData->last_name;
        $userData['user_email']             = $postData->email;
        $userData['user_gender']         = (isset($postData->gender)) ? $postData->gender : '';
        $userData['user_locale']         = (isset($postData->locale)) ? $postData->locale : '';
        $userData['user_cover']             = (isset($postData->cover->source)) ? $postData->cover->source : '';
        $userData['user_picture']         = (isset($postData->picture->data->url)) ? $postData->picture->data->url : '';
        $userData['user_link']             = ((isset($postData->link)) ? $postData->link : '') ;

        //$model= new CommonModel();


        // Insert or update user data
        $userID = $this->checkUser($userData);

        return true;
    }

    public function checkUser($user_data=[])
    {
        try {
            //code...

            if (!empty($user_data)) {
                //check whether user data already exists in database with same oauth info
                $conditions= array('user_oauth_provider'=>$user_data['user_oauth_provider'], 'user_oauth_uid'=>$user_data['user_oauth_uid']);
                $findUser= $this->common_model->find_data('abp_users', 'row', $conditions);

                if (!empty($findUser)) {
                    //update user data
                    $user_data['user_modified'] = date("Y-m-d H:i:s");
                    $update = $this->common_model->save_data('abp_users', $user_data, $findUser->user_id, 'user_id');

                    //get user ID
                    $userID = $findUser->user_id;
                } else {
                    //insert user data
                    $user_data['user_created']  = date("Y-m-d H:i:s");
                    $user_data['user_modified'] = date("Y-m-d H:i:s");
                    $userID = $this->common_model->save_data('abp_users', $user_data);

                    //get user ID
                    //$userID = $this->db->insert_id();
                }

                //Get user from storage
                $conditions= array('user_oauth_provider'=>$user_data['user_oauth_provider'],'user_id'=> $userID);
                $userDetails= $this->common_model->find_data('abp_users', 'row', $conditions);

                //Setting user data in session

                $session_data= array(
                    'userfullname'  => implode(' ', array($userDetails->user_first_name, $userDetails->user_last_name)),
                    // 'user_profile_img' => $userDetails->user_picture,
                    'logged_in_id'  => $userDetails->user_id,
                    'login_provider'=> $userDetails->user_oauth_provider,
                    'sess_logged_in'=> 1,

                );

                if (!empty($session_data)) {
                    $this->session->set($session_data);
                } else {
                    throw new Exception("unable to set current session !!", 1);
                }


                //return user ID
                //return $userID ? $userID : false;
                echo json_encode($session_data);
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function oauth2callback()
    {
        if ($this->request->getMethod() == 'post' && $this->request->isAJAX()) {
            $json = json_decode(file_get_contents("php://input"));

            //$config = config('GoogleCrendential');
            // Access settings as object properties
            $credential= '890714183723-hhlf2hkq306qlo81vmbecigtsjrjcj7f.apps.googleusercontent.com';

            $client = new \Google\Client(['client_id' => $credential]);  // Specify the CLIENT_ID of the app that accesses the backend
            $client->addScope("email");
            $payload = $client->verifyIdToken($json->id_token);
            if ($payload) {
                $userid = $payload['sub'];
            // If request specified a G Suite domain:
            //$domain = $payload['hd'];
            } else {
                // Invalid ID token
            }
            echo json_encode($payload);

            // if ($this->request->getPost('authProvider') == 'Google') {
            //     $userData['user_oauth_provider'] = $this->request->getPost('authProvider');
            //     $userData['user_oauth_uid']  = !empty($userData->id) ? $userData->id : '';
            //     $userData['user_first_name'] = !empty($userData->given_name) ? $userData->given_name : '';
            //     $userData['user_last_name']  = !empty($userData->family_name) ? $userData->family_name : '';
            //     $userData['user_email']      = !empty($userData->email) ? $userData->email : '';
            //     $userData['user_gender']     = !empty($userData->gender) ? $userData->gender : '';
            //     $userData['user_locale']     = !empty($userData->locale) ? $userData->locale : '';
            //     $userData['user_picture']    = !empty($userData->picture) ? $userData->picture : '';
            //     $userData['user_link']       = !empty($userData->link) ? $userData->link : '';


            //     $userID = $this->checkUser($userData);

            //     return true;
            // } else {
            //     return false;
            // }
        }
    }
}
