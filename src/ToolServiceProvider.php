<?php

namespace NormanHuth\NovaDetachedActions;

use Illuminate\Support\ServiceProvider;
use Laravel\Nova\Nova;
use NormanHuth\NovaBasePackage\ServiceProviderTrait;

class ToolServiceProvider extends ServiceProvider
{
    use ServiceProviderTrait;

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Nova::serving(fn () => Nova::script('detached-actions', __DIR__ . '/../dist/js/tool.js'));
        $this->addAbout();

        $this->publishes([
            __DIR__ . '/../config/nova-detached-actions.php' => config_path('nova-detached-actions.php'),
        ], 'nova-detached-actions');
    }

    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../config/nova-detached-actions.php',
            'nova-detached-actions'
        );
    }
}
