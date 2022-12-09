<?php

namespace App\Observers;


use Illuminate\Support\Str;
use App\Domain\ClaimForms\Models\RGA1ClaimForm;
use App\Domain\ClaimForms\Models\RGA2ClaimForm;
use App\Domain\ClaimForms\Models\Submission;

class RGA1ClaimFormObserver
{
    /**
     * Handle the RGA1ClaimForm "created" event.
     *
     * @param  \App\Domain\ClaimForms\Models\RGA1ClaimForm  $RGA1ClaimForm
     * @return void
     */
    public function created(RGA1ClaimForm $RGA1ClaimForm)
    {
        $RGA1ClaimForm = RGA1ClaimForm::find($RGA1ClaimForm->id);

        $claimId = 100000000 + $RGA1ClaimForm->claim_id;
        $claimId = 'A' . Str::padLeft($claimId, 9);

        //
        Submission::create([
            'claim_id' => $claimId,
            'submission_type' => RGA1ClaimForm::class,
            'submission_id' => $RGA1ClaimForm->id,
            'email' => $RGA1ClaimForm->email,
            'submitted_at' => $RGA1ClaimForm->created_at,
        ]);
    }

    /**
     * Handle the RGA1ClaimForm "updated" event.
     *
     * @param  \App\Domain\ClaimForms\Models\RGA1ClaimForm  $RGA1ClaimForm
     * @return void
     */
    public function updated(RGA1ClaimForm $RGA1ClaimForm)
    {
        //
        $submission = Submission::where('submission_id', $RGA1ClaimForm->id)->first();
        $submission->archived_at = $RGA1ClaimForm->archived_at;
        $submission->saveQuietly();
    }

    /**
     * Handle the RGA1ClaimForm "deleted" event.
     *
     * @param  \App\Domain\ClaimForms\Models\RGA1ClaimForm  $RGA1ClaimForm
     * @return void
     */
    public function deleted(RGA1ClaimForm $RGA1ClaimForm)
    {
        //
    }

    /**
     * Handle the RGA1ClaimForm "restored" event.
     *
     * @param  \App\Domain\ClaimForms\Models\RGA1ClaimForm  $RGA1ClaimForm
     * @return void
     */
    public function restored(RGA1ClaimForm $RGA1ClaimForm)
    {
        //
    }

    /**
     * Handle the RGA1ClaimForm "force deleted" event.
     *
     * @param  \App\Domain\ClaimForms\Models\RGA1ClaimForm  $RGA1ClaimForm
     * @return void
     */
    public function forceDeleted(RGA1ClaimForm $RGA1ClaimForm)
    {
        //
    }
}
