<?php
/**
 * Manging JW platform API's
 */

namespace App\Controllers\admin;

use App\Controllers\BaseController;
use App\Models\CommonModel;
use DB;

class Manage_jwplatformapis extends BaseController
{
    private $model;

    protected $rest_api_base_url= 'https://api.jwplayer.com/v2/';


    public function __construct()
    {
        $session = \Config\Services::session();
        if (!$session->get('is_admin_login')) {
            return redirect()->to('/Administrator');
        }
        $model = new CommonModel();
        $this->data = array(
            'model'         => $model,
            'session'       => $session,
            'module'        => 'Jwplatform-apis',
            'controller'    => 'manage_jwplatformapis',
            'table_name'    => 'abp_jwplatform_medias',
            'primary_key'   => 'media_id'
        );

        helper(['common']);
    }

    /**
     * endpoint:- https://api.jwplayer.com/v2/sites/{site_id}/media/
     * get list of medias
     */
    public function fetchListingOfMedia()
    {
        $end_point= 'sites/c7XnABhu/media/';

        $response= perform_http_request('GET', $this->rest_api_base_url . $end_point);

        $data['mediaList'] = json_decode($response);
        $data['moduleDetail']       = $this->data;
        $title                      = 'Manage '.$this->data['module'];
        $page_name                  = 'jwplatform-medias/media-list';
        $data['row']= [];

        //view
        echo $this->layout_after_login($title, $page_name, $data);
    }

    public function getMediaByCode($media_code="")
    {
        $end_point= 'sites/c7XnABhu/media/' . $media_code;

        $response= perform_http_request('GET', $this->rest_api_base_url . $end_point);

        return json_decode($response);
    }
}
