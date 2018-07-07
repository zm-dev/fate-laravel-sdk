<?php

namespace ZMDev\FateSDK;


use ZMDev\Fate\Pb\UpdatePasswordMsg;
use ZMDev\Fate\Pb\User;
use ZMDev\Fate\Pb\UserID;
use ZMDev\Fate\Pb\UserServiceClient;
use ZMDev\FateSDK\Exceptions\FateException;

class UserService
{
    private $accessToken;
    private $config;
    /**
     * @var UserServiceClient
     */
    private $client;

    public function __construct(AccessToken $accessToken, array $config)
    {
        $this->accessToken = $accessToken;
        $this->config = $config;
        $this->client = new UserServiceClient($this->config['rpc_hostname'], [
            'credentials' => \Grpc\ChannelCredentials::createInsecure()
        ]);
    }

    public function updatePassword($userID, $newPassword)
    {
        $token = $this->accessToken->getToken();
        $updatePasswordMsg = new UpdatePasswordMsg();
        $updatePasswordMsg->setUserId($userID);
        $updatePasswordMsg->setNewPassword($newPassword);
        list($unused, $status) = $this->client->UpdatePassword($updatePasswordMsg, [
            $this->config['access_token_key'] => [$token],
        ], ['timeout' => $this->config['rpc_timeout']])->wait();
        if ($status->code != 0) {
            throw new FateException($status->details);
        }
    }

    public function register($account, $certificateType, $password)
    {
        $token = $this->accessToken->getToken();
        $user = new User();
        $user->setAccount($account);
        $user->setCertificateType($certificateType);
        $user->setPassword($password);
        /**
         * @var $userID UserID
         */
        list($userID, $status) = $this->client->Register($user, [
            $this->config['access_token_key'] => [$token],
        ], ['timeout' => $this->config['rpc_timeout']])->wait();
        if ($status->code != 0) {
            throw new FateException($status->details);
        }
        return $userID->getId();
    }
}
