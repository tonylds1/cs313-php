<?php

namespace cs313\Controllers;

use Symfony\Component\HttpFoundation\Request;

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
}
