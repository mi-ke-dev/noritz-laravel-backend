<?php

namespace App\Domain\PartsLookup\Policies;

use App\Models\User;
use App\Domain\PartsLookup\Models\Part;
use Illuminate\Auth\Access\HandlesAuthorization;

class PartPolicy
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
        return $user->hasPermissionTo('list parts');
    }

    /**
    * Determine whether the user can view the model.
    *
    * @param \App\Models\User $user
    * @param \App\Domain\PartsLookup\Models\Part $parts
    * @return mixed
    */
    public function view(User $user)
    {
        return $user->hasPermissionTo('view parts');
    }

    /**
    * Determine whether the user can create models.
    *
    * @param \App\Models\User $user
    * @return mixed
    */
    public function create(User $user)
    {
        return $user->hasAnyPermission(['create parts']);
    }

    /**
    * Determine whether the user can update the model.
    *
    * @param \App\Models\User $user
    * @param \App\Domain\PartsLookup\Models\Part $parts
    * @return mixed
    */
    public function update(User $user, Part $parts )
    {
        return $user->hasPermissionTo('edit parts');
    }

    /**
    * Determine whether the user can delete the model.
    *
    * @param \App\Models\User $user
    * @param \App\Domain\PartsLookup\Models\Part $parts
    * @return mixed
    */
    public function delete(User $user, Part $parts )
    {
        return $user->hasPermissionTo('delete parts');
    }

    /**
    * Determine whether the user can restore the model.
    *
    * @param \App\Models\User $user
    * @param \App\Domain\PartsLookup\Models\Part $parts
    * @return mixed
    */
    public function restore(User $user, Part $parts )
    {
        return $user->hasPermissionTo('delete parts');
    }

    /**
    * Determine whether the user can permanently delete the model.
    *
    * @param \App\Models\User $user
    * @param \App\Domain\PartsLookup\Models\Part $parts
    * @return mixed
    */
    public function forceDelete(User $user, Part $parts )
    {
        return $user->hasPermissionTo('delete parts');
    }
}

