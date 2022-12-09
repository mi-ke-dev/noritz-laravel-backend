<?php

namespace App\Providers;

use App\Observers\RGA1ClaimFormObserver;
use App\Observers\RGA2ClaimFormObserver;
use App\Observers\RMAClaimFormObserver;
use App\Observers\SubmissionObserver;
use Illuminate\Support\ServiceProvider;
use App\Domain\ClaimForms\Models\RGA1ClaimForm;
use App\Domain\ClaimForms\Models\RGA2ClaimForm;
use App\Domain\ClaimForms\Models\RMAClaimForm;
use App\Domain\ClaimForms\Models\Submission;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        RGA1ClaimForm::observe(RGA1ClaimFormObserver::class);
        RGA2ClaimForm::observe(RGA2ClaimFormObserver::class);
        RMAClaimForm::observe(RMAClaimFormObserver::class);
        Submission::observe(SubmissionObserver::class);
    }
}
