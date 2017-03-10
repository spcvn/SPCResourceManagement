<?php
use Cake\Routing\RouteBuilder;
use Cake\Routing\Router;

Router::plugin(
    'SpcAuth',
    ['path' => '/spc-auth'],
    function (RouteBuilder $routes) {
        $routes->fallbacks('DashedRoute');
    }
);
