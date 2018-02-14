<?php
namespace Vendor\Frontcontroller\Base;

class Router {
    static function run(){
        $controller = 'Index';
        $action = 'index';
        $get = null;

        $routes = explode('/', $_SERVER['REQUEST_URI']);

        if (!empty($routes[1])) {
            $controller = $routes[1]; // имя контроллера
        }

        if (!empty($routes[2])) {
            $action = $routes[2]; // имя метода
        }

        if (!empty($routes[3])) {
            $get = $routes[3]; // параметры из get запроса
        }

        $controller = "Vendor\Frontcontroller\Controllers\\" . ucfirst(strtolower($controller)) . 'Controller';
        $action = strtolower($action) . 'Action';

        if (class_exists($controller)) {
            $controller = new $controller();
        } else {
            // обработка ошибки
            var_dump('class not found');
        }

        if (method_exists($controller, $action)) {
            $controller->$action($get);
        } else {
            // обработка ошибки
            var_dump('method not found');
        }
    }
}