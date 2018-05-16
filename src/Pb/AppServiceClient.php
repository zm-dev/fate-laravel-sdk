<?php
// GENERATED CODE -- DO NOT EDIT!

namespace ZMDev\Fate\Pb;

/**
 */
class AppServiceClient extends \Grpc\BaseStub {

    /**
     * @param string $hostname hostname
     * @param array $opts channel options
     * @param \Grpc\Channel $channel (optional) re-use channel object
     */
    public function __construct($hostname, $opts, $channel = null) {
        parent::__construct($hostname, $opts, $channel);
    }

    /**
     * @param \ZMDev\Fate\Pb\AppListReq $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function List(\ZMDev\Fate\Pb\AppListReq $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ZMDev.fate.pb.AppService/List',
        $argument,
        ['\ZMDev\Fate\Pb\AppList', 'decode'],
        $metadata, $options);
    }

    /**
     * @param \ZMDev\Fate\Pb\AppID $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function Find(\ZMDev\Fate\Pb\AppID $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ZMDev.fate.pb.AppService/Find',
        $argument,
        ['\ZMDev\Fate\Pb\Application', 'decode'],
        $metadata, $options);
    }

    /**
     * @param \ZMDev\Fate\Pb\Application $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function Create(\ZMDev\Fate\Pb\Application $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ZMDev.fate.pb.AppService/Create',
        $argument,
        ['\ZMDev\Fate\Pb\Application', 'decode'],
        $metadata, $options);
    }

    /**
     * @param \ZMDev\Fate\Pb\Application $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function Update(\ZMDev\Fate\Pb\Application $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ZMDev.fate.pb.AppService/Update',
        $argument,
        ['\ZMDev\Fate\Pb\Unused', 'decode'],
        $metadata, $options);
    }

    /**
     * @param \ZMDev\Fate\Pb\AppID $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function Delete(\ZMDev\Fate\Pb\AppID $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ZMDev.fate.pb.AppService/Delete',
        $argument,
        ['\ZMDev\Fate\Pb\Unused', 'decode'],
        $metadata, $options);
    }

}
