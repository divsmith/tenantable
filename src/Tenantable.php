<?php namespace Tenantable;

use Tenantable\TenantResolver\TenantResolverInterface;
use Tenantable\UserResolver\UserResolverInterface;

class Tenantable
{
    protected $tenantResolver;

    protected $userResolver;

    public function tenantHasUser()
    {
        return in_array($this->userResolver->getUserId(), $this->tenantResolver->getTenantUserIds());
    }

    public function __construct(TenantResolverInterface $tenantResolver, UserResolverInterface $userResolver)
    {
        $this->tenantResolver = $tenantResolver;
        $this->userResolver = $userResolver;
    }

    public function getTenantId()
    {
        return $this->tenantResolver->getTenantId();
    }
}
