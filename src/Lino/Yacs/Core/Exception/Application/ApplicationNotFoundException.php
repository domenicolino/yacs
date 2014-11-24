<?php
namespace Lino\Yacs\Core\Exception\Application;

use Lino\Yacs\Core\YacsException;

class ApplicationNotFoundException extends YacsException {
    public function __construct($message = null, $code = 0, YacsException $previous = null) {
        return parent::__construct('Application Not Found. Please check the directory of your application.');
    }

}