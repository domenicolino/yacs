<?php
namespace Lino\Yacs\Core\Model\FieldType;

use Lino\Yacs\Core\Model\AbstractFieldType;

class IntegerFieldType extends AbstractFieldType {
    public function isValid() {
        $valid = parent::isValid();
        return $valid && $this->value == (int)($this->value);
    }
}