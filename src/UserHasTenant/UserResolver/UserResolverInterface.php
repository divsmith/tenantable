<?php  namespace Tenantable\UserHasTenant\UserResolver;

interface UserResolverInterface {

    /**
     * Get the ID for the authenticated user.
     *
     * @return integer
     */
    public function getUserId();

    /**
     * Get the IDs for the tenants the user is
     * associated with.
     *
     * @return array
     */
    public function getUserTenantIds();

}