<?php

namespace cs313\Controllers;

use Symfony\Component\HttpFoundation\Response;

abstract class AbstractSimplexController
{
    protected function render(string $path, array $parameters = null)
    {
        $response = new StreamedResponse();
        $response->setCallback(function () use ($parameters, $path) {
            extract($parameters, EXTR_SKIP);
            include sprintf(__DIR__ . '../View/%s.php', $path);
            flush();
        });

        return $response;
    }
}
