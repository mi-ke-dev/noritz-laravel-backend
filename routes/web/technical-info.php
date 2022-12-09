<?php

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => config('jetstream.middleware', ['web'])], function () {
    // Route::group(['middleware' => ['auth', 'verified']], function () {


    Route::get('/technical-information', [\App\Domain\TechnicalInfo\Http\Controllers\HeaterController::class, 'index'])->name('heaters.technical-information');
    Route::get('/technical-literature', [\App\Domain\TechnicalInfo\Http\Controllers\HeaterController::class, 'technicalLiterature'])->name('heaters.technical-literature');
    Route::get('/file-download/{model_no?}/{field_name?}', [\App\Domain\TechnicalInfo\Http\Controllers\HeaterController::class, 'downloadHeaterFile'])->name('heaters.file-download');
    // });
});
?>
