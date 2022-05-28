<?php

namespace Quarterloop\HostingTile;

use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;
use Quarterloop\HostingTile\Commands\FetchHostingCommand;

class HostingTileServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                FetchHostingCommand::class,
            ]);
        }

        $this->publishes([
            __DIR__ . '/../resources/views' => resource_path('views/vendor/dashboard-hosting-tile'),
        ], 'dashboard-hosting-views');

        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'dashboard-hosting-tile');

        Livewire::component('hosting-tile', HostingTileComponent::class);
    }
}
