<?php

namespace App\Controllers;

use App\Models\CommonModel;
use App\Models\Menu;
use DB;
use phpDocumentor\Reflection\Types\Null_;

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
        $userID = $data['user_id']            = $this->session->get('user_id');
        $title                      = 'Home';
        $this->common_model         = new CommonModel();
        $postData['common_model']   = $this->common_model;
        $page_name                  = 'home';
        $data['header_ads']         = $this->common_model->find_data('sms_advertisment', 'row', ['published!=' => 3, 'position' => 'Header' , 'orientation=' => 'horizontal' ]);
        $data['right_ads']          = $this->common_model->find_data('sms_advertisment', 'row', ['published!=' => 3, 'position' => 'Right-side' , 'orientation=' => 'horizontal' ]);
        $data['bottom_ads']         = $this->common_model->find_data('sms_advertisment', 'row', ['published!=' => 3, 'position' => 'Body' , 'orientation=' => 'horizontal' ]);
        $data['vertical_ads']       = $this->common_model->find_data('sms_advertisment', 'row', ['published!=' => 3, 'position' => 'Right-side' , 'orientation=' => 'vertical' ]);
        $orderBy[0]                 = ['field' => 'id', 'type' => 'DESC'];
        $data['poll_question']      = $this->common_model->find_data('sms_poll', 'row', ['published=' => 1 ] , '','','',$orderBy,1);
        $data['poll_count']         = $this->common_model->find_data('sms_poll', 'count', ['published=' => 1 ],'','','');
        // pr($data['poll_count']);
        if($data['poll_question'] != Null ){
            $data['poll_options']       = $this->common_model->find_data('sms_poll_option', 'array', ['published!=' => 3 , 'poll_id=' => $data['poll_question']->id ]);
        }

        $orderBy[0]                 = ['field' => 'question_id', 'type' => 'DESC'];
        $data['quiz_options']       = $this->common_model->find_data('abp_quiz_questions', 'row', ['question_active=' => 1] ,'','','',$orderBy,1);
        $data['quiz_count']         = $this->common_model->find_data('abp_quiz_questions', 'count', ['question_active=' => 1 ],'','','');
        // pr($data['quiz_count']);
        if($data['quiz_options'] != Null ){
            $data['quiz_choices']       = $this->common_model->find_data('abp_quiz_question_choices', 'array', ['question_active!=' => 3 , 'choice_question_id=' => $data['quiz_options']->question_id ]);
          }

        if($this->request->getPost('mode') == 'updateleadstatus'){
            // pr($this->request->getPost());
            $q = $this->request->getPost('question');
            $c  = $this->request->getPost('choice');
            $checkUser = $this->common_model->find_data('abp_user_question_answer', 'count', ['user_id' => $userID , 'answer_question_id=' => $q ]);
            $checkAnswer = $this->common_model->find_data('abp_quiz_question_choices', 'row', ['choice_question_id' => $q , 'choice_id=' => $c , 'question_active !=' => 3 ]);
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
                $record = $this->common_model->save_data('abp_user_question_answer', $postData, '', 'answer_id');
                return redirect()->to('/thank-you/');
            }
        }

        $currentDateTime            = date('Y-m-d h:i:s');
        $currentDate                = date('Y-m-d');
        $currentTime                = date('H:i:s');
        $currentDay                 = strtoupper(date('l'));
        $dateTimeZone               = $currentDate.'T'.$currentTime;
        
        $firstDateWeek              = date("Y-m-d",strtotime('monday this week'));
        $lastDateWeek               = date("Y-m-d",strtotime('sunday this week'));
        $data['currentDayPodcast']  = $this->db->query("SELECT * FROM `abp_jwplatform_medias` WHERE media_is_active != 3 AND media_publish_start_day = '$currentDay' AND (media_publish_start_datetime >= '$firstDateWeek' AND media_publish_end_datetime <= '$lastDateWeek') AND media_publish_start_datetime >= '$dateTimeZone' ORDER BY media_publish_start_datetime ASC")->getRow();

        if (empty($data['currentDayPodcast'])) {
            $data['currentDayPodcast'] = $this->db->query("SELECT * FROM `abp_jwplatform_medias` WHERE media_is_active != 3 AND media_publish_start_day = '$currentDay' AND (media_publish_start_datetime >= '$firstDateWeek' AND media_publish_end_datetime <= '$lastDateWeek') AND media_publish_start_datetime <= '$dateTimeZone' ORDER BY media_publish_start_datetime DESC")->getRow();
        }

        $firstDateNextWeek          = date("Y-m-d",strtotime('monday next week'));
        $lastDateNextWeek           = date("Y-m-d",strtotime('sunday next week'));
        $data['currentDayNextWeekPodcast']  = $this->db->query("SELECT * FROM `abp_jwplatform_medias` WHERE media_is_active != 3 AND media_publish_start_day = '$currentDay' AND (media_publish_start_datetime >= '$firstDateNextWeek' AND media_publish_end_datetime <= '$lastDateNextWeek') AND media_publish_start_datetime >= '$dateTimeZone' ORDER BY media_publish_start_datetime ASC")->getRow();

        if (empty($data['currentDayNextWeekPodcast'])) {
            $data['currentDayNextWeekPodcast'] = $this->db->query("SELECT * FROM `abp_jwplatform_medias` WHERE media_is_active != 3 AND media_publish_start_day = '$currentDay' AND (media_publish_start_datetime >= '$firstDateNextWeek' AND media_publish_end_datetime <= '$lastDateNextWeek') AND media_publish_start_datetime <= '$dateTimeZone' ORDER BY media_publish_start_datetime DESC")->getRow();
        }

        // die;
        // pr($data['currentDayNextWeekPodcast'], false);
        // echo $this->db->getLastQuery();die;
        
        $orderBy[0]                 = ['field' => 'media_id', 'type' => 'DESC'];
        $data['latestPodcasts']     = $this->common_model->find_data('abp_jwplatform_medias', 'array', ['media_is_active!=' => 3, 'media_publish_start_datetime<' => $currentDateTime], '', '', '', $orderBy, 8);
        
        /**
         * added for checking fb logged in session
         * shuvadeep@keylines.net
         * 09/01/2023
        **/
        if ($session->has('ulogin')) {
            $data['userData']= $session->get();
        }
        echo $this->front_layout($title, $page_name, $data);
    }
    public function getCurrentDayShows(){
        $apistatus                  = TRUE;
        $apiMessage                 = '';
        $apiResponse                = [];
        $this->db                   = \Config\Database::connect();
        $this->common_model         = new CommonModel();
        $dayName                    = $this->request->getPost('dayName');

        $currentDateTime            = date('Y-m-d h:i:s');
        $currentDate                = date('Y-m-d');
        $currentTime                = date('H:i:s');
        $currentDay                 = strtoupper($dayName);
        $dateTimeZone               = $currentDate.'T'.$currentTime;
        
        $firstDateWeek              = date("Y-m-d",strtotime('monday this week'));
        $lastDateWeek               = date("Y-m-d",strtotime('sunday this week'));
        $currentDayPodcast          = $this->db->query("SELECT * FROM `abp_jwplatform_medias` WHERE media_is_active != 3 AND media_publish_start_day = '$currentDay' AND (media_publish_start_datetime >= '$firstDateWeek' AND media_publish_end_datetime <= '$lastDateWeek') AND media_publish_start_datetime >= '$dateTimeZone' ORDER BY media_publish_start_datetime ASC")->getRow();

        // echo $this->db->getLastQuery();die;

        if (empty($currentDayPodcast)) {
            $currentDayPodcast      = $this->db->query("SELECT * FROM `abp_jwplatform_medias` WHERE media_is_active != 3 AND media_publish_start_day = '$currentDay' AND (media_publish_start_datetime >= '$firstDateWeek' AND media_publish_end_datetime <= '$lastDateWeek') AND media_publish_start_datetime <= '$dateTimeZone' ORDER BY media_publish_start_datetime DESC")->getRow();
        }



        $firstDateNextWeek          = date("Y-m-d",strtotime('monday next week'));
        $lastDateNextWeek           = date("Y-m-d",strtotime('sunday next week'));
        $currentDayNextWeekPodcast  = $this->db->query("SELECT * FROM `abp_jwplatform_medias` WHERE media_is_active != 3 AND media_publish_start_day = '$currentDay' AND (media_publish_start_datetime >= '$firstDateNextWeek' AND media_publish_end_datetime <= '$lastDateNextWeek') AND media_publish_start_datetime >= '$dateTimeZone' ORDER BY media_publish_start_datetime ASC")->getRow();

        if (empty($currentDayNextWeekPodcast)) {
            $currentDayNextWeekPodcast = $this->db->query("SELECT * FROM `abp_jwplatform_medias` WHERE media_is_active != 3 AND media_publish_start_day = '$currentDay' AND (media_publish_start_datetime >= '$firstDateNextWeek' AND media_publish_end_datetime <= '$lastDateNextWeek') AND media_publish_start_datetime <= '$dateTimeZone' ORDER BY media_publish_start_datetime DESC")->getRow();
        }

        // pr($currentDayPodcast,false);
        // pr($currentDayNextWeekPodcast);
        /* current week show */
        $currentShow = $this->common_model->find_data('abp_shows', 'row', ['id' => $currentDayPodcast->show_id]);
        if($dateTimeZone >= $currentDayPodcast->media_publish_start_datetime){
            $media_status = 1; // join live
        } else {
            $media_status = 0; // scheduled
        }
        /* current week show */
        /* next week show */
        $nextShow = $this->common_model->find_data('abp_shows', 'row', ['id' => $currentDayNextWeekPodcast->show_id]);
        /* next week show */
        $apiResponse = [
            'currentDayPodcast' => [
                'show_id'                       => $currentDayPodcast->show_id,
                'show_title'                    => (($currentShow)?$currentShow->show_title:''),
                'show_cover_image'              => (($currentShow)?(($currentShow->show_cover_image != '')?base_url('/uploads/show/'.$currentShow->show_cover_image):''):''),
                'media_code'                    => $currentDayPodcast->media_code,
                'encoded_media_id'              => encoded($currentDayPodcast->media_id),
                'media_title'                   => $currentDayPodcast->media_title,
                'media_description'             => $currentDayPodcast->media_description,
                'media_publish_start_day'       => $currentDayPodcast->media_publish_start_day,
                'media_publish_start_datetime'  => $currentDayPodcast->media_publish_start_datetime,
                'media_publish_end_datetime'    => $currentDayPodcast->media_publish_end_datetime,
                'media_publish_utc_datetime'    => $currentDayPodcast->media_publish_utc_datetime,
                'media_category'                => $currentDayPodcast->media_category,
                'media_author'                  => $currentDayPodcast->media_author,
                'media_type'                    => $currentDayPodcast->media_type,
                'media_status'                  => $media_status,
                'countdown_target_date_time'    => date_format(date_create($currentDayPodcast->media_publish_start_datetime), "M d, Y H:i:s"),
            ],
            'currentDayNextWeekPodcast' => [
                'show_id'                       => $currentDayNextWeekPodcast->show_id,
                'show_title'                    => (($nextShow)?$nextShow->show_title:''),
                'show_cover_image'              => (($nextShow)?(($nextShow->show_cover_image != '')?base_url('/uploads/show/'.$nextShow->show_cover_image):''):''),
                'media_code'                    => $currentDayNextWeekPodcast->media_code,
                'encoded_media_id'              => encoded($currentDayNextWeekPodcast->media_id),
                'media_title'                   => $currentDayNextWeekPodcast->media_title,
                'media_description'             => $currentDayNextWeekPodcast->media_description,
                'media_publish_start_day'       => $currentDayNextWeekPodcast->media_publish_start_day,
                'media_publish_start_datetime'  => $currentDayNextWeekPodcast->media_publish_start_datetime,
                'media_publish_end_datetime'    => $currentDayNextWeekPodcast->media_publish_end_datetime,
                'media_publish_utc_datetime'    => $currentDayNextWeekPodcast->media_publish_utc_datetime,
                'media_category'                => $currentDayNextWeekPodcast->media_category,
                'media_author'                  => $currentDayNextWeekPodcast->media_author,
                'media_type'                    => $currentDayNextWeekPodcast->media_type,
                'media_status'                  => 0,
                'countdown_target_date_time'    => date_format(date_create($currentDayNextWeekPodcast->media_publish_start_datetime), "M d, Y H:i:s"),
            ],
        ];
        // pr($apiResponse);

        $data                       = array("status" => $apistatus, "message" => $apiMessage, "response" => $apiResponse);
        header("Content-Type: application/json");
        echo json_encode($data);
        exit();
    }
    public function details($id)
    {
        $id                         = decoded($id);
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
        $data['media']              = $this->common_model->find_data('abp_jwplatform_medias', 'row', ['media_is_active!=' => 3, 'media_id' => $id ]);

        $currentDate                = date('Y-m-d');
        $show_id                    = $data['media']->show_id;
        $orderBy[0]                 = ['field' => 'media_id', 'type' => 'DESC'];
        $data['allepisodes']        = $this->common_model->find_data('abp_jwplatform_medias', 'array', ['media_is_active!=' => 3, 'show_id' => $show_id, 'media_publish_start_datetime<=' => $currentDate, 'media_id!=' => $data['media']->media_id], '', '', '', $orderBy);
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
        $data['questions']          = $this->common_model->find_data('abp_quiz_questions', 'array', ['question_active=' => 1 ], '', '', '');
        $data['header_ads']         = $this->common_model->find_data('sms_advertisment', 'row', ['published!=' => 3, 'position' => 'Header' , 'orientation=' => 'horizontal' ]);
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
        $data['header_ads']         = $this->common_model->find_data('sms_advertisment', 'row', ['published!=' => 3, 'position' => 'Header' , 'orientation=' => 'horizontal' ]);
        // pr($data['allAnswers']);
        echo $this->front_layout($title, $page_name, $data);
        // echo 'Thank You';die;
    }
    public function Applied()
    {
        $title                      = 'Applied';
        $this->common_model         = new CommonModel();
        $data['common_model']       = $this->common_model;
        $data['header_ads']         = $this->common_model->find_data('sms_advertisment', 'row', ['published!=' => 3, 'position' => 'Header' , 'orientation=' => 'horizontal' ]);
        $page_name                  = 'applied';
        echo $this->front_layout($title, $page_name, $data);
    }
    public function pollHistory()
    {
        $title                      = 'Poll History';
        $this->common_model         = new CommonModel();
        $data['common_model']       = $this->common_model;
        $data['header_ads']         = $this->common_model->find_data('sms_advertisment', 'row', ['published!=' => 3, 'position' => 'Header' , 'orientation=' => 'horizontal' ]);
        $data['rows']               = $this->common_model->find_data('abp_users', 'array', ['user_id=' => 1 ], '', '', '');
        // pr($data['rows']);
        $page_name                  = 'poll-history';
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
