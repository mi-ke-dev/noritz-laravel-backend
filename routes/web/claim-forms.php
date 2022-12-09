<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;


Route::group(['middleware' => ['web']], function () {

    Route::post('/file-upload', function (Request $request) {
        $storage = Storage::copy(
            $request->input('key'),
            str_replace('tmp/', '', $request->input('key'))
        );
    });
    Route::post('vapor/signed-storage-url', [App\Domain\ClaimForms\Http\Controllers\SignedStorageUrlController::class, 'store']);

});

Route::group(['middleware' => config('jetstream.middleware', ['web'])], function () {

    Route::get('/claim-form', [App\Domain\ClaimForms\Http\Controllers\ClaimFormController::class, 'index'])->name('claim-form.index');
    Route::get('/rma-form', [App\Domain\ClaimForms\Http\Controllers\ClaimFormController::class, 'getRmaForm'])->name('claim-form.rma-form');
    Route::get('/rga1-form', [App\Domain\ClaimForms\Http\Controllers\ClaimFormController::class, 'getRga1Form'])->name('claim-form.rga1-form');
    Route::get('/rga2-form', [App\Domain\ClaimForms\Http\Controllers\ClaimFormController::class, 'getRga2Form'])->name('claim-form.rga2-form');
    Route::post('/store-rma-form', [App\Domain\ClaimForms\Http\Controllers\ClaimFormController::class, 'storeRmaForm'])->name('claim-form.save-rma-form');
    Route::post('/store-rga1-form', [App\Domain\ClaimForms\Http\Controllers\ClaimFormController::class, 'storeRga1Form'])->name('claim-form.save-rga1-form');
    Route::post('/store-rga2-form', [App\Domain\ClaimForms\Http\Controllers\ClaimFormController::class, 'storeRga2Form'])->name('claim-form.save-rga2-form');

    Route::get('/form-success/{type}', [App\Domain\ClaimForms\Http\Controllers\ClaimFormController::class, 'formSuccess'])->name('claim-form.success');



});
