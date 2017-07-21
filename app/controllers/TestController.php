<?php

namespace app\controllers;

/**
 * Description of MainController
 *
 * @author Root
 */
class TestController extends App {
    
    
    public function indexAction() {
        $this->data = $this->route['parameters'];
        return $this;
    }
    
    
    public function newAction() {
        return $this;
    }
}
