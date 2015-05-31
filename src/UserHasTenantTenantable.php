<?php namespace Tenantable;

use Tenantable\TenantResolver\TenantResolverInterface;
use Tenantable\UserResolver\UserResolverInterface;

class UserHasTenantTenantable implements Tenantable
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
        return in_array($this->userResolver->getUserId(), $this->tenantResolver->getTenantUserIds());
    }

}
