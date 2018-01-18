<?php declare(strict_types=1);

foreach (scandir(__DIR__ . '/routing') as $file) {
    if ($file == '.' || $file == '..') {
        continue;
    }
    require_once __DIR__ . '/routing/' . $file;
}

$router->notFound([
    'module' => 'App',
    'controller' => 'App',
    'action' => 'notFound',
]);
