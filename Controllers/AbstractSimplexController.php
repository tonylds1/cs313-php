<?php

namespace cs313\Controllers;

use Symfony\Component\HttpFoundation\Response;

abstract class AbstractSimplexController
{
    protected function render(string $route, \stdClass $object = null)
    {
        extract($object, EXTR_SKIP);
        ob_start();
        include sprintf(__DIR__ . '../View/%s.php', $route);

        return new Response(ob_get_clean());
    }
}
