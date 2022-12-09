<?php

namespace App\Domain\ClaimForms;

use App\Http\Controllers\SocialLoginController;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Laravel\Nova\Cards\Help;
use Laravel\Nova\Nova;
use Laravel\Nova\NovaApplicationServiceProvider;

class ClaimFormsServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->bootNovaResources();
        $this->bootRoutes();
    }

    protected function bootNovaResources() : self
    {
        \Laravel\Nova\Nova::resources([
            \App\Domain\ClaimForms\Nova\Resources\Submission::class,
            \App\Domain\ClaimForms\Nova\Resources\RGA1ClaimForm::class,
            \App\Domain\ClaimForms\Nova\Resources\RGA2ClaimForm::class,
            \App\Domain\ClaimForms\Nova\Resources\RMAClaimForm::class,
        ]);

        return $this;
    }

    protected function bootRoutes(): self
    {

        Route::middleware('web')
            ->namespace('App\Domain\ClaimForms\Http\Controllers')
            ->group(base_path('routes/web/claim-forms.php'));

        return $this;
    }
}
