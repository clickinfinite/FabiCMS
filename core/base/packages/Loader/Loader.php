<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace core\base\packages\Loader;

/**
 * Description of Loader
 *
 * @author Root
 */
class Loader {
    
    public static function modules($name) {
        $filename = PATH['app'] . '/modules/' . $name;
        if(file_exists($filename . '/manifest.php') && file_exists($filename . '/index.php')){
           
        }
        
    }
    
}
