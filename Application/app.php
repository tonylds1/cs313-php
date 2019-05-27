<?php

use Symfony\Component\Routing;

$routes = new Routing\RouteCollection();
$routes->add('hello', new Routing\Route('/CondominiumUI/hello'));
$routes->add('bye', new Routing\Route('/bye'));

return $routes;