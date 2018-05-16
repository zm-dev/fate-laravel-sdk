<?php

namespace ZMDev\FateSDK;

use Psr\SimpleCache\CacheInterface;
use ZMDev\FateSDK\Pb\AccessTokenServiceClient;
use ZMDev\FateSDK\Pb\Credential;

class AccessToken
{

    private $config;
    private $cache;
    private $cacheKey = 'fate-access-token';

    public function __construct($config, CacheInterface $cache)
    {
        $this->config = $config;
        $this->cache = $cache;
    }


    public function getToken()
    {
        if ($this->cache->has($this->cacheKey)) {
            return $this->cache->get($this->cacheKey);
        }

        $accessToken = $this->requestToken($this->config['rpc_hostname'], [
            'app_id' => $this->config['app_id'],
            'app_secret' => $this->config['app_secret'],
        ]);

        $di = new \DateInterval('PT' . ($accessToken->getExpiredAt() - time() - 10) . 'S');
        $this->cache->set($this->cacheKey, $accessToken->getToken(), $di);
        return $accessToken->getToken();
    }


    /**
     * @param $hostname
     * @param array $credential
     * @return mixed|\ZMDev\Fate\Pb\AccessToken
     */
    public function requestToken($hostname, array $credential)
    {
        $accessTokenServiceClient = new AccessTokenServiceClient($hostname, [
            // dd(\Grpc\ChannelCredentials::createInsecure())
            'credentials' => \Grpc\ChannelCredentials::createInsecure(),
        ]);
        $c = new Credential();
        $c->setAppId($credential['app_id']);
        $c->setAppSecret($credential['app_secret']);
        list($accessToken, $status) = $accessTokenServiceClient->Token($c)->wait();
        return $accessToken;
    }
}