<?php

use Symfony\Component\Routing;

$routes = new Routing\RouteCollection();
$routes->add('CondominiumUI/hello', new Routing\Route('/hello'));
$routes->add('bye', new Routing\Route('/bye'));

return $routes;