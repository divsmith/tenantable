<?php

namespace spec\Tenantable;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class TenantableSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Tenantable\Tenantable');
    }
}
