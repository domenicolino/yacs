<?php
namespace Lino\Yacs\MyApp\Model\FieldType;

use Lino\Yacs\Core\Model\FieldType\StringFieldType;

class NameFieldType extends StringFieldType {

    public function __construct($value = null) {
        parent::__construct($value);
        $this->setMaxLength(25);
        $this->setMinLength(4);
    }
}