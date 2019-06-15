<?php

namespace View;

class OpsRender implements IRender
{
    public function render(array $vars = [])
    {
        extract($vars, EXTR_SKIP);

        include 'ops.php';
    }
}
