<?php
// GENERATED CODE -- DO NOT EDIT!

namespace ZMDev\FateSDK\Pb;

/**
 */
class AccessTokenServiceClient extends \Grpc\BaseStub {

    /**
     * @param string $hostname hostname
     * @param array $opts channel options
     * @param \Grpc\Channel $channel (optional) re-use channel object
     */
    public function __construct($hostname, $opts, $channel = null) {
        parent::__construct($hostname, $opts, $channel);
    }

    /**
     * 获取 access token
     * @param \ZMDev\FateSDK\Pb\Credential $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function Token(\ZMDev\FateSDK\Pb\Credential $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ZMDev.FateSDK.pb.AccessTokenService/Token',
        $argument,
        ['\ZMDev\FateSDK\Pb\AccessToken', 'decode'],
        $metadata, $options);
    }

}
