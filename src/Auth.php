<?php

namespace ZMDev\FateSDK;

use Illuminate\Http\Request;

class Auth
{
    private $config;

    public function __construct($config)
    {
        $this->config = $config;
    }

    public function needLogin(Request $request)
    {
        if (!$request->cookies->has('ticket_id')) {
            return true;
        }
        return app(LoginChecker::class)->check($request->cookies->get('ticket_id'));
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
            'callback' => url()->previous(),
            'app_id' => $this->config['app_id']
        ]);
        return redirect($this->config['url'] . '/login?' . $rawQuery);
    }


    public function logout()
    {
        //todo
    }
}
