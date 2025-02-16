<?php

declare(strict_types=1);

namespace App;

class Router
{
    private array $routes = [];

    public function __construct(private array $defaultRoute)
    {

    }

    public function get(string $route, array $callback): void
    {
        $this->routes[$route]['GET'] = $callback;
    }

    public function post(string $route, array $callback): void
    {
        $this->routes[$route]['POST'] = $callback;
    }

    public function resolve(string $uri, string $method): void
    {
        $route = explode('?', $uri)[0];

        $action = $this->routes[$route][$method] ?? $this->defaultRoute;

        [$class, $method] = $action;

        $object = new $class();

        echo $object->$method();
    }
}