<!-- This example requires Tailwind CSS v2.0+ -->
<template>
    <div>


        <!-- Overview Table 1 -->

        <div class="p-8 pb-0" v-if="heaters" id="print">


            <h3 class="w-full text-white bg-blue-400 px-4 py-2 font-semibold text-xl rounded-tl-md rounded-tr-md mb-2">Overview</h3>
            <div class="mb-8 w-full">
                <div class="w-full mb-4">
                  <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                      <div class="overflow-hidden border border-gray-200 ">
                        <table class="min-w-full divide-y divide-gray-200">
                          <tbody class="bg-white divide-y divide-gray-200">
                            <tr>
                              <td class="px-5 py-2 text-sm text-gray-500">
                                Residential or Commercial
                              </td>
                              <td class="px-5 py-2 text-sm font-bold text-gray-900">
                                {{ heaters.model_type }}
                              </td>
                              <td class="px-5 py-2 text-right text-sm font-medium" >


                              </td>
                            </tr>
                            <tr class="bg-gray-50">
                              <td class="px-5 py-2 text-sm text-gray-500">
                                 Installation Location
                              </td>
                              <td class="px-5 py-2 text-sm font-bold text-gray-900">
                                {{ heaters.install_location }}
                              </td>
                              <td class="px-5 py-2 text-right text-sm font-medium">

                              </td>
                            </tr>
                            <tr>
                              <td class="px-5 py-2 text-sm text-gray-500">
                                Exhaust Type
                              </td>
                              <td class="px-5 py-2 text-sm font-bold text-gray-900">
                                {{ heaters.exhaust_type }}
                              </td>
                              <td class="px-5 py-2 text-right text-sm font-medium">

                              </td>
                            </tr>

                            <tr class="bg-gray-50" >
                              <td class="px-5 py-2 text-sm text-gray-500">
                                Max Flow Rate
                              </td>
                              <td class="px-5 py-2 text-sm font-bold text-gray-900">
                                {{ heaters.max_flow_rate }}
                              </td>
                              <td class="px-5 py-2 text-right text-sm font-medium">

                              </td>
                            </tr>

                            <tr>
                              <td class="px-5 py-2 text-sm text-gray-500">
                               Flow Rate @ 50°F Rise
                              </td>
                              <td class="px-5 py-2 text-sm font-bold text-gray-900">
                                {{ heaters.flow_rate50_deg_f_rise }}
                              </td>
                              <td class="px-5 py-2 text-right text-sm font-medium">

                              </td>
                            </tr>

                            <tr class="bg-gray-50">
                              <td class="px-5 py-2 text-sm text-gray-500">
                                Flow Rate @ 80°F Rise
                              </td>
                              <td class="px-5 py-2 text-sm font-bold text-gray-900">
                                {{ heaters.flow_rate80_deg_f_rise }}
                              </td>
                              <td class="px-5 py-2 text-right text-sm font-medium">

                              </td>
                            </tr>

                            <tr>
                              <td class="px-5 py-2 text-sm text-gray-500">
                                Temperature Range
                              </td>
                              <td class="px-5 py-2 text-sm font-bold text-gray-900">
                                {{ heaters.temperature_range }}
                              </td>
                              <td class="px-5 py-2 text-right text-sm font-medium">

                              </td>
                            </tr>

                            <tr class="bg-gray-50">
                              <td class="px-5 py-2 text-sm text-gray-500">
                               Production Status
                              </td>
                              <td class="px-5 py-2 text-sm font-bold text-gray-900">
                                {{ heaters.production_status }}
                              </td>
                              <td class="px-5 py-2 text-right text-sm font-medium">

                              </td>
                            </tr>

                            <tr>
                              <td class="px-5 py-2 text-sm text-gray-500">
                                Condensing
                              </td>
                              <td class="px-5 py-2 text-sm font-bold text-gray-900">
                                 {{ heaters.condensing }}
                              </td>
                              <td class="px-5 py-2 text-right text-sm font-medium">

                              </td>
                            </tr>

                            <tr class="bg-gray-50">
                              <td class="px-5 py-2 text-sm text-gray-500">
                                Minimum Activation Flow Rate
                              </td>
                              <td class="px-5 py-2 text-sm font-bold text-gray-900">
                                 {{ heaters.minimum_activation_flow_rate }}
                              </td>
                              <td class="px-5 py-2 text-right text-sm font-medium">

                              </td>
                            </tr>

                            <tr>
                              <td class="px-5 py-2 text-sm text-gray-500">
                                Water Quality
                              </td>
                              <td class="px-5 py-2 text-sm font-bold text-gray-900">
                                {{ heaters.water_quality }}
                              </td>
                              <td class="px-5 py-2 text-right text-sm font-medium">

                                </td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- End of Overview table one  -->

                <!-- Overview table 2 -->
                <div class="w-full">
                  <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                      <div class="overflow-hidden border border-gray-200 ">
                        <table class="min-w-full divide-y divide-gray-200">
                          <tbody class="bg-white divide-y divide-gray-200">
                            <tr >
                              <td class="px-5 py-2 text-sm text-gray-500">
                                 Freeze Protection
                              </td>
                              <td class="px-5 py-2 text-sm font-bold text-gray-900">
                                {{ heaters.freeze_protection }}
                              </td>
                                <td class="px-5 py-2 text-right text-sm font-medium">
                             </td>
                            </tr>
                            <tr class="bg-gray-50" >
                              <td class="px-5 py-2 text-sm text-gray-500">
                                 Freeze Protection Rating - Indoor Temp
                              </td>
                              <td class="px-5 py-2 text-sm font-bold text-gray-900">
                                {{ heaters.freeze_protection_rating_indoor_temp }}
                              </td>
                              <td class="px-5 py-2 text-right text-sm font-medium">

                              </td>
                            </tr>
                            <tr>
                              <td class="px-5 py-2 text-sm text-gray-500">
                                Freeze Protection Rating - Outdoor Temp
                              </td>
                              <td class="px-5 py-2 text-sm font-bold text-gray-900">
                                {{ heaters.freeze_protection_rating_outdoor_temp }}
                              </td>
                              <td class="px-5 py-2 text-right text-sm font-medium">

                              </td>
                            </tr>
                            <tr class="bg-gray-50">
                              <td class="px-5 py-2 text-sm text-gray-500">
                                 Recirculation Compatible ?
                              </td>
                              <td class="px-5 py-2 text-sm font-bold text-gray-900">
                                {{ heaters.recirculation_compatible }}
                              </td>
                              <td class="px-5 py-2 text-right text-sm font-medium">

                              </td>
                            </tr>

                             <tr>
                              <td class="px-5 py-2 text-sm text-gray-500">
                                New Generation Model Number
                              </td>
                              <td class="px-5 py-2 text-sm font-bold text-gray-900">
                                {{ heaters.new_generation_model_number }}
                              </td>
                              <td class="px-5 py-2 text-right text-sm font-medium">

                              </td>
                            </tr>
                            <tr class="bg-gray-50">
                              <td class="px-5 py-2 text-sm text-gray-500">
                               Previous Name
                              </td>
                              <td class="px-5 py-2 text-sm font-bold text-gray-900">
                                {{ heaters.previous_name }}
                              </td>
                              <td class="px-5 py-2 text-right text-sm font-medium">

                              </td>
                            </tr>
                             <tr>
                              <td class="px-5 py-2 text-sm text-gray-500">
                                 Available Temperature Settings (with remote)
                              </td>
                              <td class="px-5 py-2 text-sm font-bold text-gray-900">
                                                   {{ heaters.available_temperature_settings_with_remote }}
                              </td>
                              <td class="px-5 py-2 text-right text-sm font-medium">

                              </td>
                            </tr>
                            <tr class="bg-gray-50">
                              <td class="px-5 py-2 text-sm text-gray-500">
                               Default Temperature Setting (without remote)
                              </td>
                              <td class="px-5 py-2 text-sm font-bold text-gray-900">
                                {{ heaters.default_temperature_setting_without_remote }}
                              </td>
                              <td class="px-5 py-2 text-right text-sm font-medium">

                              </td>
                            </tr>

                             <tr>
                              <td class="px-5 py-2 text-sm text-gray-500">
                               Default Temperature Program Setting Options (without remote)
                              </td>
                              <td class="px-5 py-2 text-sm font-bold text-gray-900">
                               {{  heaters.default_temperature_program_setting_options_without_remote  }}
                              </td>
                              <td class="px-5 py-2 text-right text-sm font-medium">

                              </td>
                            </tr>
                            <tr class="bg-gray-50">
                              <td class="px-5 py-2 text-sm text-gray-500">
                               Production Date Range
                              </td>
                              <td class="px-5 py-2 text-sm font-bold text-gray-900">
                                {{ heaters.production_date_range }}
                              </td>
                              <td class="px-5 py-2 text-right text-sm font-medium">

                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
            <!-- End of Overview table 2 -->

            <!-- Technical Specs & installation table 1 -->
            <h3 class="w-full text-white bg-blue-400 px-4 py-2 font-semibold text-xl rounded-tl-md rounded-tr-md mb-2">Technical Specs &amp; Installation</h3>
            <div class="mb-8 w-full">
                <div class="w-full mb-4">
                  <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                      <div class="overflow-hidden border border-gray-200 ">
                        <table class="min-w-full divide-y divide-gray-200">
                          <tbody class="bg-white divide-y divide-gray-200">
                          <tr class="bg-gray-50">
                              <td class="px-5 py-2 text-sm text-gray-500">
                                 Min Gas Input (Btu)
                              </td>
                              <td class="px-5 py-2 text-sm font-bold text-gray-900">
                                {{ heaters.min_gas_input_btu }}
                              </td>
                              <td class="px-5 py-2 text-right text-sm font-medium">

                              </td>
                            </tr>

                             <tr>
                              <td class="px-5 py-2 text-sm text-gray-500">
                               Max Gas Input (Btu)
                              </td>
                              <td class="px-5 py-2 text-sm font-bold text-gray-900">
                                {{ heaters.max_gas_input_btu }}
                              </td>
                              <td class="px-5 py-2 text-right text-sm font-medium">

                              </td>
                            </tr>

                            <tr  class="bg-gray-50">
                              <td class="px-5 py-2 text-sm text-gray-500">
                               Height (in)
                              </td>
                              <td class="px-5 py-2 text-sm font-bold text-gray-900">
                                {{ heaters.height_in }}
                              </td>
                              <td class="px-5 py-2 text-right text-sm font-medium">

                              </td>
                            </tr>

                             <tr>
                              <td class="px-5 py-2 text-sm text-gray-500">
                                Width (in)
                              </td>
                              <td class="px-5 py-2 text-sm font-bold text-gray-900">
                                {{ heaters.width_in }}
                              </td>
                              <td class="px-5 py-2 text-right text-sm font-medium">

                              </td>
                            </tr>

                            <tr class="bg-gray-50">
                              <td class="px-5 py-2 text-sm text-gray-500">
                                 Depth (in)
                              </td>
                              <td class="px-5 py-2 text-sm font-bold text-gray-900">
                                {{ heaters.depth_in }}
                              </td>
                              <td class="px-5 py-2 text-right text-sm font-medium">

                              </td>
                            </tr>

                             <tr>
                              <td class="px-5 py-2 text-sm text-gray-500">
                                 Weight (lbs)
                              </td>
                              <td class="px-5 py-2 text-sm font-bold text-gray-900">
                                {{ heaters.weight_lbs }}
                              </td>
                              <td class="px-5 py-2 text-right text-sm font-medium">

                              </td>
                            </tr>

                            <tr class="bg-gray-50">
                              <td class="px-5 py-2 text-sm text-gray-500">
                                Thermal Efficiency
                              </td>
                              <td class="px-5 py-2 text-sm font-bold text-gray-900">
                                {{ heaters.thermal_efficiency }}
                              </td>
                              <td class="px-5 py-2 text-right text-sm font-medium">

                              </td>
                            </tr>

                             <tr>
                              <td class="px-5 py-2 text-sm text-gray-500">
                                Energy Factor
                              </td>
                              <td class="px-5 py-2 text-sm font-bold text-gray-900">
                                {{ heaters.energy_factor }}
                              </td>
                              <td class="px-5 py-2 text-right text-sm font-medium">

                              </td>
                            </tr>

                            <tr class="bg-gray-50">
                              <td class="px-5 py-2 text-sm text-gray-500">
                                 Afue
                              </td>
                              <td class="px-5 py-2 text-sm font-bold text-gray-900">
                                {{ heaters.afue }}
                              </td>
                              <td class="px-5 py-2 text-right text-sm font-medium">

                              </td>
                            </tr>

                             <tr>
                              <td class="px-5 py-2 text-sm text-gray-500">
                                Quick-Connect Compatible?
                              </td>
                              <td class="px-5 py-2 text-sm font-bold text-gray-900">
                                {{ heaters.quickconnect_compatible }}
                              </td>
                              <td class="px-5 py-2 text-right text-sm font-medium">

                              </td>
                            </tr>

                            <tr class="bg-gray-50">
                              <td class="px-5 py-2 text-sm text-gray-500">
                                  Cold Water Connection Size (in)
                              </td>
                              <td class="px-5 py-2 text-sm font-bold text-gray-900">
                                {{ heaters.cold_water_connection_size_in }}
                              </td>
                              <td class="px-5 py-2 text-right text-sm font-medium">

                              </td>
                            </tr>

                             <tr>
                              <td class="px-5 py-2 text-sm text-gray-500">
                                 Hot Water Connection Size (in)
                              </td>
                              <td class="px-5 py-2 text-sm font-bold text-gray-900">
                                {{ heaters.hot_water_connection_size_in }}
                              </td>
                              <td class="px-5 py-2 text-right text-sm font-medium">

                              </td>
                            </tr>

                            <tr class="bg-gray-50">
                              <td class="px-5 py-2 text-sm text-gray-500">
                                 Gas Connection Size (in)                              </td>
                              <td class="px-5 py-2 text-sm font-bold text-gray-900">
                                {{ heaters.gas_connection_size_in }}
                              </td>
                              <td class="px-5 py-2 text-right text-sm font-medium">

                              </td>
                            </tr>

                             <tr>
                              <td class="px-5 py-2 text-sm text-gray-500">
                               Power Supply
                              </td>
                              <td class="px-5 py-2 text-sm font-bold text-gray-900">
                                {{ heaters.power_supply }}
                              </td>
                              <td class="px-5 py-2 text-right text-sm font-medium">

                              </td>
                            </tr>

                            <tr class="bg-gray-50">
                              <td class="px-5 py-2 text-sm text-gray-500">
                                Current Draw (A)
                              </td>
                              <td class="px-5 py-2 text-sm font-bold text-gray-900">
                                {{ heaters.current_draw_a }}
                              </td>
                              <td class="px-5 py-2 text-right text-sm font-medium">

                              </td>
                            </tr>

                             <tr>
                              <td class="px-5 py-2 text-sm text-gray-500">
                                Exhaust Vent Diameter Requirements
                              </td>
                              <td class="px-5 py-2 text-sm font-bold text-gray-900">
                                {{ heaters.exhaust_vent_diameter_requirements }}
                              </td>
                              <td class="px-5 py-2 text-right text-sm font-medium">

                              </td>
                            </tr>

                            <tr class="bg-gray-50">
                              <td class="px-5 py-2 text-sm text-gray-500">
                                 Exhaust Vent Material Requirements
                              </td>
                              <td class="px-5 py-2 text-sm font-bold text-gray-900">
                                {{ heaters.exhaust_vent_material_requirements }}
                              </td>
                              <td class="px-5 py-2 text-right text-sm font-medium">

                              </td>
                            </tr>

                             <tr>
                              <td class="px-5 py-2 text-sm text-gray-500">
                                 Max Vent Length with 1 elbow
                              </td>
                              <td class="px-5 py-2 text-sm font-bold text-gray-900">
                                {{ heaters.max_vent_length_with1_elbow }}
                              </td>
                              <td class="px-5 py-2 text-right text-sm font-medium">

                              </td>
                            </tr>

                            <tr class="bg-gray-50">
                              <td class="px-5 py-2 text-sm text-gray-500">
                                Vent Termination Clearances to Any Building Opening (ft)
                              </td>
                              <td class="px-5 py-2 text-sm font-bold text-gray-900">
                                {{ heaters.vent_termination_clearances_to_any_building_opening_ft }}
                              </td>
                              <td class="px-5 py-2 text-right text-sm font-medium">

                               </td>
                            </tr>

                             <tr>
                              <td class="px-5 py-2 text-sm text-gray-500">
                                Gas Supply Pressure Range
                              </td>
                              <td class="px-5 py-2 text-sm font-bold text-gray-900">
                                {{ heaters.gas_supply_pressure_range }}
                              </td>
                              <td class="px-5 py-2 text-right text-sm font-medium">

                              </td>
                            </tr>

                            <tr class="bg-gray-50">
                              <td class="px-5 py-2 text-sm text-gray-500">
                                Min Gas Line Size
                              </td>
                              <td class="px-5 py-2 text-sm font-bold text-gray-900">
                                {{ heaters.min_gas_line_size }}
                              </td>
                              <td class="px-5 py-2 text-right text-sm font-medium">

                              </td>
                            </tr>

                             <tr>
                              <td class="px-5 py-2 text-sm text-gray-500">
                                  Water Pressure Rating (psi)
                              </td>
                              <td class="px-5 py-2 text-sm font-bold text-gray-900">
                                {{ heaters.water_pressure_rating_psi }}
                              </td>
                              <td class="px-5 py-2 text-right text-sm font-medium">

                              </td>
                            </tr>

                            <tr class="bg-gray-50">
                              <td class="px-5 py-2 text-sm text-gray-500">
                                 Case Clearances (in)
                              </td>
                              <td class="px-5 py-2 text-sm font-bold text-gray-900">
                                {{ heaters.case_clearances_in }}
                              </td>
                              <td class="px-5 py-2 text-right text-sm font-medium">

                              </td>
                            </tr>

                             <tr>
                              <td class="px-5 py-2 text-sm text-gray-500">
                               Combustion Air Requirements - using Indoor Air
                              </td>
                              <td class="px-5 py-2 text-sm font-bold text-gray-900">
                                {{ heaters.combustion_air_requirements_using_indoor_air }}
                              </td>
                              <td class="px-5 py-2 text-right text-sm font-medium">

                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- End of Technical specs & installation table 1  -->

                <!-- Technical specs & installation table 2 -->
                <div class="w-full">
                  <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                      <div class="overflow-hidden border border-gray-200 ">
                        <table class="min-w-full divide-y divide-gray-200">
                          <tbody class="bg-white divide-y divide-gray-200">
                            <tr class="bg-gray-50" >
                              <td class="px-5 py-2 text-sm text-gray-500">
                                 Combustion Air Requirements - using Outdoor Air
                              </td>
                              <td class="px-5 py-2 text-sm font-bold text-gray-900">
                                {{ heaters.combustion_air_requirements_using_outdoor_air }}
                              </td>
                              <td class="px-5 py-2 text-right text-sm font-medium">
                                </td>
                            </tr>

                             <tr>
                              <td class="px-5 py-2 text-sm text-gray-500">
                                 Head Loss at 2 gpm
                              </td>
                              <td class="px-5 py-2 text-sm font-bold text-gray-900">
                                {{ heaters.head_loss_at2_gpm }}
                              </td>
                              <td class="px-5 py-2 text-right text-sm font-medium">
                                </td>
                            </tr>

                            <tr class="bg-gray-50">
                              <td class="px-5 py-2 text-sm text-gray-500">
                                 Cold Connection Height
                              </td>
                              <td class="px-5 py-2 text-sm font-bold text-gray-900">
                                {{ heaters.cold_connection_height }}
                              </td>
                              <td class="px-5 py-2 text-right text-sm font-medium">
                              </td>
                            </tr>

                             <tr>
                              <td class="px-5 py-2 text-sm text-gray-500">
                               Power Consumption w/out Freeze Prevention
                              </td>
                              <td class="px-5 py-2 text-sm font-bold text-gray-900">
                                {{ heaters.power_consumption_wout_freeze_prevention }}
                              </td>
                              <td class="px-5 py-2 text-right text-sm font-medium">

                              </td>
                            </tr>

                            <tr class="bg-gray-50">
                              <td class="px-5 py-2 text-sm text-gray-500">
                                Power Consumption w/Freeze Prevention
                              </td>
                              <td class="px-5 py-2 text-sm font-bold text-gray-900">
                                {{ heaters.power_consumption_wfreeze_prevention }}
                              </td>
                              <td class="px-5 py-2 text-right text-sm font-medium">
                                 </td>
                            </tr>

                             <tr>
                              <td class="px-5 py-2 text-sm text-gray-500">
                                Flow Meter Alarm
                              </td>
                              <td class="px-5 py-2 text-sm font-bold text-gray-900">
                                {{ heaters.flow_meter_alarm }}
                              </td>
                              <td class="px-5 py-2 text-right text-sm font-medium">

                              </td>
                            </tr>

                            <tr class="bg-gray-50">
                              <td class="px-5 py-2 text-sm text-gray-500">
                               Service Reminder
                              </td>
                              <td class="px-5 py-2 text-sm font-bold text-gray-900">
                                {{ heaters.service_reminder }}
                              </td>
                              <td class="px-5 py-2 text-right text-sm font-medium">
                               </td>
                            </tr>

                             <tr>
                              <td class="px-5 py-2 text-sm text-gray-500">
                                 Condensate Handling Method?
                              </td>
                              <td class="px-5 py-2 text-sm font-bold text-gray-900">
                                {{ heaters.condensate_handling_method }}
                              </td>
                              <td class="px-5 py-2 text-right text-sm font-medium">

                              </td>
                            </tr>

                            <tr class="bg-gray-50">
                              <td class="px-5 py-2 text-sm text-gray-500">
                                Noise Rating (dB)
                              </td>
                              <td class="px-5 py-2 text-sm font-bold text-gray-900">
                                {{ heaters.noise_rating_db }}
                              </td>
                              <td class="px-5 py-2 text-right text-sm font-medium">
                                </td>
                            </tr>

                             <tr>
                              <td class="px-5 py-2 text-sm text-gray-500">
                               Tested to UL Computer Controlled Safety Standards
                              </td>
                              <td class="px-5 py-2 text-sm font-bold text-gray-900">
                                {{ heaters.tested_to_ul_computer_controlled_safety_standards }}
                              </td>
                              <td class="px-5 py-2 text-right text-sm font-medium">

                              </td>
                            </tr>

                            <tr class="bg-gray-50">
                              <td class="px-5 py-2 text-sm text-gray-500">
                                Flame Sensor
                              </td>
                              <td class="px-5 py-2 text-sm font-bold text-gray-900">
                                {{ heaters.flame_sensor }}
                              </td>
                              <td class="px-5 py-2 text-right text-sm font-medium">
                               </td>
                            </tr>

                             <tr>
                              <td class="px-5 py-2 text-sm text-gray-500">
                                High Limit Switch
                              </td>
                              <td class="px-5 py-2 text-sm font-bold text-gray-900">
                                {{ heaters.high_limit_switch }}
                              </td>
                              <td class="px-5 py-2 text-right text-sm font-medium">

                              </td>
                            </tr>

                            <tr class="bg-gray-50">
                              <td class="px-5 py-2 text-sm text-gray-500">
                                Lightning Protection
                              </td>
                              <td class="px-5 py-2 text-sm font-bold text-gray-900">
                                {{ heaters.lightning_protection }}
                              </td>
                              <td class="px-5 py-2 text-right text-sm font-medium">
                              </td>
                            </tr>

                             <tr>
                              <td class="px-5 py-2 text-sm text-gray-500">
                                 Overheat Cutoff Fuse)
                              </td>
                              <td class="px-5 py-2 text-sm font-bold text-gray-900">
                                {{ heaters.overheat_cutoff_fuse }}
                              </td>
                              <td class="px-5 py-2 text-right text-sm font-medium">

                              </td>
                            </tr>

                            <tr class="bg-gray-50">
                              <td class="px-5 py-2 text-sm text-gray-500">
                                Temperature Lockout
                              </td>
                              <td class="px-5 py-2 text-sm font-bold text-gray-900">
                                {{ heaters.temperature_lockout }}
                              </td>
                              <td class="px-5 py-2 text-right text-sm font-medium">
                                </td>
                            </tr>

                             <tr>
                              <td class="px-5 py-2 text-sm text-gray-500">
                                Ignition Type
                              </td>
                              <td class="px-5 py-2 text-sm font-bold text-gray-900">
                                {{ heaters.ignition_type }}
                              </td>
                              <td class="px-5 py-2 text-right text-sm font-medium">

                              </td>
                            </tr>

                            <tr class="bg-gray-50">
                              <td class="px-5 py-2 text-sm text-gray-500">
                                Case Material
                              </td>
                              <td class="px-5 py-2 text-sm font-bold text-gray-900">
                                {{ heaters.case_material }}
                              </td>
                              <td class="px-5 py-2 text-right text-sm font-medium">
                              </td>
                            </tr>

                             <tr>
                              <td class="px-5 py-2 text-sm text-gray-500">
                                Color/Finish
                              </td>
                              <td class="px-5 py-2 text-sm font-bold text-gray-900">
                                {{ heaters.colorfinish }}
                              </td>
                              <td class="px-5 py-2 text-right text-sm font-medium">

                              </td>
                            </tr>

                            <tr class="bg-gray-50">
                              <td class="px-5 py-2 text-sm text-gray-500">
                                 Flue Collar Material
                              </td>
                              <td class="px-5 py-2 text-sm font-bold text-gray-900">
                                {{ heaters.flue_collar_material }}
                              </td>
                              <td class="px-5 py-2 text-right text-sm font-medium">
                                </td>
                            </tr>

                             <tr>
                              <td class="px-5 py-2 text-sm text-gray-500">
                                Primary Heat Exchanger Material
                              </td>
                              <td class="px-5 py-2 text-sm font-bold text-gray-900">
                                {{ heaters.primary_heat_exchanger_material }}
                              </td>
                              <td class="px-5 py-2 text-right text-sm font-medium">

                              </td>
                            </tr>

                            <tr class="bg-gray-50">
                              <td class="px-5 py-2 text-sm text-gray-500">
                                 Secondary Heat Exchanger Material
                              </td>
                              <td class="px-5 py-2 text-sm font-bold text-gray-900">
                                {{ heaters.secondary_heat_exchanger_material }}
                              </td>
                              <td class="px-5 py-2 text-right text-sm font-medium">
                                </td>
                            </tr>

                             <tr>
                              <td class="px-5 py-2 text-sm text-gray-500">
                                 Mounting Type
                              </td>
                              <td class="px-5 py-2 text-sm font-bold text-gray-900">
                                {{ heaters.mounting_type }}
                              </td>
                              <td class="px-5 py-2 text-right text-sm font-medium">

                              </td>
                            </tr>

                            <tr class="bg-gray-50">
                              <td class="px-5 py-2 text-sm text-gray-500">
                                Package Contents
                              </td>
                              <td class="px-5 py-2 text-sm font-bold text-gray-900">
                                {{ heaters.package_contents }}
                              </td>
                              <td class="px-5 py-2 text-right text-sm font-medium">
                                </td>
                            </tr>

                             <tr>
                              <td class="px-5 py-2 text-sm text-gray-500">
                                 Water Holding Capacity
                              </td>
                              <td class="px-5 py-2 text-sm font-bold text-gray-900">
                                {{ heaters.water_holding_capacity }}
                              </td>
                              <td class="px-5 py-2 text-right text-sm font-medium">

                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
            </div>


        <!--  End of Technical specs & installation table 2 -->

                    <!--Accessories table 1 -->
            <h3 class="w-full text-white bg-blue-400 px-4 py-2 font-semibold text-xl rounded-tl-md rounded-tr-md mb-2">Accessories</h3>
            <div class="mb-8 w-full">
                <div class="w-full mb-4">
                  <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                      <div class="overflow-hidden border border-gray-200 ">
                        <table class="min-w-full divide-y divide-gray-200">
                          <tbody class="bg-white divide-y divide-gray-200">
                          <tr class="bg-gray-50">
                              <td class="px-5 py-2 text-sm text-gray-500">
                                Keypad/Thermostat Display
                              </td>
                              <td class="px-5 py-2 text-sm font-bold text-gray-900">
                                {{ heaters.keypadthermostat_display }}
                              </td>
                              <td class="px-5 py-2 text-right text-sm font-medium">

                              </td>
                            </tr>

                             <tr>
                              <td class="px-5 py-2 text-sm text-gray-500">
                               Compatible Remote Controller Part #
                              </td>
                              <td class="px-5 py-2 text-sm font-bold text-gray-900">
                                {{ heaters.compatible_remote_controller_part_num_id }}
                              </td>
                              <td class="px-5 py-2 text-right text-sm font-medium">

                              </td>
                            </tr>

                            <tr  class="bg-gray-50">
                              <td class="px-5 py-2 text-sm text-gray-500">
                               Isolator Valve Part #
                              </td>
                              <td class="px-5 py-2 text-sm font-bold text-gray-900">
                                {{ heaters.isolator_valve_part_num_id }}
                              </td>
                              <td class="px-5 py-2 text-right text-sm font-medium">

                              </td>
                            </tr>

                             <tr>
                              <td class="px-5 py-2 text-sm text-gray-500">
                               Freeze Protection
                              </td>
                              <td class="px-5 py-2 text-sm font-bold text-gray-900">
                                {{ heaters.freeze_protection }}
                              </td>
                              <td class="px-5 py-2 text-right text-sm font-medium">

                              </td>
                            </tr>

                            <tr class="bg-gray-50">
                              <td class="px-5 py-2 text-sm text-gray-500">
                                 Freeze Protection Kit Accessory
                              </td>
                              <td class="px-5 py-2 text-sm font-bold text-gray-900">
                                {{ heaters.freeze_protection_kit_accessory }}
                              </td>
                              <td class="px-5 py-2 text-right text-sm font-medium">

                              </td>
                            </tr>

                             <tr>
                              <td class="px-5 py-2 text-sm text-gray-500">
                                 Outdoor Vent Cap Part #
                              </td>
                              <td class="px-5 py-2 text-sm font-bold text-gray-900">
                                {{ heaters.outdoor_vent_cap_part_num_id }}
                              </td>
                              <td class="px-5 py-2 text-right text-sm font-medium">

                              </td>
                            </tr>
                            <tr >
                              <td class="px-5 py-2 whitespace-nowrap text-sm text-gray-500">
                                 Pipe Cover Part #
                              </td>
                              <td class="px-5 py-2 whitespace-nowrap text-sm font-bold text-gray-900">
                                {{ heaters.pipe_cover_part_num_id }}
                              </td>
                              <td class="px-5 py-2 whitespace-nowrap text-right text-sm font-medium">

                              </td>
                            </tr>

                            <tr class="bg-gray-50">
                              <td class="px-5 py-2 text-sm text-gray-500">
                                Recess Box Part #
                              </td>
                              <td class="px-5 py-2 text-sm font-bold text-gray-900">
                                {{ heaters.recess_box_part_num_id }}
                              </td>
                              <td class="px-5 py-2 text-right text-sm font-medium">

                              </td>
                            </tr>


                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>


            <!-- End of Accessories table 1 -->

            <!-- Accessories table 2 -->

                 <div class="w-full">
                  <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                      <div class="overflow-hidden border border-gray-200 ">
                        <table class="min-w-full divide-y divide-gray-200">
                          <tbody class="bg-white divide-y divide-gray-200">
                            <tr class="bg-gray-50">
                              <td class="px-5 py-2 text-sm text-gray-500">
                                High Elevation Adjustment
                              </td>
                              <td class="px-5 py-2 text-sm font-bold text-gray-900">
                                {{ heaters.high_elevation_adjustment }}
                              </td>
                              <td class="px-5 py-2 text-right text-sm font-medium">

                              </td>
                            </tr>

                             <tr>
                              <td class="px-5 py-2 text-sm text-gray-500">
                                 Quick-Connect Cord Part #
                              </td>
                              <td class="px-5 py-2 text-sm font-bold text-gray-900">
                                {{ heaters.quickconnect_cord_part_num_id }}
                              </td>
                              <td class="px-5 py-2 text-right text-sm font-medium">
                                </td>
                            </tr>

                            <tr class="bg-gray-50">
                              <td class="px-5 py-2 text-sm text-gray-500">
                                 System Controller Compatible?
                              </td>
                              <td class="px-5 py-2 text-sm font-bold text-gray-900">
                                {{ heaters.system_controller_compatible }}
                              </td>
                              <td class="px-5 py-2 text-right text-sm font-medium">

                              </td>
                            </tr>

                             <tr>
                              <td class="px-5 py-2 text-sm text-gray-500">
                             System Controller Part #
                              </td>
                              <td class="px-5 py-2 text-sm font-bold text-gray-900">
                                {{ heaters.system_controller_part_num_id }}
                              </td>
                              <td class="px-5 py-2 text-right text-sm font-medium">

                              </td>
                            </tr>

                            <tr class="bg-gray-50">
                              <td class="px-5 py-2 text-sm text-gray-500">
                                Remote Controller Cord
                              </td>
                              <td class="px-5 py-2 text-sm font-bold text-gray-900">
                                {{ heaters.remote_controller_cord }}
                              </td>
                              <td class="px-5 py-2 text-right text-sm font-medium">
                                 </td>
                            </tr>

                             <tr>
                              <td class="px-5 py-2 text-sm text-gray-500">
                                Compatible Remote Controller Cord Part #
                              </td>
                              <td class="px-5 py-2 text-sm font-bold text-gray-900">
                                {{ heaters.compatible_remote_controller_cord_part_num_id }}
                              </td>
                              <td class="px-5 py-2 text-right text-sm font-medium">

                              </td>
                            </tr>

                            <tr class="bg-gray-50">
                              <td class="px-5 py-2 text-sm text-gray-500">
                               Power Cord
                              </td>
                              <td class="px-5 py-2 text-sm font-bold text-gray-900">
                                {{ heaters.power_cord }}
                              </td>
                              <td class="px-5 py-2 text-right text-sm font-medium">
                               </td>
                            </tr>
                             </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
                 </div>

                <!-- End of Accessories table2 -->

               <!--Approvals table 1 -->
            <h3 class="w-full text-white bg-blue-400 px-4 py-2 font-semibold text-xl rounded-tl-md rounded-tr-md mb-2">Approvals</h3>
            <div class="mb-8 w-full">
                <div class="w-full mb-4">
                  <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                      <div class="overflow-hidden border border-gray-200 ">
                        <table class="min-w-full divide-y divide-gray-200">
                          <tbody class="bg-white divide-y divide-gray-200">
                          <tr class="bg-gray-50">
                              <td class="px-5 py-2 text-sm text-gray-500">
                                ENERGY STAR® Qualified
                              </td>
                              <td class="px-5 py-2 text-sm font-bold text-gray-900">
                                {{ heaters.energy_star_qualified }}
                              </td>
                              <td class="px-5 py-2 text-right text-sm font-medium">

                              </td>
                            </tr>

                             <tr>
                              <td class="px-5 py-2 text-sm text-gray-500">
                               CSA
                              </td>
                              <td class="px-5 py-2 text-sm font-bold text-gray-900">
                                {{ heaters.csa }}
                              </td>
                              <td class="px-5 py-2 text-right text-sm font-medium">
                                </td>
                            </tr>

                            <tr  class="bg-gray-50">
                              <td class="px-5 py-2 text-sm text-gray-500">
                              Mobile Home
                              </td>
                              <td class="px-5 py-2 text-sm font-bold text-gray-900">
                                {{ heaters.mobile_home }}
                              </td>
                              <td class="px-5 py-2 text-right text-sm font-medium">
                               </td>
                            </tr>

                             <tr>
                              <td class="px-5 py-2 text-sm text-gray-500">
                              NSF
                              </td>
                              <td class="px-5 py-2 text-sm font-bold text-gray-900">
                                {{ heaters.nsf }}
                              </td>
                              <td class="px-5 py-2 text-right text-sm font-medium">

                              </td>
                            </tr>

                            <tr class="bg-gray-50">
                              <td class="px-5 py-2 text-sm text-gray-500">
                                 SCAQMD (20 ppm)
                              </td>
                              <td class="px-5 py-2 text-sm font-bold text-gray-900">
                                {{ heaters.scaqmd20_ppm }}
                              </td>
                              <td class="px-5 py-2 text-right text-sm font-medium">
                                </td>
                            </tr>

                             <tr>
                              <td class="px-5 py-2 text-sm text-gray-500">
                                  SCAQMD (55 ppm)
                              </td>
                              <td class="px-5 py-2 text-sm font-bold text-gray-900">
                                {{ heaters.scaqmd55_ppm }}
                              </td>
                              <td class="px-5 py-2 text-right text-sm font-medium">
                                </td>
                            </tr>

                            <tr class="bg-gray-50">
                              <td class="px-5 py-2 text-sm text-gray-500">
                                UPC
                              </td>
                              <td class="px-5 py-2 text-sm font-bold text-gray-900">
                                {{ heaters.upc }}
                              </td>
                              <td class="px-5 py-2 text-right text-sm font-medium">

                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>


            <!-- End of Approvals table 1 -->

            <!-- Approvals table 2 -->

                 <div class="w-full">
                  <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                      <div class="overflow-hidden border border-gray-200 ">
                        <table class="min-w-full divide-y divide-gray-200">
                          <tbody class="bg-white divide-y divide-gray-200">
                            <tr class="bg-gray-50">
                              <td class="px-5 py-2 text-sm text-gray-500">
                               Energy Guide - Est. Yearly Energy Use
                              </td>
                              <td class="px-5 py-2 text-sm font-bold text-gray-900">
                                {{ heaters.energy_guide_est_yearly_energy_use }}
                              </td>
                              <td class="px-5 py-2 text-right text-sm font-medium">

                              </td>
                            </tr>

                             <tr>
                              <td class="px-5 py-2 text-sm text-gray-500">
                                 Energy Guide - Est. Yearly Operating Cost
                              </td>
                              <td class="px-5 py-2 text-sm font-bold text-gray-900">
                                {{ heaters.energy_guide_est_yearly_operating_cost }}
                              </td>
                              <td class="px-5 py-2 text-right text-sm font-medium">
                                </td>
                            </tr>

                            <tr class="bg-gray-50">
                              <td class="px-5 py-2 text-sm text-gray-500">
                                UPC Low Lead
                              </td>
                              <td class="px-5 py-2 text-sm font-bold text-gray-900">
                                {{ heaters.upc_low_lead }}
                              </td>
                              <td class="px-5 py-2 text-right text-sm font-medium">
                              </td>
                            </tr>

                             <tr>
                              <td class="px-5 py-2 text-sm text-gray-500">
                              ASME (HLW)
                              </td>
                              <td class="px-5 py-2 text-sm font-bold text-gray-900">
                                {{ heaters.asme_hlw }}
                              </td>
                              <td class="px-5 py-2 text-right text-sm font-medium">

                              </td>
                            </tr>

                            <tr class="bg-gray-50">
                              <td class="px-5 py-2 text-sm text-gray-500">
                                ASME (H)
                              </td>
                              <td class="px-5 py-2 text-sm font-bold text-gray-900">
                                {{ heaters.asme_h }}
                              </td>
                              <td class="px-5 py-2 text-right text-sm font-medium">
                                 </td>
                            </tr>

                             <tr>
                              <td class="px-5 py-2 text-sm text-gray-500">
                                ASME (NB)
                              </td>
                              <td class="px-5 py-2 text-sm font-bold text-gray-900">
                                {{ heaters.asme_nb }}
                              </td>
                              <td class="px-5 py-2 text-right text-sm font-medium">

                              </td>
                            </tr>
                             </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
                </div>

              <!-- End of Approvals Table 2 -->


               <!--warranty table 1 -->
            <h3 class="w-full text-white bg-blue-400 px-4 py-2 font-semibold text-xl rounded-tl-md rounded-tr-md mb-2">Warranty</h3>
            <div class="mb-8 w-full">
                <div class="w-full mb-4">
                  <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                      <div class="overflow-hidden border border-gray-200 ">
                        <table class="min-w-full divide-y divide-gray-200">
                          <tbody class="bg-white divide-y divide-gray-200">
                          <tr class="bg-gray-50">
                              <td class="px-5 py-2 text-sm text-gray-500">
                               Heat Exchanger Warranty (w/out Recirculation)
                              </td>
                              <td class="px-5 py-2 text-sm font-bold text-gray-900">
                                {{ heaters.heat_exchanger_warranty_wout_recirculation }}
                              </td>
                              <td class="px-5 py-2 text-right text-sm font-medium">

                              </td>
                            </tr>

                             <tr>
                              <td class="px-5 py-2 text-sm text-gray-500">
                              Heat Exchanger Warranty (w/Recirculation)
                              </td>
                              <td class="px-5 py-2 text-sm font-bold text-gray-900">
                                {{ heaters.heat_exchanger_warranty_wrecirculation }}
                              </td>
                              <td class="px-5 py-2 text-right text-sm font-medium">
                                </td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>


            <!-- End of warranty table 1 -->

            <!-- warranty table 2 -->

                 <div class="w-full">
                  <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                      <div class="overflow-hidden border border-gray-200 ">
                        <table class="min-w-full divide-y divide-gray-200">
                          <tbody class="bg-white divide-y divide-gray-200">
                            <tr class="bg-gray-50">
                              <td class="px-5 py-2 text-sm text-gray-500">
                               Parts Warranty
                              </td>
                              <td class="px-5 py-2 text-sm font-bold text-gray-900">
                                {{ heaters.parts_warranty }}
                              </td>
                              <td class="px-5 py-2 text-right text-sm font-medium">
                              </td>
                            </tr>

                             <tr>
                              <td class="px-5 py-2 text-sm text-gray-500">
                             Labor Warranty
                              </td>
                              <td class="px-5 py-2 text-sm font-bold text-gray-900">
                                {{ heaters.labor_warranty }}
                              </td>
                              <td class="px-5 py-2 text-right text-sm font-medium">

                              </td>
                            </tr>





                             </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
                </div>
          </div>
    <!-- End of Warranty Table 2 -->





    </div>
</template>


<style scoped>
.bg-blue-400 {
    background: #dc2626;
}
.text-blue-500 {
    color: #dc2626;
}

table tr td{
  width: 50%;
}
table tr td:last-child{
  display: none;
}
</style>

<script>

export default {
    props: ["heaters"],
    components: {},

    data() {
        return {
            base_url: "/storage/" ,
            file_type: ""
            };
    },
    setup() {
        return {

        };
    },
     methods: {




  }
};
</script>
