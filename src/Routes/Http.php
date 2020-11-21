<?php

namespace BakriMoharram\AppUnits\Routes;

use Illuminate\Routing\Router;

abstract class Http
{
    protected Router $router;

    protected $options;

    public function __construct(array $options = [])
    {
        $this->router = app('router');
        $this->options = $options;
    }

    public function register()
    {
        $this->router->group($this->options, function () {
            $this->routes();
        });
    }

    abstract public function routes();
}
