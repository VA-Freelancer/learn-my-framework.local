<?php

namespace vproger;

class Router
{
    protected static  array $routes = [];
    protected static  array $route = [];

    public static function add($regexp, $route = [])
    {
        self::$routes[$regexp] = $route;
    }
    public static function getRoutes(): array
    {
        return self::$routes;
    }
    public static function getRoute(): array
    {
        return self::$route;
    }
    public static function dispatch($url)
    {
    if (self::matchRoute($url)) {
        echo "Ok";
    }else{
        echo "No";
    }
    }
    public static function matchRoute($url): bool
    {
        foreach (self::$routes as $pattern => $route){
            if(preg_match("#{$pattern}#", $url, $matches)){
                debug($matches);
                foreach ($matches as $k  => $v){
                    if(is_string($k)){
                        $route[$k] = $v;
                    }
                }
                if(empty($route['action'])){
                    $route['action'] = 'index';
                }
                if(!isset($route['admin_prefix'])){
                    $route['admin_prefix'] = "";
                }else{
                    $route['admin_prefix'] = "\\";
                }
                debug( $route);
                $route['controller'] = self::upperCamelCase($route['controller']);
                debug( $route);
                return true;
            }
        }
        return false;
    }
    protected static function upperCamelCase($name): string
    {
        return str_replace(' ', '', ucwords(str_replace('-', ' ', $name)));

    }
    protected static function lowerCamelCase($name): string
    {
        return lcfirst(self::upperCamelCase($name));

    }
}