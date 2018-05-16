<?php
// GENERATED CODE -- DO NOT EDIT!

namespace ZMDev\Fate\Pb;

/**
 */
class CertificateServiceClient extends \Grpc\BaseStub {

    /**
     * @param string $hostname hostname
     * @param array $opts channel options
     * @param \Grpc\Channel $channel (optional) re-use channel object
     */
    public function __construct($hostname, $opts, $channel = null) {
        parent::__construct($hostname, $opts, $channel);
    }

    /**
     * @param \ZMDev\Fate\Pb\Certificate $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function Update(\ZMDev\Fate\Pb\Certificate $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ZMDev.fate.pb.CertificateService/Update',
        $argument,
        ['\ZMDev\Fate\Pb\Unused', 'decode'],
        $metadata, $options);
    }

}
