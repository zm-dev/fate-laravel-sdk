<?php
// GENERATED CODE -- DO NOT EDIT!

namespace ZMDev\Fate\Pb;

/**
 */
class LoginCheckerClient extends \Grpc\BaseStub {

    /**
     * @param string $hostname hostname
     * @param array $opts channel options
     * @param \Grpc\Channel $channel (optional) re-use channel object
     */
    public function __construct($hostname, $opts, $channel = null) {
        parent::__construct($hostname, $opts, $channel);
    }

    /**
     * @param \ZMDev\Fate\Pb\TicketID $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function Check(\ZMDev\Fate\Pb\TicketID $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ZMDev.Fate.pb.LoginChecker/Check',
        $argument,
        ['\ZMDev\Fate\Pb\LoginCheckRes', 'decode'],
        $metadata, $options);
    }

    /**
     * @param \ZMDev\Fate\Pb\TicketID $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function Logout(\ZMDev\Fate\Pb\TicketID $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ZMDev.Fate.pb.LoginChecker/Logout',
        $argument,
        ['\ZMDev\Fate\Pb\Unused', 'decode'],
        $metadata, $options);
    }

}
