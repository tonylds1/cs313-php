<?php

use Symfony\Component\Routing;

$routes = new Routing\RouteCollection();

$routes->add('ops', new Routing\Route('/ops',[
    '_controller' => 'cs313\Controllers\AssignmentsController::opsAction'
]));

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

$routes->add('communicationList', new Routing\Route('/communication/list',[
    '_controller' => 'cs313\Controllers\CommunicationController::communicationListAction'
]));

$routes->add('communicationCreate', new Routing\Route('/communication/new',[
    '_controller' => 'cs313\Controllers\CommunicationController::communicationSaveAction'
]));

$routes->add('communicationRead', new Routing\Route('/communication/show/{id}',[
    '_controller' => 'cs313\Controllers\CommunicationController::communicationAction'
]));

$routes->add('communicationUpdate', new Routing\Route('/communication/save/{id}',[
    '_controller' => 'cs313\Controllers\CommunicationController::communicationSaveAction'
]));

$routes->add('communicationDelete', new Routing\Route('/communication/delete/{id}',[
    '_controller' => 'cs313\Controllers\CommunicationController::communicationDeleteAction'
]));

$routes->add('communicationUpdateView', new Routing\Route('/communication/update/{id}',[
    '_controller' => 'cs313\Controllers\CommunicationController::communicationUpdateAction'
]));

return $routes;
