<?php

require_once __DIR__.'/../vendor/autoload.php';

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing;

$request = Request::createFromGlobals();
$routes = include __DIR__.'/../Application/app.php';

$context = new Routing\RequestContext();
$context->fromRequest($request);
$matcher = new Routing\Matcher\UrlMatcher($routes, $context);

try {
    var_dump(__DIR__.'/../View/%s.php');
    $teste = $request->getPathInfo();
    var_dump($teste);
    $route = extract($matcher->match($request->getPathInfo()), EXTR_SKIP);
    var_dump($route); exit;
    ob_start();
    include sprintf(__DIR__.'/../View/%s.php', $route);

    $response = new Response(ob_get_clean());
} catch (Routing\Exception\ResourceNotFoundException $exception) {
    $response = new Response('Not Found', 404);
} catch (Exception $exception) {
    $response = new Response('An error occurred', 500);
}

$response->send();