<?php

// Create the router without default routes
$router = new Phalcon\Mvc\Router(false);

// https://docs.phalcon.io/3.4/en/routing#setting-the-default-route
// https://docs.phalcon.io/3.4/en/routing#setting-default-paths
$router->setDefaultController('index');
$router->setDefaultAction('index');

// $router->setDefaults(['controller' => 'index', 'action' => 'index']);

// Home Page: Route
$router->add('/', ['controller' => 'index', 'action'     => 'index']);

$router->add('/admin/:controller', [
    'namespace'  => 'MyApp\Controllers\Admin',
    'controller' => 1 // {:controller}
]);

// https://docs.phalcon.io/3.4/en/routing#not-found-paths

return $router;
