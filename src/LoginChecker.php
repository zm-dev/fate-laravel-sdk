<?php

namespace ZMDev\FateSDK;

use ZMDev\FateSDK\Exceptions\FateException;
use ZMDev\Fate\Pb\LoginCheckerClient;
use ZMDev\Fate\Pb\LoginCheckRes;
use ZMDev\Fate\Pb\TicketID;

class LoginChecker
{
    private $accessToken;
    private $config;
    private $client;
    private $loginCheckRes = [];

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
        if (!isset($this->loginCheckRes[$ticketID])) {
            $token = $this->accessToken->getToken();
            $t = new TicketID();
            $t->setId($ticketID);
            /**
             * @var $loginCheckRes LoginCheckRes
             */
            list($loginCheckRes, $status) = $this->client->check($t, [
                $this->config['access_token_key'] => [$token],
            ], ['timeout' => $this->config['rpc_timeout']])->wait();
            if ($status->code != 0) {
                throw new FateException($status->details);
            }
            $this->loginCheckRes[$ticketID] = $loginCheckRes;
        }
        return $this->loginCheckRes[$ticketID];
    }

    public function logout($ticketID)
    {
        $token = $this->accessToken->getToken();
        $t = new TicketID();
        $t->setId($ticketID);
        list($unused, $status) = $this->client->logout($t, [
            $this->config['access_token_key'] => [$token],
        ], ['timeout' => $this->config['rpc_timeout']])->wait();
        if ($status->code != 0) {
            throw new FateException($status->details);
        }
    }
}


