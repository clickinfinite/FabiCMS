<?php

namespace core\base;

abstract class Controller {
    public $route = [];
    
    public $tpl;
    
    public $layout = LAYOUT;

    public function __construct($route) {
        $this->route = $route;
        $this->tpl = $route['action'];
    }

}
