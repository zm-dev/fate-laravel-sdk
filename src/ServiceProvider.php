<?php

namespace ZMDev\FateSDK;

use Illuminate\Routing\Router;
use Illuminate\Support\ServiceProvider as BaseServiceProvider;

class ServiceProvider extends BaseServiceProvider
{

    public function boot(Router $router)
    {
        $this->publishes([
            __DIR__ . '/../config/fate.php' => config_path('fate.php'),
        ], 'config');
        $this->registerRoute($router);
    }

    public function register()
    {
        $this->mergeConfigFrom(dirname(__DIR__) . '/config/fate.php', 'fate');

        $this->registerAccessToken();

        $this->registerLoginChecker();

        $this->registerAuth();
    }

    public function registerAuth()
    {
        $this->app->singleton(Auth::class, function ($app) {
            return new Auth(config('fate'), $app->make(LoginChecker::class));
        });
    }

    public function registerAccessToken()
    {
        $this->app->bind(AccessToken::class, function () {
            return new AccessToken(config('fate'), cache()->driver());
        });
    }

    public function registerLoginChecker()
    {
        $this->app->bind(LoginChecker::class, function ($app) {
            return new LoginChecker($app->make(AccessToken::class), config('fate'));
        });
    }

    /**
     * Register routes.
     *
     * @param $router
     */
    protected function registerRoute($router)
    {
        if (!$this->app->routesAreCached()) {
            $router->group(config('fate.route.options', []), function ($router) {
                $router->get(config('fate.route.callback', '/fate/callback'), 'ZMDev\FateSDK\Controllers\AuthController@callback');
                $router->get(config('fate.route.logout', '/fate/logout'), 'ZMDev\FateSDK\Controllers\AuthController@logout');
            });
        }
    }
}
