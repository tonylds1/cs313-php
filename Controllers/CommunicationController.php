<?php

namespace cs313\Controllers;

use cs313\Condominium\Infrastructure\CommunicationRepository;
use cs313\Condominium\Model\Communication\CommunicationDTO;
use cs313\Condominium\Model\Communication\CommunicationList;
use View\BaseRender;
use View\CommunicationRender;
use View\CommunicationsRender;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use View\CommunicationUpdateRender;

class CommunicationController extends  AbstractSimplexController
{
    public function indexAction(Request $request)
    {
        return new RedirectResponse('/front.php/communication/list');
    }

    public function communicationListAction(Request $request)
    {
        try {
            $id = empty($request->get('id')) ? null : (int) $request->get('id');
            $communicationFilter = new CommunicationDTO($id, $request->get('name'));

            $repository = new CommunicationRepository();
            $list = (new CommunicationList($communicationFilter, $repository))->getList();

            $render = new CommunicationsRender();

            return $this->render($render, ['list' => $list]);
        } catch (\Throwable $t) {
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

            $render = new CommunicationRender();

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
            $render = new CommunicationUpdateRender();

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
