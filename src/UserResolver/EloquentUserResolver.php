<?php  namespace Tenantable\UserResolver; 


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
     * Get the ID for the authenticated user.
     *
     * @return integer
     */
    public function getUserId()
    {
        return $this->user->id;
    }

    /**
     * Get the IDs for the tenants the user is
     * associated with.
     *
     * @return array
     */
    public function getUserTenantIds()
    {
        return $this->user->{$this->config->get('tenantable.tenant.plural', 'tenants')}->lists('id');
    }
}