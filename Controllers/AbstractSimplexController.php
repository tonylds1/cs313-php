<?php

namespace cs313\Controllers;

use Symfony\Component\HttpFoundation\Response;

abstract class AbstractSimplexController
{
    protected function render(string $path, array $parameters = [])
    {
        ob_start();
        extract($parameters, EXTR_SKIP);
        include sprintf(__DIR__ . '/../View/%s.php', $path);

        return new Response(ob_get_clean());
    }
}
