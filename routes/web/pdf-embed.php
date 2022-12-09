<?php

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => config('jetstream.middleware', ['web'])], function () {

    Route::get('/pdf-embed/{fileName}', [Noritz\PdfEmbed\Http\Controllers\PdfEmbedController::class, 'show'])->name('pdf-embed.show');


});
