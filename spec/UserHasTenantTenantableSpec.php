<?php

namespace spec\Tenantable;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Tenantable\TenantResolver\TenantResolverInterface;
use Tenantable\UserResolver\UserResolverInterface;

class UserHasTenantTenantableSpec extends ObjectBehavior
{
    function let(TenantResolverInterface $tenantResolver, UserResolverInterface $userResolver)
    {
        $this->beConstructedWith($tenantResolver, $userResolver);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Tenantable\UserHasTenantTenantable');
    }

    function it_returns_false_when_user_not_tenant_member(TenantResolverInterface $tenantResolver, UserResolverInterface $userResolver)
    {
        $this->beConstructedWith($tenantResolver, $userResolver);

        $userResolver->getUserId()->willReturn(5);
        $tenantResolver->getTenantUserIds()->willReturn([1, 2, 3, 4]);

        $this->userBelongsToTenant()->shouldReturn(false);
    }

    function it_returns_true_when_user_is_tenant_member(TenantResolverInterface $tenantResolver, UserResolverInterface $userResolver)
    {
        $this->beConstructedWith($tenantResolver, $userResolver);

        $userResolver->getUserId()->willReturn(1);
        $tenantResolver->getTenantUserIds()->willReturn([1, 2, 3, 4]);

        $this->userBelongsToTenant()->shouldReturn(true);
    }

    function it_returns_false_when_user_not_defined(TenantResolverInterface $tenantResolver, UserResolverInterface $userResolver)
    {
        $this->beConstructedWith($tenantResolver, $userResolver);

        $userResolver->getUserId()->willReturn(null);
        $tenantResolver->getTenantUserIds()->willReturn([1, 2, 3, 4]);
    }

    function it_returns_the_tenant_id(TenantResolverInterface $tenantResolver, UserResolverInterface $userResolver)
    {
        $this->beConstructedWith($tenantResolver, $userResolver);

        $tenantResolver->getTenantId()->shouldBeCalled();
        $tenantResolver->getTenantId()->willReturn(2);

        $this->getTenantId()->shouldReturn(2);
    }
}
