<?php

namespace cs313\Controllers;

use cs313\Condominium\Model\SharedArea\SharedArea;
use cs313\Condominium\Model\SharedArea\SharedAreaDTO;
use cs313\Condominium\Model\SharedArea\SharedAreaList;
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
        $params = $request->getParams();

        $sharedAreaFilter = new SharedAreaDTO($params['id'] ?? null , $params['name'] ?? null);
        ob_start();

        $list = (new SharedAreaList($sharedAreaFilter))->getList();
        include '../View/CondominiumUI/shared-areas.php';

        $page = ob_get_clean();

        $response = new Response($page);
        $response->send();
    }
}
