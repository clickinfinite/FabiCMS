<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace core\base\packages\Validation;

use core\base\packages\Validation\ErrorBox as EB;
/**
 * Description of Validator
 *
 * $rules => 'name' >>> 'required|min(10)'
 * 
 * @author Root
 */
class Validator {
    
    private $placeholders = [':attribute', ':min',':max',':other'];

    public function __construct($rules, $obj, $messages = null) {
        $this->validate($rules,$obj,$messages);
    }
    
    private function validate($rules, $obj, $messages) {     
        $keys = [];
        
        foreach ($rules as $key => $value) {
            if(strpos($key, ',') !== FALSE){
               $keys = array_fill_keys(explode(',', $key), $value);
               unset($rules[$key]);
            }
            continue;
        }
        

        foreach ($obj as $k => $v) {
            if(key_exists($k, $keys)) {
                $array_rules = explode('|', $keys[$k]);
                foreach ($array_rules as $value) {
                      $this->rule($value, $v, $k, $obj, $messages);
                  }  
            } 
            if(key_exists($k, $rules)){
                $array_rules = explode('|', $rules[$k]);
                foreach ($array_rules as $value) {
                      $this->rule($value, $v, $k, $obj, $messages);
                  }   
            }
        }      
    }
    
    
    private function rule($rule, $field, $key, $obj, $messages) {
        $rule = explode(':', $rule);
        
        $rule['key'] = $key;
       
        $rule_name = key_exists($rule[0],Rule::$user_rules);
        
        $method_name = $rule_name ? 'userRule' : $rule[0] . 'Check';
        
        EB::write(str_replace($this->placeholders,[$key,$rule[1] ?? null,$rule[2] ?? null, $rule[1] ?? null],(new Rule($rule, $field, $obj, $messages))->$method_name($field)),$key,$rule[0]);

    }
    
    
    public static function addRules($name, callable $fnc, $message = null) {   
        Rule::$user_rules[$name][] = $fnc;
        Rule::$user_rules[$name][] = $message;
    }
    
    public function errors() {
        return new EB();
    }
}
