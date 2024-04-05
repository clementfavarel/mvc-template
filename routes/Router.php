<?php

class Router
{
    public function get($uri, $controller, $method, $middleware = null)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET' && $_SERVER['REQUEST_URI'] === $uri) {
            $controller = new $controller;
            $controller->$method();
        }
    }

    public function post($uri, $controller, $method, $middleware = null)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_SERVER['REQUEST_URI'] === $uri) {
            $controller = new $controller;
            $controller->$method();
        }
    }
}
