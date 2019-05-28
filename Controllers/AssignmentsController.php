<?php

namespace cs313\Controllers;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class AssignmentsController
{
    public function indexAction(Request $request)
    {
        $response = new Response(include '../View/PersonalUI/assignments.php');
        $response->send();
    }

    public function week01Action(Request $request)
    {
        $response = new Response(include '../View/CondominiumUI/hello.php');
        $response->send();
    }

    public function week05Action(Request $request)
    {
        $response = new Response(include '../View/CondominiumUI/shared-areas.php');
        $response->send();
    }
}
