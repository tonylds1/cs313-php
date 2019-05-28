<?php

namespace cs313\Controllers;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class PersonalController
{
    public function indexAction(Request $request)
    {
        var_dump('I am here');
        $response = new Response(include '../View/PersonalUI/index.php');
        $response->send();
    }
}