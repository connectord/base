<?php

class Routes
{

    private $routes = [];

    public function handle(): void
    {
        $uri = $_SERVER['REQUEST_URI'] ?? '/';
        $method = $_SERVER['REQUEST_METHOD'] ?? 'GET';

        foreach ($this->routes as $route) {
            if ($route['method'] === $method && $route['uri'] === $uri) {
                call_user_func($route['callback']);
                return;
            }
        }

        // We get this far if no route matches, but we have to return some sort of HTML response, so:
        throw new Exception("No matching route found for $method $uri");

    }

    public function get(string $uri, callable $callback): void
    {
        $this->routes[] = ['method' => 'GET', 'uri' => $uri, 'callback' => $callback];
    }

    public function post(string $uri, callable $callback): void
    {
        $this->routes[] = ['method' => 'POST', 'uri' => $uri, 'callback' => $callback];
    }
}