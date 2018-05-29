<?php

namespace ZMDev\FateSDK;

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
        return !$this->check();
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
        if (isset($_COOKIE[$this->config['ticket_id_cookie_key']])) {
            $this->loginChecker->logout($_COOKIE[$this->config['ticket_id_cookie_key']]);
            setcookie($this->config['ticket_id_cookie_key'], time() - 1);
        }
    }

    public function check()
    {
        if (!isset($_COOKIE[$this->config['ticket_id_cookie_key']])) {
            return false;
        }
        return $this->loginChecker->check($_COOKIE[$this->config['ticket_id_cookie_key']])->getIsLogin();
    }

    public function userID()
    {
        if (!isset($_COOKIE[$this->config['ticket_id_cookie_key']])) {
            return 0;
        }
        return $this->loginChecker->check($_COOKIE[$this->config['ticket_id_cookie_key']])->getUserId();
    }
}
