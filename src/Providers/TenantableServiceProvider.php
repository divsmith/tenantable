<?php  namespace Tenantable\Providers;

use Illuminate\Support\ServiceProvider;

class TenantableServiceProvider extends ServiceProvider {

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('Tenantable\TenantResolver\TenantResolverInterface', function ($app){
            return new TenantResolver\EloquentTenantResolver($app['config'], $app, $app['request']);
        });

        $this->app->bind('Tenantable\UserResolver\UserResolverInterface', function($app){
            return new UserResolver\EloquentUserResolver($app['Illuminate\Contracts\Auth\Guard'], $app['config']);
        });

        $this->app->bind('Tenantable\Tenantable', function($app)
        {
            return new Tenantable($app['Tenantable\TenantResolver\TenantResolverInterface'], $app['Tenantable\UserResolver\UserResolverInterface']);
        });
    }

    public function boot()
    {
        $this->publishes([
            __DIR__.'/../Config/laravel.php' => config_path('tenantable.php')
        ]);
    }
}