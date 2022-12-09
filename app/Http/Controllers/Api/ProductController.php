<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Heater;

class ProductController extends Controller
{
    public function getProductList(){
        $heaters = Heater::with(['heaterSeries', 'feature_highlights', 'feature_specs', 'heaterSeries.heaters:id,model_no,marketing_name,heater_family_id'])
        ->has('heaterSeries')
        // ->has('feature_highlights')
        // ->has('feature_specs')
        ->select('id', 'model_no', 'marketing_name', 'heater_family_id')
        ->paginate(20);
        return response($heaters);
    }
}
