<?php

namespace App\Observers;

use Illuminate\Support\Str;
use \App\Domain\ClaimForms\Models\RGA2ClaimForm;
use App\Domain\ClaimForms\Models\Submission;

class RGA2ClaimFormObserver
{
    /**
     * Handle the RGA2ClaimForm "created" event.
     *
     * @param  \App\Domain\ClaimForms\Models\RGA2ClaimForm  $RGA2ClaimForm
     * @return void
     */
    public function created(RGA2ClaimForm $RGA2ClaimForm)
    {
        $RGA2ClaimForm = RGA2ClaimForm::find($RGA2ClaimForm->id);

        $claimId = 100000000 + $RGA2ClaimForm->claim_id;
        $claimId = 'C' . Str::padLeft($claimId, 9);

        ray($RGA2ClaimForm->toArray());
        //
        Submission::create([
            'claim_id' => $claimId,
            'submission_type' => RGA2ClaimForm::class,
            'submission_id' => $RGA2ClaimForm->id,
            'email' => $RGA2ClaimForm->email,
            'submitted_at' => $RGA2ClaimForm->created_at,
        ]);
        //
    }

    /**
     * Handle the RGA2ClaimForm "updated" event.
     *
     * @param  \App\Domain\ClaimForms\Models\RGA2ClaimForm  $RGA2ClaimForm
     * @return void
     */
    public function updated(RGA2ClaimForm $RGA2ClaimForm)
    {
        //
        $submission = Submission::where('submission_id', $RGA2ClaimForm->id)->first();
        $submission->archived_at = $RGA2ClaimForm->archived_at;
        $submission->saveQuietly();
    }

    /**
     * Handle the RGA2ClaimForm "deleted" event.
     *
     * @param  \App\Domain\ClaimForms\Models\RGA2ClaimForm  $RGA2ClaimForm
     * @return void
     */
    public function deleted(RGA2ClaimForm $RGA2ClaimForm)
    {
        //
    }

    /**
     * Handle the RGA2ClaimForm "restored" event.
     *
     * @param  \App\Domain\ClaimForms\Models\RGA2ClaimForm  $RGA2ClaimForm
     * @return void
     */
    public function restored(RGA2ClaimForm $RGA2ClaimForm)
    {
        //
    }

    /**
     * Handle the RGA2ClaimForm "force deleted" event.
     *
     * @param  \App\Domain\ClaimForms\Models\RGA2ClaimForm  $RGA2ClaimForm
     * @return void
     */
    public function forceDeleted(RGA2ClaimForm $RGA2ClaimForm)
    {
        //
    }
}
