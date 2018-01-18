<?php declare(strict_types=1);

use Phalcon\DiInterface;
use Phalcon\Mvc\Dispatcher;
use Phalcon\Mvc\View;
use Phalcon\Mvc\View\Engine\Volt;

/** @var DiInterface $di */

$parameters = $di->get('parameters');

$di->set('dispatcher', function (): Dispatcher {
    $dispatcher = new Dispatcher();
    $dispatcher->setDefaultNamespace('App\Application\Controller');
    $dispatcher->setActionSuffix(null);
    $dispatcher->setControllerSuffix(null);

    return $dispatcher;
});

$di->set('view', function () use ($parameters): View {
    $view = new View();
    $view->setViewsDir(__DIR__ . '/../view');
    $view->registerEngines([
        '.volt' => function($view, $di) use ($parameters) {
            $volt = new Volt($view, $di);
            $volt->setOptions([
                'compiledPath' => __DIR__ . '/../../../../../var/cache/volt/',
                'compileAlways' => ($parameters->app->debug === 'true') ? true : false,
                'compiledSeparator' => '_',
            ]);

            return $volt;
        }
    ]);

    return $view;
});
