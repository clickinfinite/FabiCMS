<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\controllers;

/**
 * Description of UserController
 *
 * @author Root
 */
class UserController extends App {

    
    public function registerAction() {
        $this->data['title'] = 'Регистрация';
        
        
        
        return $this;
    }
}