<?php


namespace Simplex;


class SessionHandler
{
    const ERROR = 'error';

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
}
