<?php
// GENERATED CODE -- DO NOT EDIT!

namespace ZMDev\Fate\Pb;

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
     * @param \ZMDev\Fate\Pb\UpdatePasswordMsg $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function UpdatePassword(\ZMDev\Fate\Pb\UpdatePasswordMsg $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ZMDev.Fate.pb.UserService/UpdatePassword',
        $argument,
        ['\ZMDev\Fate\Pb\Unused', 'decode'],
        $metadata, $options);
    }

    /**
     * @param \ZMDev\Fate\Pb\User $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function Register(\ZMDev\Fate\Pb\User $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ZMDev.Fate.pb.UserService/Register',
        $argument,
        ['\ZMDev\Fate\Pb\UserID', 'decode'],
        $metadata, $options);
    }

}
