<?php

namespace App\Domain\ClaimForms\Actions\RGA2ClaimForm;

use App\Domain\ClaimForms\Models\RGA2ClaimForm;
use Illuminate\Support\Facades\Validator;
/**
* Class NotifyAboutSubmissionAction
*
* Store form details in RGA1 Cliam Form.
*/
class CreateRGA2ClaimFormAction{

    public function create(array $input) : RGA2ClaimForm
    {
        Validator::make(
            $input,
            RGA2ClaimForm::$createRules
        );
        $RGA1ClaimForm = RGA2ClaimForm::create($input);
        return $RGA1ClaimForm;
    }

    public function redirectTo() : string
    {
        return route('claim-form.success', 'rga2');
    }
}
