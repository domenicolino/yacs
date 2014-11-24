<?php

namespace Lino\Yacs\Core\Exception\Bag;

use Lino\Yacs\Core\YacsException;

class ElementNotFoundException extends YacsException {

    public function __construct(
        $message = null,
        $code = 0,
        YacsException $previous = null
    ) {
        return parent::__construct("{$message} was not found on the bag");
    }
}