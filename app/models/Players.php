<?php
use Phalcon\Mvc\Model\Validator\Email as EmailValidator;
use Phalcon\Mvc\Model\Validator\Uniqueness as UniquenessValidator;

class Players extends BaseModel
{
    public $id;

    public $name;

    public $email;

    public $password;

    public function initialize()
    {
        parent::initialize();
        $this->skipAttributesOnCreate(array('games_amount'));
    }

    public function validation()
    {
        $this->validate(new EmailValidator(array(
           'field' => 'email'
        )));
        $this->validate(new UniquenessValidator(array(
            'field' => 'email',
            'message' => 'Sorry, The email was registered by another user'
        )));
        if ($this->validationHasFailed() == true) {
           return false;
        }
    }

    public static function getByEmail($email)
    {
        $exists = self::findFirst(array(
            "conditions" => "email = ?1",
            "bind"       => array(1 => $email)
        ));
        return $exists;
    }
}
