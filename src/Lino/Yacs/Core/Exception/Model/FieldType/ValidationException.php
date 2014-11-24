<?php
namespace Lino\Yacs\Core\Exception\Model\FieldType;

use Lino\Yacs\Core\YacsException;

class ValidationException extends YacsException {
    public function __construct(
        $message = null,
        $code = 0,
        YacsException $previous = null
    ) {
        return parent::__construct(
            "There was an error while validating the field: {$message}"
        );
    }

}