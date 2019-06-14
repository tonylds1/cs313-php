<?php

namespace View;

class SharedAreaRender implements IRender
{
    public function render()
    {
        include 'shared-areas.php';
    }
}