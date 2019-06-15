<?php

namespace View\Communication;

use View\IRender;

class UpdateRender implements IRender
{
    public function render(array $vars = [])
    {
        extract($vars, EXTR_SKIP);

        include 'update.phtml';
    }
}
