<?php

namespace cs313\Controllers;

use cs313\Condominium\Infrastructure\SharedAreaRepository;
use cs313\Condominium\Model\SharedArea\SharedAreaDTO;
use cs313\Condominium\Model\SharedArea\SharedAreaList;
use Symfony\Component\HttpFoundation\StreamedResponse;
use View\BaseRender;
use View\SharedAreaRender;
use View\SharedAreasRender;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use View\SharedAreaUpdateRender;

class SharedAreaController extends  AbstractSimplexController
{
    public function indexAction(Request $request)
    {
        return new RedirectResponse('/front.php/shared-area');
    }

    public function sharedAreaListAction(Request $request)
    {
        try {
            $id = empty($request->get('id')) ? null : (int) $request->get('id');
            $sharedAreaFilter = new SharedAreaDTO($id, $request->get('name'));

            $repository = new SharedAreaRepository();
            $list = (new SharedAreaList($sharedAreaFilter, $repository))->getList();

            $render = new SharedAreasRender();
            $baseRender = new BaseRender($render, ['list' => $list]);

            return new Response($baseRender->render());
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

            $render = new SharedAreaRender();
            $baseRender = new BaseRender($render, ['sharedArea' => $sharedArea]);

            return new Response($baseRender->render());
        } catch (\Throwable $t) {
            return new RedirectResponse('/front.php/shared-area/list');
        }
    }

    public function sharedAreaDeleteAction(Request $request)
    {
        try {
            $id = empty($request->get('id')) ? null : (int) $request->get('id');
            (new SharedAreaRepository())->delete($id);

            return new RedirectResponse('/front.php/shared-area/list');
        } catch (\Throwable $t) {
            return new RedirectResponse('/front.php/shared-area/list');
        }
    }

    public function sharedAreaUpdateAction(Request $request)
    {
        try {
            $id = empty($request->get('id')) ? null : (int) $request->get('id');
            $sharedArea = (new SharedAreaRepository())->findById($id);

            $render = new SharedAreaUpdateRender();
            $baseRender = new BaseRender($render, ['sharedArea' => $sharedArea]);

            return new Response($baseRender->render());
        } catch (\Throwable $t) {
            return new RedirectResponse('/front.php/shared-area/list');
        }
    }

    public function sharedAreaSaveAction(Request $request)
    {
        try {
            $id = empty($request->get('id')) ? null : (int) $request->get('id');
            $sharedArea = new SharedAreaDTO($id, $request->get('name'));
            $repository = new SharedAreaRepository();

            if ($id) {
                $repository->update($sharedArea);

                return new RedirectResponse('/front.php/shared-area/list');
            }

            $repository->insert($sharedArea);

            return new RedirectResponse('/front.php/shared-area/list');
        } catch (\Throwable $t) {
            return new RedirectResponse('/front.php/shared-area/list');
        }
    }
}
