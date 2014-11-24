<?php
namespace Lino\Yacs\MyApp\Model;

use Lino\Yacs\Core\Model\FieldType\IntegerFieldType;

use Lino\Yacs\Core\Model\FieldType\EmailFieldType;
use Lino\Yacs\Core\Model\FieldType\StringFieldType;
use Lino\Yacs\Core\Model\WebModel;
use Lino\Yacs\MyApp\Model\FieldType\NameFieldType;

class CommentsModel extends WebModel
{
    public function getDefinition() {
        $messageFieldType = new StringFieldType();
        $messageFieldType->setMinLength(4);
        $messageFieldType->setMaxLength(255);

        return [
            'id_comment' => new IntegerFieldType(),
            'name' => new NameFieldType(),
            'message' => $messageFieldType,
            'email' => new EmailFieldType(),
            'id_post' => new IntegerFieldType(),
        ];
    }

    public function getComments() {
        return $this->getPersistence()
            ->addParam('id_post', $this->get('id_post'))
            ->fetchAll(
                'SELECT * FROM Comments WHERE id_post = :id_post
                 ORDER BY id_comment DESC LIMIT 100'
            );
    }

    /**
     * @throws \Lino\Yacs\Core\Exception\Bag\ElementNotFoundException
     * @throws \Lino\Yacs\Core\Exception\Bag\InvalidKeyException
     * @todo: working directly with another post, just sending the query.
     * we should be able to make $this->getModel('posts')->incComments();
     */
    public function addComment()
    {
        $this->getPersistence()
            ->addParam('name', $this->get('name'))
            ->addParam('email', $this->get('email'))
            ->addParam('message', $this->get('message'))
            ->addParam('id_post', $this->get('id_post'))
            ->execute(
                'INSERT INTO Comments SET name = :name, ' .
                'email = :email, message = :message, id_post = :id_post, commenttime = now()'
            );

        //this call should be: $this->getModel('Post')->increaseComments(postId);
        $this->getPersistence()
            ->reset()
            ->addParam('id_post', $this->get('id_post'))
            ->execute(
                'UPDATE Posts SET comments = comments + 1 WHERE id_post = :id_post'
            );
    }
}
