<?php

namespace View;

interface IRender
{
    public function render(array $vars = []);
}