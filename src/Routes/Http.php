<?php

namespace BakriMoharram\AppUnits\Routes;

abstract class Http
{
    protected $router;

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
