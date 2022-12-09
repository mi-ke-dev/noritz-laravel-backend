<?php

namespace App\Domain\TechnicalInfo\Policies;

use App\Models\User;
use App\Models\AttachmentSecurityTemplate;
use Illuminate\Auth\Access\HandlesAuthorization;

class AttachmentSecurityTemplatePolicy
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

        //return $user->hasPermissionTo('view attachment security templates');
    }

    /**
    * Determine whether the user can view the model.
    *
    * @param \App\Models\User $user
    * @param \App\Models\AttachmentSecurityTemplate $attachment_security_templates
    * @return mixed
    */
    public function view(User $user, AttachmentSecurityTemplate $attachment_security_templates )
    {
        return true;

        //return $user->hasPermissionTo('view attachment security templates');
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

        //return $user->hasPermissionTo('create attachment security templates');
    }

    /**
    * Determine whether the user can update the model.
    *
    * @param \App\Models\User $user
    * @param \App\Models\AttachmentSecurityTemplate $attachment_security_templates
    * @return mixed
    */
    public function update(User $user, AttachmentSecurityTemplate $attachment_security_templates )
    {
        return true;

        //return $user->hasPermissionTo('edit attachment security templates');
    }

    /**
    * Determine whether the user can delete the model.
    *
    * @param \App\Models\User $user
    * @param \App\Models\AttachmentSecurityTemplate $attachment_security_templates
    * @return mixed
    */
    public function delete(User $user, AttachmentSecurityTemplate $attachment_security_templates )
    {
        return true;

        //return $user->hasPermissionTo('edit attachment security templates');
    }

    /**
    * Determine whether the user can restore the model.
    *
    * @param \App\Models\User $user
    * @param \App\Models\AttachmentSecurityTemplate $attachment_security_templates
    * @return mixed
    */
    public function restore(User $user, AttachmentSecurityTemplate $attachment_security_templates )
    {
        return true;

        //return $user->hasPermissionTo('delete attachment security templates');
    }

    /**
    * Determine whether the user can permanently delete the model.
    *
    * @param \App\Models\User $user
    * @param \App\Models\AttachmentSecurityTemplate $attachment_security_templates
    * @return mixed
    */
    public function forceDelete(User $user, AttachmentSecurityTemplate $attachment_security_templates )
    {
        return true;

        //return $user->hasPermissionTo('delete attachment security templates');
    }
}

