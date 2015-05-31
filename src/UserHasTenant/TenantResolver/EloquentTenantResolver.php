<?php  namespace Tenantable\UserHasTenant\TenantResolver;

use Illuminate\Contracts;
use Illuminate\Contracts\Config\Repository;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

class EloquentTenantResolver implements TenantResolverInterface {

    protected $tenant;

    protected $config;

    public function __construct(Repository $config, Application $app, Request $request)
    {
        $this->config = $config;

        $this->tenant = $app->make($this->config->get('tenantable.tenant.model'))->where($this->config->get('tenantable.tenant.database.column', 'slug'),
                                                                $request->route($this->config->get('tenantable.tenant.route.parameter', 'tenant'))
                                                                )->first();
    }

    /**
     * Get the ID for the tenant the request is directed to.
     *
     * @return integer
     */
    public function getTenantId()
    {
        return $this->tenant->id;
    }

}