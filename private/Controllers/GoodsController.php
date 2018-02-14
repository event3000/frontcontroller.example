<?php

namespace Vendor\Frontcontroller\Controllers;

use Vendor\Frontcontroller\Base\Controller;
use Vendor\Frontcontroller\Models\GoodsModel;

class GoodsController extends Controller
{
    private $model;

    public function __construct() {
        $this->model = new GoodsModel();
    }

    public function addAction() {
        $view = "add_good_view.php";
        $this->generateView($this->template, $view);
    }
}