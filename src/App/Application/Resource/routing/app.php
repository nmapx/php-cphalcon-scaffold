<?php

use Phalcon\Mvc\Router\Group;

$app = new Group([
    'module' => 'App',
    'controller' => 'App',
]);


$app->add(
    "/",
    [
        'action' => 'index',
    ], [
        'GET',
    ]
);

$router->mount($app);
