<?php

namespace cs313\Controllers;

use Symfony\Component\HttpFoundation\Response;
use View\IRender;

abstract class AbstractSimplexController
{
    protected function render(IRender $render, array $parameters = [])
    {
        ob_start();
        extract($parameters, EXTR_SKIP);
        $render->render();

        return new Response(ob_get_clean());
    }
}
