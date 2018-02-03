<?php
// единая точка входа в приложение, сюда напрвляются все завпросы пользователя
// например, пользователь перешел по ссылке /shows, сформировался запрс http://frontcontroller.example/shows,
// на сервере он попал на данную страницу

include "../private/Controllers/controllers.php";
// При вызове функции runController():
/*
function runController() {
    $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
// результат работы parse_url() присвоим $uri, теперь она равна ('/shows')

    $action = trim($uri, '/') ? : 'index';
// после этого убираем /, остается shows,
// т.е. $action = shows
    $action = $action . 'Action';
// добавляем к $action  'Action', получаем $action = showsAction - это название контроллера,
// который должен отработать

    $action(); // добавив к названию контроллера (), вызовем функцию showsAction()
// вызов данной функции возможен только, если поключен тот файл, в котором она находится
// переходим к файлу с контроллерами (controllers.php)
}
runController();
*/

class Router {
    static function run(){
        $controller = 'Index';
        $action = 'index';

        $routes = explode('/', $_SERVER['REQUEST_URI']);
        var_dump($routes);

        if (!empty($routes[1])) {
            $controller = $routes[1]; // имя контроллера
        }

        if (!empty($routes[2])) {
            $action = $routes[2]; // имя метода
        }


        $controller = ucfirst(strtolower($controller)) . 'Controller';
        $action = strtolower($action) . 'Action';

        $controller_filename = '../private/Controllers/' . $controller . '.php';
        if (file_exists($controller_filename)) {
            require_once $controller_filename;
        } else {
            // обработка ошибки
            var_dump('file not found');
        }

        if (class_exists($controller)) {
            $controller = new $controller();
        } else {
            // обработка ошибки
            var_dump('class not found');
        }

        if (method_exists($controller, $action)) {
            $controller->$action();
        } else {
            // обработка ошибки
            var_dump('method not found');
        }

        var_dump($controller, $action);
    }
}
Router::run();


// если используете Apache, то в публичную папку нужно положить
// файл .htaccess c примерно следующим содержимым

//AddDefaultCharset Off
//<IfModule mod_rewrite.c>
# активация модуля
//RewriteEngine On

# если файл не существует или не является дирректорией
//    RewriteCond %{REQUEST_FILENAME}% !-f
//    RewriteCond %{REQUEST_FILENAME}% !-d
    # QSA - строка запроса ($_GET)
//    RewriteRule ^(.*)$ index.php [L,QSA]
//</IfModule>

