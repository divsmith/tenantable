<?php namespace Tenantable\UserHasTenant;

use Tenantable\Tenantable;
use Tenantable\UserHasTenant\TenantResolver\TenantResolverInterface;
use Tenantable\UserHasTenant\UserResolver\UserResolverInterface;

class UserHasTenant implements Tenantable
{
    /**
     * @var TenantResolverInterface
     */
    protected $tenantResolver;

    /**
     * @var UserResolverInterface
     */
    protected $userResolver;

    /**
     * @param TenantResolverInterface $tenantResolver
     * @param UserResolverInterface $userResolver
     */
    public function __construct(TenantResolverInterface $tenantResolver, UserResolverInterface $userResolver)
    {
        $this->tenantResolver = $tenantResolver;
        $this->userResolver = $userResolver;
    }

    /**
     * Determine whether the current user is associated with the tenant the
     * request was directed to.
     *
     * @return bool
     */
    public function userBelongsToTenant()
    {
        return in_array($this->tenantResolver->getTenantId(), $this->userResolver->getUserTenantIds());
    }

}
