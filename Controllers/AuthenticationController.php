<?php

namespace cs313\Controllers;

use cs313\Condominium\Infrastructure\CommunicationRepository;
use cs313\Condominium\Infrastructure\UserRepository;
use cs313\Condominium\Model\Communication\CommunicationDTO;
use cs313\Condominium\Model\Communication\UserList;
use cs313\condominium\Model\User\UserDTO;
use mysql_xdevapi\Exception;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use View\Communication\ListRender;
use View\Communication\SingleRender;
use View\Communication\UpdateRender;

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

            $user = new UserDTO();
            $user->setLogin($login);
            $user->setPassword(password_hash($password, PASSWORD_DEFAULT));
$teste = $user->getPassword();
var_dump($teste); exit;
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
