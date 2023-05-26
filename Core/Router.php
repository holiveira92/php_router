<?php

namespace App\Core;

class Router
{
    public Request $request;
    public Response $response;
    protected array $routes = [];
    
    public function __construct(Request $request, Response $response)
    {
        $this->request = $request;
        $this->response = $response;
    }

    public function get(string $path, mixed $callback): void
    {
        $this->routes["get"][$path] = $callback;
    }

    public function post(string $path, mixed $callback): void
    {
        $this->routes["post"][$path] = $callback;
    }

    public function resolve(): mixed
    {
        $path = $this->request->getPath();
        $method = $this->request->getMethod();
        $callback = $this->routes[$method][$path] ?? false;

        if ($callback === false) {
            return $this->response
                ->setStatusCode(404)
                ->returnData([], "404 - Route Not Found");
        }

        return call_user_func($callback, $this->request);
    }
}
