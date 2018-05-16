<?php
// GENERATED CODE -- DO NOT EDIT!

namespace ZMDev\FateSDK\Pb;

/**
 */
class UserServiceClient extends \Grpc\BaseStub {

    /**
     * @param string $hostname hostname
     * @param array $opts channel options
     * @param \Grpc\Channel $channel (optional) re-use channel object
     */
    public function __construct($hostname, $opts, $channel = null) {
        parent::__construct($hostname, $opts, $channel);
    }

    /**
     * todo update password
     * @param \ZMDev\FateSDK\Pb\UserID $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function UpdatePassword(\ZMDev\FateSDK\Pb\UserID $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ZMDev.FateSDK.pb.UserService/UpdatePassword',
        $argument,
        ['\ZMDev\FateSDK\Pb\Unused', 'decode'],
        $metadata, $options);
    }

}
