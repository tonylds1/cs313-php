<?php

namespace View;

class SharedAreaUpdateRender implements IRender
{
    public function render(array $vars = [])
    {
        extract($vars, EXTR_SKIP);

        include 'shared-area-update.php';
    }
}
