<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

Route::group(['middleware' => ['web']], function () {
    Route::get('/products', \App\Domain\Website\Products\Http\Livewire\Products::class);
});

Route::group(['middleware' => ['web', 'CrossIfream' ]], function () {
    Route::get('compares', \App\Domain\Website\Products\Http\Livewire\Compares::class);
});

Route::group(['middleware' => ['web', 'CrossIfreamSizing' ]], function () {
    Route::get('sizing-calculator', \App\Domain\Website\Products\Http\Livewire\SizingCalculator::class);
});
?>
