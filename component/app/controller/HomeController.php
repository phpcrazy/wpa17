<?php
/**
 * Created by PhpStorm.
 * User: soethiha
 * Date: 12/27/14
 * Time: 5:54 PM
 */

class HomeController {


    public function __construct()
    {
        echo "Constructor Run!";
    }

    public function test($id)
    {
        echo "Test" . $id;
    }
}