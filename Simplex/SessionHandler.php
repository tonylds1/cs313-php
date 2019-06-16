<?php


namespace Simplex;


use cs313\condominium\Model\User\UserDTO;

class SessionHandler
{
    const ERROR = 'error';
    const LOGGED_USER = 'logged_user';

    public function addErrorMessage($message)
    {
        $_SESSION[self::ERROR] = $message;
    }

    public function printErrorMessage()
    {
        $message = $_SESSION[self::ERROR];
        unset($_SESSION[self::ERROR]);

        return $message;
    }

    public function hasError()
    {
        return isset($_SESSION[self::ERROR]);
    }

    public function addLoggedUser(UserDTO $userDTO)
    {
        $_SESSION[self::LOGGED_USER] = $userDTO;
    }

    public function getLoggedUser(): ?UserDTO
    {
        return $_SESSION[self::LOGGED_USER] ?? null;
    }

    public function logout()
    {
        unset($_SESSION[self::LOGGED_USER]);
    }
}

