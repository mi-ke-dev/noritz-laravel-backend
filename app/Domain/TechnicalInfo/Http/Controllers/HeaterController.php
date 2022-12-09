<?php

declare(strict_types=1);

namespace App\Domain\TechnicalInfo\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Inertia\Inertia;
use Inertia\Response;
use Illuminate\Http\Request;
use Laravel\Jetstream\Jetstream;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;
use Laravel\Jetstream\RedirectsActions;
use App\Domain\TechnicalInfo\Getters\GetFilePathFromKey;
use App\Models\Heater;
use Illuminate\Support\Facades\Validator;
use App\Models\SecurityRole;

class HeaterController extends Controller
{
    use RedirectsActions;

    protected function getFillable()
    {
        return [
            'id',
            'brand',
            'series',
            'series_image',
            'unit_type',
            'error_code_list',
            'voltage_checks',
            'npa',
            'spec_sheet',
            'owners_guide',
            'installation_manual',
            'parts_list',
            'certification',
            'field_manual',
            'service_manual',
            'service_manual_hot_water_capabilities',
            'service_manual_pressure_loss_chart',
            'service_manual_components',
            'service_manual_operating_principal',
            'service_manual_operation_flow',
            'service_manual_wiring_diagram',
            'service_manual_error_code_and_checkpoints',
            'service_manual_circuit_board_checkpoints',
            'service_manual_error_descriptions',
            'service_manual_maintenance',
            'service_manual_circuit_board_replacement',
            'service_manual_fan_motor_calibration',
            'service_manual_neutralizer_replacement',
            'service_manual_manifold_pressures',
            'service_manual_change_default_temperatures',
            'service_manual_condensate_drain_line',
            'residential_or_commercial',
            'install_location',
            'exhaust_type',
            'exhaust_type_l1',
            'max_flow_rate',
            'max_flow_rate_l1',
            'flow_rate50_deg_f_rise',
            'flow_rate80_deg_f_rise',
            'temperature_range',
            'temper_range_l1',
            'production_status',
            'production_status_l1',
            'condensing',
            'condensing_l1',
            'minimum_activation_flow_rate',
            'minimum_activation_flow_rate_l1',
            'water_quality',
            'water_quality_l1',
            'water_quality_l2',
            'freeze_protection',
            'freeze_protection_rating_indoor_temp',
            'freeze_protection_rating_outdoor_temp',
            'freeze_protection_rating_outdoor_temp_l1',
            'recirculation_compatible',
            'recirculation_l1',
            'recirculation_l2',
            'new_generation_model_number',
            'previous_name',
            'heater_image',
            'available_temperature_settings_with_remote',
            'default_temperature_setting_without_remote',
            'default_temperature_program_setting_options_without_remote',
            'production_date_range',
            'min_gas_input_btu',
            'max_gas_input_btu',
            'height_in',
            'width_in',
            'depth_in',
            'depth_l1',
            'weight_lbs',
            'thermal_efficiency',
            'energy_factor',
            'energy_factor_l1',
            'afue',
            'quickconnect_compatible',
            'quickconnect_l1',
            'quickconnect_l2',
            'cold_water_connection_size_in',
            'hot_water_connection_size_in',
            'gas_connection_size_in',
            'power_supply',
            'current_draw_a',
            'current_draw_l1',
            'exhaust_vent_diameter_requirements',
            'exhaust_vent_material_requirements',
            'max_vent_length_with1_elbow',
            'max_vent_length_l1',
            'vent_termination_clearances_to_any_building_opening_ft',
            'vent_termination_l1',
            'gas_supply_pressure_range',
            'gas_supply_pressure_range_l1',
            'min_gas_line_size',
            'min_gas_line_size_l1',
            'water_pressure_rating_psi',
            'case_clearances_in',
            'case_clearances_l1',
            'combustion_air_requirements_using_indoor_air',
            'combustion_air_requirements_using_outdoor_air',
            'combustion_air_outdoor_l1',
            'head_loss_at2_gpm',
            'head_loss_l1',
            'cold_connection_height',
            'power_consumption_wout_freeze_prevention',
            'power_consumption_wfreeze_prevention',
            'flow_meter_alarm',
            'service_reminder',
            'condensate_handling_method',
            'noise_rating_db',
            'tested_to_ul_computer_controlled_safety_standards',
            'flame_sensor',
            'high_limit_switch',
            'lightning_protection',
            'overheat_cutoff_fuse',
            'temperature_lockout',
            'ignition_type',
            'case_material',
            'colorfinish',
            'flue_collar_material',
            'primary_heat_exchanger_material',
            'secondary_heat_exchanger_material',
            'mounting_type',
            'package_contents',
            'water_holding_capacity',
            'keypadthermostat_display',
            'keypadthermostat_display_l1',
            'compatible_remote_controller_part_num_id',
            'compatible_remote_controller_part_num_l1',
            'isolator_valve_part_num_id',
            'isolator_valve_part_num_l1',
            'freeze_protection_kit_accessory',
            'freeze_protection_kit_accessory_l1',
            'outdoor_vent_cap_part_num_id',
            'outdoor_vent_cap_part_num_l1',
            'pipe_cover_part_num_id',
            'pipe_cover_part_num_l1',
            'recess_box_part_num_id',
            'recess_box_part_num_l1',
            'high_elevation_adjustment',
            'high_elevation_adjustment_l1',
            'quickconnect_cord_part_num_id',
            'system_controller_compatible',
            'system_controller_compatible_l1',
            'system_controller_part_num_id',
            'system_controller_part_num_l1',
            'remote_controller_cord',
            'compatible_remote_controller_cord_part_num_id',
            'power_cord',
            'energy_star_qualified',
            'csa',
            'mobile_home',
            'nsf',
            'scaqmd20_ppm',
            'scaqmd55_ppm',
            'upc',
            'energy_guide_est_yearly_energy_use',
            'energy_guide_est_yearly_energy_use_l1',
            'energy_guide_est_yearly_operating_cost',
            'upc_low_lead',
            'asme_hlw',
            'asme_h',
            'asme_nb',
            'heat_exchanger_warranty_wout_recirculation',
            'heat_exchanger_warranty_wrecirculation',
            'parts_warranty',
            'labor_warranty',
            'laborwarrantyl1',
            'name',
            'parts_list_file',
            'model_no',
            'model_type'
        ];
    }

    public function index(Request $request): Response
    {
        $select = $this->getFillable();
        $user = auth()->user();
        $heater_list = Heater::get()->pluck('model_no')->toArray();
        $security_permissions = config('technical-info.heater_valid');

        if (!auth()->user()) {
            if (count($security_permissions) > 0) {
                $select = array_diff($select, $security_permissions);
            }
        } else {
            foreach ($security_permissions as $sp) {
                if (!$user->hasPermissionTo($sp)) {
                    $select = array_diff($select, [$sp]);
                }
            }
        }
        // print_r($security_permissions);
        // dd($select);
        $search_heater = request('heater') ? request('heater') : '';
        $heaters = Heater::select($select)
            ->where('model_no', $search_heater)
            ->first();

        // dd($security_permissions, $select, $heaters->toArray());
        $file = "index";
        if (request('is_print'))
            $file = "printHeater";

        return Jetstream::inertia()->render($request, 'Heaters/' . $file, [
            'heaters' => $heaters,
            'heater_list' => $heater_list,
            'security_permissions' => $security_permissions,
            'asset_url' => asset('/')
        ]);
    }

    public function downloadHeaterFile($model_no = '', $field_name = '')
    {

        $is_show_error = true;
        $error_msg = "No access";
        $path = "";
        if ($model_no != '' && $field_name != '') {
            $security_permissions = config('technical-info.heater_valid');
            $heater = Heater::where('model_no', $model_no)->first();
            if (!in_array($field_name, $security_permissions)) {
                if ($heater) {
                    $path = $heater->toArray()[$field_name];
                    $is_show_error = false;
                }
            } else {
                $user = auth()->user();
                if (false && $user) {
                    $user->hasPermissionTo($field_name);
                    if ($heater) {
                        $path = $heater->toArray()[$field_name];
                        $is_show_error = false;
                    }
                }
            }
        }

        if (false && $is_show_error) {
            echo "No access";
        } else {
            if ($path) {

                if (!Str::contains($path, 'heaters/')) {

                    $pathPrefix = (new GetFilePathFromKey)
                        ->setKey($field_name)
                        ->get();

                    $path = ltrim($pathPrefix . $path, '/');
                    $path = str_replace('//', '/', $path);

                }

                try {
                    $url = Storage::disk('s3')->temporaryUrl(
                        $path, now()->addMinutes(5)
                    );

                    return redirect($url);

                } catch (\Exception $e) {

                    echo "Could not locate file.";

                    Log::error('Could not locate file on download request at `' . $path . '`');

                }

            } else {
                echo "File is empty.";
            }

        }
    }

    public function technicalLiterature(Request $request){
        $selected_heater = null;
        $selected_model = request('selected_model');
        if($selected_model && $selected_model != ''){
           $selected_heater = Heater::where('model_no', $selected_model)->first();
            if($selected_heater){
                return Jetstream::inertia()->render($request, 'Heaters/technicalLiteratureServiceManual', [
                    'asset_url' => asset('/'),
                    'selected_heater' => $selected_heater
                ]);
            }
        }
        $search_type = request('search_type');
        $search_string = request('search_string');
        $model_category = request('model_category');
        $technology = request('technology');
        $generation = request('generation');
        $brand = request('brand');
        $user = auth()->user();
        $is_login = ($user) ? true : false;
        $is_field_manual = $is_service_manual = false;
        $heater_list = Heater::get()->pluck('model_no')->toArray();
        $products = Heater::where('model_no', 'like', "%$search_string%");
        $products->select('model_no', 'service_manual', 'field_manual', 'certification', 'parts_list', 'installation_manual', 'owners_guide', 'spec_sheet', 'npa');

        //model_category [Boiler, Commercial, Residential]
        if ($model_category && in_array($model_category, ['Boiler', 'Commercial', 'Residential'])) {
            $products->where('model_type', $model_category);
        }

        // Condensing technology [Yes, No]
        if ($technology && in_array($technology, ['Yes', 'No'])) {
            $products->where('condensing', $technology);
        }

        // ProductionStatus generation [in-production, classic-models]
        if ($generation && $generation == 'in-production') {
            $products->where('production_status', 'Active');
        }
        if ($generation && $generation == 'classic-models') {
            $products->where('production_status', 'Discontinued');
        }

        // brand [in-production, classic-models]
        if ($brand && $brand == 'oem') {
            $products->where('brand', 'OEM');
        } else {
            $products->where(function ($q) {
                $q->where('brand', 'Noritz Brand')
                    ->orWhere('brand', 'Accessory');
            });
        }

        // search type [heater, accessories]
        if ($search_type && $search_type == 'heater') {
            $products->where(function ($q) {
                $q->where('brand', 'Noritz Brand')
                    ->orWhere('brand', 'OEM');
            });
        }
        if ($search_type && $search_type == 'accessories') {
            $products->where('brand', 'Accessory');
        }


        $products->orderByRaw("( case when brand = 'Noritz Brand' then 1
                        when brand = 'OEM' then 3
                        else 2
                end ) asc ");

        $products = $products->paginate(50);
//         dd($products->count());
        return Jetstream::inertia()->render($request, 'Heaters/technicalLiterature', [
            'asset_url' => asset('/'),
            'search_type' => $search_type,
            'search_string' => $search_string,
            'model_category' => $model_category,
            'technology' => $technology,
            'generation' => $generation,
            'brand' => $brand,
            'products' => $products,
            'is_field_manual' => $is_field_manual,
            'is_service_manual' => $is_service_manual,
            'is_login' => $is_login,
            'heater_list' => $heater_list,
            'softlock' => $request->input('softlock', "true") != "false"
        ]);
    }
}
