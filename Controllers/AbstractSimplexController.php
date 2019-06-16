<?php

namespace cs313\Controllers;

use Simplex\SessionHandler;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;
use View\BaseRender;
use View\IRender;

abstract class AbstractSimplexController
{
    protected $sessionHandler;

    /**
     * AbstractSimplexController constructor.
     * @param $sessionHandler
     */
    public function __construct()
    {
        $this->sessionHandler = new SessionHandler();
    }

    protected function renderPath(string $path, array $parameters = [])
    {
        ob_start();
        $loggedUser = $this->sessionHandler->getLoggedUser();

        extract($parameters, EXTR_SKIP);
        include sprintf(__DIR__ . '/../View/%s.php', $path);

        return new Response(ob_get_clean());
    }

    protected function render(IRender $render, array $parameters = [])
    {
        if ($this->sessionHandler->hasError()) {
            $parameters[SessionHandler::ERROR] = $this->sessionHandler->printErrorMessage();
        }

        $baseRender = new BaseRender($render, $parameters);

        return new Response($baseRender->render());
    }

    protected function redirect($route)
    {
        return new RedirectResponse($route);
    }
}
