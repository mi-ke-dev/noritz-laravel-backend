<?php

namespace App\Domain\ClaimForms\Actions\RMAClaimForm;

use Illuminate\Support\Facades\Validator;
use App\Domain\ClaimForms\Models\RMAClaimForm;
/**
* Class NotifyAboutSubmissionAction
*
* Send an email to app Admins containing the form details.
*/
class CreateRMAClaimFormAction{

    public function create(array $input) :RMAClaimForm
    {
        $RGA1ClaimForm = RMAClaimForm::create($input);
        return $RGA1ClaimForm;
    }

    public function redirectTo() : string
    {
        return route('claim-form.success', 'rma');
    }

}
