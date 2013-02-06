<?php

class UserIdentity extends CUserIdentity
{
    public $password;

    public function __construct($password)
    {
        $this->password = $password;
    }

    public function authenticate()
    {
        $this->errorCode = $this->password == Yii::app()->params['admin_password'] ? self::ERROR_NONE : self::ERROR_PASSWORD_INVALID;

        return !$this->errorCode;
    }

    public function getId()
    {
        return 1;
    }
}

?>