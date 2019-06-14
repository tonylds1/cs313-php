<?php

namespace View;

class SharedAreasRender implements IRender
{
    public function render(array $vars = [])
    {
        extract($vars, EXTR_SKIP);

        include 'shared-areas.php';
    }
}
