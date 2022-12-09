<?php

namespace App\Domain\ClaimForms\Policies;

use App\Models\User;
use App\Domain\ClaimForms\Models\RGA2ClaimForm;
use Illuminate\Auth\Access\HandlesAuthorization;

class RGA2ClaimFormPolicy
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

        //return $user->hasPermissionTo('view rga2 claim forms');
    }

    /**
    * Determine whether the user can view the model.
    *
    * @param \App\Models\User $user
    * @param \App\Domain\ClaimForms\Models\RGA2ClaimForm $r_g_a2_claim_form
    * @return mixed
    */
    public function view(User $user, RGA2ClaimForm $r_g_a2_claim_form )
    {
        return true;

        //return $user->hasPermissionTo('view rga2 claim forms');
    }

    /**
    * Determine whether the user can create models.
    *
    * @param \App\Models\User $user
    * @return mixed
    */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create rga2 claim forms');
        return true;

        //return $user->hasPermissionTo('create rga2 claim forms');
    }

    /**
    * Determine whether the user can update the model.
    *
    * @param \App\Models\User $user
    * @param \App\Domain\ClaimForms\Models\RGA2ClaimForm $r_g_a2_claim_form
    * @return mixed
    */
    public function update(User $user, RGA2ClaimForm $r_g_a2_claim_form )
    {
        return $user->hasPermissionTo('edit rga2 claim forms');
        return true;

        //return $user->hasPermissionTo('edit rga2 claim forms');
    }

    /**
    * Determine whether the user can delete the model.
    *
    * @param \App\Models\User $user
    * @param \App\Domain\ClaimForms\Models\RGA2ClaimForm $r_g_a2_claim_form
    * @return mixed
    */
    public function delete(User $user, RGA2ClaimForm $r_g_a2_claim_form )
    {
        return true;

        //return $user->hasPermissionTo('edit rga2 claim forms');
    }

    /**
    * Determine whether the user can restore the model.
    *
    * @param \App\Models\User $user
    * @param \App\Domain\ClaimForms\Models\RGA2ClaimForm $r_g_a2_claim_form
    * @return mixed
    */
    public function restore(User $user, RGA2ClaimForm $r_g_a2_claim_form )
    {
        return true;

        //return $user->hasPermissionTo('delete rga2 claim forms');
    }

    /**
    * Determine whether the user can permanently delete the model.
    *
    * @param \App\Models\User $user
    * @param \App\Domain\ClaimForms\Models\RGA2ClaimForm $r_g_a2_claim_form
    * @return mixed
    */
    public function forceDelete(User $user, RGA2ClaimForm $r_g_a2_claim_form )
    {
        return true;

        //return $user->hasPermissionTo('delete rga2 claim forms');
    }
}

