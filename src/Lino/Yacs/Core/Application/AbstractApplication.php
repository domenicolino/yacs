<?php
namespace Lino\Yacs\Core\Application;


use Lino\Yacs\Core\Model\Persistence\PersistenceInterface;
use Lino\Yacs\Core\Request\AbstractRequest;
use Lino\Yacs\Core\Response\ViewModel;

/**
 * Class AbstractApplication
 * @package Lino\Yacs\Core\Application
 */
Abstract class AbstractApplication {
    protected $applicationName = null;
    protected $configPath = null;
    protected $config = null;
    protected $dbAdapter;

    /**
     * @param Config $config
     * @param ViewModel $responseHandler
     * @param PersistenceInterface $dbAdapter
     */
    public function __construct(
        Config $config,
        ViewModel $responseHandler,
        PersistenceInterface $dbAdapter = null
    ) {
        $this->config = $config;
        $this->responseHandler = $responseHandler;
        $this->dbAdapter = $dbAdapter;
    }

    /**
     * @param AbstractRequest $request
     * @return mixed
     */
    abstract public function run(AbstractRequest $request);

    /**
     * @return PersistenceInterface
     */
    public function getPersistence() {
        return $this->dbAdapter;
    }

    /**
     * @return Config|null
     */
    public function getConfig() {
        return $this->config;
    }

    /**
     * @return ViewModel
     */
    public function getResponse() {
        return $this->responseHandler;
    }

}
