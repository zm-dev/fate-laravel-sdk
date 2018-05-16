<?php

namespace ZMDev\FateSDK;

use Illuminate\Http\Request;

class Auth
{
    private $config;
    private $loginChecker;

    public function __construct($config, LoginChecker $loginChecker)
    {
        $this->config = $config;
        $this->loginChecker = $loginChecker;
    }

    public function needLogin()
    {
        if (!isset($_COOKIE['ticket_id'])) {
            return true;
        }
        return !$this->loginChecker->check($_COOKIE['ticket_id']);
    }

    public function login()
    {
        switch ($this->config['login_method']) {
            case 'redirect':
                return $this->redirectToLogin();
                break;
            default:
                return $this->redirectToLogin();
        }
    }

    public function redirectToLogin()
    {
        $rawQuery = http_build_query([
            'callback' => url()->current(),
            'app_id' => $this->config['app_id']
        ]);
        return redirect($this->config['url'] . '/?' . $rawQuery);
    }


    public function logout()
    {
        if (isset($_COOKIE['ticket_id'])) {
            $this->loginChecker->logout($_COOKIE['ticket_id']);
        }
    }
}
