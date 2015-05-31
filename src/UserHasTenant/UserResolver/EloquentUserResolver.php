<?php  namespace Tenantable\UserHasTenant\UserResolver;


use Illuminate\Config\Repository;
use Illuminate\Contracts\Auth\Guard;

class EloquentUserResolver implements UserResolverInterface {

    protected $user;

    protected $config;

    public function __construct(Guard $auth, Repository $config)
    {
        $this->user = $auth->user();

        $this->config = $config;
    }

    /**
     * Get the IDs for the tenants the user is
     * associated with.
     *
     * @return array
     */
    public function getUserTenantIds()
    {
        if ( $this->user)
        {
            return $this->user->{$this->config->get('tenantable.tenant.plural', 'tenants')}->lists('id');
        }

        return null;
    }
}