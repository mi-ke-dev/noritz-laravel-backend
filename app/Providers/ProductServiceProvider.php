<?php

namespace App\Providers;

use App\Domain\Website\Products\Http\Livewire\Products;
use App\Domain\OfficeAddin\Http\Livewire\Taskpane;
use App\Domain\Website\Products\Http\Livewire\SizingCalculator;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;

class ProductServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {

        Livewire::component(products::class);
        Livewire::component(SizingCalculator::class);
    }
}
