<?php
namespace Vendor\Frontcontroller\Controllers;
use Vendor\Frontcontroller\Base\Controller;
class IndexController extends Controller
{
    function indexAction() {
        $this->generateView($this->template, 'index_view.php');
    }
}