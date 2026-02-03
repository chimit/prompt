<?php

namespace Chimit;

use Illuminate\Support\ServiceProvider;

class PromptServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $promptsPath = resource_path('prompts');

        $this->loadViewsFrom($promptsPath, 'prompts');
        $this->app['view']->addLocation($promptsPath);
        $this->app['view']->addExtension('md', 'blade');
    }
}
