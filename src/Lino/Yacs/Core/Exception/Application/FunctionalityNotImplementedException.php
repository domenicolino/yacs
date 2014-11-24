<?php
namespace Lino\Yacs\Core\Exception\Application;

use Lino\Yacs\Core\YacsException;

class FunctionalityNotImplementedException extends YacsException {
    public function __construct(
        $message = null,
        $code = 0,
        YacsException $previous = null
    ) {
        return parent::__construct("The method:{$message} is not implemented on this version");
    }

}