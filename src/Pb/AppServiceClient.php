<?php
// GENERATED CODE -- DO NOT EDIT!

namespace ZMDev\FateSDK\Pb;

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
     * @param \ZMDev\FateSDK\Pb\AppListReq $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function List(\ZMDev\FateSDK\Pb\AppListReq $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ZMDev.FateSDK.pb.AppService/List',
        $argument,
        ['\ZMDev\FateSDK\Pb\AppList', 'decode'],
        $metadata, $options);
    }

    /**
     * @param \ZMDev\FateSDK\Pb\AppID $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function Find(\ZMDev\FateSDK\Pb\AppID $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ZMDev.FateSDK.pb.AppService/Find',
        $argument,
        ['\ZMDev\FateSDK\Pb\Application', 'decode'],
        $metadata, $options);
    }

    /**
     * @param \ZMDev\FateSDK\Pb\Application $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function Create(\ZMDev\FateSDK\Pb\Application $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ZMDev.FateSDK.pb.AppService/Create',
        $argument,
        ['\ZMDev\FateSDK\Pb\Application', 'decode'],
        $metadata, $options);
    }

    /**
     * @param \ZMDev\FateSDK\Pb\Application $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function Update(\ZMDev\FateSDK\Pb\Application $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ZMDev.FateSDK.pb.AppService/Update',
        $argument,
        ['\ZMDev\FateSDK\Pb\Unused', 'decode'],
        $metadata, $options);
    }

    /**
     * @param \ZMDev\FateSDK\Pb\AppID $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function Delete(\ZMDev\FateSDK\Pb\AppID $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ZMDev.FateSDK.pb.AppService/Delete',
        $argument,
        ['\ZMDev\FateSDK\Pb\Unused', 'decode'],
        $metadata, $options);
    }

}
