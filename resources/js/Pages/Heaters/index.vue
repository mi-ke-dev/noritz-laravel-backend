<!-- This example requires Tailwind CSS v2.0+ -->
<template>
    <div>
        <!-- Header Start -->
        <div class="lg:flex p-8 pb-0">
            <div class="md:flex items-center justify-center w-full">
                <label for="country" class="font-semibold text-xl text-blue-500 pr-3 lg:whitespace-nowrap">
                    Search by Model
                </label>

                <Autocomplete
                  :items="heater_list"
                  :value="selectedHeater"
                ></Autocomplete>

            </div>

            <div class="flex items-center lg:justify-center w-full my-5 lg:my-0">
                <label class="font-semibold text-lg pr-3">View Mode:</label>
                <a href="javascript:void(0)" @click="showType('sheet')"  :class="(is_show_type == 'sheet')?'active  border-b-2 border-red-400 leading-5':''">SHEET</a>
                <div class="px-3">:</div>
                <a href="javascript:void(0)"  @click="showType('tab')" :class="(is_show_type == 'tab')?'active  border-b-2 border-red-400 leading-5':'' " >TAB </a>
            </div>


            <div class="flex items-center lg:justify-center w-full">
                <a href="javascript:void(0)" @click="printHtml" class="flex">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z" />
                    </svg>
                    Print Product Info
                </a>
            </div>
        </div>
        <!-- End of Header -->

        <!-- Overview Table 1 -->
        <div class="p-8 pb-0" v-if="!heaters"

        >No record found</div>

        <div class="p-8 pb-0" v-if="heaters" id="printMe">



            <!-- tabs -->
            <ul v-if="is_show_type == 'tab'" class="flex space-x-2 tabs">
                <li>
                    <a href="javascript:void(0)"  :class="(is_show_tab == 'overview')?'bg-blue-400':'bg-gray-400'" class=" w-full text-white  px-4 py-2 font-semibold text-xl rounded-tl-md rounded-tr-md mb-2 flex " @click="showTab('overview')">Overview</a>
                </li>
                <li >
                    <a :class="(is_show_tab == 'technical')?'bg-blue-400':'bg-gray-400'"  href="javascript:void(0)" class="w-full text-white  px-4 py-2 font-semibold text-xl rounded-tl-md rounded-tr-md mb-2 flex"  @click="showTab('technical')">Technical Specs & Installment</a>
                </li>
                <li >
                    <a :class="(is_show_tab == 'accessories')?'bg-blue-400':'bg-gray-400'"  href="javascript:void(0)" class="w-full text-white px-4 py-2 font-semibold text-xl rounded-tl-md rounded-tr-md mb-2 flex"  @click="showTab('accessories')">Accessories</a>
                </li>
                <li >
                    <a :class="(is_show_tab == 'approvals')?'bg-blue-400':'bg-gray-400'" href="javascript:void(0)" class="w-full text-white  px-4 py-2 font-semibold text-xl rounded-tl-md rounded-tr-md mb-2 flex" @click="showTab('approvals')">Approvals</a>
                </li>
                 <li >
                    <a :class="(is_show_tab == 'warranty')?'bg-blue-400':'bg-gray-400'"  href="javascript:void(0)"  class="w-full text-white px-4 py-2 font-semibold text-xl rounded-tl-md rounded-tr-md mb-2 flex" @click="showTab('warranty')" >Warranty</a>
                </li>
            </ul>
            <!-- tabs -->

            <h3 class="w-full text-white bg-blue-400 px-4 py-2 font-semibold text-xl rounded-tl-md rounded-tr-md mb-2" v-if="is_show_type == 'sheet'" >Overview</h3>
            <div class="lg:flex mb-8" v-if="(is_show_type == 'sheet') || (is_show_type == 'tab' && is_show_tab == 'overview')">
                <div class="lg:pr-5 w-full">
                  <div class="-my-2 overflow-x-auto">
                    <div class="py-2 align-middle inline-block min-w-full">
                      <div class="overflow-hidden border border-gray-200 ">
                        <table class="min-w-full divide-y divide-gray-200">
                          <tbody class="bg-white divide-y divide-gray-200">
                            <tr  v-if="checkPermission('residential_or_commercial', [])">
                              <td class="px-5 py-2 text-sm text-gray-500">
                                Residential or Commercial
                              </td>
                              <td class="px-5 py-2 text-sm font-bold text-gray-900">
                                {{ heaters.model_type }}
                              </td>
                              <td class="px-5 py-2 whitespace-nowrap text-right text-sm font-medium" >


                              </td>
                            </tr>
                            <tr class="bg-gray-100" v-if="checkPermission('install_location', [])">
                              <td class="px-5 py-2 text-sm text-gray-500">
                                 Installation Location
                              </td>
                              <td class="px-5 py-2 text-sm font-bold text-gray-900">
                                {{ heaters.install_location }}
                              </td>
                              <td class="px-5 py-2 whitespace-nowrap text-right text-sm font-medium">

                              </td>
                            </tr>
                            <tr v-if="checkPermission('exhaust_type', ['exhaust_type_l1'])">
                              <td class="px-5 py-2 text-sm text-gray-500">
                                Exhaust Type
                              </td>
                              <td class="px-5 py-2 text-sm font-bold text-gray-900">
                                {{ heaters.exhaust_type }}
                              </td>
                              <td class="px-5 py-2 whitespace-nowrap text-right text-sm font-medium">
                                <a :href="getDownloadFile('exhaust_type_l1')"  v-if="checkPermission('exhaust_type_l1', [])" target="_blank">
                                   <img v-if="checkBlank('exhaust_type_l1')" :src="checkLockOrUnlock('exhaust_type_l1')" alt="">
                                </a>
                              </td>
                            </tr>

                            <tr class="bg-gray-100" v-if="checkPermission('max_flow_rate', ['max_flow_rate_l1'])">
                              <td class="px-5 py-2 text-sm text-gray-500">
                                Max Flow Rate
                              </td>
                              <td class="px-5 py-2 text-sm font-bold text-gray-900">
                                {{ heaters.max_flow_rate }}
                              </td>
                              <td class="px-5 py-2 whitespace-nowrap text-right text-sm font-medium">
                                <a :href="getDownloadFile('max_flow_rate_l1')"  v-if="checkPermission('max_flow_rate_l1', [])" target="_blank">
                                     <img v-if="checkBlank('max_flow_rate_l1')" :src="checkLockOrUnlock('max_flow_rate_l1')" alt="">
                                </a>
                              </td>
                            </tr>

                            <tr v-if="checkPermission('flow_rate50_deg_f_rise', [])">
                              <td class="px-5 py-2 text-sm text-gray-500">
                               Flow Rate @ 50°F Rise
                              </td>
                              <td class="px-5 py-2 text-sm font-bold text-gray-900">
                                {{ heaters.flow_rate50_deg_f_rise }}
                              </td>
                              <td class="px-5 py-2 whitespace-nowrap text-right text-sm font-medium">

                              </td>
                            </tr>

                            <tr class="bg-gray-100" v-if="checkPermission('flow_rate80_deg_f_rise', [])">
                              <td class="px-5 py-2 text-sm text-gray-500">
                                Flow Rate @ 80°F Rise
                              </td>
                              <td class="px-5 py-2 text-sm font-bold text-gray-900">
                                {{ heaters.flow_rate80_deg_f_rise }}
                              </td>
                              <td class="px-5 py-2 whitespace-nowrap text-right text-sm font-medium">

                              </td>
                            </tr>

                            <tr  v-if="checkPermission('temperature_range', [])">
                              <td class="px-5 py-2 text-sm text-gray-500">
                                Temperature Range
                              </td>
                              <td class="px-5 py-2 text-sm font-bold text-gray-900">
                                {{ heaters.temperature_range }}
                              </td>
                              <td class="px-5 py-2 whitespace-nowrap text-right text-sm font-medium">

                              </td>
                            </tr>

                            <tr class="bg-gray-100" v-if="checkPermission('production_status', ['production_status_l1'])">
                              <td class="px-5 py-2 text-sm text-gray-500">
                               Production Status
                              </td>
                              <td class="px-5 py-2 text-sm font-bold text-gray-900">
                                {{ heaters.production_status }}
                              </td>
                              <td class="px-5 py-2 whitespace-nowrap text-right text-sm font-medium">
                                <a
                                :href="getDownloadFile('production_status_l1')"
                                 v-if="checkPermission('production_status_l1', [])" target="_blank">
                                     <img  v-if="checkBlank('production_status_l1')" :src="checkLockOrUnlock('production_status_l1')" alt="">
                                </a>
                              </td>
                            </tr>

                            <tr v-if="checkPermission('condensing', ['condensing_l1'])">
                              <td class="px-5 py-2 text-sm text-gray-500">
                                Condensing
                              </td>
                              <td class="px-5 py-2 text-sm font-bold text-gray-900">
                                 {{ heaters.condensing }}
                              </td>
                              <td class="px-5 py-2 whitespace-nowrap text-right text-sm font-medium">
                                <a
                                :href="getDownloadFile('condensing_l1')"
                                  v-if="checkPermission('condensing_l1', [])">
                                     <img  v-if="checkBlank('condensing_l1')"  :src="checkLockOrUnlock('condensing_l1')" alt="">
                                </a>
                              </td>
                            </tr>

                            <tr class="bg-gray-100" v-if="checkPermission('minimum_activation_flow_rate', ['minimum_activation_flow_rate_l1'])">
                              <td class="px-5 py-2 text-sm text-gray-500">
                                Minimum Activation Flow Rate
                              </td>
                              <td class="px-5 py-2 text-sm font-bold text-gray-900">
                                 {{ heaters.minimum_activation_flow_rate }}
                              </td>
                              <td class="px-5 py-2 whitespace-nowrap text-right text-sm font-medium">
                                <a
                                :href="getDownloadFile('minimum_activation_flow_rate_l1')"
                                v-if="checkPermission('minimum_activation_flow_rate_l1', [])" target="_blank">
                                     <img  v-if="checkBlank('minimum_activation_flow_rate_l1')"  :src="checkLockOrUnlock('minimum_activation_flow_rate_l1')" alt="">
                                </a>
                              </td>
                            </tr>

                            <tr v-if="checkPermission('water_quality', ['water_quality_l1', 'water_quality_l2'])">
                              <td class="px-5 py-2 text-sm text-gray-500">
                                Water Quality
                              </td>
                              <td class="px-5 py-2 text-sm font-bold text-gray-900">
                                {{ heaters.water_quality }}
                              </td>
                              <td class="px-5 py-2 whitespace-nowrap text-right text-sm font-medium">
                                <a :href="getDownloadFile('water_quality_l1')"
v-if="checkPermission('water_quality_l1', [])" target="_blank">
                                     <img  v-if="checkBlank('water_quality_l1')"  :src="checkLockOrUnlock('water_quality_l1')" alt="">
                                </a>
                                 <a class="pl-1"
                                 :href="getDownloadFile('water_quality_l2')"
v-if="checkPermission('water_quality_l2', [])" target="_blank">
                                     <img  v-if="checkBlank('water_quality_l2')"  :src="checkLockOrUnlock('water_quality_l2')" alt="">
                                </a>
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
                <div class="lg:pl-5 w-full">
                  <div class="-my-2 overflow-x-auto">
                    <div class="py-2 align-middle inline-block min-w-full">
                      <div class="overflow-hidden border border-gray-200 ">
                        <table class="min-w-full divide-y divide-gray-200">
                          <tbody class="bg-white divide-y divide-gray-200">
                            <tr v-if="checkPermission('freeze_protection', [])">
                              <td class="px-5 py-2 text-sm text-gray-500">
                                 Freeze Protection
                              </td>
                              <td class="px-5 py-2 text-sm font-bold text-gray-900">
                                {{ heaters.freeze_protection }}
                              </td>
                                <td class="px-5 py-2 whitespace-nowrap text-right text-sm font-medium">
                             </td>
                            </tr>
                            <tr class="bg-gray-100" v-if="checkPermission('freeze_protection_rating_indoor_temp', [])">
                              <td class="px-5 py-2 text-sm text-gray-500">
                                 Freeze Protection Rating - Indoor Temp
                              </td>
                              <td class="px-5 py-2 text-sm font-bold text-gray-900">
                                {{ heaters.freeze_protection_rating_indoor_temp }}
                              </td>
                              <td class="px-5 py-2 whitespace-nowrap text-right text-sm font-medium">

                              </td>
                            </tr>
                            <tr v-if="checkPermission('freeze_protection_rating_outdoor_temp', ['freeze_protection_rating_outdoor_temp_l1'])">
                              <td class="px-5 py-2 text-sm text-gray-500">
                                Freeze Protection Rating - Outdoor Temp
                              </td>
                              <td class="px-5 py-2 text-sm font-bold text-gray-900">
                                {{ heaters.freeze_protection_rating_outdoor_temp }}
                              </td>
                              <td class="px-5 py-2 whitespace-nowrap text-right text-sm font-medium">
                                <a :href="getDownloadFile('freeze_protection_rating_outdoor_temp_l1')"

v-if="checkPermission('freeze_protection_rating_outdoor_temp_l1', [])" target="_blank">
                                     <img  v-if="checkBlank('freeze_protection_rating_outdoor_temp_l1')"  :src="checkLockOrUnlock('freeze_protection_rating_outdoor_temp_l1')" alt="">
                                </a>
                              </td>
                            </tr>
                            <tr class="bg-gray-100" v-if="checkPermission('recirculation_compatible', ['recirculation_l1', 'recirculation_l2'])">
                              <td class="px-5 py-2 text-sm text-gray-500">
                                 Recirculation Compatible ?
                              </td>
                              <td class="px-5 py-2 text-sm font-bold text-gray-900">
                                {{ heaters.recirculation_compatible }}
                              </td>
                              <td class="px-5 py-2 whitespace-nowrap text-right text-sm font-medium">
                                <a
                                :href="getDownloadFile('recirculation_l1')"
v-if="checkPermission('recirculation_l1', [])" target="_blank">
                                     <img  v-if="checkBlank('recirculation_l1')"  :src="checkLockOrUnlock('recirculation_l1')" alt="">
                                </a>
                                <a class="pl-1"  :href="getDownloadFile('recirculation_l2')"

v-if="checkPermission('recirculation_l2', [])" target="_blank">
                                     <img  v-if="checkBlank('recirculation_l2')"  :src="checkLockOrUnlock('recirculation_l2')" alt="">
                                </a>
                              </td>
                            </tr>

                             <tr v-if="checkPermission('new_generation_model_number', [])">
                              <td class="px-5 py-2 text-sm text-gray-500">
                                New Generation Model Number
                              </td>
                              <td class="px-5 py-2 text-sm font-bold text-gray-900">
                                {{ heaters.new_generation_model_number }}
                              </td>
                              <td class="px-5 py-2 whitespace-nowrap text-right text-sm font-medium">

                              </td>
                            </tr>
                            <tr class="bg-gray-100" v-if="checkPermission('water_quality', [])">
                              <td class="px-5 py-2 text-sm text-gray-500">
                               Previous Name
                              </td>
                              <td class="px-5 py-2 text-sm font-bold text-gray-900">
                                {{ heaters.previous_name }}
                              </td>
                              <td class="px-5 py-2 whitespace-nowrap text-right text-sm font-medium">

                              </td>
                            </tr>
                             <tr v-if="checkPermission('available_temperature_settings_with_remote', [])">
                              <td class="px-5 py-2 text-sm text-gray-500">
                                 Available Temperature Settings (with remote)
                              </td>
                              <td class="px-5 py-2 text-sm font-bold text-gray-900">
                                                   {{ heaters.available_temperature_settings_with_remote }}
                              </td>
                              <td class="px-5 py-2 whitespace-nowrap text-right text-sm font-medium">

                              </td>
                            </tr>
                            <tr class="bg-gray-100" v-if="checkPermission('default_temperature_setting_without_remote', [])">
                              <td class="px-5 py-2 text-sm text-gray-500">
                               Default Temperature Setting (without remote)
                              </td>
                              <td class="px-5 py-2 text-sm font-bold text-gray-900">
                                {{ heaters.default_temperature_setting_without_remote }}
                              </td>
                              <td class="px-5 py-2 whitespace-nowrap text-right text-sm font-medium">

                              </td>
                            </tr>

                             <tr v-if="checkPermission('default_temperature_program_setting_options_without_remote', [])">
                              <td class="px-5 py-2 text-sm text-gray-500">
                               Default Temperature Program Setting Options (without remote)
                              </td>
                              <td class="px-5 py-2 text-sm font-bold text-gray-900">
                               {{  heaters.default_temperature_program_setting_options_without_remote  }}
                              </td>
                              <td class="px-5 py-2 whitespace-nowrap text-right text-sm font-medium">

                              </td>
                            </tr>
                            <tr class="bg-gray-100" v-if="checkPermission('production_date_range', [])">
                              <td class="px-5 py-2 text-sm text-gray-500">
                               Production Date Range
                              </td>
                              <td class="px-5 py-2 text-sm font-bold text-gray-900">
                                {{ heaters.production_date_range }}
                              </td>
                              <td class="px-5 py-2 whitespace-nowrap text-right text-sm font-medium">

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
            <h3 class="w-full text-white bg-blue-400 px-4 py-2 font-semibold text-xl rounded-tl-md rounded-tr-md mb-2"  v-if="is_show_type == 'sheet'">Technical Specs &amp; Installation</h3>
            <div class="lg:flex mb-8" v-if="(is_show_type == 'sheet') || (is_show_type == 'tab' && is_show_tab == 'technical')">
                <div class="lg:pr-5 w-full">
                  <div class="-my-2 overflow-x-auto">
                    <div class="py-2 align-middle inline-block min-w-full">
                      <div class="overflow-hidden border border-gray-200 ">
                        <table class="min-w-full divide-y divide-gray-200">
                          <tbody class="bg-white divide-y divide-gray-200">
                          <tr class="bg-gray-100" v-if="checkPermission('min_gas_input_btu', [])">
                              <td class="px-5 py-2 text-sm text-gray-500">
                                 Min Gas Input (Btu)
                              </td>
                              <td class="px-5 py-2 text-sm font-bold text-gray-900">
                                {{ heaters.min_gas_input_btu }}
                              </td>
                              <td class="px-5 py-2 whitespace-nowrap text-right text-sm font-medium">

                              </td>
                            </tr>

                             <tr v-if="checkPermission('max_gas_input_btu', [])">
                              <td class="px-5 py-2 text-sm text-gray-500">
                               Max Gas Input (Btu)
                              </td>
                              <td class="px-5 py-2 text-sm font-bold text-gray-900">
                                {{ heaters.max_gas_input_btu }}
                              </td>
                              <td class="px-5 py-2 whitespace-nowrap text-right text-sm font-medium">

                              </td>
                            </tr>

                            <tr  class="bg-gray-100" v-if="checkPermission('height_in', [])">
                              <td class="px-5 py-2 text-sm text-gray-500">
                               Height (in)
                              </td>
                              <td class="px-5 py-2 text-sm font-bold text-gray-900">
                                {{ heaters.height_in }}
                              </td>
                              <td class="px-5 py-2 whitespace-nowrap text-right text-sm font-medium">

                              </td>
                            </tr>

                             <tr v-if="checkPermission('width_in', [])">
                              <td class="px-5 py-2 text-sm text-gray-500">
                                Width (in)
                              </td>
                              <td class="px-5 py-2 text-sm font-bold text-gray-900">
                                {{ heaters.width_in }}
                              </td>
                              <td class="px-5 py-2 whitespace-nowrap text-right text-sm font-medium">

                              </td>
                            </tr>

                            <tr class="bg-gray-100" v-if="checkPermission('depth_in', ['depth_l1'])">
                              <td class="px-5 py-2 text-sm text-gray-500">
                                 Depth (in)
                              </td>
                              <td class="px-5 py-2 text-sm font-bold text-gray-900">
                                {{ heaters.depth_in }}
                              </td>
                              <td class="px-5 py-2 whitespace-nowrap text-right text-sm font-medium">
                                <a :href="getDownloadFile('depth_l1')"

 v-if="checkPermission('depth_l1', [])" target="_blank">
                                     <img  v-if="checkBlank('depth_l1')"  :src="checkLockOrUnlock('depth_l1')" alt="">
                                </a>

                              </td>
                            </tr>

                             <tr v-if="checkPermission('weight_lbs', [])">
                              <td class="px-5 py-2 text-sm text-gray-500">
                                 Weight (lbs)
                              </td>
                              <td class="px-5 py-2 text-sm font-bold text-gray-900">
                                {{ heaters.weight_lbs }}
                              </td>
                              <td class="px-5 py-2 whitespace-nowrap text-right text-sm font-medium">

                              </td>
                            </tr>

                            <tr class="bg-gray-100" v-if="checkPermission('thermal_efficiency', [])">
                              <td class="px-5 py-2 text-sm text-gray-500">
                                Thermal Efficiency
                              </td>
                              <td class="px-5 py-2 text-sm font-bold text-gray-900">
                                {{ heaters.thermal_efficiency }}
                              </td>
                              <td class="px-5 py-2 whitespace-nowrap text-right text-sm font-medium">

                              </td>
                            </tr>

                             <tr v-if="checkPermission('energy_factor', ['energy_factor_l1'])">
                              <td class="px-5 py-2 text-sm text-gray-500">
                                Energy Factor
                              </td>
                              <td class="px-5 py-2 text-sm font-bold text-gray-900">
                                {{ heaters.energy_factor }}
                              </td>
                              <td class="px-5 py-2 whitespace-nowrap text-right text-sm font-medium">
                               <a :href="getDownloadFile('energy_factor_l1')"
 v-if="checkPermission('energy_factor_l1', [])" target="_blank">
                                     <img  v-if="checkBlank('energy_factor_l1')"  :src="checkLockOrUnlock('energy_factor_l1')" alt="">
                                </a>
                              </td>
                            </tr>

                            <tr class="bg-gray-100" v-if="checkPermission('afue', [])">
                              <td class="px-5 py-2 text-sm text-gray-500">
                                 Afue
                              </td>
                              <td class="px-5 py-2 text-sm font-bold text-gray-900">
                                {{ heaters.afue }}
                              </td>
                              <td class="px-5 py-2 whitespace-nowrap text-right text-sm font-medium">

                              </td>
                            </tr>

                             <tr v-if="checkPermission('quickconnect_compatible', ['quickconnect_l1', 'quickconnect_l2' ])">
                              <td class="px-5 py-2 text-sm text-gray-500">
                                Quick-Connect Compatible?
                              </td>
                              <td class="px-5 py-2 text-sm font-bold text-gray-900">
                                {{ heaters.quickconnect_compatible }}
                              </td>
                              <td class="px-5 py-2 whitespace-nowrap text-right text-sm font-medium">
                                <a :href="getDownloadFile('quickconnect_l1')"

 v-if="checkPermission('quickconnect_l1', [])" target="_blank">
                                     <img  v-if="checkBlank('quickconnect_l1')"  :src="checkLockOrUnlock('quickconnect_l1')" alt="">
                                </a>
                                <a class="pl-1" :href="getDownloadFile('quickconnect_l2')"
 v-if="checkPermission('quickconnect_l2', [])" target="_blank">
                                     <img  v-if="checkBlank('quickconnect_l2')"  :src="checkLockOrUnlock('quickconnect_l2')" alt="">
                                </a>
                              </td>
                            </tr>

                            <tr class="bg-gray-100" v-if="checkPermission('cold_water_connection_size_in', [])">
                              <td class="px-5 py-2 text-sm text-gray-500">
                                  Cold Water Connection Size (in)
                              </td>
                              <td class="px-5 py-2 text-sm font-bold text-gray-900">
                                {{ heaters.cold_water_connection_size_in }}
                              </td>
                              <td class="px-5 py-2 whitespace-nowrap text-right text-sm font-medium">

                              </td>
                            </tr>

                             <tr v-if="checkPermission('hot_water_connection_size_in', [])">
                              <td class="px-5 py-2 text-sm text-gray-500">
                                 Hot Water Connection Size (in)
                              </td>
                              <td class="px-5 py-2 text-sm font-bold text-gray-900">
                                {{ heaters.hot_water_connection_size_in }}
                              </td>
                              <td class="px-5 py-2 whitespace-nowrap text-right text-sm font-medium">

                              </td>
                            </tr>

                            <tr class="bg-gray-100" v-if="checkPermission('gas_connection_size_in', [])">
                              <td class="px-5 py-2 text-sm text-gray-500">
                                 Gas Connection Size (in)                              </td>
                              <td class="px-5 py-2 text-sm font-bold text-gray-900">
                                {{ heaters.gas_connection_size_in }}
                              </td>
                              <td class="px-5 py-2 whitespace-nowrap text-right text-sm font-medium">

                              </td>
                            </tr>

                             <tr v-if="checkPermission('power_supply', [])">
                              <td class="px-5 py-2 text-sm text-gray-500">
                               Power Supply
                              </td>
                              <td class="px-5 py-2 text-sm font-bold text-gray-900">
                                {{ heaters.power_supply }}
                              </td>
                              <td class="px-5 py-2 whitespace-nowrap text-right text-sm font-medium">

                              </td>
                            </tr>

                            <tr class="bg-gray-100" v-if="checkPermission('current_draw_a', ['current_draw_l1'])">
                              <td class="px-5 py-2 text-sm text-gray-500">
                                Current Draw (A)
                              </td>
                              <td class="px-5 py-2 text-sm font-bold text-gray-900">
                                {{ heaters.current_draw_a }}
                              </td>
                              <td class="px-5 py-2 whitespace-nowrap text-right text-sm font-medium">
                                <a :href="getDownloadFile('current_draw_l1')"
 v-if="checkPermission('current_draw_l1', [])" target="_blank">
                                     <img  v-if="checkBlank('current_draw_l1')"  :src="checkLockOrUnlock('current_draw_l1')" alt="">
                                </a>

                              </td>
                            </tr>

                             <tr v-if="checkPermission('exhaust_vent_diameter_requirements', [])">
                              <td class="px-5 py-2 text-sm text-gray-500">
                                Exhaust Vent Diameter Requirements
                              </td>
                              <td class="px-5 py-2 text-sm font-bold text-gray-900">
                                {{ heaters.exhaust_vent_diameter_requirements }}
                              </td>
                              <td class="px-5 py-2 whitespace-nowrap text-right text-sm font-medium">

                              </td>
                            </tr>

                            <tr class="bg-gray-100" v-if="checkPermission('exhaust_vent_material_requirements', [])">
                              <td class="px-5 py-2 text-sm text-gray-500">
                                 Exhaust Vent Material Requirements
                              </td>
                              <td class="px-5 py-2 text-sm font-bold text-gray-900">
                                {{ heaters.exhaust_vent_material_requirements }}
                              </td>
                              <td class="px-5 py-2 whitespace-nowrap text-right text-sm font-medium">

                              </td>
                            </tr>

                             <tr v-if="checkPermission('max_vent_length_with1_elbow', ['max_vent_length_l1'])">
                              <td class="px-5 py-2 text-sm text-gray-500">
                                 Max Vent Length with 1 elbow
                              </td>
                              <td class="px-5 py-2 text-sm font-bold text-gray-900">
                                {{ heaters.max_vent_length_with1_elbow }}
                              </td>
                              <td class="px-5 py-2 whitespace-nowrap text-right text-sm font-medium">
                                <a
                                :href="getDownloadFile('max_vent_length_l1')"
 v-if="checkPermission('max_vent_length_l1', [])" target="_blank">
                                     <img  v-if="checkBlank('max_vent_length_l1')"  :src="checkLockOrUnlock('max_vent_length_l1')" alt="">
                                </a>
                              </td>
                            </tr>

                            <tr class="bg-gray-100" v-if="checkPermission('vent_termination_clearances_to_any_building_opening_ft', ['vent_termination_l1'])">
                              <td class="px-5 py-2 text-sm text-gray-500">
                                Vent Termination Clearances to Any Building Opening (ft)
                              </td>
                              <td class="px-5 py-2 text-sm font-bold text-gray-900">
                                {{ heaters.vent_termination_clearances_to_any_building_opening_ft }}
                              </td>
                              <td class="px-5 py-2 whitespace-nowrap text-right text-sm font-medium">
                                <a
                                :href="getDownloadFile('vent_termination_l1')"
v-if="checkPermission('vent_termination_l1', [])" target="_blank">
                                     <img  v-if="checkBlank('vent_termination_l1')"  :src="checkLockOrUnlock('vent_termination_l1')" alt="">
                                </a>
                               </td>
                            </tr>

                             <tr v-if="checkPermission('gas_supply_pressure_range', ['gas_supply_pressure_range_l1'])">
                              <td class="px-5 py-2 text-sm text-gray-500">
                                Gas Supply Pressure Range
                              </td>
                              <td class="px-5 py-2 text-sm font-bold text-gray-900">
                                {{ heaters.gas_supply_pressure_range }}
                              </td>
                              <td class="px-5 py-2 whitespace-nowrap text-right text-sm font-medium">
                                <a
                                :href="getDownloadFile('gas_supply_pressure_range_l1')"
 v-if="checkPermission('gas_supply_pressure_range_l1', [])">
                                     <img  v-if="checkBlank('gas_supply_pressure_range_l1')"  :src="checkLockOrUnlock('gas_supply_pressure_range_l1')" alt="">
                                </a>
                              </td>
                            </tr>

                            <tr class="bg-gray-100" v-if="checkPermission('min_gas_line_size', ['min_gas_line_size_l1'])">
                              <td class="px-5 py-2 text-sm text-gray-500">
                                Min Gas Line Size
                              </td>
                              <td class="px-5 py-2 text-sm font-bold text-gray-900">
                                {{ heaters.min_gas_line_size }}
                              </td>
                              <td class="px-5 py-2 whitespace-nowrap text-right text-sm font-medium">

                                <a
                                :href="getDownloadFile('min_gas_line_size_l1')"
v-if="checkPermission('min_gas_line_size_l1', [])" target="_blank">
                                     <img  v-if="checkBlank('min_gas_line_size_l1')"  :src="checkLockOrUnlock('min_gas_line_size_l1')" alt="">
                                </a>
                              </td>
                            </tr>

                             <tr v-if="checkPermission('water_pressure_rating_psi', [])">
                              <td class="px-5 py-2 text-sm text-gray-500">
                                  Water Pressure Rating (psi)
                              </td>
                              <td class="px-5 py-2 text-sm font-bold text-gray-900">
                                {{ heaters.water_pressure_rating_psi }}
                              </td>
                              <td class="px-5 py-2 whitespace-nowrap text-right text-sm font-medium">

                              </td>
                            </tr>

                            <tr class="bg-gray-100" v-if="checkPermission('case_clearances_in', ['case_clearances_l1'])">
                              <td class="px-5 py-2 text-sm text-gray-500">
                                 Case Clearances (in)
                              </td>
                              <td class="px-5 py-2 text-sm font-bold text-gray-900">
                                {{ heaters.case_clearances_in }}
                              </td>
                              <td class="px-5 py-2 whitespace-nowrap text-right text-sm font-medium">
                                <a
                                :href="getDownloadFile('case_clearances_l1')"
v-if="checkPermission('case_clearances_l1', [])" target="_blank">
                                     <img  v-if="checkBlank('case_clearances_l1')"  :src="checkLockOrUnlock('case_clearances_l1')" alt="">
                                </a>

                              </td>
                            </tr>

                             <tr v-if="checkPermission('combustion_air_requirements_using_indoor_air', [])">
                              <td class="px-5 py-2 text-sm text-gray-500">
                               Combustion Air Requirements - using Indoor Air
                              </td>
                              <td class="px-5 py-2 text-sm font-bold text-gray-900">
                                {{ heaters.combustion_air_requirements_using_indoor_air }}
                              </td>
                              <td class="px-5 py-2 whitespace-nowrap text-right text-sm font-medium">

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
                <div class="lg:pl-5 w-full">
                  <div class="-my-2 overflow-x-auto">
                    <div class="py-2 align-middle inline-block min-w-full">
                      <div class="overflow-hidden border border-gray-200 ">
                        <table class="min-w-full divide-y divide-gray-200">
                          <tbody class="bg-white divide-y divide-gray-200">
                            <tr class="bg-gray-100" v-if="checkPermission('combustion_air_requirements_using_outdoor_air', ['combustion_air_outdoor_l1'])">
                              <td class="px-5 py-2 text-sm text-gray-500">
                                 Combustion Air Requirements - using Outdoor Air
                              </td>
                              <td class="px-5 py-2 text-sm font-bold text-gray-900">
                                {{ heaters.combustion_air_requirements_using_outdoor_air }}
                              </td>
                              <td class="px-5 py-2 whitespace-nowrap text-right text-sm font-medium">
                                <a
                                :href="getDownloadFile('combustion_air_outdoor_l1')"
 v-if="checkPermission('combustion_air_outdoor_l1', [])" target="_blank">
                                     <img  v-if="checkBlank('combustion_air_outdoor_l1')"  :src="checkLockOrUnlock('combustion_air_outdoor_l1')" alt="">
                                </a>

                              </td>
                            </tr>

                             <tr v-if="checkPermission('head_loss_at2_gpm', ['head_loss_l1'])">
                              <td class="px-5 py-2 text-sm text-gray-500">
                                 Head Loss at 2 gpm
                              </td>
                              <td class="px-5 py-2 text-sm font-bold text-gray-900">
                                {{ heaters.head_loss_at2_gpm }}
                              </td>
                              <td class="px-5 py-2 whitespace-nowrap text-right text-sm font-medium">
                                <a :href="getDownloadFile('head_loss_l1')"
 v-if="checkPermission('head_loss_l1', [])" target="_blank">
                                     <img  v-if="checkBlank('head_loss_l1')"  :src="checkLockOrUnlock('head_loss_l1')" alt="">
                                </a>
                              </td>
                            </tr>

                            <tr class="bg-gray-100" v-if="checkPermission('cold_connection_height', [])">
                              <td class="px-5 py-2 text-sm text-gray-500">
                                 Cold Connection Height
                              </td>
                              <td class="px-5 py-2 text-sm font-bold text-gray-900">
                                {{ heaters.cold_connection_height }}
                              </td>
                              <td class="px-5 py-2 whitespace-nowrap text-right text-sm font-medium">
                              </td>
                            </tr>

                             <tr v-if="checkPermission('power_consumption_wout_freeze_prevention', [])">
                              <td class="px-5 py-2 text-sm text-gray-500">
                               Power Consumption w/out Freeze Prevention
                              </td>
                              <td class="px-5 py-2 text-sm font-bold text-gray-900">
                                {{ heaters.power_consumption_wout_freeze_prevention }}
                              </td>
                              <td class="px-5 py-2 whitespace-nowrap text-right text-sm font-medium">

                              </td>
                            </tr>

                            <tr class="bg-gray-100" v-if="checkPermission('power_consumption_wfreeze_prevention', [])">
                              <td class="px-5 py-2 text-sm text-gray-500">
                                Power Consumption w/Freeze Prevention
                              </td>
                              <td class="px-5 py-2 text-sm font-bold text-gray-900">
                                {{ heaters.power_consumption_wfreeze_prevention }}
                              </td>
                              <td class="px-5 py-2 whitespace-nowrap text-right text-sm font-medium">
                                 </td>
                            </tr>

                             <tr v-if="checkPermission('flow_meter_alarm', [])">
                              <td class="px-5 py-2 text-sm text-gray-500">
                                Flow Meter Alarm
                              </td>
                              <td class="px-5 py-2 text-sm font-bold text-gray-900">
                                {{ heaters.flow_meter_alarm }}
                              </td>
                              <td class="px-5 py-2 whitespace-nowrap text-right text-sm font-medium">

                              </td>
                            </tr>

                            <tr class="bg-gray-100" v-if="checkPermission('service_reminder', [])">
                              <td class="px-5 py-2 text-sm text-gray-500">
                               Service Reminder
                              </td>
                              <td class="px-5 py-2 text-sm font-bold text-gray-900">
                                {{ heaters.service_reminder }}
                              </td>
                              <td class="px-5 py-2 whitespace-nowrap text-right text-sm font-medium">
                               </td>
                            </tr>

                             <tr v-if="checkPermission('condensate_handling_method', [])">
                              <td class="px-5 py-2 text-sm text-gray-500">
                                 Condensate Handling Method?
                              </td>
                              <td class="px-5 py-2 text-sm font-bold text-gray-900">
                                {{ heaters.condensate_handling_method }}
                              </td>
                              <td class="px-5 py-2 whitespace-nowrap text-right text-sm font-medium">

                              </td>
                            </tr>

                            <tr class="bg-gray-100" v-if="checkPermission('noise_rating_db', [])">
                              <td class="px-5 py-2 text-sm text-gray-500">
                                Noise Rating (dB)
                              </td>
                              <td class="px-5 py-2 text-sm font-bold text-gray-900">
                                {{ heaters.noise_rating_db }}
                              </td>
                              <td class="px-5 py-2 whitespace-nowrap text-right text-sm font-medium">
                                </td>
                            </tr>

                             <tr v-if="checkPermission('tested_to_ul_computer_controlled_safety_standards', [])">
                              <td class="px-5 py-2 text-sm text-gray-500">
                               Tested to UL Computer Controlled Safety Standards
                              </td>
                              <td class="px-5 py-2 text-sm font-bold text-gray-900">
                                {{ heaters.tested_to_ul_computer_controlled_safety_standards }}
                              </td>
                              <td class="px-5 py-2 whitespace-nowrap text-right text-sm font-medium">

                              </td>
                            </tr>

                            <tr class="bg-gray-100" v-if="checkPermission('flame_sensor', [])">
                              <td class="px-5 py-2 text-sm text-gray-500">
                                Flame Sensor
                              </td>
                              <td class="px-5 py-2 text-sm font-bold text-gray-900">
                                {{ heaters.flame_sensor }}
                              </td>
                              <td class="px-5 py-2 whitespace-nowrap text-right text-sm font-medium">
                               </td>
                            </tr>

                             <tr v-if="checkPermission('high_limit_switch', [])">
                              <td class="px-5 py-2 text-sm text-gray-500">
                                High Limit Switch
                              </td>
                              <td class="px-5 py-2 text-sm font-bold text-gray-900">
                                {{ heaters.high_limit_switch }}
                              </td>
                              <td class="px-5 py-2 whitespace-nowrap text-right text-sm font-medium">

                              </td>
                            </tr>

                            <tr class="bg-gray-100" v-if="checkPermission('lightning_protection', [])">
                              <td class="px-5 py-2 text-sm text-gray-500">
                                Lightning Protection
                              </td>
                              <td class="px-5 py-2 text-sm font-bold text-gray-900">
                                {{ heaters.lightning_protection }}
                              </td>
                              <td class="px-5 py-2 whitespace-nowrap text-right text-sm font-medium">
                              </td>
                            </tr>

                             <tr v-if="checkPermission('overheat_cutoff_fuse', [])">
                              <td class="px-5 py-2 text-sm text-gray-500">
                                 Overheat Cutoff Fuse)
                              </td>
                              <td class="px-5 py-2 text-sm font-bold text-gray-900">
                                {{ heaters.overheat_cutoff_fuse }}
                              </td>
                              <td class="px-5 py-2 whitespace-nowrap text-right text-sm font-medium">

                              </td>
                            </tr>

                            <tr class="bg-gray-100" v-if="checkPermission('temperature_lockout', [])">
                              <td class="px-5 py-2 text-sm text-gray-500">
                                Temperature Lockout
                              </td>
                              <td class="px-5 py-2 text-sm font-bold text-gray-900">
                                {{ heaters.temperature_lockout }}
                              </td>
                              <td class="px-5 py-2 whitespace-nowrap text-right text-sm font-medium">
                                </td>
                            </tr>

                             <tr v-if="checkPermission('ignition_type', [])">
                              <td class="px-5 py-2 text-sm text-gray-500">
                                Ignition Type
                              </td>
                              <td class="px-5 py-2 text-sm font-bold text-gray-900">
                                {{ heaters.ignition_type }}
                              </td>
                              <td class="px-5 py-2 whitespace-nowrap text-right text-sm font-medium">

                              </td>
                            </tr>

                            <tr class="bg-gray-100" v-if="checkPermission('case_material', [])">
                              <td class="px-5 py-2 text-sm text-gray-500">
                                Case Material
                              </td>
                              <td class="px-5 py-2 text-sm font-bold text-gray-900">
                                {{ heaters.case_material }}
                              </td>
                              <td class="px-5 py-2 whitespace-nowrap text-right text-sm font-medium">
                              </td>
                            </tr>

                             <tr v-if="checkPermission('colorfinish', [])">
                              <td class="px-5 py-2 text-sm text-gray-500">
                                Color/Finish
                              </td>
                              <td class="px-5 py-2 text-sm font-bold text-gray-900">
                                {{ heaters.colorfinish }}
                              </td>
                              <td class="px-5 py-2 whitespace-nowrap text-right text-sm font-medium">

                              </td>
                            </tr>

                            <tr class="bg-gray-100" v-if="checkPermission('flue_collar_material', [])">
                              <td class="px-5 py-2 text-sm text-gray-500">
                                 Flue Collar Material
                              </td>
                              <td class="px-5 py-2 text-sm font-bold text-gray-900">
                                {{ heaters.flue_collar_material }}
                              </td>
                              <td class="px-5 py-2 whitespace-nowrap text-right text-sm font-medium">
                                </td>
                            </tr>

                             <tr v-if="checkPermission('primary_heat_exchanger_material', [])">
                              <td class="px-5 py-2 text-sm text-gray-500">
                                Primary Heat Exchanger Material
                              </td>
                              <td class="px-5 py-2 text-sm font-bold text-gray-900">
                                {{ heaters.primary_heat_exchanger_material }}
                              </td>
                              <td class="px-5 py-2 whitespace-nowrap text-right text-sm font-medium">

                              </td>
                            </tr>

                            <tr class="bg-gray-100" v-if="checkPermission('secondary_heat_exchanger_material', [])">
                              <td class="px-5 py-2 text-sm text-gray-500">
                                 Secondary Heat Exchanger Material
                              </td>
                              <td class="px-5 py-2 text-sm font-bold text-gray-900">
                                {{ heaters.secondary_heat_exchanger_material }}
                              </td>
                              <td class="px-5 py-2 whitespace-nowrap text-right text-sm font-medium">
                                </td>
                            </tr>

                             <tr v-if="checkPermission('mounting_type', [])">
                              <td class="px-5 py-2 text-sm text-gray-500">
                                 Mounting Type
                              </td>
                              <td class="px-5 py-2 text-sm font-bold text-gray-900">
                                {{ heaters.mounting_type }}
                              </td>
                              <td class="px-5 py-2 whitespace-nowrap text-right text-sm font-medium">

                              </td>
                            </tr>

                            <tr class="bg-gray-100" v-if="checkPermission('package_contents', [])">
                              <td class="px-5 py-2 text-sm text-gray-500">
                                Package Contents
                              </td>
                              <td class="px-5 py-2 text-sm font-bold text-gray-900">
                                {{ heaters.package_contents }}
                              </td>
                              <td class="px-5 py-2 whitespace-nowrap text-right text-sm font-medium">
                                </td>
                            </tr>

                             <tr v-if="checkPermission('water_holding_capacity', [])">
                              <td class="px-5 py-2 text-sm text-gray-500">
                                 Water Holding Capacity
                              </td>
                              <td class="px-5 py-2 text-sm font-bold text-gray-900">
                                {{ heaters.water_holding_capacity }}
                              </td>
                              <td class="px-5 py-2 whitespace-nowrap text-right text-sm font-medium">

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
            <h3 class="w-full text-white bg-blue-400 px-4 py-2 font-semibold text-xl rounded-tl-md rounded-tr-md mb-2" v-if="is_show_type == 'sheet'">Accessories</h3>
            <div class="lg:flex mb-8" v-if="(is_show_type == 'sheet') || (is_show_type == 'tab' && is_show_tab == 'accessories')">
                <div class="lg:pr-5 w-full">
                  <div class="-my-2 overflow-x-auto">
                    <div class="py-2 align-middle inline-block min-w-full">
                      <div class="overflow-hidden border border-gray-200 ">
                        <table class="min-w-full divide-y divide-gray-200">
                          <tbody class="bg-white divide-y divide-gray-200">
                          <tr class="bg-gray-100" v-if="checkPermission('keypadthermostat_display', ['keypadthermostat_display_l1'])">
                              <td class="px-5 py-2 text-sm text-gray-500">
                                Keypad/Thermostat Display
                              </td>
                              <td class="px-5 py-2 text-sm font-bold text-gray-900">
                                {{ heaters.keypadthermostat_display }}
                              </td>
                              <td class="px-5 py-2 whitespace-nowrap text-right text-sm font-medium">
                                 <a
                                 :href="getDownloadFile('keypadthermostat_display_l1')"
 v-if="checkPermission('keypadthermostat_display_l1', [])" target="_blank">
                                     <img  v-if="checkBlank('keypadthermostat_display_l1')"  :src="checkLockOrUnlock('keypadthermostat_display_l1')" alt="">
                                </a>
                              </td>
                            </tr>

                             <tr v-if="checkPermission('compatible_remote_controller_part_num_id', ['compatible_remote_controller_part_num_l1'])">
                              <td class="px-5 py-2 text-sm text-gray-500">
                               Compatible Remote Controller Part #
                              </td>
                              <td class="px-5 py-2 text-sm font-bold text-gray-900">
                                {{ heaters.compatible_remote_controller_part_num_id }}
                              </td>
                              <td class="px-5 py-2 whitespace-nowrap text-right text-sm font-medium">
                                <a  :href="getDownloadFile('compatible_remote_controller_part_num_l1')"
  v-if="checkPermission('compatible_remote_controller_part_num_l1', [])" target="_blank">
                                     <img  v-if="checkBlank('compatible_remote_controller_part_num_l1')"  :src="checkLockOrUnlock('compatible_remote_controller_part_num_l1')" alt="">
                                </a>
                              </td>
                            </tr>

                            <tr  class="bg-gray-100" v-if="checkPermission('isolator_valve_part_num_id', ['isolator_valve_part_num_l1'])">
                              <td class="px-5 py-2 text-sm text-gray-500">
                               Isolator Valve Part #
                              </td>
                              <td class="px-5 py-2 text-sm font-bold text-gray-900">
                                {{ heaters.isolator_valve_part_num_id }}
                              </td>
                              <td class="px-5 py-2 whitespace-nowrap text-right text-sm font-medium">
                                <a  :href="getDownloadFile('isolator_valve_part_num_l1')"
v-if="checkPermission('isolator_valve_part_num_l1', [])" target="_blank">
                                     <img  v-if="checkBlank('isolator_valve_part_num_l1')"  :src="checkLockOrUnlock('isolator_valve_part_num_l1')" alt="">
                                </a>
                              </td>
                            </tr>

                             <tr v-if="checkPermission('freeze_protection', [])">
                              <td class="px-5 py-2 text-sm text-gray-500">
                               Freeze Protection
                              </td>
                              <td class="px-5 py-2 text-sm font-bold text-gray-900">
                                {{ heaters.freeze_protection }}
                              </td>
                              <td class="px-5 py-2 whitespace-nowrap text-right text-sm font-medium">

                              </td>
                            </tr>

                            <tr class="bg-gray-100" v-if="checkPermission('freeze_protection_kit_accessory', ['freeze_protection_kit_accessory_l1'])">
                              <td class="px-5 py-2 text-sm text-gray-500">
                                 Freeze Protection Kit Accessory
                              </td>
                              <td class="px-5 py-2 text-sm font-bold text-gray-900">
                                {{ heaters.freeze_protection_kit_accessory }}
                              </td>
                              <td class="px-5 py-2 whitespace-nowrap text-right text-sm font-medium">
                                <a
                                :href="getDownloadFile('freeze_protection_kit_accessory_l1')"
  v-if="checkPermission('freeze_protection_kit_accessory_l1', [])" target="_blank">
                                     <img  v-if="checkBlank('freeze_protection_kit_accessory_l1')"  :src="checkLockOrUnlock('freeze_protection_kit_accessory_l1')" alt="">
                                </a>

                              </td>
                            </tr>

                             <tr v-if="checkPermission('outdoor_vent_cap_part_num_id', ['outdoor_vent_cap_part_num_l1'])">
                              <td class="px-5 py-2 text-sm text-gray-500">
                                 Outdoor Vent Cap Part #
                              </td>
                              <td class="px-5 py-2 text-sm font-bold text-gray-900">
                                {{ heaters.outdoor_vent_cap_part_num_id }}
                              </td>
                              <td class="px-5 py-2 whitespace-nowrap text-right text-sm font-medium">
                                <a
                                :href="getDownloadFile('outdoor_vent_cap_part_num_l1')"
v-if="checkPermission('outdoor_vent_cap_part_num_l1', [])" target="_blank" >
                                     <img  v-if="checkBlank('outdoor_vent_cap_part_num_l1')"   :src="checkLockOrUnlock('outdoor_vent_cap_part_num_l1')" alt="">
                                </a>
                              </td>
                            </tr>

                            <tr v-if="checkPermission('pipe_cover_part_num_id', ['pipe_cover_part_num_l1'])">
                              <td class="px-5 py-2 text-sm text-gray-500">
                                 Pipe Cover Part #
                              </td>
                              <td class="px-5 py-2 text-sm font-bold text-gray-900">
                                {{ heaters.pipe_cover_part_num_id }}
                              </td>
                              <td class="px-5 py-2 whitespace-nowrap text-right text-sm font-medium">
                                <a
                                :href="getDownloadFile('pipe_cover_part_num_l1')"
v-if="checkPermission('pipe_cover_part_num_l1', [])" target="_blank">
                                     <img  v-if="checkBlank('pipe_cover_part_num_l1')"  :src="checkLockOrUnlock('pipe_cover_part_num_l1')" alt="">
                                </a>
                              </td>
                            </tr>

                            <tr class="bg-gray-100" v-if="checkPermission('recess_box_part_num_id', ['recess_box_part_num_l1'])">
                              <td class="px-5 py-2 text-sm text-gray-500">
                                Recess Box Part #
                              </td>
                              <td class="px-5 py-2 text-sm font-bold text-gray-900">
                                {{ heaters.recess_box_part_num_id }}
                              </td>
                              <td class="px-5 py-2 whitespace-nowrap text-right text-sm font-medium">
                                 <a
                                 :href="getDownloadFile('recess_box_part_num_l1')"
v-if="checkPermission('recess_box_part_num_l1', [])" target="_blank">
                                     <img  v-if="checkBlank('recess_box_part_num_l1')"  :src="checkLockOrUnlock('recess_box_part_num_l1')" alt="">
                                </a>
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

                 <div class="lg:pl-5 w-full">
                  <div class="-my-2 overflow-x-auto">
                    <div class="py-2 align-middle inline-block min-w-full">
                      <div class="overflow-hidden border border-gray-200 ">
                        <table class="min-w-full divide-y divide-gray-200">
                          <tbody class="bg-white divide-y divide-gray-200">
                            <tr class="bg-gray-100" v-if="checkPermission('high_elevation_adjustment', ['high_elevation_adjustment_l1'])">
                              <td class="px-5 py-2 text-sm text-gray-500">
                                High Elevation Adjustment
                              </td>
                              <td class="px-5 py-2 text-sm font-bold text-gray-900">
                                {{ heaters.high_elevation_adjustment }}
                              </td>
                              <td class="px-5 py-2 whitespace-nowrap text-right text-sm font-medium">
                                <a
                                :href="getDownloadFile('high_elevation_adjustment_l1')"
 v-if="checkPermission('high_elevation_adjustment_l1', [])" target="_blank">
                                     <img  v-if="checkBlank('high_elevation_adjustment_l1')"  :src="checkLockOrUnlock('high_elevation_adjustment_l1')" alt="">
                                </a>

                              </td>
                            </tr>

                             <tr v-if="checkPermission('quickconnect_cord_part_num_id', [])">
                              <td class="px-5 py-2 text-sm text-gray-500">
                                 Quick-Connect Cord Part #
                              </td>
                              <td class="px-5 py-2 text-sm font-bold text-gray-900">
                                {{ heaters.quickconnect_cord_part_num_id }}
                              </td>
                              <td class="px-5 py-2 whitespace-nowrap text-right text-sm font-medium">
                                </td>
                            </tr>

                            <tr class="bg-gray-100" v-if="checkPermission('system_controller_compatible', ['system_controller_compatible_l1'])">
                              <td class="px-5 py-2 text-sm text-gray-500">
                                 System Controller Compatible?
                              </td>
                              <td class="px-5 py-2 text-sm font-bold text-gray-900">
                                {{ heaters.system_controller_compatible }}
                              </td>
                              <td class="px-5 py-2 whitespace-nowrap text-right text-sm font-medium">
                              <a
                              :href="getDownloadFile('system_controller_compatible_l1')"
v-if="checkPermission('system_controller_compatible_l1', [])" target="_blank">
                                     <img  v-if="checkBlank('system_controller_compatible_l1')"  :src="checkLockOrUnlock('system_controller_compatible_l1')" alt="">
                                </a>
                              </td>
                            </tr>

                             <tr v-if="checkPermission('system_controller_part_num_id', ['system_controller_part_num_l1'])">
                              <td class="px-5 py-2 text-sm text-gray-500">
                             System Controller Part #
                              </td>
                              <td class="px-5 py-2 text-sm font-bold text-gray-900">
                                {{ heaters.system_controller_part_num_id }}
                              </td>
                              <td class="px-5 py-2 whitespace-nowrap text-right text-sm font-medium">
                                <a
                                :href="getDownloadFile('system_controller_part_num_l1')"
v-if="checkPermission('system_controller_part_num_l1', [])" target="_blank">
                                     <img  v-if="checkBlank('system_controller_part_num_l1')"  :src="checkLockOrUnlock('system_controller_part_num_l1')" alt="">
                                </a>
                              </td>
                            </tr>

                            <tr class="bg-gray-100" v-if="checkPermission('remote_controller_cord', [])">
                              <td class="px-5 py-2 text-sm text-gray-500">
                                Remote Controller Cord
                              </td>
                              <td class="px-5 py-2 text-sm font-bold text-gray-900">
                                {{ heaters.remote_controller_cord }}
                              </td>
                              <td class="px-5 py-2 whitespace-nowrap text-right text-sm font-medium">
                                 </td>
                            </tr>

                             <tr v-if="checkPermission('compatible_remote_controller_cord_part_num_id', [])">
                              <td class="px-5 py-2 text-sm text-gray-500">
                                Compatible Remote Controller Cord Part #
                              </td>
                              <td class="px-5 py-2 text-sm font-bold text-gray-900">
                                {{ heaters.compatible_remote_controller_cord_part_num_id }}
                              </td>
                              <td class="px-5 py-2 whitespace-nowrap text-right text-sm font-medium">

                              </td>
                            </tr>

                            <tr class="bg-gray-100" v-if="checkPermission('power_cord', [])">
                              <td class="px-5 py-2 text-sm text-gray-500">
                               Power Cord
                              </td>
                              <td class="px-5 py-2 text-sm font-bold text-gray-900">
                                {{ heaters.power_cord }}
                              </td>
                              <td class="px-5 py-2 whitespace-nowrap text-right text-sm font-medium">
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
            <h3 class="w-full text-white bg-blue-400 px-4 py-2 font-semibold text-xl rounded-tl-md rounded-tr-md mb-2" v-if="is_show_type == 'sheet'">Approvals</h3>
            <div class="lg:flex mb-8" v-if="(is_show_type == 'sheet') || (is_show_type == 'tab' && is_show_tab == 'approvals')">
                <div class="lg:pr-5 w-full">
                  <div class="-my-2 overflow-x-auto">
                    <div class="py-2 align-middle inline-block min-w-full">
                      <div class="overflow-hidden border border-gray-200 ">
                        <table class="min-w-full divide-y divide-gray-200">
                          <tbody class="bg-white divide-y divide-gray-200">
                          <tr class="bg-gray-100" v-if="checkPermission('energy_star_qualified', [])">
                              <td class="px-5 py-2 text-sm text-gray-500">
                                ENERGY STAR® Qualified
                              </td>
                              <td class="px-5 py-2 text-sm font-bold text-gray-900">
                                {{ heaters.energy_star_qualified }}
                              </td>
                              <td class="px-5 py-2 whitespace-nowrap text-right text-sm font-medium">

                              </td>
                            </tr>

                             <tr v-if="checkPermission('csa', [])">
                              <td class="px-5 py-2 text-sm text-gray-500">
                               CSA
                              </td>
                              <td class="px-5 py-2 text-sm font-bold text-gray-900">
                                {{ heaters.csa }}
                              </td>
                              <td class="px-5 py-2 whitespace-nowrap text-right text-sm font-medium">
                                </td>
                            </tr>

                            <tr  class="bg-gray-100" v-if="checkPermission('mobile_home', [])">
                              <td class="px-5 py-2 text-sm text-gray-500">
                              Mobile Home
                              </td>
                              <td class="px-5 py-2 text-sm font-bold text-gray-900">
                                {{ heaters.mobile_home }}
                              </td>
                              <td class="px-5 py-2 whitespace-nowrap text-right text-sm font-medium">
                               </td>
                            </tr>

                             <tr v-if="checkPermission('nsf', [])">
                              <td class="px-5 py-2 text-sm text-gray-500">
                              NSF
                              </td>
                              <td class="px-5 py-2 text-sm font-bold text-gray-900">
                                {{ heaters.nsf }}
                              </td>
                              <td class="px-5 py-2 whitespace-nowrap text-right text-sm font-medium">

                              </td>
                            </tr>

                            <tr class="bg-gray-100" v-if="checkPermission('scaqmd20_ppm', [])">
                              <td class="px-5 py-2 text-sm text-gray-500">
                                 SCAQMD (20 ppm)
                              </td>
                              <td class="px-5 py-2 text-sm font-bold text-gray-900">
                                {{ heaters.scaqmd20_ppm }}
                              </td>
                              <td class="px-5 py-2 whitespace-nowrap text-right text-sm font-medium">
                                </td>
                            </tr>

                             <tr v-if="checkPermission('scaqmd55_ppm', [])">
                              <td class="px-5 py-2 text-sm text-gray-500">
                                  SCAQMD (55 ppm)
                              </td>
                              <td class="px-5 py-2 text-sm font-bold text-gray-900">
                                {{ heaters.scaqmd55_ppm }}
                              </td>
                              <td class="px-5 py-2 whitespace-nowrap text-right text-sm font-medium">
                                </td>
                            </tr>

                            <tr class="bg-gray-100" v-if="checkPermission('upc', [])">
                              <td class="px-5 py-2 text-sm text-gray-500">
                                UPC
                              </td>
                              <td class="px-5 py-2 text-sm font-bold text-gray-900">
                                {{ heaters.upc }}
                              </td>
                              <td class="px-5 py-2 whitespace-nowrap text-right text-sm font-medium">

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

                 <div class="lg:pl-5 w-full">
                  <div class="-my-2 overflow-x-auto">
                    <div class="py-2 align-middle inline-block min-w-full">
                      <div class="overflow-hidden border border-gray-200 ">
                        <table class="min-w-full divide-y divide-gray-200">
                          <tbody class="bg-white divide-y divide-gray-200">
                            <tr class="bg-gray-100" v-if="checkPermission('energy_guide_est_yearly_energy_use', ['energy_guide_est_yearly_energy_use_l1'])">
                              <td class="px-5 py-2 text-sm text-gray-500">
                               Energy Guide - Est. Yearly Energy Use
                              </td>
                              <td class="px-5 py-2 text-sm font-bold text-gray-900">
                                {{ heaters.energy_guide_est_yearly_energy_use }}
                              </td>
                              <td class="px-5 py-2 whitespace-nowrap text-right text-sm font-medium">
                                <a
                                :href="getDownloadFile('energy_guide_est_yearly_energy_use_l1')"
 v-if="checkPermission('energy_guide_est_yearly_energy_use_l1', [])" target="_blank">
                                     <img  v-if="checkBlank('energy_guide_est_yearly_energy_use_l1')"  :src="checkLockOrUnlock('energy_guide_est_yearly_energy_use_l1')" alt="">
                                </a>

                              </td>
                            </tr>

                             <tr v-if="checkPermission('energy_guide_est_yearly_operating_cost', [])">
                              <td class="px-5 py-2 text-sm text-gray-500">
                                 Energy Guide - Est. Yearly Operating Cost
                              </td>
                              <td class="px-5 py-2 text-sm font-bold text-gray-900">
                                {{ heaters.energy_guide_est_yearly_operating_cost }}
                              </td>
                              <td class="px-5 py-2 whitespace-nowrap text-right text-sm font-medium">
                                </td>
                            </tr>

                            <tr class="bg-gray-100" v-if="checkPermission('upc_low_lead', [])">
                              <td class="px-5 py-2 text-sm text-gray-500">
                                UPC Low Lead
                              </td>
                              <td class="px-5 py-2 text-sm font-bold text-gray-900">
                                {{ heaters.upc_low_lead }}
                              </td>
                              <td class="px-5 py-2 whitespace-nowrap text-right text-sm font-medium">
                              </td>
                            </tr>

                             <tr v-if="checkPermission('asme_hlw', [])">
                              <td class="px-5 py-2 text-sm text-gray-500">
                              ASME (HLW)
                              </td>
                              <td class="px-5 py-2 text-sm font-bold text-gray-900">
                                {{ heaters.asme_hlw }}
                              </td>
                              <td class="px-5 py-2 whitespace-nowrap text-right text-sm font-medium">

                              </td>
                            </tr>

                            <tr class="bg-gray-100" v-if="checkPermission('asme_h', [])">
                              <td class="px-5 py-2 text-sm text-gray-500">
                                ASME (H)
                              </td>
                              <td class="px-5 py-2 text-sm font-bold text-gray-900">
                                {{ heaters.asme_h }}
                              </td>
                              <td class="px-5 py-2 whitespace-nowrap text-right text-sm font-medium">
                                 </td>
                            </tr>

                             <tr v-if="checkPermission('asme_nb', [])">
                              <td class="px-5 py-2 text-sm text-gray-500">
                                ASME (NB)
                              </td>
                              <td class="px-5 py-2 text-sm font-bold text-gray-900">
                                {{ heaters.asme_nb }}
                              </td>
                              <td class="px-5 py-2 whitespace-nowrap text-right text-sm font-medium">

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
            <h3 class="w-full text-white bg-blue-400 px-4 py-2 font-semibold text-xl rounded-tl-md rounded-tr-md mb-2" v-if="is_show_type == 'sheet'">Warranty</h3>
            <div class="lg:flex mb-8" v-if="(is_show_type == 'sheet') || (is_show_type == 'tab' && is_show_tab == 'warranty')">
                <div class="lg:pr-5 w-full">
                  <div class="-my-2 overflow-x-auto">
                    <div class="py-2 align-middle inline-block min-w-full">
                      <div class="overflow-hidden border border-gray-200 ">
                        <table class="min-w-full divide-y divide-gray-200">
                          <tbody class="bg-white divide-y divide-gray-200">
                          <tr class="bg-gray-100" v-if="checkPermission('heat_exchanger_warranty_wout_recirculation', [])">
                              <td class="px-5 py-2 text-sm text-gray-500">
                               Heat Exchanger Warranty (w/out Recirculation)
                              </td>
                              <td class="px-5 py-2 text-sm font-bold text-gray-900">
                                {{ heaters.heat_exchanger_warranty_wout_recirculation }}
                              </td>
                              <td class="px-5 py-2 whitespace-nowrap text-right text-sm font-medium">

                              </td>
                            </tr>

                             <tr v-if="checkPermission('heat_exchanger_warranty_wrecirculation', [])">
                              <td class="px-5 py-2 text-sm text-gray-500">
                              Heat Exchanger Warranty (w/Recirculation)
                              </td>
                              <td class="px-5 py-2 text-sm font-bold text-gray-900">
                                {{ heaters.heat_exchanger_warranty_wrecirculation }}
                              </td>
                              <td class="px-5 py-2 whitespace-nowrap text-right text-sm font-medium">
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

                 <div class="lg:pl-5 w-full">
                  <div class="-my-2 overflow-x-auto">
                    <div class="py-2 align-middle inline-block min-w-full">
                      <div class="overflow-hidden border border-gray-200 ">
                        <table class="min-w-full divide-y divide-gray-200">
                          <tbody class="bg-white divide-y divide-gray-200">
                            <tr class="bg-gray-100" v-if="checkPermission('parts_warranty', [])">
                              <td class="px-5 py-2 text-sm text-gray-500">
                               Parts Warranty
                              </td>
                              <td class="px-5 py-2 text-sm font-bold text-gray-900">
                                {{ heaters.parts_warranty }}
                              </td>
                              <td class="px-5 py-2 whitespace-nowrap text-right text-sm font-medium">
                              </td>
                            </tr>

                             <tr v-if="checkPermission('labor_warranty', ['laborwarrantyl1'])">
                              <td class="px-5 py-2 text-sm text-gray-500">
                             Labor Warranty
                              </td>
                              <td class="px-5 py-2 text-sm font-bold text-gray-900">
                                {{ heaters.labor_warranty }}
                              </td>
                              <td class="px-5 py-2 whitespace-nowrap text-right text-sm font-medium">
                              <a :href="getDownloadFile('laborwarrantyl1')"
 v-if="checkPermission('laborwarrantyl1', [])" target="_blank">
                                     <img  v-if="checkBlank('laborwarrantyl1')"  :src="checkLockOrUnlock('laborwarrantyl1')" alt="">
                                </a>
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
  width: 45%;
}
table tr td:last-child{
  display: flex;
  width: 100px;
  align-items: center;
}
@media (min-width: 1024px){
    .lg\:pr-5.w-full, .lg\:pl-5.w-full {
        max-width: 50%;
    }
}
@media (max-width: 1023px){
    ul.tabs li a {
      font-size: 15px;
    }
}
@media (max-width: 767px){
  table tr td {
      padding-left: 0.5rem;
      padding-right: 0.5rem;
  }
  .p-8 {
      padding: 1.2rem;
  }
  table tr td:last-child {
      width: 60px;
      justify-content: space-between;
  }
  ul.tabs {
      flex-wrap: wrap;
  }
  ul.tabs li {
    margin: 0 10px 0 0!important;
  }
  ul.tabs li a{
    font-size: 14px;
    padding: 5px 12px;
  }
}
</style>

<script>
import Autocomplete from "./autocomplete";
export default {
    props: ["heaters", "heater_list", "security_permissions", 'asset_url'],
    components: {Autocomplete},
    data() {
        return {
            base_url: "/storage/" ,
            is_show_type: 'sheet',
            is_show_tab: 'overview',
            file_type: "",
            selectedHeater : (this.heaters)?this.heaters.model_no:''

            };
    },
    setup() {
        return {
        };
    },
     methods: {
        checkPermission: function (col_1, col_2) {
            let _this =this;
            if(! this.containsKey(this.heaters, col_1)){
                console.log('false 1');
                return false;
            } else {
                return true;
               if(col_2.length > 0){
                   const list = [];
                    col_2.map(function(value, key) {
                        if(_this.containsKey(_this.heaters, value)){
                            list.push(value);
                        }
                    });
                    if(list.length > 0){
                        console.log('true 1');
                        return true;
                    } else {
                        console.log('false 2');
                        return false;
                    }
               } else {
                   console.log('true 2');
                   return true;
               }
            }
            console.log(col_1, col_2.length);
            return false;
        },
        containsKey(obj, key ) {
            // return true;
            return Object.keys(obj).includes(key);
        },
         showType(is_show_type){
             this.is_show_type =  is_show_type;
        },
        showTab(is_show_tab){
            this.is_show_tab = is_show_tab;
        },
        checkLockOrUnlock(file_type){
          // console.log("this.security_permissions", file_type, this.security_permissions);
          if(this.security_permissions.find(x => x == file_type))
          {
            return this.asset_url + "vendor/technical-info/img/lock.png";
          }
          else{
            return this.asset_url + "vendor/technical-info/img/unlock.png";
          }
      },
      checkBlank(file_value){

          console.log("heaters", this.heaters[file_value]);
          return (this.heaters[file_value]);
      },
      changeHeater(){
        this.$inertia.get(route('heaters.technical-information') + '?heater='+this.selectedHeater, [], { preserveState: true, preserveScroll: true });
      },
      setAutocomplete(vals){
          this.selectedHeater = vals;
          this.changeHeater();
      },
      printHtml(){
          const url = route('heaters.technical-information') + '?heater='+ this.selectedHeater+'&is_print=true';//  'http://127.0.0.1:8000/heaters?heater=KTPaPrWMmI';
          const name = "_blank";
          let specs = ['fullscreen=yes','titlebar=yes', 'scrollbars=yes'].join(',');
          const win = window.open(url, name, specs);
          const promise = new Promise((resolve) => {
            setTimeout(() => {
                win.focus();
                win.print();
                win.document.close();
                win.close();
                if (cb) cb();
                resolve();
            }, 3000);
        });
      },
      getDownloadFile(field_name){
          return '/file-download/'+ this.selectedHeater +'/'+ field_name;
      }



  }
};
</script>
<style>
.autocomplete-result.is-active, .autocomplete-result:hover {
  background-color: #1a202c !important;
}
</style>
