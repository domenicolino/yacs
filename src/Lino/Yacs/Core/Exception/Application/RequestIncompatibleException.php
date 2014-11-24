<?php
namespace Lino\Yacs\Core\Exception\Application;

use Lino\Yacs\Core\YacsException;

class RequestIncompatibleException extends YacsException {
    public function __construct(
        $message = null,
        $code = 0,
        YacsException $previous = null
    ) {
        return parent::__construct('Please check the interface of the request required by the application');
    }

}