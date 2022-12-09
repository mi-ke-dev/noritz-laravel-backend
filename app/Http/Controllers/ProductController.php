<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Heater;

class ProductController extends Controller
{
    public function getProductList(){
        $heaters = Heater::with(['heaterSeries', 'feature_highlights', 'feature_highlights', 'feature_specs'])->get();
        return response()->json(['status'=>true, 'data'=> $heaters]);
    }
}
