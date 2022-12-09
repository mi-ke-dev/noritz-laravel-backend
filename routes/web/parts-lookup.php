<?php

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => config('jetstream.middleware', ['web'])], function () {
    Route::get('/parts', [\App\Domain\PartsLookup\Http\Controllers\PartController::class, 'index'])->name('parts.index');
    // Route::group(['middleware' => ['auth', 'verified']], function () {
    // });
});
?>
