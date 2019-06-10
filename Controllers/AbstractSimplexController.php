<?php

namespace cs313\Controllers;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Route;

abstract class AbstractSimplexController
{
    protected function render(string $path, array $parameters = [])
    {
        ob_start();
        extract($parameters, EXTR_SKIP);
        include sprintf(__DIR__ . '/../View/%s.php', $path);

        return new Response(ob_get_clean());
    }

    protected function redirect(Route $route)
    {
        $teste = $route->getPath();
        $teste2 = $route->getHost();
        $teste3 = $route->getSchemes();
        echo $teste . '<br/>' .$teste1 . '<br/>' .$teste2 . '<br/>';
        exit;
        header('location: /acme/products/');
    }
}
