<?php
// раз наш контроллер showsAction, то будет вызвана функция showsAction()
function indexAction() {
    echo "indexAction";
    $title = 'Main';
    $view = "index_view.php";
    generateResponse($view, [
        'title'=>$title
    ]);
}

function showsAction() {
    // при вызове данной функции мы формируем:
    $title = 'Shows'; // $title - заголовок страницы
    // и
    $view = "shows.php"; // $view - имя файла, который будем подключать в шаблоне template.php,
    // далее вызываем функцию generateResponse(), с передав аргументы $title и $view
    // Эта функция подключит файл(вид), с именем  "shows.php" в шаблон
    // и передаст в него заголовок 'Shows'
    generateResponse($view, [
        'title'=>$title
    ]);
}

function generateResponse($view, $data=[]) {
// при вызове данной функции в данном случае:
// $view - "shows.php"
// $data - массив [ 'title' => 'Shows' ]
    if(is_array($data)) {
        extract($data);
        // функция extract превращает массив в переменную $title (ключ массива), со значением 'Shows',
        // т.е вместо массива [ 'title' => 'Shows' ], мы получаем $title = 'Shows'
    }

    // далее происходит подключение файла template.php
    require_once "../private/Views/template.php";
    // т.е вместо строчки require_once "../private/Views/template.php";
    // подставляется весь код из файла template.php


    }
    ?>
<!-- код из файла template.php -->
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <!-- вместо переменной $title, подставляется ее значение, т.е 'Shows'  -->
        <!-- <title><?php //echo $title?></title>-->
        <!-- получаем  -->
        <title>Shows</title>
    </head>
    <body>
    <!-- вместо переменной $view, подставляется ее значение, т.е 'shows.php'  -->
    <?php //require_once $view; ?>
    <!-- получаем  -->
    <?php //require_once 'shows.php'; ?>
    <!-- в свою очередь вместо строчки require_once 'shows.php' подставляется содержимое файла shows.php  -->
    <!-- т.е  -->
    <div>Shows</div>
    </body>
</html>

