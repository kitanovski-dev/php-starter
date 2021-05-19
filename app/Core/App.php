<?php

namespace App\Core;

use App\Core\Router;
use App\Core\Request;
use App\Core\Response;

class App
{
    public $router;
    public $request;
    public $response;
    public static $app;

    public function __construct()
    {
        self::$app = $this;
        $this->request = new Request();
        $this->response = new Response();
        $this->router = new Router($this->request, $this->response);
    }

    public function run()
    {
        echo $this->router->resolve();
    }
}
