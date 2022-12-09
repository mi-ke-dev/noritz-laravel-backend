<?php

namespace App\Domain\TechnicalInfo\Policies;

use App\Models\User;
use App\Models\Heater;
use Illuminate\Auth\Access\HandlesAuthorization;

class HeaterPolicy
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
        return $user->hasPermissionTo('list heaters');
    }

    /**
    * Determine whether the user can view the model.
    *
    * @param \App\Models\User $user
    * @param \App\Models\Heater $heaters
    * @return mixed
    */
    public function view(User $user, Heater $heaters )
    {
        return $user->hasPermissionTo('view heaters');
    }

    /**
    * Determine whether the user can create models.
    *
    * @param \App\Models\User $user
    * @return mixed
    */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create heaters');
    }

    /**
    * Determine whether the user can update the model.
    *
    * @param \App\Models\User $user
    * @param \App\Models\Heater $heaters
    * @return mixed
    */
    public function update(User $user, Heater $heaters )
    {
        return $user->hasPermissionTo('edit heaters');
    }

    /**
    * Determine whether the user can delete the model.
    *
    * @param \App\Models\User $user
    * @param \App\Models\Heater $heaters
    * @return mixed
    */
    public function delete(User $user, Heater $heaters )
    {
        return $user->hasPermissionTo('delete heaters');
    }

    /**
    * Determine whether the user can restore the model.
    *
    * @param \App\Models\User $user
    * @param \App\Models\Heater $heaters
    * @return mixed
    */
    public function restore(User $user, Heater $heaters )
    {
        return $user->hasPermissionTo('delete heaters');
    }

    /**
    * Determine whether the user can permanently delete the model.
    *
    * @param \App\Models\User $user
    * @param \App\Models\Heater $heaters
    * @return mixed
    */
    public function forceDelete(User $user, Heater $heaters )
    {
        return $user->hasPermissionTo('delete heaters');
    }
}

