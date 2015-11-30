<?php

namespace Reactor\Providers;


use Illuminate\Routing\Router;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider {

    /**
     * This namespace is applied to the controller routes in your routes file.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'Reactor\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @param  \Illuminate\Routing\Router $router
     * @return void
     */
    public function boot(Router $router)
    {
        $router->pattern('id', '[0-9]+');

        parent::boot($router);
    }

    /**
     * Define the routes for the application.
     *
     * @param  \Illuminate\Routing\Router $router
     * @return void
     */
    public function map(Router $router)
    {
        // Include common routes
        $router->group(['namespace' => $this->namespace], function ($router) {
            // Common routes
            require app_path('Http/routes.php');
            // Reactor routes
            require routes_path($this->app['config']->get('themes.active_reactor') . '.php');
            // Front end routes
            require routes_path($this->app['config']->get('themes.active') . '.php');
        });
    }
}
