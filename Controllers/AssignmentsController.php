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
        try {

            $response = new StreamedResponse();
            $response->setCallback(function () use ($request) {
                $id = empty($request->get('id')) ? null : (int) $request->get('id');
                $sharedAreaFilter = new SharedAreaDTO($id, $request->get('name'));
                $list = (new SharedAreaList($sharedAreaFilter))->getList();

                include '../View/CondominiumUI/shared-areas.php';
                flush();
            });

            $response->send();
        } catch (\Throwable $t) {
          var_dump($t); die;
        }
    }
}
