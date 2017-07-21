<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace core\base\packages\Validation;

/**
 * Description of ErrorBox
 *
 * @author Root
 */
class ErrorBox {
    
    private static $errors = [];

    
    public static function write($error,$key,$rule_name) {
      if($error){
        self::$errors[$key][$rule_name] = $error;
    }
        $GLOBALS['validErrors'] = new self;
    }
    
    public function all() {
       return self::$errors;
    }
    
    public function first($field) {
        if(key_exists($field, self::$errors)){
            return current(self::$errors[$field]);
        }
        return NULL;
    }
    
    public function get($field) {
        if(key_exists($field, self::$errors)){
            return self::$errors[$field];
        }
        return NULL;
    }
    
    public function has($field) {
        if(key_exists($field, self::$errors)){
            return TRUE;
        }
        return NULL;
    }
}
