<?php

namespace core;

class Router {
    protected static $routes = [];
    protected static $route;
    
    public static function start() {
        self::$routes = include 'config/routes.php';
        self::matchRoute(self::getURI());
    }
    
    
    private static function matchRoute($uri) {
        
        foreach (self::$routes as $regexp => $path) {
            if(preg_match("#$regexp#i", $uri,$matches)){
                
                $segments = explode('/', preg_replace("~$regexp~", $path, $uri));
                        
                $p = null;
                
                foreach ($matches as $key => $value) {
                    if (is_string($key)) {
                        $p[$key] = $value;
                    } 
                }
                
                self::$route['controller'] = ucfirst($segments[0]);
                self::$route['action'] = $segments[1] ?? 'index';
                self::$route['parameters'] = $p;
                             
                $controller = 'app\controllers\\' . ucfirst($segments[0]). 'Controller';
                
                $segments = array_filter($segments);
                
                $action = ($segments[1] ?? 'index') . 'Action';  
                
                if (class_exists($controller) AND method_exists($controller, $action)) {

                    (new $controller(self::$route))->$action()->getView();
                    
                    base\packages\Event\Event::handlerEvents(self::$route);
                    
                } else {
                     echo "<b>Такого контроллера или метода не существует</b>" . $controller;
            }
            
            break;
        }
     }
    }  
    
    private static function getURI() {
        return trim($_SERVER['QUERY_STRING'], '/');
    }
}
