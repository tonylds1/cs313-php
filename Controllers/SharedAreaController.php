<?php

namespace cs313\Controllers;

use cs313\Condominium\Infrastructure\SharedAreaRepository;
use cs313\Condominium\Model\SharedArea\SharedAreaDTO;
use cs313\Condominium\Model\SharedArea\CommunicationList;
use cs313\Condominium\Model\SharedArea\SharedAreaList;
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
        return new RedirectResponse('/front.php/shared-area/list');
    }

    public function sharedAreaListAction(Request $request)
    {
        try {
            $id = empty($request->get('id')) ? null : (int) $request->get('id');
            $sharedAreaFilter = new SharedAreaDTO($id, $request->get('name'));

            $repository = new SharedAreaRepository();
            $list = (new SharedAreaList($sharedAreaFilter, $repository))->getList();

            $render = new SharedAreasRender();

            return $this->render($render, ['list' => $list]);
        } catch (\Throwable $t) {
            $this->sessionHandler->addErrorMessage($t->getMessage());
            return $this->redirect('/front.php/ops');
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

            return $this->render($render, ['sharedArea' => $sharedArea]);
        } catch (\Throwable $t) {
            $this->sessionHandler->addErrorMessage($t->getMessage());
            return $this->redirect('/front.php/shared-area/list');
        }
    }

    public function sharedAreaDeleteAction(Request $request)
    {
        try {
            $id = empty($request->get('id')) ? null : (int) $request->get('id');
            (new SharedAreaRepository())->delete($id);

            return $this->redirect('/front.php/shared-area/list');
        } catch (\Throwable $t) {
            $this->sessionHandler->addErrorMessage($t->getMessage());
            return $this->redirect('/front.php/shared-area/list');
        }
    }

    public function sharedAreaUpdateAction(Request $request)
    {
        try {
            throw new \Exception("meu Nome é Tony");
            $id = empty($request->get('id')) ? null : (int) $request->get('id');
            $sharedArea = (new SharedAreaRepository())->findById($id);
            $render = new SharedAreaUpdateRender();

            return $this->render($render, ['sharedArea' => $sharedArea]);
        } catch (\Throwable $t) {
            $this->sessionHandler->addErrorMessage($t->getMessage());
            return $this->redirect('/front.php/shared-area/list');
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

                return $this->redirect('/front.php/shared-area/list');
            }

            $repository->insert($sharedArea);

            return $this->redirect('/front.php/shared-area/list');
        } catch (\Throwable $t) {
            $this->sessionHandler->addErrorMessage($t->getMessage());
            return $this->redirect('/front.php/shared-area/list');
        }
    }
}
