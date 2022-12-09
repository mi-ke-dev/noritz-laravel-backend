<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Domain\TechnicalInfo\Database\Factories\HeaterFactory;
use App\Domain\TechnicalInfo\Traits\HasUuid;
use Illuminate\Support\Facades\Storage;

/**
* Class Heater.
*/
class Heater extends Model
{
    // use HasUuid;
    use HasFactory;

    protected $table = "heaters";

    public $keyType = 'string';

    protected $casts = [
        // 'id' => 'string',
        'model_no' => 'string'
    ];

    protected $appends  = ['full_marketing_image'];

    // protected $keyType = 'uuid';
    // protected $primaryKey = 'id';

    protected $fillable = [
        'model_no',
        'model_type',
        'drawings',
        'fp2',
        'warrantyindex',
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
        'parts_list_file'
    ];

    /**
    * @var string[][]
    */
    public static $createRules = [
      // 'example_field' => ['required', 'string', 'max:255'],
    ];

    /**
    * @var string[][]
    */
    public static $updateRules = [
      // 'example_field' => ['required', 'string', 'max:255'],
    ];

    //=============================================================================
    // Setup and Configuration
    //=============================================================================
    public static function boot()
    {
        parent::boot();

        //
    }

    //=============================================================================
    // Setup and Configuration
    //=============================================================================
    protected static function newFactory(): Factory
    {
        return HeaterFactory::new();
    }

    //=============================================================================
    // Relationships
    // - https://laravel.com/docs/8.x/eloquent-relationships
    // - https://hackernoon.com/eloquent-relationships-cheat-sheet-5155498c209
    //=============================================================================
    public function parts(): BelongsToMany
    {
        return $this->belongsToMany(\App\Domain\PartsLookup\Models\Part::class, 'heater_part', 'heater_id', 'part_id');
    }

    // public function parts(): BelongsToMany
    // {
    //     return $this->belongsToMany(Part::class);
    // }


    //=============================================================================
    // Mutators
    //  - https://laravel.com/docs/8.x/eloquent-mutators#defining-a-mutator
    //=============================================================================
    /*
    // example mutator
    public function setFirstNameAttribute($value)
    {
      $this->attributes['first_name'] = strtolower($value);
    }
    */

    //=============================================================================
    // Accessors
    //  - https://laravel.com/docs/8.x/eloquent-mutators#defining-an-accessor
    //=============================================================================
    /*
    // example accessor
    public function getFirstNameAttribute($value)
    {
      return ucfirst($value);
    }
    */
    public function getFullMarketingImageAttribute(){
       
      if($this->marketing_image && $this->marketing_image != ''){
        return Storage::url($this->marketing_image);
      }
      return asset('images/nrcr.jpg');
    }

      public function compatible_remote_controller_part_num(){
        return $this->belongsTo(\App\Domain\PartsLookup\Models\Part::class);
      }

      public function isolator_valve_part_num(){
        return $this->belongsTo(\App\Domain\PartsLookup\Models\Part::class);
      }

      public function outdoor_vent_cap_part_num(){
        return $this->belongsTo(\App\Domain\PartsLookup\Models\Part::class);
      }

      public function pipe_cover_part_num(){
        return $this->belongsTo(\App\Domain\PartsLookup\Models\Part::class);
      }

      public function recess_box_part_num(){
        return $this->belongsTo(\App\Domain\PartsLookup\Models\Part::class);
      }

      public function quickconnect_cord_part_num(){
        return $this->belongsTo(\App\Domain\PartsLookup\Models\Part::class);
      }

      public function system_controller_part_num(){
        return $this->belongsTo(\App\Domain\PartsLookup\Models\Part::class);
      }

      public function compatible_remote_controller_cord_part_num(){
        return $this->belongsTo(\App\Domain\PartsLookup\Models\Part::class);
      }

      public function  heaterSeries(){
        return $this->belongsTo(HeaterSeries::class,'heater_family_id');
      }

      public function  feature_highlights(){
        return $this->belongsToMany(FeatureHighlight::class, 'feature_highlight_heater', 'heater_id', 'feature_highlight_id');
      }

      public function  feature_specs(){
        return $this->belongsToMany(FeatureSpec::class, 'feature_spec_heaters', 'heater_id', 'feature_spec_id');
      }



}
