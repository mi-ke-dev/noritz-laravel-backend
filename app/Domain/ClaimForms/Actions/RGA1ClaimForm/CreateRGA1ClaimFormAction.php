<?php

namespace App\Domain\ClaimForms\Actions\RGA1ClaimForm;

use App\Domain\ClaimForms\Models\RGA1ClaimForm;
use Illuminate\Support\Facades\Validator;
/**
* Class NotifyAboutSubmissionAction
*
* Store form details in RGA1 Cliam Form.
*/
class CreateRGA1ClaimFormAction{

    public function create(array $input) : RGA1ClaimForm
    {
        Validator::make(
            $input,
            RGA1ClaimForm::$createRules
        );
        $RGA1ClaimForm = RGA1ClaimForm::create($input);
        return $RGA1ClaimForm;
    }

    public function redirectTo() : string
    {
        return route('claim-form.success', 'rga1');
    }
}
