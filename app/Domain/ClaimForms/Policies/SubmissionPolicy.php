<?php

namespace App\Domain\ClaimForms\Policies;

use App\Models\User;
use App\Domain\ClaimForms\Models\Submission;
use Illuminate\Auth\Access\HandlesAuthorization;

class SubmissionPolicy
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

        //return $user->hasPermissionTo('view submission wizards');
    }

    /**
    * Determine whether the user can view the model.
    *
    * @param \App\Models\User $user
    * @param \App\Domain\ClaimForms\Models\Submission $submission_wizard
    * @return mixed
    */
    public function view(User $user, Submission $submission_wizard )
    {
        return true;

        //return $user->hasPermissionTo('view submission wizards');
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

        //return $user->hasPermissionTo('create submission wizards');
    }

    /**
    * Determine whether the user can update the model.
    *
    * @param \App\Models\User $user
    * @param \App\Domain\ClaimForms\Models\Submission $submission_wizard
    * @return mixed
    */
    public function update(User $user, Submission $submission_wizard )
    {
        return true;

        //return $user->hasPermissionTo('edit submission wizards');
    }

    /**
    * Determine whether the user can delete the model.
    *
    * @param \App\Models\User $user
    * @param \App\Domain\ClaimForms\Models\Submission $submission_wizard
    * @return mixed
    */
    public function delete(User $user, Submission $submission_wizard )
    {
        return true;

        //return $user->hasPermissionTo('edit submission wizards');
    }

    /**
    * Determine whether the user can restore the model.
    *
    * @param \App\Models\User $user
    * @param \App\Domain\ClaimForms\Models\Submission $submission_wizard
    * @return mixed
    */
    public function restore(User $user, Submission $submission_wizard )
    {
        return true;

        //return $user->hasPermissionTo('delete submission wizards');
    }

    /**
    * Determine whether the user can permanently delete the model.
    *
    * @param \App\Models\User $user
    * @param \App\Domain\ClaimForms\Models\Submission $submission_wizard
    * @return mixed
    */
    public function forceDelete(User $user, Submission $submission_wizard )
    {
        return true;

        //return $user->hasPermissionTo('delete submission wizards');
    }
}

