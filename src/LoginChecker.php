<?php

namespace ZMDev\FateSDK;

use ZMDev\FateSDK\Pb\LoginCheckerClient;
use ZMDev\FateSDK\Pb\LoginCheckRes;
use ZMDev\FateSDK\Pb\TicketID;

class LoginChecker
{
    private $accessToken;
    private $config;

    public function __construct(AccessToken $accessToken, array $config)
    {
        $this->accessToken = $accessToken;
        $this->config = $config;
    }

    public function check($ticketID)
    {
        $token = $this->accessToken->getToken();
        $loginCheckerClient = new LoginCheckerClient($this->config['rpc_hostname'], [
            'credentials' => \Grpc\ChannelCredentials::createInsecure(),
        ]);
        $t = new TicketID();
        $t->setId($ticketID);
        /**
         * @var $loginCheckRes LoginCheckRes
         */
        list($loginCheckRes, $status) = $loginCheckerClient->check($t, [
            $this->config['access_token_key'] => $token,
        ])->wait();
        return $loginCheckRes->getIsLogin();
    }
}


