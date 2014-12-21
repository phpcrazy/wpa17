<?php
/**
 * Created by PhpStorm.
 * User: soethiha
 * Date: 12/21/14
 * Time: 6:47 PM
 */


use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;

$routes = new RouteCollection();

$routes->add("foo", new Route('/foo', [function() {
    echo "You Fool!";
}]));

$routes->add("bar", new Route('/bar', array(
    function() {
        echo "Idiot!";
    }
)));

return $routes;
