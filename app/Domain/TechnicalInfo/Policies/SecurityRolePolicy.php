<?php

namespace App\Domain\TechnicalInfo\Policies;

use App\Models\User;
use App\Models\SecurityRole;
use Illuminate\Auth\Access\HandlesAuthorization;

class SecurityRolePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param \App\Models\User $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return true;

        //return $user->hasPermissionTo('view security roles');
    }

    /**
    * Determine whether the user can view the model.
    *
    * @param \App\Models\User $user
    * @param \App\Models\SecurityRole $security_roles
    * @return mixed
    */
    public function view(User $user, SecurityRole $security_roles )
    {
        return true;

        //return $user->hasPermissionTo('view security roles');
    }

    /**
    * Determine whether the user can create models.
    *
    * @param \App\Models\User $user
    * @return mixed
    */
    public function create(User $user)
    {
        return true;

        //return $user->hasPermissionTo('create security roles');
    }

    /**
    * Determine whether the user can update the model.
    *
    * @param \App\Models\User $user
    * @param \App\Models\SecurityRole $security_roles
    * @return mixed
    */
    public function update(User $user, SecurityRole $security_roles )
    {
        return true;

        //return $user->hasPermissionTo('edit security roles');
    }

    /**
    * Determine whether the user can delete the model.
    *
    * @param \App\Models\User $user
    * @param \App\Models\SecurityRole $security_roles
    * @return mixed
    */
    public function delete(User $user, SecurityRole $security_roles )
    {
        return true;

        //return $user->hasPermissionTo('edit security roles');
    }

    /**
    * Determine whether the user can restore the model.
    *
    * @param \App\Models\User $user
    * @param \App\Models\SecurityRole $security_roles
    * @return mixed
    */
    public function restore(User $user, SecurityRole $security_roles )
    {
        return true;

        //return $user->hasPermissionTo('delete security roles');
    }

    /**
    * Determine whether the user can permanently delete the model.
    *
    * @param \App\Models\User $user
    * @param \App\Models\SecurityRole $security_roles
    * @return mixed
    */
    public function forceDelete(User $user, SecurityRole $security_roles )
    {
        return true;

        //return $user->hasPermissionTo('delete security roles');
    }
}

