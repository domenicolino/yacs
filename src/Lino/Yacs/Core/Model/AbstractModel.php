<?php
namespace Lino\Yacs\Core\Model;

use Lino\Yacs\Core\Exception\Model\InvalidModelDefinitionException;
use Lino\Yacs\Core\Libs\Bag;

Abstract class AbstractModel extends Bag {
    protected $persistence = null;


    public function initializeDefinition($values) {
        $definition = $this->getDefinition();
        foreach ($definition as $fieldName => $field) {
            if (!$field instanceOf AbstractFieldType) {
                throw new InvalidModelDefinitionException($fieldName);
            }

            if ($values->has($fieldName)) {
                $definition[$fieldName]->setValue($values->get($fieldName), $this);
            }
        }
        $this->replace($definition);
    }

    protected function setDefaultValues($values) {

    }

    abstract public function getDefinition();

    public function isValid() {

    }

    public function setPersistence($persistence) {
        $this->persistence = $persistence;
    }

    public function getPersistence() {
        return $this->persistence;
    }


}