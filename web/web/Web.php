<?php

class Web
{
    private Routes $routes;
    private View $view;

    public function __construct(private string $root)
    {
        $this->routes = new Routes($this);
        $this->view = new View($this);
    }

    public function handle()
    {
        // First, declare all the routes we want
        $this->routes->get('/', function () {
            echo $this->view->render('index');
        });

        // TODO: Set up anything else we need to know

        // And handle the route
        $this->routes->handle();

    }

    public function path(string $path)
    {
        return $this->root . '/' . $path;
    }
}