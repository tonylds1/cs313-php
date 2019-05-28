<?php

use Symfony\Component\Routing;

$routes = new Routing\RouteCollection();
$routes->add('CondominiumUI/hello', new Routing\Route('/hello'));

$routes->add('PersonalUI/index', new Routing\Route('/personal'),[
    '_controller' => 'Controller\PersonalController::index'
]);

$routes->add('PersonalUI/assignments', new Routing\Route('/assignments'));

return $routes;