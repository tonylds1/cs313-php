<?php

namespace cs313\Controllers;

use cs313\Condominium\Infrastructure\CommunicationRepository;
use cs313\Condominium\Model\Communication\CommunicationDTO;
use cs313\Condominium\Model\Communication\CommunicationList;
use cs313\Condominium\Model\Communication\UserList;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use View\Communication\ListRender;
use View\Communication\SingleRender;
use View\Communication\UpdateRender;

class CommunicationController extends  AbstractSimplexController
{
    public function indexAction(Request $request)
    {
        return new RedirectResponse('/front.php/communication/list');
    }

    public function communicationListAction(Request $request)
    {
        try {
            $repository = new CommunicationRepository();
            $list = $repository->findBroadCast();
            $render = new ListRender();

            return $this->render($render, ['list' => $list]);
        } catch (\Throwable $t) {
            var_dump($t); exit;
            $this->sessionHandler->addErrorMessage($t->getMessage());
            return $this->redirect('/front.php/ops');
        }
    }

    public function communicationAction(Request $request)
    {
        try {
            $id = empty($request->get('id')) ? null : (int)$request->get('id');
            $communication = (new CommunicationRepository())->findById($id);

            if (!$communication) {
                return new Response('No Shared Area with that Id');
            }

            $render = new SingleRender();

            return $this->render($render, ['communication' => $communication]);
        } catch (\Throwable $t) {
            $this->sessionHandler->addErrorMessage($t->getMessage());
            return $this->redirect('/front.php/shared-area/list');
        }
    }

    public function communicationDeleteAction(Request $request)
    {
        try {
            $id = empty($request->get('id')) ? null : (int) $request->get('id');
            (new CommunicationRepository())->delete($id);

            return $this->redirect('/front.php/shared-area/list');
        } catch (\Throwable $t) {
            $this->sessionHandler->addErrorMessage($t->getMessage());
            return $this->redirect('/front.php/shared-area/list');
        }
    }

    public function communicationUpdateAction(Request $request)
    {
        try {
            $id = empty($request->get('id')) ? null : (int) $request->get('id');
            $communication = (new CommunicationRepository())->findById($id);
            $render = new UpdateRender();

            return $this->render($render, ['communication' => $communication]);
        } catch (\Throwable $t) {
            $this->sessionHandler->addErrorMessage($t->getMessage());
            return $this->redirect('/front.php/shared-area/list');
        }
    }

    public function communicationSaveAction(Request $request)
    {
        try {
            $id = empty($request->get('id')) ? null : (int) $request->get('id');
            $communication = new CommunicationDTO($id, $request->get('name'));
            $repository = new CommunicationRepository();

            if ($id) {
                $repository->update($communication);

                return $this->redirect('/front.php/shared-area/list');
            }

            $repository->insert($communication);

            return $this->redirect('/front.php/shared-area/list');
        } catch (\Throwable $t) {
            $this->sessionHandler->addErrorMessage($t->getMessage());
            return $this->redirect('/front.php/shared-area/list');
        }
    }
}
