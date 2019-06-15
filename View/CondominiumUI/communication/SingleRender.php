<?php

namespace View\Communication;

use View\IRender;

class SingleRender implements IRender
{
    public function render(array $vars = [])
    {
        extract($vars, EXTR_SKIP);

        include 'single.phtml';
    }
}
