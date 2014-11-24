<?php
namespace Lino\Yacs\MyApp\Model;

use Lino\Yacs\Core\Model\FieldType\IntegerFieldType;

use Lino\Yacs\Core\Model\FieldType\EmailFieldType;
use Lino\Yacs\Core\Model\FieldType\StringFieldType;
use Lino\Yacs\Core\Model\WebModel;
use Lino\Yacs\MyApp\Model\FieldType\NameFieldType;

class PostsModel extends WebModel
{
    public function getDefinition() {
        $messageFieldType = new StringFieldType();
        $messageFieldType->setMinLength(4);
        $messageFieldType->setMaxLength(255);

        return [
            'name' => new NameFieldType(),
            'message' => $messageFieldType,
            'email' => new EmailFieldType(),
            'comments' => new IntegerFieldType(),
        ];
    }

    public function getPosts() {
        return $this->getPersistence()->fetchAll(
            'SELECT * FROM Posts ORDER BY id_post DESC LIMIT 100'
        );
    }

    public function addPost()
    {
        $this->getPersistence()
            ->addParam('name', $this->get('name'))
            ->addParam('email', $this->get('email'))
            ->addParam('message', $this->get('message'))
            ->execute(
                'INSERT INTO Posts SET name = :name, ' .
                'email = :email, message = :message, posttime = now()'
            );
    }
}
