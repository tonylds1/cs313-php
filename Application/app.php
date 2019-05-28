<?php

use Symfony\Component\Routing;

$routes = new Routing\RouteCollection();
//$routes->add('CondominiumUI/hello', new Routing\Route('/hello'));

$routes->add('personal_home', new Routing\Route('/personal'),[
    '_controller' => 'cs313\Controllers\PersonalController::indexAction'
]);

//$routes->add('PersonalUI/assignments', new Routing\Route('/assignments'));

return $routes;