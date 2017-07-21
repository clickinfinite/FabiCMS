<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace core\base\packages\Validation;

/**
 * Description of Rule
 *
 * @author Root
 */
class Rule {
    
    private $obj;
    private $rule;
    private $field;
    private $texts;
    private $user_texts;
    public static $user_rules;
    
    public function __construct($rule, $field, $obj, $messages) {
        $this->texts = require PATH['core'] . '/base/texts/validation.php';
        $this->user_texts = $messages;
        $this->rule = $rule;
        $this->field = $field;
        $this->obj = $obj;

    }
    
    public function requiredCheck($field) {
        if(empty($field)){
            return $this->user_texts[$this->rule['key'] . '.required'] ?? $this->user_texts['required'] ?? $this->user_texts[$this->rule['key'] . '.required'] ?? $this->user_texts['required'] ?? $this->texts[$this->rule['key'] . '.required'] ?? $this->texts['required'];
        }   
        
        return false;
    }
    
    
    public function minCheck($field) {
        switch (gettype($field)) {
            case 'string':
                if(mb_strlen($field,'UTF-8') < $this->rule[1]){
                    return $this->user_texts[$this->rule['key'] . '.min'] ?? $this->user_texts['min'] ?? $this->texts[$this->rule['key'] . '.min'] ?? $this->texts['min'];
                }
                break;

            case 'integer':
                if($field < $this->rule[1]){
                    return $this->user_texts[$this->rule['key'] . '.min'] ?? $this->user_texts['min'] ?? $this->texts[$this->rule['key'] . '.min'] ?? $this->texts['min'];
                }              
                break;
        }
    }
    
    public function maxCheck($field) {
        switch (gettype($field)) {
            case 'string':
                if(mb_strlen($field,'UTF-8') > $this->rule[1]){
                    return $this->user_texts[$this->rule['key'] . '.max'] ?? $this->user_texts['max'] ?? $this->texts[$this->rule['key'] . '.max'] ?? $this->texts['max'];
                }
                break;

            case 'integer':
                if($field > $this->rule[1]){
                    return $this->user_texts[$this->rule['key'] . '.max'] ?? $this->user_texts['max'] ?? $this->texts[$this->rule['key'] . '.max'] ?? $this->texts['max'];
                }              
                break;
        }
    }
    
     public function betweenCheck($field) {
        switch (gettype($field)) {
            case 'string':
                if(!(mb_strlen($field,'UTF-8') > $this->rule[1] && mb_strlen($field,'UTF-8') < $this->rule[2])){
                    return $this->user_texts[$this->rule['key'] . '.between'] ?? $this->user_texts['between'] ?? $this->texts[$this->rule['key'] . '.between'] ?? $this->texts['between'];
                }
                break;

            case 'integer':
                if(!($field > $this->rule[1]  && $field < $this->rule[2])){
                    return $this->user_texts[$this->rule['key'] . '.between'] ?? $this->user_texts['between'] ?? $this->texts[$this->rule['key'] . '.between'] ?? $this->texts['between'];
                }              
                break;
        }
    }
    
    public function emailCheck($field) {
        if(!(is_string($field) && filter_var($field, FILTER_VALIDATE_EMAIL))){
            return $this->user_texts[$this->rule['key'] . '.email'] ?? $this->user_texts['email'] ?? $this->texts[$this->rule['key'] . '.email'] ?? $this->texts['email'];
        }
        
        return FALSE;
    }
    
    public function urlCheck($field) {
        if(!(filter_var($field, FILTER_VALIDATE_URL))){
           return $this->user_texts[$this->rule['key'] . '.url'] ?? $this->user_texts['url'] ?? $this->texts[$this->rule['key'] . '.url'] ?? $this->texts['url'];
        }
        
        return FALSE;
    }
    
    public function intCheck($field) {
        if(!(filter_var($field, FILTER_VALIDATE_INT))){
           return $this->user_texts[$this->rule['key'] . '.int'] ?? $this->user_texts['int'] ?? $this->texts[$this->rule['key'] . '.int'] ?? $this->texts['int'];
        }
        
        return FALSE;
    }
    
     public function alphaCheck($field) {
        if(!(preg_match('~^[a-zA-Z]+$~', $field))){
           return $this->user_texts[$this->rule['key'] . '.alpha'] ?? $this->user_texts['alpha'] ?? $this->texts[$this->rule['key'] . '.alpha'] ?? $this->texts['alpha'];
        }
        return FALSE;
    }
    
    public function alphasymCheck($field) {
        if(!(preg_match('~^[a-zA-Z0-9\-_]+$~', $field))){
           return $this->user_texts[$this->rule['key'] . '.alphasym'] ?? $this->user_texts['alphasym'] ?? $this->texts[$this->rule['key'] . '.alphasym'] ?? $this->texts['alphasym'];
        }
        return FALSE;
    }
    
     public function alphanumCheck($field) {
        if(!(preg_match('~^[a-zA-Z0-9]+$~', $field))){
           return $this->user_texts[$this->rule['key'] . '.alphanum'] ?? $this->user_texts['alphanum'] ?? $this->texts[$this->rule['key'] . '.alphanum'] ?? $this->texts['alphanum'];
        }
        return FALSE;
    }
   
    public function confirmedCheck($field) {
        if(!($field == $this->obj[$this->rule['key'] . '_confirm'])){
             return $this->user_texts[$this->rule['key'] . '.confirmed'] ?? $this->user_texts['confirmed'] ?? $this->texts[$this->rule['key'] . '.confirmed'] ?? $this->texts['confirmed'];
        }
        return FALSE;
    } 
    
    public function sameCheck($field) {
        if(!($field == $this->obj[$this->rule[1]])){
             return $this->user_texts[$this->rule['key'] . '.same'] ?? $this->user_texts['same'] ?? $this->texts[$this->rule['key'] . '.same'] ?? $this->texts['same'];
        }
        return FALSE;
    } 
    
    public function userRule($field) {
        $name_callable = $this->rule[0];
        
        unset($this->rule[0]);
       
        if(!self::$user_rules[$name_callable][0]($this->rule['key'],$field, array_values($this->rule))){
           return self::$user_rules[$name_callable][1] ?? 'Invalid field'; 
       }
    }
    
    // TODO доработать
    public function acceptedCheck($field) {
        if(!( !empty($field) && ($field == 'yes' || $field == 1))){
            return $this->user_texts[$this->rule['key'] . '.accepted'] ?? $this->user_texts['accepted'] ?? $this->texts[$this->rule['key'] . '.accepted'] ?? $this->texts['accepted'];
        }
        
        return FALSE;

    }
    
    
    
}
