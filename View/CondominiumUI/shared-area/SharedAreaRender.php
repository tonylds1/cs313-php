<?php

namespace View;

class SharedAreaRender implements IRender
{
    public function render(array $vars = [])
    {
        extract($vars, EXTR_SKIP);

        include 'shared-area.php';
    }
}
