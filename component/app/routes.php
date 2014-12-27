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

$routes->add("foo", new Route('/foo'));

$routes->add("bar", new Route('/bar', array(
    "_controller"   => "BarController::test"

)));

$routes->add("home", new Route('/{id}', array(
    "_controller"   => "HomeController::test"
)));

return $routes;
