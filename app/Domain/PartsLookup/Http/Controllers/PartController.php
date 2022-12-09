<?php

declare(strict_types=1);

namespace App\Domain\PartsLookup\Http\Controllers;

use Inertia\Inertia;
use Inertia\Response;
use Laravel\Jetstream\Jetstream;
use Laravel\Jetstream\RedirectsActions;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Validator;
use App\Domain\PartsLookup\Models\Part;
use App\Models\Heater;

class PartController extends Controller
{
    use RedirectsActions;

    public function index(Request $request): Response
    {
        try {
            $is_login = false;
            $user = auth()->user();
            if ($user) {
                $is_login = true;
            }
            // dd($is_login)
            $part_number = request('part_number');
            $part_list_id = request('part_list_id');
            $model_number = request('model_number');
            $is_search = request('is_search');
            // dd($model_number);
            $part_name = request('part_name');
            $parts = [];
            if (request('model_number') || $part_number || $part_list_id || $part_name) {

                $parts = Part::with(['heaters' => function ($q) {
                    $q->select('id', 'model_no');
                }])
                    ->ByPartNumber(request('part_number'))
                    ->ByPartListId(request('part_list_id'))
                    ->ByModelNumber(request('model_number'))
                    ->ByPartSearch(request('part_name'));

                $parts = $parts
                    ->paginate(20);
                $is_search = false;


                $parts->appends(request()->all());
            }


            $heater_model = Heater::select('id', 'model_no', 'parts_list_file')->where('model_no', $model_number)->first();
            // $part_list_file =  $heater_model->"parts_list_file";
            // dd($heater_model);
            $heater_list = Heater::select('id', 'model_no')->whereNotNull('model_no')
                ->where('model_no', '!=', '')
                ->get()->pluck('model_no')->toArray();
            return Jetstream::inertia()->render($request, 'Parts/index', [
                'parts' => $parts,
                'heater_list' => $heater_list,
                'part_list_id' => $part_list_id,
                'model_number' => $model_number,
                'part_number' => $part_number,
                'part_name' => $part_name,
                'is_login' => $is_login,
                'heater_model' => $heater_model,
                'is_search' => $is_search,
                'asset_url' => asset('/'),
                'softlock' => $request->input('softlock', "true") != "false"
            ]);
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }


}
