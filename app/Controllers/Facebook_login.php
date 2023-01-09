<?php

namespace App\Controllers;

use App\Models\CommonModel;
use App\Models\Menu;
use DB;

class Facebook_Login extends BaseController
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

    public function saveUsersData()
    {
        // Decode json data and get user profile data
        $postData = json_decode($_POST['userData']);

        // Preparing data for database insertion
        $userData['oauth_provider'] = $_POST['oauth_provider'];
        $userData['oauth_uid']         = $postData->id;
        $userData['first_name']     = $postData->first_name;
        $userData['last_name']         = $postData->last_name;
        $userData['email']             = $postData->email;
        $userData['gender']         = $postData->gender;
        $userData['locale']         = $postData->locale;
        $userData['cover']             = $postData->cover->source;
        $userData['picture']         = $postData->picture->data->url;
        $userData['link']             = $postData->link;

        $model= new CommonModel();


        // Insert or update user data
        $userID = $model->checkUser($userData);

        return true;
    }
}
