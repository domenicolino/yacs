<?php
namespace Lino\Yacs\Core\Model\Persistence;

use Lino\Yacs\Core\Model\AbstractFieldType;

interface PersistenceInterface {
    public function fetchAll($query);
    public function execute($query);
    public function addParam($name, AbstractFieldType $field);
    public function getParams();
    public function getParam($fieldName);
}