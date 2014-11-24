<?php
namespace Lino\Yacs\Core\Exception\Application\Config;

use Lino\Yacs\Core\YacsException;

class InvalidConfigException extends YacsException {
    public function __construct(
        $message = null,
        $code = 0,
        YacsException $previous = null
    ) {
        return parent::__construct('There was an error parsing the config file');
    }

}