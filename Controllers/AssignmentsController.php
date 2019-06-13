<?php

namespace cs313\Controllers;

use cs313\Condominium\Infrastructure\SharedAreaRepository;
use cs313\Condominium\Model\SharedArea\SharedArea;
use cs313\Condominium\Model\SharedArea\SharedAreaDTO;
use cs313\Condominium\Model\SharedArea\SharedAreaList;
use Simplex\SharedAreaRender;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\StreamedResponse;
use Symfony\Component\Routing\Tests\Fixtures\AnnotationFixtures\AbstractClassController;

class AssignmentsController extends  AbstractSimplexController
{
    public function indexAction(Request $request)
    {
        return $this->render('PersonalUI/assignments');
    }

    public function week01Action(Request $request)
    {
        return $this->render('CondominiumUI/hello');
    }

    public function week05Action(Request $request)
    {
        try {
            $id = empty($request->get('id')) ? null : (int) $request->get('id');
            $sharedAreaFilter = new SharedAreaDTO($id, $request->get('name'));

            $repository = new SharedAreaRepository();
            $list = (new SharedAreaList($sharedAreaFilter, $repository))->getList();
            $render = new SharedAreaRender('shared-areas.php');
            return $this->render($render, ['list' => $list]);
        } catch (\Throwable $t) {
          var_dump($t); die;
        }
    }

    public function sharedAreaAction(Request $request)
    {
        try {
            $id = empty($request->get('id')) ? null : (int)$request->get('id');
            $sharedArea = (new SharedAreaRepository())->findById($id);

            if (!$sharedArea) {
                return new Response('No Shared Area with that Id');
            }

            $response = new StreamedResponse();
            $response->setCallback(function () use ($sharedArea) {
                include '../View/CondominiumUI/shared-area.php';
                flush();
            });

            return $response;
        } catch (\Throwable $t) {
            var_dump($t); die;
        }
    }

    public function sharedAreaDeleteAction(Request $request)
    {
        try {
            $id = empty($request->get('id')) ? null : (int) $request->get('id');
            (new SharedAreaRepository())->delete($id);

            return new RedirectResponse('/front.php/week05');
        } catch (\Throwable $t) {
            var_dump($t); die;
        }
    }

    public function sharedAreaUpdateAction(Request $request)
    {
        try {
            $response = new StreamedResponse();
            $response->setCallback(function () use ($request) {
                $id = empty($request->get('id')) ? null : (int) $request->get('id');
                $sharedArea = (new SharedAreaRepository())->findById($id);

                include '../View/CondominiumUI/shared-area-update.php';
                flush();
            });

            $response->send();
        } catch (\Throwable $t) {
            var_dump($t); die;
        }
    }

    public function sharedAreaSaveAction(Request $request)
    {
        try {
            $id = empty($request->get('id')) ? null : (int) $request->get('id');
            $sharedArea = new SharedAreaDTO($id, $request->get('name'));

            if ($id) {
                (new SharedAreaRepository())->update($sharedArea);
            } else {
                (new SharedAreaRepository())->insert($sharedArea);
            }

            return new RedirectResponse('/front.php/week05');
        } catch (\Throwable $t) {
            var_dump($t); die;
        }
    }
}
