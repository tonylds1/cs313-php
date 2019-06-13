<?php

namespace View;

abstract class RenderDecorator implements IRender
{
    protected $render;
    protected $vars;

    /**
     * BaseRender constructor.
     */
    public function __construct(IRender $render, $vars = [])
    {
        $this->vars = $vars;
        $this->render = $render;
    }

    abstract public function render();
}