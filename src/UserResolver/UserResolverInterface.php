<?php  namespace Tenantable\UserResolver;

interface UserResolverInterface {

    /**
     * Get the ID for the authenticated user.
     *
     * @return integer | null
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