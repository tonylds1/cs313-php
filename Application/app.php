<?php

use Symfony\Component\Routing;

$routes = new Routing\RouteCollection();
$routes->add('CondominiumUI/hello', new Routing\Route('/hello'));
$routes->add('Personal/src/index', new Routing\Route('/personal'));
$routes->add('PersonalUI/assignments', new Routing\Route('/assignments'));

return $routes;