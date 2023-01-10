<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

class Facebook extends BaseConfig
{
    public $facebook_app_id='564063147297627';

    public $facebook_app_secret='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';

    public $facebook_login_type='web';

    public $facebook_login_redirect_url='auth_redirect';

    public $facebook_logout_redirect_url= 'auth_redirect/home';

    public $facebook_permissions= array('public_profile', 'publish_actions', 'email');

    public $facebook_graph_version='15.0';

    public $facebook_auth_on_load=true;
}
