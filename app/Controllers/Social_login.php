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
        $session = \Config\Services::session();
        $db = \Config\Database::connect();
        $this->common_model         = new CommonModel();
    }

    public function index()
    {
        $session = \Config\Services::session();

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
        if ($session->has('ulogin')) {
            $data['userData']= $session->get();
        }
        echo $this->front_layout($title, $page_name, $data);
    }

    public function saveUsersData()
    {
        // Decode json data and get user profile data
        $postData = json_decode($_POST['userData']);

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


            //return user ID
            return $userID ? $userID : false;
        }
    }
}
