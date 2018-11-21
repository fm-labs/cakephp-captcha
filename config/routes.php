<?php
\Cake\Routing\Router::plugin('Captcha', [], function(\Cake\Routing\RouteBuilder $routes) {
    $routes->connect('/image', ['controller' => 'Captcha', 'action' => 'image']);
    $routes->connect('/image', ['controller' => 'Captcha', 'action' => 'demo']);
});