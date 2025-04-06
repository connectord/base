<?php

class Web
{
    private Routes $routes;

    public function __construct()
    {
        $this->routes = new Routes();
    }

    public function handle()
    {
        // First, declare all the routes we want
        $this->routes->get('/', function () {
            echo "Homepage";
        });

        // TODO: Set up anything else we need to know

        // And handle the route
        $this->routes->handle();

    }
}