<?php  namespace Tenantable\UserHasTenant\Providers;

use Illuminate\Support\ServiceProvider;
use Tenantable\UserHasTenant\TenantResolver\EloquentTenantResolver;
use Tenantable\UserHasTenantTenantable;
use Tenantable\UserHasTenant\UserResolver\EloquentUserResolver;

class UserHasTenantServiceProvider extends ServiceProvider {

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('Tenantable\UserHasTenant\TenantResolver\TenantResolverInterface', function ($app){
            return new EloquentTenantResolver($app['config'], $app, $app['request']);
        });

        $this->app->bind('Tenantable\UserHasTenant\UserResolver\UserResolverInterface', function($app){
            return new EloquentUserResolver($app['Illuminate\Contracts\Auth\Guard'], $app['config']);
        });

        $this->app->bind('Tenantable\UserHasTenant\UserHasTenant', function($app)
        {
            return new UserHasTenant($app['Tenantable\UserHasTenant\TenantResolver\TenantResolverInterface'],
                                                        $app['Tenantable\UserHasTenant\UserResolver\UserResolverInterface']);
        });
    }

    public function boot()
    {
        $this->publishes([
            __DIR__.'/../Config/laravel.php' => config_path('tenantable.php')
        ]);
    }
}