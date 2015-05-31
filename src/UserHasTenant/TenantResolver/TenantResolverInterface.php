<?php  namespace Tenantable\UserHasTenant\TenantResolver;

interface TenantResolverInterface {

    /**
     * Get the ID for the tenant the request is directed to.
     *
     * @return integer
     */
    public function getTenantId();

}