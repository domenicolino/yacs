<?php
namespace Lino\Yacs\Core\Exception\Application;

use Lino\Yacs\Core\YacsException;

class ApplicationEnvironmentUnknown extends YacsException {
    public function __construct($message = null, $code = 0, YacsException $previous = null) {
        return parent::__construct('This kind of application environment cant be instantiated');
    }

}