<?php

namespace Lino\Yacs\Core\Exception\Bag;

use Lino\Yacs\Core\YacsException;

class PropertyNotFoundException extends YacsException {

    public function __construct(
        $message = null,
        $code = 0,
        YacsException $previous = null
    ) {
        return parent::__construct('Property was not found');
    }
}