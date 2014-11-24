<?php
namespace Lino\Yacs\Core\Application;


use Lino\Yacs\Core\Exception\Application\ApplicationNotFoundException;
use Lino\Yacs\Core\Exception\Application\Config\InvalidConfigException;
use Lino\Yacs\Core\Libs\Bag;

/**
 * Class Config
 * @package Lino\Yacs\Core\Application
 */
class Config extends Bag {
    protected $config;

    /**
     * @param $path
     * @return mixed
     * @throws ApplicationNotFoundException
     * @throws InvalidConfigException
     */
    public function parse($path) {
        $configurationFile = "{$path}/application.conf";
        if (!is_file($configurationFile)) {
            throw new ApplicationNotFoundException;
        }
        $jsonArray = json_decode(file_get_contents($configurationFile), true);
        if (!$jsonArray) {
            throw new InvalidConfigException();
        }
        return $jsonArray;
    }

    /**
     * @param $config
     */
    public function load($config) {
        $this->replace($config);
    }

    /**
     * @todo: hydration instead of reinstantiating
     * a Config with Bag->array elements
     *
     * @param $key
     * @return Config|Bag
     * @throws \Lino\Yacs\Core\Exception\Bag\ElementNotFoundException
     */
    public function get($key) {
        $element = parent::get($key);

        if ($element instanceOf Bag) {
            $element = new Config($element->all());
        }
        return $element;
    }


}