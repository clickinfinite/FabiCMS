<?php

namespace app\controllers;


use core\base\packages\Validation\Validator;
/**
 * Description of Page
 *
 * @author Root
 */
class PageController extends App {
    
    
    public function indexAction() {
       $model = new \app\models\Page;
       
        Validator::addRules('equal', function($field_name,$value,$arguments = []) {
           return $value == $arguments[0];
       }, 'Они НЕ РАВНІ :attribute');
       
       Validator::addRules('dx', function($field_name,$value,$arguments = []) {
           return $value === 'fabi';
       }, 'Ди');
       
       $rules = [
         'name,email,my' => 'required|min:6',
         'email'  => 'email',
          'name' => 'same:my|between:6:15', 
           
       ];
       
      

       
      $v = new Validator($rules,$_POST,['email.min' => 'Нам нужен ваш емайл minnnnn','between' => ':min ==== :max']);
      
      debug(($v->errors()->all()));
       return $this;
    }
    
    
    public function viewAction() {
        return $this;
    }
}
