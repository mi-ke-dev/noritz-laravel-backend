<?php

namespace App\Nova\Resources;

use Benjacho\BelongsToManyField\BelongsToManyField;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\DateTime;
use Laravel\Nova\Fields\File;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\VaporFile;
use Laravel\Nova\Http\Requests\NovaRequest;
use App\Domain\TechnicalInfo\Nova\Resource;
use Eminiarts\Tabs\Tabs;
use Eminiarts\Tabs\Tab;
use Eminiarts\Tabs\TabsOnEdit;
use Laravel\Nova\Fields\BelongsToMany;
use Laravel\Nova\Fields\VaporImage;
use Laravel\Nova\Fields\Boolean;

/**
 * Class Heater.
 */
class Heater extends Resource
{
    use TabsOnEdit;

    public static $group = 'Project';


    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\Heater::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'model_no';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'model_no'
    ];

    public static $perPageOptions = [12, 25, 50, 100];


    public function fieldsForIndex(NovaRequest $request)
    {
        return [

            Text::make('Model No', 'model_no')
                ->rules('required')
            ,

            Text::make('Residential or Commercial', 'residential_or_commercial'),
        ];
    }

    /**
     * Get the fields displayed by the resource.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function fields(Request $request)
    {
        return [
            Text::make('Model No', 'model_no')
                ->rules('required')
            ,
            Tabs::make('Heater', [

                // Start Overview Tab
                Tab::make('Overview', [

                    Text::make('Residential or Commercial', 'residential_or_commercial')->hideFromIndex()
                    ,
                    Text::make('Install Location', 'install_location')
                    ,
                    Text::make('Exhaust Type', 'exhaust_type')
                    ,
                    VaporFile::make('Exhaust Type l1', 'exhaust_type_l1')->path('heaters/' . $request->model_no)->download(function () {
                        return Storage::disk('s3')->download($this->exhaust_type_l1, 'exhaust_type_l1.pdf');
                    })
                    /* MC ->storeAs(function (Request $request) {
                                            return $request->exhaust_type_l1->getClientOriginalName();
                                        }) /MC */
                    ,

                    Text::make('Max Flow Rate', 'max_flow_rate')
                    ,
                    Text::make('Flow Rate @ 50 deg F Rise', 'flow_rate50_deg_f_rise')
                    ,
                    Text::make('Flow Rate @ 80 deg F Rise', 'flow_rate80_deg_f_rise')
                    ,
                    Text::make('Temperature Range', 'temperature_range')
                    ,
                    VaporFile::make('Temper Range l1', 'temper_range_l1')->path('heaters/' . $request->model_no)->download(function () {
                        return Storage::disk('s3')->download($this->temper_range_l1, 'temper_range_l1.pdf');
                    })
                        /* MC ->storeAs(function (Request $request) {
                                                return $request->temper_range_l1->getClientOriginalName();
                                            }) /MC */ ->path($request->user()->id . '-attachments')->storeAs(function (Request $request) {
                            return sha1($request->attachment->getClientOriginalName());
                        })
                    ,
                    Text::make('Production Status', 'production_status')
                    ,
                    VaporFile::make('Production Status l1', 'production_status_l1')->path('heaters/' . $request->model_no)->download(function () {
                        return Storage::disk('s3')->download($this->production_status_l1, 'production_status_l1.pdf');
                    })
                    /* MC ->storeAs(function (Request $request) {
                                            return $request->production_status_l1->getClientOriginalName();
                                        }) /MC */
                    ,
                    Text::make('Condensing', 'condensing')
                    ,
                    VaporFile::make('Condensing l1', 'condensing_l1')->path('heaters/' . $request->model_no)->download(function () {
                        return Storage::disk('s3')->download($this->condensing_l1, 'condensing_l1.pdf');
                    })
                    /* MC ->storeAs(function (Request $request) {
                                            return $request->condensing_l1->getClientOriginalName();
                                        }) /MC */
                    ,
                    Text::make('Minimum Activation Flow Rate', 'minimum_activation_flow_rate')
                    ,
                    VaporFile::make('Minimum Activation Flow Rate l1', 'minimum_activation_flow_rate_l1')->path('heaters/' . $request->model_no)->download(function () {
                        return Storage::disk('s3')->download($this->minimum_activation_flow_rate_l1, 'minimum_activation_flow_rate_l1.pdf');
                    })
                    /* MC ->storeAs(function (Request $request) {
                                            return $request->minimum_activation_flow_rate_l1->getClientOriginalName();
                                        }) /MC */
                    ,
                    Text::make('Water Quality', 'water_quality')
                    ,
                    VaporFile::make('Water Quality l1', 'water_quality_l1')->path('heaters/' . $request->model_no)->download(function () {
                        return Storage::disk('s3')->download($this->water_quality_l1, 'water_quality_l1.pdf');
                    })
                    /* MC ->storeAs(function (Request $request) {
                                            return $request->water_quality_l1->getClientOriginalName();
                                        }) /MC */
                    ,
                    VaporFile::make('Water Quality l2', 'water_quality_l2')->path('heaters/' . $request->model_no)->download(function () {
                        return Storage::disk('s3')->download($this->water_quality_l2, 'water_quality_l2.pdf');
                    })
                    /* MC ->storeAs(function (Request $request) {
                                            return $request->water_quality_l2->getClientOriginalName();
                                        }) /MC */
                    ,
                    Text::make('Freeze Protection', 'freeze_protection')
                    ,
                    Text::make('Freeze Protection Rating - Indoor Temp', 'freeze_protection_rating_indoor_temp')
                    ,
                    Text::make('Freeze Protection Rating - Outdoor Temp', 'freeze_protection_rating_outdoor_temp')
                    ,
                    VaporFile::make('Freeze Protection Rating - Outdoor Temp l1', 'freeze_protection_rating_outdoor_temp_l1')->path('heaters/' . $request->model_no)->download(function () {
                        return Storage::disk('s3')->download($this->freeze_protection_rating_outdoor_temp_l1, 'freeze_protection_rating_outdoor_temp_l1.pdf');
                    })
                    /* MC ->storeAs(function (Request $request) {
                                            return $request->freeze_protection_rating_outdoor_temp_l1->getClientOriginalName();
                                        }) /MC */
                    ,
                    Text::make('Recirculation Compatible?', 'recirculation_compatible')
                    ,
                    VaporFile::make('Recirculation l1', 'recirculation_l1')->path('heaters/' . $request->model_no)->download(function () {
                        return Storage::disk('s3')->download($this->recirculation_l1, 'recirculation_l1.pdf');
                    })
                    /* MC ->storeAs(function (Request $request) {
                                            return $request->recirculation_l1->getClientOriginalName();
                                        }) /MC */
                    ,
                    VaporFile::make('Recirculation l2', 'recirculation_l2')->path('heaters/' . $request->model_no)->download(function () {
                        return Storage::disk('s3')->download($this->recirculation_l2, 'recirculation_l2.pdf');
                    })
                    /* MC ->storeAs(function (Request $request) {
                                            return $request->recirculation_l2->getClientOriginalName();
                                        }) /MC */
                    ,
                    Text::make('New Generation Model Number', 'new_generation_model_number')
                    ,
                    Text::make('Previous Name', 'previous_name')
                    ,
                    VaporFile::make('Heater Image', 'heater_image')->path('heaters/' . $request->model_no)->download(function () {
                        return Storage::disk('s3')->download($this->heater_image, 'heater_image.pdf');
                    })
                    /* MC ->storeAs(function (Request $request) {
                                            return $request->heater_image->getClientOriginalName();
                                        }) /MC */
                    ,
                    Text::make('Available Temperature Settings (with remote)', 'available_temperature_settings_with_remote')
                    ,
                    Text::make('Default Temperature Setting (without remote)', 'default_temperature_setting_without_remote')
                    ,
                    Text::make('Default Temperature Program Setting Options (without remote)', 'default_temperature_program_setting_options_without_remote')
                    ,
                    Text::make('Production Date Range', 'production_date_range')


                ]),

                //  End of Overview Tab

                // Start Technical Specs & Installation Tab

                Tab::make('Technical Specs & Installation', [
                    Text::make('Min Gas Input (Btu)', 'min_gas_input_btu')
                    ,
                    Text::make('Max Gas Input (Btu)', 'max_gas_input_btu')
                    ,
                    Text::make('Height (in)', 'height_in')
                    ,
                    Text::make('Width (in)', 'width_in')
                    ,
                    Text::make('Depth (in)', 'depth_in')
                    ,
                    VaporFile::make('Depth l1', 'depth_l1')->path('heaters/' . $request->model_no)->download(function () {
                        return Storage::disk('s3')->download($this->depth_l1, 'depth_l1.pdf');
                    })
                    /* MC ->storeAs(function (Request $request) {
                                            return $request->depth_l1->getClientOriginalName();
                                        }) /MC */
                    ,
                    Text::make('Weight (lbs)', 'weight_lbs')
                    ,
                    Text::make('Thermal Efficiency', 'thermal_efficiency')
                    ,
                    Text::make('Energy Factor', 'energy_factor')
                    ,
                    VaporFile::make('Energy Factor l1', 'energy_factor_l1')->path('heaters/' . $request->model_no)->download(function () {
                        return Storage::disk('s3')->download($this->energy_factor_l1, 'energy_factor_l1.pdf');
                    })
                    /* MC ->storeAs(function (Request $request) {
                                            return $request->energy_factor_l1->getClientOriginalName();
                                        }) /MC */
                    ,
                    Text::make('Afue', 'afue')
                    ,
                    Text::make('Quick-Connect Compatible?', 'quickconnect_compatible')
                    ,
                    VaporFile::make('QuickConnect l1', 'quickconnect_l1')->path('heaters/' . $request->model_no)->download(function () {
                        return Storage::disk('s3')->download($this->quickconnect_l1, 'quickconnect_l1.pdf');
                    })
                    /* MC ->storeAs(function (Request $request) {
                                            return $request->quickconnect_l1->getClientOriginalName();
                                        }) /MC */
                    ,
                    VaporFile::make('QuickConnect l2', 'quickconnect_l2')->path('heaters/' . $request->model_no)->download(function () {
                        return Storage::disk('s3')->download($this->quickconnect_l2, 'quickconnect_l2.pdf');
                    })
                    /* MC ->storeAs(function (Request $request) {
                                            return $request->quickconnect_l2->getClientOriginalName();
                                        }) /MC */
                    ,
                    Text::make('Cold Water Connection Size (in)', 'cold_water_connection_size_in')
                    ,
                    Text::make('Hot Water Connection Size (in)', 'hot_water_connection_size_in')
                    ,
                    Text::make('Gas Connection Size (in)', 'gas_connection_size_in')
                    ,
                    Text::make('Power Supply', 'power_supply')
                    ,
                    Text::make('Current Draw (A)', 'current_draw_a')
                    ,
                    VaporFile::make('Current Draw l1', 'current_draw_l1')->path('heaters/' . $request->model_no)->download(function () {
                        return Storage::disk('s3')->download($this->current_draw_l1, 'current_draw_l1.pdf');
                    })
                    /* MC ->storeAs(function (Request $request) {
                                            return $request->current_draw_l1->getClientOriginalName();
                                        }) /MC */
                    ,
                    Text::make('Exhaust Vent Diameter Requirements', 'exhaust_vent_diameter_requirements')
                    ,
                    Text::make('Exhaust Vent Material Requirements', 'exhaust_vent_material_requirements')
                    ,
                    Text::make('Max Vent Length with 1 elbow', 'max_vent_length_with1_elbow')
                    ,
                    VaporFile::make('Max Vent Length l1', 'max_vent_length_l1')->path('heaters/' . $request->model_no)->download(function () {
                        return Storage::disk('s3')->download($this->max_vent_length_l1, 'max_vent_length_l1.pdf');
                    })
                    /* MC ->storeAs(function (Request $request) {
                                            return $request->max_vent_length_l1->getClientOriginalName();
                                        }) /MC */
                    ,
                    Text::make('Vent Termination Clearances to Any Building Opening (ft)', 'vent_termination_clearances_to_any_building_opening_ft')
                    ,
                    VaporFile::make('Vent Termination l1', 'vent_termination_l1')->path('heaters/' . $request->model_no)->download(function () {
                        return Storage::disk('s3')->download($this->vent_termination_l1, 'vent_termination_l1.pdf');
                    })
                    /* MC ->storeAs(function (Request $request) {
                                            return $request->vent_termination_l1->getClientOriginalName();
                                        }) /MC */
                    ,
                    Text::make('Gas Supply Pressure Range', 'gas_supply_pressure_range')
                    ,
                    VaporFile::make('Gas Supply Pressure Range  l1', 'gas_supply_pressure_range_l1')->path('heaters/' . $request->model_no)->download(function () {
                        return Storage::disk('s3')->download($this->gas_supply_pressure_range_l1, 'gas_supply_pressure_range_l1.pdf');
                    })
                    /* MC ->storeAs(function (Request $request) {
                                            return $request->gas_supply_pressure_range_l1->getClientOriginalName();
                                        }) /MC */
                    ,
                    Text::make('Min Gas Line Size', 'min_gas_line_size')
                    ,
                    VaporFile::make('Min Gas Line Size l1', 'min_gas_line_size_l1')->path('heaters/' . $request->model_no)->download(function () {
                        return Storage::disk('s3')->download($this->min_gas_line_size_l1, 'min_gas_line_size_l1.pdf');
                    })
                    /* MC ->storeAs(function (Request $request) {
                                            return $request->min_gas_line_size_l1->getClientOriginalName();
                                        }) /MC */
                    ,
                    Text::make('Water Pressure Rating (psi)', 'water_pressure_rating_psi')
                    ,
                    Text::make('Case Clearances (in)', 'case_clearances_in')
                    ,
                    VaporFile::make('Case Clearances l1', 'case_clearances_l1')->path('heaters/' . $request->model_no)->download(function () {
                        return Storage::disk('s3')->download($this->case_clearances_l1, 'case_clearances_l1.pdf');
                    })
                    /* MC ->storeAs(function (Request $request) {
                                            return $request->case_clearances_l1->getClientOriginalName();
                                        }) /MC */
                    ,
                    Text::make('Combustion Air Requirements - using Indoor Air', 'combustion_air_requirements_using_indoor_air')
                    ,
                    Text::make('Combustion Air Requirements - using Outdoor Air', 'combustion_air_requirements_using_outdoor_air')
                    ,
                    VaporFile::make('Combustion Air Outdoor l1', 'combustion_air_outdoor_l1')->path('heaters/' . $request->model_no)->download(function () {
                        return Storage::disk('s3')->download($this->combustion_air_outdoor_l1, 'combustion_air_outdoor_l1.pdf');
                    })
                    /* MC ->storeAs(function (Request $request) {
                                            return $request->combustion_air_outdoor_l1->getClientOriginalName();
                                        }) /MC */
                    ,
                    Text::make('Head Loss at 2 gpm', 'head_loss_at2_gpm')
                    ,
                    VaporFile::make('Head Loss l1', 'head_loss_l1')->path('heaters/' . $request->model_no)->download(function () {
                        return Storage::disk('s3')->download($this->head_loss_l1, 'head_loss_l1.pdf');
                    })
                    /* MC ->storeAs(function (Request $request) {
                                            return $request->head_loss_l1->getClientOriginalName();
                                        }) /MC */
                    ,
                    Text::make('Cold Connection Height', 'cold_connection_height')
                    ,
                    Text::make('Power Consumption w/out Freeze Prevention', 'power_consumption_wout_freeze_prevention')
                    ,
                    Text::make('Power Consumption w/Freeze Prevention', 'power_consumption_wfreeze_prevention')
                    ,
                    Text::make('Flow Meter Alarm', 'flow_meter_alarm')
                    ,
                    Text::make('Service Reminder', 'service_reminder')
                    ,
                    Text::make('Condensate Handling Method?', 'condensate_handling_method')
                    ,
                    Text::make('Noise Rating (dB)', 'noise_rating_db')
                    ,
                    Text::make('Tested to UL Computer Controlled Safety Standards', 'tested_to_ul_computer_controlled_safety_standards')
                    ,
                    Text::make('Flame Sensor', 'flame_sensor')
                    ,
                    Text::make('High Limit Switch', 'high_limit_switch')
                    ,
                    Text::make('Lightning Protection', 'lightning_protection')
                    ,
                    Text::make('Overheat Cutoff Fuse', 'overheat_cutoff_fuse')
                    ,
                    Text::make('Temperature Lockout', 'temperature_lockout')
                    ,
                    Text::make('Ignition Type', 'ignition_type')
                    ,
                    Text::make('Case Material', 'case_material')
                    ,
                    Text::make('Color/Finish', 'colorfinish')
                    ,
                    Text::make('Flue Collar Material', 'flue_collar_material')
                    ,
                    Text::make('Primary Heat Exchanger Material', 'primary_heat_exchanger_material')
                    ,
                    Text::make('Secondary Heat Exchanger Material', 'secondary_heat_exchanger_material')
                    ,
                    Text::make('Mounting Type', 'mounting_type')
                    ,
                    Text::make('Package Contents', 'package_contents')
                    ,
                    Text::make('Water Holding Capacity', 'water_holding_capacity')
                ]),

                // End of Technical Specs & Installation Tab


                // Start of Accessories Tab
                Tab::make('Accessories', [


                    Text::make('Keypad/Thermostat Display', 'keypadthermostat_display')
                    ,
                    VaporFile::make('Keypad/Thermostat Display l1', 'keypadthermostat_display_l1')->path('heaters/' . $request->model_no)->download(function () {
                        return Storage::disk('s3')->download($this->keypadthermostat_display_l1, 'keypadthermostat_display_l1.pdf');
                    })
                    /* MC ->storeAs(function (Request $request) {
                                            return $request->keypadthermostat_display_l1->getClientOriginalName();
                                        }) /MC */
                    ,
                    // BelongsTo::make('Compatible Remote Controller Part Num', 'compatible_remote_controller_part_num', 'App\Domain\PartsLookup\Nova\Resources\Part')
                    // ,
                    Text::make('Compatible Remote Controller Part Num', 'compatible_remote_controller_part_num_id')
                    ,
                    VaporFile::make('Compatible Remote Controller Part Num l1', 'compatible_remote_controller_part_num_l1')->path('heaters/' . $request->model_no)->download(function () {
                        return Storage::disk('s3')->download($this->compatible_remote_controller_part_num_l1, 'compatible_remote_controller_part_num_l1.pdf');
                    })
                    /* MC ->storeAs(function (Request $request) {
                                            return $request->compatible_remote_controller_part_num_l1->getClientOriginalName();
                                        }) /MC */
                    ,
                    // BelongsTo::make('Isolator Valve Part Num', 'isolator_valve_part_num', 'App\Domain\PartsLookup\Nova\Resources\Part')
                    // ,
                    Text::make('Isolator Valve Part Num', 'isolator_valve_part_num_id')
                    ,
                    VaporFile::make('Isolator Valve Part Num l1', 'isolator_valve_part_num_l1')->path('heaters/' . $request->model_no)->download(function () {
                        return Storage::disk('s3')->download($this->isolator_valve_part_num_l1, 'isolator_valve_part_num_l1.pdf');
                    })
                    /* MC ->storeAs(function (Request $request) {
                                            return $request->isolator_valve_part_num_l1->getClientOriginalName();
                                        }) /MC */
                    ,
                    Text::make('Freeze Protection', 'freeze_protection')
                    ,
                    Text::make('Freeze Protection Kit Accessory', 'freeze_protection_kit_accessory')
                    ,
                    VaporFile::make('Freeze Protection Kit Accessory l1', 'freeze_protection_kit_accessory_l1')->path('heaters/' . $request->model_no)->download(function () {
                        return Storage::disk('s3')->download($this->freeze_protection_kit_accessory_l1, 'freeze_protection_kit_accessory_l1.pdf');
                    })
                    /* MC ->storeAs(function (Request $request) {
                                            return $request->freeze_protection_kit_accessory_l1->getClientOriginalName();
                                        }) /MC */
                    ,
                    // BelongsTo::make('Outdoor Vent Cap Part Num', 'outdoor_vent_cap_part_num', 'App\Domain\PartsLookup\Nova\Resources\Part')
                    // ,
                    Text::make('Outdoor Vent Cap Part Num', 'outdoor_vent_cap_part_num_id')
                    ,
                    VaporFile::make('Outdoor Vent Cap Part Num l1', 'outdoor_vent_cap_part_num_l1')->path('heaters/' . $request->model_no)->download(function () {
                        return Storage::disk('s3')->download($this->outdoor_vent_cap_part_num_l1, 'outdoor_vent_cap_part_num_l1.pdf');
                    })
                    /* MC ->storeAs(function (Request $request) {
                                            return $request->outdoor_vent_cap_part_num_l1->getClientOriginalName();
                                        }) /MC */
                    ,
                    // BelongsTo::make('Pipe Cover Part Num', 'pipe_cover_part_num', 'App\Domain\PartsLookup\Nova\Resources\Part')
                    // ,
                    Text::make('Pipe Cover Part Num', 'pipe_cover_part_num_id')
                    ,
                    VaporFile::make('Pipe Cover Part Num l1', 'pipe_cover_part_num_l1')->path('heaters/' . $request->model_no)->download(function () {
                        return Storage::disk('s3')->download($this->pipe_cover_part_num_l1, 'pipe_cover_part_num_l1.pdf');
                    })
                    /* MC ->storeAs(function (Request $request) {
                                            return $request->pipe_cover_part_num_l1->getClientOriginalName();
                                        }) /MC */
                    ,
                    // BelongsTo::make('Recess Box Part Num', 'recess_box_part_num', 'App\Domain\PartsLookup\Nova\Resources\Part')
                    // ,
                    Text::make('Recess Box Part Num', 'recess_box_part_num_id')
                    ,
                    VaporFile::make('Recess Box Part Num l1', 'recess_box_part_num_l1')->path('heaters/' . $request->model_no)->download(function () {
                        return Storage::disk('s3')->download($this->recess_box_part_num_l1, 'recess_box_part_num_l1.pdf');
                    })
                    /* MC ->storeAs(function (Request $request) {
                                            return $request->recess_box_part_num_l1->getClientOriginalName();
                                        }) /MC */
                    ,
                    Text::make('High Elevation Adjustment', 'high_elevation_adjustment')
                    ,
                    VaporFile::make('High Elevation Adjustment l1', 'high_elevation_adjustment_l1')
                        ->path('heaters/' . $request->model_no)->storeAs(function (Request $request) {
                            return $request->high_elevation_adjustment_l1->getClientOriginalName();
                        })
                    ,
                    // BelongsTo::make('Quick-Connect Cord Part Num', 'quickconnect_cord_part_num', 'App\Domain\PartsLookup\Nova\Resources\Part')
                    // ,
                    Text::make('Quick-Connect Cord Part Num', 'quickconnect_cord_part_num_id')
                    ,
                    Text::make('System Controller Compatible?', 'system_controller_compatible')
                    ,
                    VaporFile::make('System Controller Compatible l1', 'system_controller_compatible_l1')->path('heaters/' . $request->model_no)->download(function () {
                        return Storage::disk('s3')->download($this->system_controller_compatible_l1, 'system_controller_compatible_l1.pdf');
                    })
                    /* MC ->storeAs(function (Request $request) {
                                            return $request->system_controller_compatible_l1->getClientOriginalName();
                                        }) /MC */
                    ,
                    // BelongsTo::make('System Controller Part Num', 'system_controller_part_num', 'App\Domain\PartsLookup\Nova\Resources\Part')
                    // ,
                    Text::make('System Controller Part Num', 'system_controller_part_num_id')
                    ,
                    VaporFile::make('System Controller Part Num l1', 'system_controller_part_num_l1')->path('heaters/' . $request->model_no)->download(function () {
                        return Storage::disk('s3')->download($this->system_controller_part_num_l1, 'system_controller_part_num_l1.pdf');
                    })
                    /* MC ->storeAs(function (Request $request) {
                                            return $request->system_controller_part_num_l1->getClientOriginalName();
                                        }) /MC */
                    ,
                    Text::make('Remote Controller Cord', 'remote_controller_cord')
                    ,
                    // BelongsTo::make('Compatible Remote Controller Cord Part Num', 'compatible_remote_controller_cord_part_num', 'App\Domain\PartsLookup\Nova\Resources\Part')
                    // ,
                    Text::make('Compatible Remote Controller Cord Part Num', 'compatible_remote_controller_cord_part_num_id')
                    ,
                    Text::make('Power Cord', 'power_cord')
                    ,

                ]),

                // End of Accessories Tab


                Tab::make('Approvals', [

                    Text::make('ENERGY STAR® Qualified', 'energy_star_qualified')
                    ,
                    Text::make('CSA', 'csa')
                    ,
                    Text::make('Mobile Home', 'mobile_home')
                    ,
                    Text::make('NSF', 'nsf')
                    ,
                    Text::make('SCAQMD (20 ppm)', 'scaqmd20_ppm')
                    ,
                    Text::make('SCAQMD (55 ppm)', 'scaqmd55_ppm')
                    ,
                    Text::make('UPC', 'upc')
                    ,
                    Text::make('Energy Guide - Est. Yearly Energy Use', 'energy_guide_est_yearly_energy_use')
                    ,
                    Text::make('Energy Guide - Est. Yearly Energy Use l1', 'energy_guide_est_yearly_energy_use_l1')
                    ,
                    Text::make('Energy Guide - Est. Yearly Operating Cost', 'energy_guide_est_yearly_operating_cost')
                    ,

                    Text::make('UPC Low Lead', 'upc_low_lead')
                    ,
                    Text::make('ASME (HLW)', 'asme_hlw')
                    ,
                    Text::make('ASME (H)', 'asme_h')
                    ,
                    Text::make('ASME (NB)', 'asme_nb')

                ]),

                Tab::make('Warranty', [


                    Text::make('Heat Exchanger Warranty (w/out Recirculation)', 'heat_exchanger_warranty_wout_recirculation')
                    ,
                    Text::make('Heat Exchanger Warranty (w/Recirculation)', 'heat_exchanger_warranty_wrecirculation')
                    ,
                    Text::make('Parts Warranty', 'parts_warranty')
                    ,
                    Text::make('Labor Warranty', 'labor_warranty')
                    ,
                    Text::make('LaborWarranty_l1', 'laborwarrantyl1')
                    ,


                ]),

            ])->withToolbar(),

            /*
            Field::make('Name', 'key')
            ->showOnIndex()
            ->hideFromIndex()
            ->onlyOnForms()
            ->exceptOnForms()
            ->showOnDetail()
            ->hideFromDetail()
            ->showOnCreating()
            ->showOnUpdating()
            ->required()
            ->rules('required')
            ->nullable(),
             */

            // Number::make('ID', 'id')
            //     ->hideFromIndex()
            //     ->hideWhenUpdating()
            // ,


            Text::make('Marketing Name','marketing_name')
            ->sortable()
            ->rules('required', 'max:255'),
            VaporImage::make('Marketing Image', 'marketing_image')
            // ->path('heater_family/' . $request->name)->download(function () {
            //  return Storage::disk('s3')->download($this->marketing_image, 'marketing_image.png');
            // })
            ->hideFromIndex(),
            Select::make('Heater Family', 'heater_family_id')->options(\App\Models\HeaterSeries::pluck('name', 'id'))->hideFromIndex(),
            Select::make('Sizing', 'sizing')
            ->options([
                'two' => '1-2 Bedrooms',
                'four' => '3-4 Bedrooms',
                'five_above' => 'Bedrooms',
            ])->hideFromIndex(),
            Select::make('Type', 'type')
            ->options([
                'Easy Tank Replacement' => 'Easy Tank Replacement',
                'Internal Recirc Pump' => 'Internal Recirc Pump',
                'Combination Boiler' => 'Combination Boiler',
            ])->hideFromIndex(),
            Select::make('Features', 'features')
            ->options([
                'Wifi Capable' => 'Wifi Capable'
            ])->hideFromIndex(),

            Select::make('Brand', 'brand')
                ->options([
                    'Noritz Brand' => 'Noritz Brand',
                    'Accessory' => 'Accessory',
                    'OEM' => 'OEM',
                ])
                ->required()
                ->rules('required')
                ->hideFromIndex()
            ,
            Boolean::make('Show on Compare Tool', 'show_on_compare_tool')
                ->hideFromIndex(),
            Text::make('Series', 'series')
                ->hideFromIndex(),
            Text::make('Series Image', 'series_image')
                ->hideFromIndex()
            ,
            Text::make('Unit Type', 'unit_type')
                ->hideFromIndex()
            ,
            Text::make('Error Code List', 'error_code_list')
            ,
            VaporFile::make('Voltage Checks', 'voltage_checks')->path('heaters/' . $request->model_no)->download(function () {
                return Storage::disk('s3')->download($this->voltage_checks, 'voltage_checks.pdf');
            })
            /* MC ->storeAs(function (Request $request) {
                            return $request->voltage_checks->getClientOriginalName();
                        }) /MC */
            ,
            Text::make('NPA', 'npa')
            ,
            VaporFile::make('Spec Sheet', 'spec_sheet')->path('heaters/' . $request->model_no)->download(function () {
                return Storage::disk('s3')->download($this->spec_sheet, 'spec_sheet.pdf');
            })
            /* MC ->storeAs(function (Request $request) {
                            return $request->spec_sheet->getClientOriginalName();
                        }) /MC */
            ,
            VaporFile::make('Owner Guide', 'owners_guide')->path('heaters/' . $request->model_no)->download(function () {
                return Storage::disk('s3')->download($this->owners_guide, 'owners_guide.pdf');
            })
            /* MC ->storeAs(function (Request $request) {
                            return $request->owners_guide->getClientOriginalName();
                        }) /MC */
            ,
            VaporFile::make('Installation Manual', 'installation_manual')->path('heaters/' . $request->model_no)->download(function () {
                return Storage::disk('s3')->download($this->installation_manual, 'installation_manual.pdf');
            })
            /* MC ->storeAs(function (Request $request) {
                            return $request->installation_manual->getClientOriginalName();
                        }) /MC */
            ,
            VaporFile::make('Parts List', 'parts_list')->path('heaters/' . $request->model_no)->download(function () {
                return Storage::disk('s3')->download($this->parts_list, 'parts_list.pdf');
            })
            /* MC ->storeAs(function (Request $request) {
                            return $request->parts_list->getClientOriginalName();
                        }) /MC */
            ,
            VaporFile::make('Certification', 'certification')->path('heaters/' . $request->model_no)->download(function () {
                return Storage::disk('s3')->download($this->certification, 'certification.pdf');
            })
            /* MC ->storeAs(function (Request $request) {
                            return $request->certification->getClientOriginalName();
                        }) /MC */
            ,
            VaporFile::make('Field Manual', 'field_manual')->path('heaters/' . $request->model_no)->download(function () {
                return Storage::disk('s3')->download($this->field_manual, 'field_manual.pdf');
            })
            /* MC ->storeAs(function (Request $request) {
                            return $request->field_manual->getClientOriginalName();
                        }) /MC */
            ,
            VaporFile::make('Service Manual', 'service_manual')->path('heaters/' . $request->model_no)->download(function () {
                return Storage::disk('s3')->download($this->service_manual, 'service_manual.pdf');
            })
            /* MC ->storeAs(function (Request $request) {
                            return $request->service_manual->getClientOriginalName();
                        }) /MC */
            ,
            VaporFile::make('Service Manual - Hot Water Capabilities', 'service_manual_hot_water_capabilities')->path('heaters/' . $request->model_no)->download(function () {
                return Storage::disk('s3')->download($this->service_manual_hot_water_capabilities, 'service_manual_hot_water_capabilities.pdf');
            })
            /* MC ->storeAs(function (Request $request) {
                            return $request->service_manual_hot_water_capabilities->getClientOriginalName();
                        }) /MC */
            ,
            // Image::make('Service Manual - Hot Water Capabilities', 'service_manual_hot_water_capabilities')
            //     ,
            VaporFile::make('Service Manual - Pressure Loss Chart', 'service_manual_pressure_loss_chart')->path('heaters/' . $request->model_no)->download(function () {
                return Storage::disk('s3')->download($this->service_manual_pressure_loss_chart, 'service_manual_pressure_loss_chart.pdf');
            })
            /* MC ->storeAs(function (Request $request) {
                            return $request->service_manual_pressure_loss_chart->getClientOriginalName();
                        }) /MC */
            ,
            VaporFile::make('Service Manual - Components', 'service_manual_components')->path('heaters/' . $request->model_no)->download(function () {
                return Storage::disk('s3')->download($this->service_manual_components, 'service_manual_components.pdf');
            })
            /* MC ->storeAs(function (Request $request) {
                            return $request->service_manual_components->getClientOriginalName();
                        }) /MC */
            ,
            VaporFile::make('Service Manual - Operating Principal', 'service_manual_operating_principal')->path('heaters/' . $request->model_no)->download(function () {
                return Storage::disk('s3')->download($this->service_manual_operating_principal, 'service_manual_operating_principal.pdf');
            })
            /* MC ->storeAs(function (Request $request) {
                            return $request->service_manual_operating_principal->getClientOriginalName();
                        }) /MC */
            ,
            VaporFile::make('Service Manual - Operation Flow', 'service_manual_operation_flow')->path('heaters/' . $request->model_no)->download(function () {
                return Storage::disk('s3')->download($this->service_manual_operation_flow, 'service_manual_operation_flow.pdf');
            })
            /* MC ->storeAs(function (Request $request) {
                            return $request->service_manual_operation_flow->getClientOriginalName();
                        }) /MC */
            ,
            VaporFile::make('Service Manual - Wiring Diagram', 'service_manual_wiring_diagram')->path('heaters/' . $request->model_no)->download(function () {
                return Storage::disk('s3')->download($this->service_manual_wiring_diagram, 'service_manual_wiring_diagram.pdf');
            })
            /* MC ->storeAs(function (Request $request) {
                            return $request->service_manual_wiring_diagram->getClientOriginalName();
                        }) /MC */
            ,
            VaporFile::make('Service Manual - Error Code and Checkpoints', 'service_manual_error_code_and_checkpoints')->path('heaters/' . $request->model_no)->download(function () {
                return Storage::disk('s3')->download($this->service_manual_error_code_and_checkpoints, 'service_manual_error_code_and_checkpoints.pdf');
            })
            /* MC ->storeAs(function (Request $request) {
                            return $request->service_manual_error_code_and_checkpoints->getClientOriginalName();
                        }) /MC */
            ,
            VaporFile::make('Service Manual - Circuit Board Checkpoints', 'service_manual_circuit_board_checkpoints')->path('heaters/' . $request->model_no)->download(function () {
                return Storage::disk('s3')->download($this->service_manual_circuit_board_checkpoints, 'service_manual_circuit_board_checkpoints.pdf');
            })
            /* MC ->storeAs(function (Request $request) {
                            return $request->service_manual_circuit_board_checkpoints->getClientOriginalName();
                        }) /MC */
            ,
            VaporFile::make('Service Manual - Error Descriptions', 'service_manual_error_descriptions')->path('heaters/' . $request->model_no)->download(function () {
                return Storage::disk('s3')->download($this->service_manual_error_descriptions, 'service_manual_error_descriptions.pdf');
            })
            /* MC ->storeAs(function (Request $request) {
                            return $request->service_manual_error_descriptions->getClientOriginalName();
                        }) /MC */
            ,
            VaporFile::make('Service Manual - Maintenance', 'service_manual_maintenance')->path('heaters/' . $request->model_no)->download(function () {
                return Storage::disk('s3')->download($this->service_manual_maintenance, 'service_manual_maintenance.pdf');
            })
            /* MC ->storeAs(function (Request $request) {
                            return $request->service_manual_maintenance->getClientOriginalName();
                        }) /MC */
            ,
            VaporFile::make('Service Manual - Circuit Board Replacement', 'service_manual_circuit_board_replacement')->path('heaters/' . $request->model_no)->download(function () {
                return Storage::disk('s3')->download($this->service_manual_circuit_board_replacement, 'service_manual_circuit_board_replacement.pdf');
            })
            /* MC ->storeAs(function (Request $request) {
                            return $request->service_manual_circuit_board_replacement->getClientOriginalName();
                        }) /MC */
            ,
            VaporFile::make('Service Manual - Fan Motor Calibration', 'service_manual_fan_motor_calibration')->path('heaters/' . $request->model_no)->download(function () {
                return Storage::disk('s3')->download($this->service_manual_fan_motor_calibration, 'service_manual_fan_motor_calibration.pdf');
            })
            /* MC ->storeAs(function (Request $request) {
                            return $request->service_manual_fan_motor_calibration->getClientOriginalName();
                        }) /MC */
            ,
            VaporFile::make('Service Manual - Neutralizer Replacement', 'service_manual_neutralizer_replacement')->path('heaters/' . $request->model_no)->download(function () {
                return Storage::disk('s3')->download($this->service_manual_neutralizer_replacement, 'service_manual_neutralizer_replacement.pdf');
            })
            /* MC ->storeAs(function (Request $request) {
                            return $request->service_manual_neutralizer_replacement->getClientOriginalName();
                        }) /MC */
            ,
            VaporFile::make('Service Manual - Manifold Pressures', 'service_manual_manifold_pressures')->path('heaters/' . $request->model_no)->download(function () {
                return Storage::disk('s3')->download($this->service_manual_manifold_pressures, 'service_manual_manifold_pressures.pdf');
            })
            /* MC ->storeAs(function (Request $request) {
                            return $request->service_manual_manifold_pressures->getClientOriginalName();
                        }) /MC */
            ,
            VaporFile::make('Service Manual - Change Default Temperatures', 'service_manual_change_default_temperatures')->path('heaters/' . $request->model_no)->download(function () {
                return Storage::disk('s3')->download($this->service_manual_change_default_temperatures, 'service_manual_change_default_temperatures.pdf');
            })
            /* MC ->storeAs(function (Request $request) {
                            return $request->service_manual_change_default_temperatures->getClientOriginalName();
                        }) /MC */
            ,
            VaporFile::make('Service Manual - Error Descriptions', 'service_manual_error_descriptions')->path('heaters/' . $request->model_no)->download(function () {
                return Storage::disk('s3')->download($this->service_manual_error_descriptions, 'service_manual_error_descriptions.pdf');
            })
            /* MC ->storeAs(function (Request $request) {
                            return $request->service_manual_error_descriptions->getClientOriginalName();
                        }) /MC */
            ,
            VaporFile::make('Service Manual - Condensate Drain Line', 'service_manual_condensate_drain_line')->path('heaters/' . $request->model_no)->download(function () {
                return Storage::disk('s3')->download($this->service_manual_condensate_drain_line, 'service_manual_condensate_drain_line.pdf');
            })
            /* MC ->storeAs(function (Request $request) {
                            return $request->service_manual_condensate_drain_line->getClientOriginalName();
                        }) /MC */
            ,
            Text::make('Name', 'name')
            ,
            VaporFile::make('Parts List File', 'parts_list_file')->path('heaters/' . $request->model_no)->download(function () {
                return Storage::disk('s3')->download($this->parts_list_file, 'parts_list_file.pdf');
            })
            /* MC ->storeAs(function (Request $request) {
                            return $request->parts_list_file->getClientOriginalName();
                        }) /MC */
            ,

            DateTime::make('Created At', 'created_at')
                ->nullable()
                ->exceptOnForms()
            ,
            DateTime::make('Updated At', 'updated_at')
                ->nullable()
                ->exceptOnForms()
            ,

            BelongsToManyField::make('Parts', 'parts', 'App\Domain\PartsLookup\Nova\Resources\Part')
                ->relationModel(\App\Domain\PartsLookup\Models\Part::class)
                ->optionsLabel('part_number')
                ->hideFromIndex(),
            BelongsToMany::make('Feature Highlight','feature_highlights'),
            BelongsToMany::make('Feature Specs','feature_specs')
        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function cards(Request $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function filters(Request $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function lenses(Request $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function actions(Request $request)
    {
        return [

        ];
    }

}
