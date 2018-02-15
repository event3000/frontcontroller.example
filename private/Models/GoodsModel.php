<?php
namespace Vendor\Frontcontroller\Models;

class GoodsModel
{

    function addGood($data, $files=null) {
        if ($files != null) {
            $tmp = $files['file']['tmp_name'];
            $file_name = $files['file']['name'];
            return move_uploaded_file($tmp, '../public/static/images/'. $file_name);
        }
    }
}