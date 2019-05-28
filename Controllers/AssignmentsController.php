<?php

namespace cs313\Controllers;

use cs313\Condominium\Model\SharedArea\SharedArea;
use cs313\Condominium\Model\SharedArea\SharedAreaDTO;
use cs313\Condominium\Model\SharedArea\SharedAreaList;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\StreamedResponse;

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

        $params = $request->getParams();

        $response = new StreamedResponse();
        $response->setCallback(function () {
            $sharedAreaFilter = new SharedAreaDTO($params['id'] ?? null , $params['name'] ?? null);
            $list = (new SharedAreaList($sharedAreaFilter))->getList();

            include '../View/CondominiumUI/shared-areas.php';
            flush();
        });

        $response->send();
    }
}
