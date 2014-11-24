<?php

namespace Lino\Yacs\Core\Exception\Model;

use Lino\Yacs\Core\YacsException;

class InvalidModelDefinitionException extends YacsException {

    public function __construct(
        $message = null,
        $code = 0,
        YacsException $previous = null
    ) {
        return parent::__construct(
            "Every field off the module must be of a type extended from AbstractModuleType"
        );
    }
}