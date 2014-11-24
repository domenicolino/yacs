<?php

namespace Lino\Yacs\Core\Exception\Bag;

use Lino\Yacs\Core\YacsException;

class InvalidKeyException extends YacsException {

    public function __construct(
        $message = null,
        $code = 0,
        YacsException $previous = null
    ) {
        return parent::__construct(
            "You sent a {$message} as key. This is not possible"
        );
    }
}