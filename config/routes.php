<?php
\Cake\Routing\Router::plugin('Captcha', [], function(\Cake\Routing\RouteBuilder $routes) {
    $routes->connect('/image/*', ['controller' => 'Captcha', 'action' => 'image']);

    if (\Cake\Core\Configure::read('debug')) {
        $routes->connect('/demo/*', ['controller' => 'Captcha', 'action' => 'demo']);
    }
});
