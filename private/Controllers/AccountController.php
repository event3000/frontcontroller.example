<?php
//namespace Vendor\Frontcontroller\Controllers;
use Vendor\Frontcontroller\Models\AccountModel;

class AccountController
{
    function indexAction() {
        $model = new AccountModel();
        $model->accountModel();

        echo "AccountController, <br>indexAction";
    }

    function loginAction() {
        echo "AccountController, loginAction";
    }
}