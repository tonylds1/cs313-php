<?php

namespace cs313\Controllers;

use cs313\Condominium\Infrastructure\UserRepository;
use cs313\Condominium\Model\Communication\UserList;
use cs313\Condominium\Model\User\UserDTO;
use cs313\Condominium\Model\User\UserDTOBuilder;
use mysql_xdevapi\Exception;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;

class AuthenticationController extends  AbstractSimplexController
{
    public function loginAction(Request $request)
    {
        try {
            if ($this->sessionHandler->getLoggedUser()) {
                throw new Exception('You are already logged in.');
            }

            $urlBack = $request->server->get('HTTP_REFERER');
            $login = $request->get('login');
            $password = $request->get('password');

            if (!$login || !$password) {
                throw new \Exception('Provide Login and Password');
            }

            $builder = new UserDTOBuilder();
            $user = $builder->buildEmpty();
            $user->setLogin($login);

            $repository = new UserRepository();
            $userDto = $repository->findOne($user);

            if (!$userDto || !password_verify($password, $userDto->getPassword())) {
                throw new \Exception('Wrong login or password. Please Try again.');
            }

            $this->sessionHandler->addLoggedUser($userDto);

        } catch (\Throwable $t) {
            $this->sessionHandler->addErrorMessage($t->getMessage());
        } finally {
            return new RedirectResponse($urlBack);
        }
    }

    public function logoutAction(Request $request)
    {
        $this->sessionHandler->logout();
        $urlBack = $request->server->get('HTTP_REFERER');

        return new RedirectResponse($urlBack);
    }
}
