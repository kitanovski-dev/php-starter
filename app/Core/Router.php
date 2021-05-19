<?php

namespace App\Core;

use App\Core\Request;
use App\Core\Response;

class Router
{
    public $request;
    public $response;
    protected $routes = [];

    public function __construct(Request $request, Response $response)
    {
        $this->request = $request;
        $this->response = $response;
    }

    /* 
        For this function please use $path with starting '/';
    */
    public function get($path, $callback)
    {
        // $path = explode('/', $path);
        // var_dump($path);
        // die();
        $this->routes['get'][$path] = $callback;
    }

    public function resolve()
    {
        $path = $this->request->getPath();
        // var_dump($path);
        // die();
        if(is_array($path)) {
            $path = '/'.$path['uri'].'/{id}';
        }
        $method = $this->request->getMethod();
        $callback = $this->routes[$method][$path] ?? false;

        if($callback === false) {
            $this->response->setStatusCode(404);
            return 'Page Not Found';
        }

        if(is_string($callback)) {
            $callback = array($callback, '__invoke');
        }

        if(is_array($callback)) {
            $class = new $callback[0];
            $callback[0] = $class;
        }

        return call_user_func($callback);
    }
}
