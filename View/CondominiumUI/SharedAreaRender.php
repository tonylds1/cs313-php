<?php

namespace View;

class SharedAreaRender extends RenderDecorator
{
    /**
     * SharedAreaRender constructor.
     */
    public function __construct($vars = [])
    {
        $this->render = new BaseRender($this, $vars);
    }

    public function render()
    {
        include 'shared-areas.php';
    }
}