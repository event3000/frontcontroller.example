<?php
namespace Vendor\Frontcontroller\Controllers;

use Vendor\Frontcontroller\Base\Controller;
use Vendor\Frontcontroller\Models\AccountModel;

class AccountController extends Controller
{
    private $model;
    public function __construct()
    {
        $this->model = new AccountModel();
    }

    function indexAction() {
        echo "AccountController, <br>indexAction";
    }

    function loginAction() {
        echo "AccountController, loginAction";
    }

    function registrationAction() {
        $this->generateView($this->template, "registration_view.php");
    }
}