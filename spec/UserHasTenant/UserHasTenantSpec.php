<?php

namespace spec\Tenantable\UserHasTenant;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Tenantable\UserHasTenant\TenantResolver\TenantResolverInterface;
use Tenantable\UserHasTenant\UserResolver\UserResolverInterface;

class UserHasTenantSpec extends ObjectBehavior
{
    function let(TenantResolverInterface $tenantResolver, UserResolverInterface $userResolver)
    {
        $this->beConstructedWith($tenantResolver, $userResolver);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Tenantable\UserHasTenant\UserHasTenant');
    }

    function it_returns_false_when_tenant_not_associated_with_user(TenantResolverInterface $tenantResolver, UserResolverInterface $userResolver)
    {
        $this->beConstructedWith($tenantResolver, $userResolver);

        $tenantResolver->getTenantId()->willReturn(5);
        $userResolver->getUserTenantIds()->willReturn([1, 2, 3, 4]);

        $this->userBelongsToTenant()->shouldReturn(false);
    }

    function it_returns_true_when_tenant_is_associated_with_user(TenantResolverInterface $tenantResolver, UserResolverInterface $userResolver)
    {
        $this->beConstructedWith($tenantResolver, $userResolver);

        $tenantResolver->getTenantId()->willReturn(1);
        $userResolver->getUserTenantIds()->willReturn([1, 2, 3, 4]);

        $this->userBelongsToTenant()->shouldReturn(true);
    }

    function it_returns_false_when_tenant_not_defined(TenantResolverInterface $tenantResolver, UserResolverInterface $userResolver)
    {
        $this->beConstructedWith($tenantResolver, $userResolver);

        $tenantResolver->getTenantId()->willReturn(null);
        $userResolver->getUserTenantIds()->willReturn([1, 2, 3, 4]);
    }

    function it_returns_false_when_user_not_defined(TenantResolverInterface $tenantResolver, UserResolverInterface $userResolver)
    {
        $this->beConstructedWith($tenantResolver, $userResolver);

        $tenantResolver->getTenantId()->willReturn(5);
        $userResolver->getUserTenantIds()->willReturn(null);
    }
}
