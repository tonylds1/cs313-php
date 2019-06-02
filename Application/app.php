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

$routes->add('week05', new Routing\Route('/week05',[
    '_controller' => 'cs313\Controllers\AssignmentsController::week05Action'
]));

$routes->add('sharedArea', new Routing\Route('/shared-area/{id}',[
    '_controller' => 'cs313\Controllers\AssignmentsController::sharedAreaAction',
    '_method' => 'GET'
]));

$routes->add('sharedAreaDelete', new Routing\Route('/shared-area/delete{id}',[
    '_controller' => 'cs313\Controllers\AssignmentsController::sharedAreaDeleteAction',
    '_method' => 'GET'
]));

$routes->add('sharedAreaUpdate', new Routing\Route('/shared-area/update/{id}',[
    '_controller' => 'cs313\Controllers\AssignmentsController::sharedAreaUpdateAction',
    '_method' => 'GET'
]));

$routes->add('sharedAreaSave', new Routing\Route('/shared-area/',[
    '_controller' => 'cs313\Controllers\AssignmentsController::sharedAreaSaveAction',
    '_method' => 'POST'
]));

return $routes;