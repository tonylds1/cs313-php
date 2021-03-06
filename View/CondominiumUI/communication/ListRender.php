<?php

namespace View\Communication;

use View\IRender;

class ListRender implements IRender
{
    public function render(array $vars = [])
    {
        extract($vars, EXTR_SKIP);

        include 'list.phtml';
    }
}
