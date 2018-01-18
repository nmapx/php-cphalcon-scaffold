<?php declare(strict_types=1);

namespace App\Application\Controller;

use Phalcon\Mvc\View;
use Phalcon\Http\Response;
use Phalcon\Mvc\User\Component;

class App extends Component
{
    public function index(): Response
    {
        return $this->response->setJsonContent([
            'hello' => 'world',
        ]);
    }

    public function notFound(): View
    {
        return $this->view;
    }
}
