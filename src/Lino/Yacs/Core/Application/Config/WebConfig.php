<?php
namespace Lino\Yacs\Core\Application\Config;
use Lino\Yacs\Core\Application\Config;

class WebConfig extends Config {
    /**
     * @return Config|\Lino\Yacs\Core\Libs\Bag
     */
    public function getRequestRoutes() {
        return $this->get('routes')->get('request');
    }

    /**
     * @return Config|\Lino\Yacs\Core\Libs\Bag
     */
    public function getQueryRoutes() {
        return $this->get('routes')->get('query');
    }
}