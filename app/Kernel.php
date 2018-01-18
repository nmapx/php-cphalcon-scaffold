<?php declare(strict_types=1);

use Phalcon\Config;
use Phalcon\DiInterface;
use Phalcon\DI\FactoryDefault;
use Phalcon\Http\Response;
use Phalcon\Mvc\Application;
use Phalcon\Mvc\Router;
use Shared\Domain\Exception\HttpException;
use Whoops\Provider\Phalcon\WhoopsServiceProvider;

class Kernel
{
    /** @var DiInterface */
    private $di;

    /** @var Application */
    private $application;

    /**
     * Initialize kernel
     */
    public function __construct()
    {
        $this->di = new FactoryDefault();
    }

    /**
     * Load application
     *
     * @return void
     */
    public function load(): void
    {
        $modules = $this->loadModules();
        $this->loadDI($modules);

        $this->application = new Application($this->di);
        $this->application->registerModules($modules);
    }

    /**
     * Handle request
     *
     * @return string
     * @throws \Throwable
     */
    public function handleRequest(): string
    {
        try {
            return $this->application->handle()->getContent();
        } catch (\Throwable $t) {
            if ($this->di->get('parameters')->app->debug !== 'true') {
                $arr['status'] = false;
                if (!$t instanceof HttpException) {
                    $arr['code'] = 500;
                    $arr['message'] = 'Unexpected error';
                } else {
                    $arr['code'] = $t->getCode();
                    $arr['message'] = $t->getMessage();
                }
                $response = new Response();
                $response->setJsonContent($arr)
                    ->setStatusCode($arr['code'])
                    ->send();
            }
            throw $t;
        }
    }

    /**
     * Destroy application
     *
     * @return void
     */
    public function destroy(): void
    {
        $this->di = null;
        $this->application = null;
    }

    /**
     * Load application modules
     *
     * @return array
     */
    private function loadModules(): array
    {
        return [
            'App' => [
                'className' => 'App\App',
                'path' => __DIR__ . '/../src/App/App.php',
            ],
        ];
    }

    /**
     * Load application DI services
     *
     * @param array $modules
     * @return void
     */
    private function loadDI(array $modules): void
    {
        $parameters = new Config(require_once __DIR__ . '/config/parameters.php');
        $this->di->set('parameters', $parameters);

        $this->di->set('router', function () use ($modules) : Router {
            $router = new Router(false);
            $router->removeExtraSlashes(true);

            foreach ($modules as $module => $details) {
                if (file_exists(__DIR__ . "/../src/{$module}") &&
                    file_exists(__DIR__ . "/../src/{$module}/Application") &&
                    file_exists(__DIR__ . "/../src/{$module}/Application/Resource") &&
                    file_exists(__DIR__ . "/../src/{$module}/Application/Resource/routing.php")) {
                    require_once __DIR__ . "/../src/{$module}/Application/Resource/routing.php";
                }
            }

            return $router;
        });

        if ($parameters->app->debug === 'true') {
            new WhoopsServiceProvider($this->di);
        }
    }
}
