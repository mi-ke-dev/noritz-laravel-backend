<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\SecurityRole;

class AttachmentSecurityTemplateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = SecurityRole::first();
        if(!$data)
        {
            $data = SecurityRole::create([
            'name' => 'security roles',
            'user_id' => '1'
            ]);
        }
        $id = $data->id;
        DB::table('attachment_security_templates')->insert([
        'key' => 'exhaust_type_l1',
        'security_role_id' => $id,
        ]);
        DB::table('attachment_security_templates')->insert([
            'key' => 'max_flow_rate_l1',
            'security_role_id' => $id,
        ]);
        DB::table('attachment_security_templates')->insert([
            'key' => 'temper_range_l1',
            'security_role_id' => $id,
        ]);
        DB::table('attachment_security_templates')->insert([
            'key' => 'production_status_l1',
            'security_role_id' => $id,
        ]);
        DB::table('attachment_security_templates')->insert([
            'key' => 'condensing_l1',
            'security_role_id' => $id,
        ]);
        DB::table('attachment_security_templates')->insert([
            'key' => 'minimum_activation_flow_rate_l1',
            'security_role_id' => $id,
        ]);
        DB::table('attachment_security_templates')->insert([
            'key' => 'water_quality_l1',
            'security_role_id' => $id,
        ]);
        DB::table('attachment_security_templates')->insert([
            'key' => 'freeze_protection_rating_outdoor_temp_l1',
            'security_role_id' => $id,
        ]);
        DB::table('attachment_security_templates')->insert([
            'key' => 'recirculation_l1',
            'security_role_id' => $id,
        ]);
        DB::table('attachment_security_templates')->insert([
            'key' => 'depth_l1',
            'security_role_id' => $id,
        ]);
        DB::table('attachment_security_templates')->insert([
            'key' => 'energy_factor_l1',
            'security_role_id' => $id,
        ]);
        DB::table('attachment_security_templates')->insert([
            'key' => 'quickconnect_l1',
            'security_role_id' => $id,
        ]);
        DB::table('attachment_security_templates')->insert([
            'key' => 'current_draw_l1',
            'security_role_id' => $id,
        ]);
        DB::table('attachment_security_templates')->insert([
            'key' => 'max_vent_length_l1',
            'security_role_id' => $id,
        ]);
        DB::table('attachment_security_templates')->insert([
            'key' => 'vent_termination_l1',
            'security_role_id' => $id,
        ]);
        DB::table('attachment_security_templates')->insert([
            'key' => 'gas_supply_pressure_range_l1',
            'security_role_id' => $id,
        ]);
        DB::table('attachment_security_templates')->insert([
            'key' => 'min_gas_line_size_l1',
            'security_role_id' => $id,
        ]);
        DB::table('attachment_security_templates')->insert([
            'key' => 'case_clearances_l1',
            'security_role_id' => $id,
        ]);
        DB::table('attachment_security_templates')->insert([
            'key' => 'combustion_air_outdoor_l1',
            'security_role_id' => $id,
        ]);
        DB::table('attachment_security_templates')->insert([
            'key' => 'head_loss_l1',
            'security_role_id' => $id,
        ]);
        DB::table('attachment_security_templates')->insert([
            'key' => 'keypadthermostat_display_l1',
            'security_role_id' => $id,
        ]);
        DB::table('attachment_security_templates')->insert([
            'key' => 'compatible_remote_controller_part_num_l1',
            'security_role_id' => $id,
        ]);
        DB::table('attachment_security_templates')->insert([
            'key' => 'isolator_valve_part_num_l1    ',
            'security_role_id' => $id,
        ]);
        DB::table('attachment_security_templates')->insert([
            'key' => 'freeze_protection_kit_accessory_l1',
            'security_role_id' => $id,
        ]);
        DB::table('attachment_security_templates')->insert([
            'key' => 'outdoor_vent_cap_part_num_l1',
            'security_role_id' => $id,
        ]);
        DB::table('attachment_security_templates')->insert([
            'key' => 'pipe_cover_part_num_l1',
            'security_role_id' => $id,
        ]);
        DB::table('attachment_security_templates')->insert([
            'key' => 'recess_box_part_num_l1',
            'security_role_id' => $id,
        ]);
        DB::table('attachment_security_templates')->insert([
            'key' => 'high_elevation_adjustment_l1',
            'security_role_id' => $id,
        ]);
        DB::table('attachment_security_templates')->insert([
            'key' => 'system_controller_compatible_l1',
            'security_role_id' => $id,
        ]);
        DB::table('attachment_security_templates')->insert([
            'key' => 'system_controller_part_num_l1',
            'security_role_id' => $id,
        ]);
        DB::table('attachment_security_templates')->insert([
            'key' => 'energy_guide_est_yearly_energy_use_l1',
            'security_role_id' => $id,
        ]);
        DB::table('attachment_security_templates')->insert([
            'key' => 'laborwarrantyl1',
            'security_role_id' => $id,
        ]);
        DB::table('attachment_security_templates')->insert([
            'key' => 'water_quality_l2',
            'security_role_id' => $id,
        ]);
        DB::table('attachment_security_templates')->insert([
            'key' => 'recirculation_l2',
            'security_role_id' => $id,
        ]);
        DB::table('attachment_security_templates')->insert([
            'key' => 'quickconnect_l2',
            'security_role_id' => $id,
        ]);
    }
}
