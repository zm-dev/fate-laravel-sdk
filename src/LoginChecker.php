<?php

namespace ZMDev\FateSDK;

use ZMDev\FateSDK\Pb\LoginCheckerClient;
use ZMDev\FateSDK\Pb\LoginCheckRes;
use ZMDev\FateSDK\Pb\TicketID;

class LoginChecker
{
    private $accessToken;
    private $config;
    private $client;

    public function __construct(AccessToken $accessToken, array $config)
    {
        $this->accessToken = $accessToken;
        $this->config = $config;
        $this->client = new LoginCheckerClient($this->config['rpc_hostname'], [
            'credentials' => \Grpc\ChannelCredentials::createInsecure(),
        ]);
    }

    public function check($ticketID)
    {
        $token = $this->accessToken->getToken();
        $t = new TicketID();
        $t->setId($ticketID);
        /**
         * @var $loginCheckRes LoginCheckRes
         */
        list($loginCheckRes, $status) = $this->client->check($t, [
            $this->config['access_token_key'] => [$token],
        ], ['timeout' => $this->config['rpc_timeout']])->wait();
        return $loginCheckRes->getIsLogin();
    }

    public function logout($ticketID)
    {
        $token = $this->accessToken->getToken();
        $t = new TicketID();
        $t->setId($ticketID);
        list($unused, $status) = $this->client->logout($t, [
            $this->config['access_token_key'] => [$token],
        ], ['timeout' => $this->config['rpc_timeout']])->wait();
        dd($unused, $status);
    }
}


