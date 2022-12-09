<?php

namespace App\Domain\ClaimForms\Policies;

use App\Models\User;
use App\Domain\ClaimForms\Models\RGA1ClaimForm;
use Illuminate\Auth\Access\HandlesAuthorization;

class RGA1ClaimFormPolicy
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

        //return $user->hasPermissionTo('view rga1 claim forms');
    }

    /**
    * Determine whether the user can view the model.
    *
    * @param \App\Models\User $user
    * @param \App\Domain\ClaimForms\Models\RGA1ClaimForm $r_g_a1_claim_form
    * @return mixed
    */
    public function view(User $user, RGA1ClaimForm $r_g_a1_claim_form )
    {
        return true;

        //return $user->hasPermissionTo('view rga1 claim forms');
    }

    /**
    * Determine whether the user can create models.
    *
    * @param \App\Models\User $user
    * @return mixed
    */
    public function create(User $user)
    {

        return $user->hasPermissionTo('create rga1 claim forms');
        return true;

    }

    /**
    * Determine whether the user can update the model.
    *
    * @param \App\Models\User $user
    * @param \App\Domain\ClaimForms\Models\RGA1ClaimForm $r_g_a1_claim_form
    * @return mixed
    */
    public function update(User $user, RGA1ClaimForm $r_g_a1_claim_form )
    {

        return $user->hasPermissionTo('edit rga1 claim forms');
        return true;

        //return $user->hasPermissionTo('edit rga1 claim forms');
    }

    /**
    * Determine whether the user can delete the model.
    *
    * @param \App\Models\User $user
    * @param \App\Domain\ClaimForms\Models\RGA1ClaimForm $r_g_a1_claim_form
    * @return mixed
    */
    public function delete(User $user, RGA1ClaimForm $r_g_a1_claim_form )
    {
        return true;

        //return $user->hasPermissionTo('edit rga1 claim forms');
    }

    /**
    * Determine whether the user can restore the model.
    *
    * @param \App\Models\User $user
    * @param \App\Domain\ClaimForms\Models\RGA1ClaimForm $r_g_a1_claim_form
    * @return mixed
    */
    public function restore(User $user, RGA1ClaimForm $r_g_a1_claim_form )
    {
        return true;

        //return $user->hasPermissionTo('delete rga1 claim forms');
    }

    /**
    * Determine whether the user can permanently delete the model.
    *
    * @param \App\Models\User $user
    * @param \App\Domain\ClaimForms\Models\RGA1ClaimForm $r_g_a1_claim_form
    * @return mixed
    */
    public function forceDelete(User $user, RGA1ClaimForm $r_g_a1_claim_form )
    {
        return true;

        //return $user->hasPermissionTo('delete rga1 claim forms');
    }
}

