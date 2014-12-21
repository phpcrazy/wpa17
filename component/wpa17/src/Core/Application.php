<?php
/**
 * Created by PhpStorm.
 * User: soethiha
 * Date: 12/21/14
 * Time: 5:21 PM
 */

namespace Wpa17\Core;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Pimple\Container;



class Application extends Container {

    public function __construct() {
        $this['request'] = Request::createFromGlobals();

     }

    public function run() {
        var_dump($this['request']->query->get('id'));
        $path_info = $this['request']->getPathInfo();
        $route_collecton = require DD . "/app/routes.php";
        var_dump($route_collecton);
    }

}
