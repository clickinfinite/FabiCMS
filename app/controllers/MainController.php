<?php

namespace app\controllers;

use app\models\Main;
use core\base\packages\{Event\Event, Loader\Loader};

/**
 * Description of MainController
 *
 * @author Root
 */
class MainController extends App {
    
    
    public function indexAction() {
       $this->layout = 'new';
        
        $m = new Main;        
        $this->data['title'] = 'MAIN';
        
        Loader::modules('notice');
        
        return $this;
    }
}
