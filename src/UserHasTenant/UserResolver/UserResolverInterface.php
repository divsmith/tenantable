<?php  namespace Tenantable\UserHasTenant\UserResolver;

interface UserResolverInterface {

    /**
     * Get the IDs for the tenants the user is
     * associated with.
     *
     * @return array | null
     */
    public function getUserTenantIds();

}