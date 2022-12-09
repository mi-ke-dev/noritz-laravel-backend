<?php

namespace App\Observers;

use Illuminate\Support\Str;
use App\Domain\ClaimForms\Models\RMAClaimForm;
use App\Domain\ClaimForms\Models\Submission;

class RMAClaimFormObserver
{
    /**
     * Handle the RMAClaimForm "created" event.
     *
     * @param  \App\Domain\ClaimForms\Models\RMAClaimForm  $RMAClaimForm
     * @return void
     */
    public function created(RMAClaimForm $RMAClaimForm)
    {

        $RMAClaimForm = RMAClaimForm::find($RMAClaimForm->id);

        $claimId = 100000000 + $RMAClaimForm->claim_id;
        $claimId = 'B' . Str::padLeft($claimId, 9);

        //
        Submission::create([
            'claim_id' => $claimId,
            'submission_type' => RMAClaimForm::class,
            'submission_id' => $RMAClaimForm->id,
            'email' => $RMAClaimForm->email,
            'submitted_at' => $RMAClaimForm->created_at,
        ]);
        //
    }

    /**
     * Handle the RMAClaimForm "updated" event.
     *
     * @param  \App\Domain\ClaimForms\Models\RMAClaimForm  $RMAClaimForm
     * @return void
     */
    public function updated(RMAClaimForm $RMAClaimForm)
    {
        //
        $submission = Submission::where('submission_id', $RMAClaimForm->id)->first();
        $submission->archived_at = $RMAClaimForm->archived_at;
        $submission->saveQuietly();
    }

    /**
     * Handle the RMAClaimForm "deleted" event.
     *
     * @param  \App\Domain\ClaimForms\Models\RMAClaimForm  $RMAClaimForm
     * @return void
     */
    public function deleted(RMAClaimForm $RMAClaimForm)
    {
        //
    }

    /**
     * Handle the RMAClaimForm "restored" event.
     *
     * @param  \App\Domain\ClaimForms\Models\RMAClaimForm  $RMAClaimForm
     * @return void
     */
    public function restored(RMAClaimForm $RMAClaimForm)
    {
        //
    }

    /**
     * Handle the RMAClaimForm "force deleted" event.
     *
     * @param  \App\Domain\ClaimForms\Models\RMAClaimForm  $RMAClaimForm
     * @return void
     */
    public function forceDeleted(RMAClaimForm $RMAClaimForm)
    {
        //
    }
}
