<?php

namespace BakriMoharram\AppUnits;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Collection;

abstract class UnitServiceProvider extends ServiceProvider
{
    protected $alias = '';

    protected $providers = [];

    protected $hasViews = false;

    protected $hasTranslations = false;

    public function boot()
    {
        $this->registerTranslations();
        $this->registerViews();
    }

    public function register()
    {
        $this->registerProviders(new Collection($this->providers));
    }

    private function registerTranslations()
    {
        if ($this->hasTranslations) {
            $this->loadTranslationsFrom(
                $this->unitPath('Lang'),
                $this->alias
            );
        }
    }

    private function registerViews()
    {
        if ($this->hasViews) {
            $this->loadViewsFrom(
                $this->unitPath('Views'),
                $this->alias
            );
        }
    }

    private function registerProviders(Collection $providers)
    {
        $providers->each(function ($providerClass) {
            $this->app->register($providerClass);
        });
    }

    protected function unitPath($append = null)
    {
        $reflection = new \ReflectionClass($this);

        $realPath = realpath(dirname($reflection->getFileName()) . '/../');

        if (!$append) {
            return $realPath;
        }

        return "{$realPath}/{$append}";
    }
}
