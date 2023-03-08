<?php

namespace App\Controllers;

use App\Models\CommonModel;
use App\Models\Menu;
use DB;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\Response;

//use phpDocumentor\Reflection\Types\Null_;

class AjaxController extends BaseController
{
    public function __construct()
    {
    }

    public function index()
    {
    }

    public function checkLoggedInStatus()
    {
        if ($this->request->isAJAX()) {
            $input= $this->request->getJSON();

            if ($input->query === 'start_poll') {
                $session = \Config\Services::session();
                $db = \Config\Database::connect();

                if (is_null($session->get('sess_logged_in'))) {
                    //return false
                    $output= json_encode(array(
                        'status'=> false,
                        'next'  => 'soft login',
                    ));
                } else {
                    //return user id
                    $output= json_encode(array(
                        'status'=> true,
                        'userid'=> $session->get('logged_in_id')
                    ));
                }



                // $this->response->setStatusCode(Response::HTTP_OK);
                // $this->response->setBody($output);
                // $this->response->setHeader('Content-type', 'application/json');
                // $this->response->noCache();

                // // Sends the output to the browser
                // // This is typically handled by the framework
                // $this->response->send();
                echo $output;
                exit();
            }
        }
        return false;
    }
}
