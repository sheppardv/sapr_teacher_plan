<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
    private $_id;

    const ERROR_USER_TYPE = 10;

    /**
     * Authenticates a user.
     * The example implementation makes sure if the username and password
     * are both 'demo'.
     * In practical applications, this should be changed to authenticate
     * against some persistent user identity storage (e.g. database).
     * @return boolean whether authentication succeeds.
     */
    public function authenticate()
    {
        $userModel = User::model()->findByAttributes(['email' => $this->username]);
        if (!$userModel) {
            $this->errorCode = self::ERROR_USERNAME_INVALID;
        } elseif (!User::verifyPassword($this->password, $userModel->password)) {
            $this->errorCode = self::ERROR_PASSWORD_INVALID;
        } elseif ($userModel->type != User::TYPE_ADMIN) {
            $this->errorCode = self::ERROR_USER_TYPE;
        } else {
            $this->errorCode = self::ERROR_NONE;
            $this->_id = $userModel->id;
            $this->setState('id', $userModel->id);
        }

        return !$this->errorCode;
    }

    public function getId() //  override Id
    {
        return $this->_id;
    }
}