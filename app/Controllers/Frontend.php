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
        $session                    = \Config\Services::session();
        $this->db                   = \Config\Database::connect();
        $title                      = 'Home';
        $this->common_model         = new CommonModel();
        $postData['common_model']   = $this->common_model;
        $page_name                  = 'home';
        $data['header_ads']         = $this->common_model->find_data('sms_advertisment', 'row', ['published!=' => 3, 'position' => 'Header' , 'orientation=' => 'horizontal' ]);
        $data['right_ads']          = $this->common_model->find_data('sms_advertisment', 'row', ['published!=' => 3, 'position' => 'Right-side' , 'orientation=' => 'horizontal' ]);
        $data['bottom_ads']         = $this->common_model->find_data('sms_advertisment', 'row', ['published!=' => 3, 'position' => 'Body' , 'orientation=' => 'horizontal' ]);
        $data['vertical_ads']       = $this->common_model->find_data('sms_advertisment', 'row', ['published!=' => 3, 'position' => 'Right-side' , 'orientation=' => 'vertical' ]);
        $data['poll_question']      = $this->common_model->find_data('sms_poll', 'row', ['published!=' => 3 ]);
        $data['poll_options']       = $this->common_model->find_data('sms_poll_option', 'array', ['published!=' => 3 , 'poll_id=' => $data['poll_question']->id ]);

        $current_date_time          = date('Y-m-d h:i:s');
        $current_date               = date('Y-m-d');
        $current_time               = date('H:i:s');
        $date_time_zone             = $current_date.'T'.$current_time;

        $data['currentDayPodcast']  = $this->db->query("SELECT * FROM `abp_jwplatform_medias` WHERE `media_publish_start_datetime` >= '$date_time_zone' AND media_publish_start_datetime LIKE '%$current_date%' AND media_is_active != 3")->getRow();
        if (empty($data['currentDayPodcasts'])) {
            $data['currentDayPodcast'] = $this->db->query("SELECT * FROM `abp_jwplatform_medias` WHERE `media_publish_start_datetime` LIKE '%$current_date%' AND media_is_active != 3 ORDER BY media_id DESC")->getRow();
        }
        //echo $this->db->getLastQuery();
        $orderBy[0]                 = ['field' => 'media_id', 'type' => 'DESC'];
        $data['latestPodcasts']     = $this->common_model->find_data('abp_jwplatform_medias', 'array', ['media_is_active!=' => 3, 'media_publish_start_datetime<' => $current_date_time], '', '', '', $orderBy, 8);
        // pr($data['currentDayPodcast']);

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
    public function details($id)
    {
        $this->db = \Config\Database::connect();
        $title                      = 'Details';
        $this->common_model         = new CommonModel();
        $postData['common_model']   = $this->common_model;
        $page_name                  = 'details';
        $data                       = [];
        $data['header_ads']         = $this->common_model->find_data('sms_advertisment', 'row', ['published!=' => 3, 'position' => 'Header' , 'orientation=' => 'horizontal' ]);
        $data['right_ads']          = $this->common_model->find_data('sms_advertisment', 'row', ['published!=' => 3, 'position' => 'Right-side' , 'orientation=' => 'horizontal' ]);
        $data['bottom_ads']         = $this->common_model->find_data('sms_advertisment', 'row', ['published!=' => 3, 'position' => 'Body' , 'orientation=' => 'horizontal' ]);
        $data['vertical_ads']       = $this->common_model->find_data('sms_advertisment', 'row', ['published!=' => 3, 'position' => 'Right-side' , 'orientation=' => 'vertical' ]);
        $data['videos']             = $this->common_model->find_data('abp_jwplatform_medias', 'row', ['media_is_active!=' => 3, 'media_id' => $id ]);
        $data['allepisodes']           = $this->common_model->find_data('abp_jwplatform_medias', 'array', ['media_is_active!=' => 3  ], '', '', '');
        // echo $this->db->getLastQuery();die;
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
}
