<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace core\base\packages\Event;

/**
 * Class manages events
 *
 * @author Root
 */
class Event {
   
    private static $events = [];


    public static function on(string $name, $function) {
        self::$events[$name][] = $function;
    }
    
    public static function trigger($name, $arguments = []) {
        foreach(self::$events[$name] as $value) {    
            $value($arguments);
        }
    }
    
    public static function handlerEvents($data) {
        $name_events = $data['controller'] . '.' . $data['action'];
        
        if(key_exists($name_events, self::$events)){
            self::trigger($name_events); 
        } else {
            return false;
        }
    }
}


