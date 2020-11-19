<?php

namespace BakriMoharram\AppUnits\Routes;

use Illuminate\Contracts\Console\Kernel;

abstract class Console
{
    protected $artisan;

    protected $router;

    public function __construct()
    {
        $this->artisan = app(Kernel::class);
        $this->router = $this->artisan;
    }

    public function register()
    {
        $this->routes();
    }

    abstract public function routes();
}
