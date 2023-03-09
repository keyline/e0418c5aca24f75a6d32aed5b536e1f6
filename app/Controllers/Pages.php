<?php

namespace App\Controllers;

use CodeIgniter\Exceptions\PageNotFoundException; // Add this line

class Pages extends BaseController
{
    public function __construct()
    {
        $session = \Config\Services::session();
        //$db = \Config\Database::connect();
    }

    public function index()
    {
        return view('welcome_message');
    }

    public function view($page = 'home')
    {
        if (! is_file(APPPATH . 'Views/front/pages/' . $page . '.php')) {
            // Whoops, we don't have a page for that!
            throw new PageNotFoundException($page);
        }

        $data['title'] = ucfirst($page); // Capitalize the first letter
        $title= $data['title'];
        $page_name=$data['title'];
        $data['header_ads']="";
        $data['right_ads']="";
        $data['bottom_ads']="";
        $data['vertical_ads']="";
        $data['media']="";
        $data['social_share_ui']="";
        $data['show_details']="";
        $data['allepisodes']  ="";

        echo $this->front__details_layout($title, $page_name, $data);
    }
}
