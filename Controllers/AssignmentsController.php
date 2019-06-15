<?php

namespace cs313\Controllers;

use Symfony\Component\HttpFoundation\Request;
use View\OpsRender;

class AssignmentsController extends  AbstractSimplexController
{
    public function indexAction(Request $request)
    {
        return $this->renderPath('PersonalUI/assignments');
    }

    public function week01Action(Request $request)
    {
        return $this->renderPath('CondominiumUI/hello');
    }

    public function opsAction(Request $request)
    {
        return $this->render(new OpsRender());
    }
}
