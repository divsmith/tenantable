<?php  namespace Tenantable\TenantResolver;

interface TenantResolverInterface {

    /**
     * Get the ID for the tenant the request is directed to.
     *
     * @return integer
     */
    public function getTenantId();

    /**
     * Get the IDs for the users associated with the tenant
     * the request is directed to.
     *
     * @return array
     */
    public function getTenantUserIds();

}