<?php

namespace App\Observers;

use App\Domain\ClaimForms\Models\RMAClaimForm;
use App\Domain\ClaimForms\Models\Submission;

class SubmissionObserver
{
    //
    public function updated(Submission $submission)
    {
        //

        $model = $submission->submission_type;

        $model = $model::find($submission->submission_id);
        $model->archived_at = $submission->archived_at;
        $model->saveQuietly();
    }
}
