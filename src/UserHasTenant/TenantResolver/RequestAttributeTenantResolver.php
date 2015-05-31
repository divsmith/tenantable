<?php  namespace Tenantable\UserHasTenant\TenantResolver; 

use Symfony\Component\HttpFoundation\Request;

class RequestAttributeTenantResolver implements TenantResolverInterface {

    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * Get the ID for the tenant the request is directed to.
     *
     * @return integer
     */
    public function getTenantId()
    {
        return $this->request->attributes->get('tenantId');
    }
}