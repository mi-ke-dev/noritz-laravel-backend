<?php


namespace App\Domain\PdfEmbed\Http\Controllers;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \Inertia\Response;
use Laravel\Jetstream\Jetstream;

class PdfEmbedController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param \Illuminate\Http\Request $request
     */
    public function show(Request $request, $fileName)
    {
        return view('pdf-embed', [
            'url' => $request->url,
            'fileName' => $fileName

        ]);
    }

}
