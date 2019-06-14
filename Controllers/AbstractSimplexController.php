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


    protected function render(IRender $render, array $parameters = [])
    {
        $baseRender = new BaseRender($render, $parameters);

        return new Response($baseRender->render());
    }

    protected function redirect($route)
    {
        return new RedirectResponse($route);
    }
}
