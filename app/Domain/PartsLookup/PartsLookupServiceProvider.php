<?php

namespace App\Domain\PartsLookup;

use App\Http\Controllers\SocialLoginController;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Laravel\Nova\Cards\Help;
use Laravel\Nova\Nova;
use Laravel\Nova\NovaApplicationServiceProvider;

class PartsLookupServiceProvider extends ServiceProvider
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
            \App\Domain\PartsLookup\Nova\Resources\Part::class,
        ]);


        return $this;
    }

    protected function bootRoutes(): self
    {

        Route::middleware('web')
            ->namespace('App\Domain\PartsLookup\Http\Controllers')
            ->group(base_path('routes/web/parts-lookup.php'));

        return $this;
    }
}
