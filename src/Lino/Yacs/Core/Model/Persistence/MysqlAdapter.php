<?php
namespace Lino\Yacs\Core\Model\Persistence;

use Lino\Yacs\Core\Application\Config;

class MysqlAdapter extends PdoAdapter implements PersistenceInterface {
    public function __construct(Config $config) {
        //beware, hardcoded dependency
        $host = $config->get('host');
        $name = $config->get('name');
        $config->set('dsn', "mysql:host={$host};dbname={$name}");
        parent::__construct($config);
    }
}