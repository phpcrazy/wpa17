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
use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\HttpKernel\Controller\ControllerResolver;


class Application extends Container {

    public function __construct() {
        $this['request'] = Request::createFromGlobals();
        $this['context'] = function() {
            return new RequestContext();
        };
        $this['context']->fromRequest($this['request']);
     }

    public function run() {
        $route_collection = require DD . "/app/routes.php";
        $matcher = new UrlMatcher($route_collection, $this['context']);

        try {
            $this['request']->attributes->add($matcher->match($this['request']->getPathInfo()));
            $resolver = new ControllerResolver();
            $controller = $resolver->getController($this['request']);
            $arguments = $resolver->getArguments($this['request'], $controller);

            $res = call_user_func_array($controller, $arguments);
            $response = new Response($res, 200);
        } catch(\Symfony\Component\Routing\Exception\ResourceNotFoundException $e) {
            $response = new Response("Not Found" ,404);
        } catch(\Exception $e) {
            $response = new Response("Server Error", 500);
        }

        $response->send();


    }

}
