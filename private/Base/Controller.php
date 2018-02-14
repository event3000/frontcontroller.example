<?php
namespace Vendor\Frontcontroller\Base;


class Controller
{
    protected $template = 'template.php';
    function generateView($template, $view, $data=[]){
        extract($data);
        require_once "../private/Views/" . $template;
    }

}