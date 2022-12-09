<?php

namespace App\Domain\ClaimForms\Policies;

use App\Models\User;
use App\Domain\ClaimForms\Models\RMAClaimForm;
use Illuminate\Auth\Access\HandlesAuthorization;

class RMAClaimFormPolicy
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

        //return $user->hasPermissionTo('view rma claim forms');
    }

    /**
    * Determine whether the user can view the model.
    *
    * @param \App\Models\User $user
    * @param \App\Domain\ClaimForms\Models\RMAClaimForm $r_m_a_claim_form
    * @return mixed
    */
    public function view(User $user, RMAClaimForm $r_m_a_claim_form )
    {
        return true;

        //return $user->hasPermissionTo('view rma claim forms');
    }

    /**
    * Determine whether the user can create models.
    *
    * @param \App\Models\User $user
    * @return mixed
    */
    public function create(User $user)
    {

        return $user->hasPermissionTo('create rma claim forms');
        return true;

        //return $user->hasPermissionTo('create rma claim forms');
    }

    /**
    * Determine whether the user can update the model.
    *
    * @param \App\Models\User $user
    * @param \App\Domain\ClaimForms\Models\RMAClaimForm $r_m_a_claim_form
    * @return mixed
    */
    public function update(User $user, RMAClaimForm $r_m_a_claim_form )
    {

        return $user->hasPermissionTo('edit rma claim forms');
        return true;

        //return $user->hasPermissionTo('edit rma claim forms');
    }

    /**
    * Determine whether the user can delete the model.
    *
    * @param \App\Models\User $user
    * @param \App\Domain\ClaimForms\Models\RMAClaimForm $r_m_a_claim_form
    * @return mixed
    */
    public function delete(User $user, RMAClaimForm $r_m_a_claim_form )
    {
        return true;

        //return $user->hasPermissionTo('edit rma claim forms');
    }

    /**
    * Determine whether the user can restore the model.
    *
    * @param \App\Models\User $user
    * @param \App\Domain\ClaimForms\Models\RMAClaimForm $r_m_a_claim_form
    * @return mixed
    */
    public function restore(User $user, RMAClaimForm $r_m_a_claim_form )
    {
        return true;

        //return $user->hasPermissionTo('delete rma claim forms');
    }

    /**
    * Determine whether the user can permanently delete the model.
    *
    * @param \App\Models\User $user
    * @param \App\Domain\ClaimForms\Models\RMAClaimForm $r_m_a_claim_form
    * @return mixed
    */
    public function forceDelete(User $user, RMAClaimForm $r_m_a_claim_form )
    {
        return true;

        //return $user->hasPermissionTo('delete rma claim forms');
    }
}

