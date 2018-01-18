<?php declare(strict_types=1);

namespace App;

use Phalcon\Loader;
use Phalcon\DiInterface;
use Phalcon\Mvc\ModuleDefinitionInterface;

class App implements ModuleDefinitionInterface
{
    public function registerAutoloaders(DiInterface $di = null)
    {
        $loader = new Loader();
        $loader->registerNamespaces([
            'Shared' => __DIR__ . '/../Shared',
            'App' => __DIR__,
        ], true);
        $loader->register();
    }

    public function registerServices(DiInterface $di = null)
    {
        require_once __DIR__ . '/Application/Resource/di/framework.php';
        require_once __DIR__ . '/Application/Resource/di/infrastructure.php';
        require_once __DIR__ . '/Application/Resource/di/application.php';
    }
}
