<?php

namespace View;

class NavElement
{
    private $href;
    private $label;
    private $level;

    /**
     * NavElement constructor.
     * @param $href
     * @param $label
     * @param $level
     */
    public function __construct($href, $label, $level = null)
    {
        $this->href = $href;
        $this->label = $label;
        $this->level = $level;
    }

    /**
     * @return mixed
     */
    public function getHref()
    {
        return $this->href;
    }

    /**
     * @return mixed
     */
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * @return mixed
     */
    public function getLevel()
    {
        return $this->level;
    }
}