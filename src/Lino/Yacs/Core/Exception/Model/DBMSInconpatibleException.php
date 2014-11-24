<?php

namespace Lino\Yacs\Core\Exception\Model;

use Lino\Yacs\Core\YacsException;

class DBMSIncompatibleException extends YacsException {

    public function __construct(
        $message = null,
        $code = 0,
        YacsException $previous = null
    ) {
        return parent::__construct(
            'Youre trying to instantiate a DB with the wrong class'
        );
    }
}