<?php

use Symfony\Component\Routing;

$routes = new Routing\RouteCollection();
$routes->add('hello_world', new Routing\Route('/hello', [
    '_controller' => 'cs313\Controllers\AssignmentsController::week01Action'
]));

$routes->add('personal_home', new Routing\Route('/personal', [
    '_controller' => 'cs313\Controllers\PersonalController::indexAction'
]));

$routes->add('PersonalUI/assignments', new Routing\Route('/assignments',[
    '_controller' => 'cs313\Controllers\AssignmentsController::indexAction'
]));

$routes->add('sharedAreaList', new Routing\Route('/shared-area/list',[
    '_controller' => 'cs313\Controllers\SharedAreaController::sharedAreaListAction'
]));

$routes->add('sharedAreaCreate', new Routing\Route('/shared-area/new',[
    '_controller' => 'cs313\Controllers\SharedAreaController::sharedAreaSaveAction'
]));

$routes->add('sharedAreaRead', new Routing\Route('/shared-area/show/{id}',[
    '_controller' => 'cs313\Controllers\SharedAreaController::sharedAreaAction'
]));

$routes->add('sharedAreaUpdate', new Routing\Route('/shared-area/save/{id}',[
    '_controller' => 'cs313\Controllers\SharedAreaController::sharedAreaSaveAction'
]));

$routes->add('sharedAreaDelete', new Routing\Route('/shared-area/delete/{id}',[
    '_controller' => 'cs313\Controllers\SharedAreaController::sharedAreaDeleteAction'
]));

$routes->add('sharedAreaUpdateView', new Routing\Route('/shared-area/update/{id}',[
    '_controller' => 'cs313\Controllers\SharedAreaController::sharedAreaUpdateAction'
]));


return $routes;
