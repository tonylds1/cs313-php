<?php

namespace cs313\Controllers;

use cs313\Condominium\Infrastructure\UserRepository;
use cs313\Condominium\Model\Communication\UserList;
use cs313\Condominium\Model\User\UserDTO;
use cs313\Condominium\Model\User\UserDTOBuilder;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;

class AuthenticationController extends  AbstractSimplexController
{
    public function loginAction(Request $request)
    {
        try {
            $urlBack = $request->server->get('HTTP_REFERER');
            $login = $request->get('login');
            $password = $request->get('password');

            if (!$login || !$password) {
                throw new \Exception('Provide Login and Password');
            }

            $builder = new UserDTOBuilder();
            $user = $builder->buildEmpty();
            $user->setLogin($login);
            var_dump($password);
            $teste = password_hash($password, PASSWORD_DEFAULT);
            var_dump($teste);
            $user->setPassword(password_hash($password, PASSWORD_DEFAULT));
            var_dump($user->getPassword()); exit;
            $repository = new UserRepository();
            $userDto = $repository->findOne($user);

            if (!$userDto) {
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
