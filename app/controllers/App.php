<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\controllers;

use core\base\View;
/**
 * Description of App
 *
 * @author Root
 */
class App extends \core\base\Controller {
    
    public $data = [];

    public function getView() {
        $this->view = new View($this->route, $this->tpl, $this->layout);
        
        $this->view->render($this->data);
    }
    
        
    public function add(array $params) {
        foreach ($params as $k => $v) {
            $this->data[$k] = $v;
        }
    }
}
