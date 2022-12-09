<template>
  <div>

    <div class="md:flex p-5 pb-3 w-full items-center">
      <div class=" md:pl-10 order-2 md:mt-7">
        <h4 class="text-red-600 font-bold text-xl mb-3">
          Important Service Manual Disclaimer:
        </h4>
        <div class="mb-8">
          <p>Service Manuals are credentialed documents. You do not obtain any ownership right, title, or
            other interest in Noritz Service Manuals or copyrights by downloading, copying, or otherwise
            using Service Manuals. The Service Manual should not be viewed, downloaded, printed, or
            otherwise used by anyone other than an authorized, trained, and contracted Service Rep of Noritz
            America. By downloading the service manual, you are agreeing to this disclaimer.

          </p>
        </div>

        <h4 class="text-red-600 font-bold text-xl mb-5">
          Model: {{ selected_heater.model_no }}
        </h4>
        <div class="ml-8 mb-8">
          <ul class="list-disc">
            <li><a v-if="fileExist('service_manual')"
                   class="whitespace-nowrap text-sm text-red-500"
                   :target="fileExist('service_manual')?'_blank':''"
                   :href="getDownloadFile('service_manual')">Download Full Version of Service Manual</a>

              <a v-else class="whitespace-nowrap text-sm text-gray-500">(Not Available) Download Full Version of Service
                Manual </a>

            </li>
          </ul>
        </div>

        <h4 class="text-red-600 font-bold text-xl mb-3">
          Download Service Manual Sections:
        </h4>

        <div class="ml-8 mb-8">
          <ul class="list-disc">
            <li><a v-if="fileExist('service_manual_hot_water_capabilities')"
                   class="whitespace-nowrap text-sm text-red-500"
                   :target="fileExist('service_manual_hot_water_capabilities')?'_blank':''"
                   :href="getDownloadFile('service_manual_hot_water_capabilities')">Hot Water
              Capabilities </a>

              <a v-else class="whitespace-nowrap text-sm text-gray-500">(Not Available) Hot Water
                Capabilities </a>

            </li>

            <li><a v-if="fileExist('service_manual_pressure_loss_chart')"
                   class="whitespace-nowrap text-sm text-red-500"
                   :target="fileExist('service_manual_pressure_loss_chart')?'_blank':''"
                   :href="getDownloadFile('service_manual_pressure_loss_chart')">Pressure Loss
              Chart</a>

              <a v-else class="whitespace-nowrap text-sm text-gray-500">(Not Available) Pressure Loss Chart</a>
            </li>

            <li><a v-if="fileExist('service_manual_components')"
                   class="whitespace-nowrap text-sm text-red-500"
                   :target="fileExist('service_manual_components')?'_blank':''"
                   :href="getDownloadFile('service_manual_components')">Components</a>

              <a v-else class="whitespace-nowrap text-sm text-gray-500">(Not Available) Components</a>
            </li>

            <li><a v-if="fileExist('service_manual_operating_principal')"
                   class="whitespace-nowrap text-sm text-red-500"
                   :target="fileExist('service_manual_operating_principal')?'_blank':''"
                   :href="getDownloadFile('service_manual_operating_principal')">Operating Principle</a>
              <a v-else class="whitespace-nowrap text-sm text-gray-500">(Not Available) Operating Principle</a>
            </li>

            <li><a v-if="fileExist('service_manual_operation_flow')"
                   class="whitespace-nowrap text-sm text-red-500"
                   :target="fileExist('service_manual_operation_flow')?'_blank':''"
                   :href="getDownloadFile('service_manual_operation_flow')">Operation Flow Chart</a>
              <a v-else class="whitespace-nowrap text-sm text-gray-500">(Not Available) Operation Flow Chart</a>
            </li>

            <li><a v-if="fileExist('service_manual_wiring_diagram')"
                   class="whitespace-nowrap text-sm text-red-500"
                   :target="fileExist('service_manual_wiring_diagram')?'_blank':''"
                   :href="getDownloadFile('service_manual_wiring_diagram')">Wiring Diagram</a>
              <a v-else class="whitespace-nowrap text-sm text-gray-500">(Not Available) Wiring Diagram</a>
            </li>

            <li><a v-if="fileExist('service_manual_error_code_and_checkpoints')"
                   class="whitespace-nowrap text-sm text-red-500"
                   :target="fileExist('service_manual_error_code_and_checkpoints')?'_blank':''"
                   :href="getDownloadFile('service_manual_error_code_and_checkpoints')">Error Code and Checkpoints</a>
              <a v-else class="whitespace-nowrap text-sm text-gray-500">(Not Available) Error Code and Checkpoints</a>
            </li>

            <li><a v-if="fileExist('service_manual_circuit_board_checkpoints')"
                   class="whitespace-nowrap text-sm text-red-500"
                   :target="fileExist('service_manual_circuit_board_checkpoints')?'_blank':''"
                   :href="getDownloadFile('service_manual_circuit_board_checkpoints')">Circuit Board Checkpoints</a>
              <a v-else class="whitespace-nowrap text-sm text-gray-500">(Not Available) Circuit Board Checkpoints </a>
            </li>

            <li><a v-if="fileExist('service_manual_error_descriptions')"
                   class="whitespace-nowrap text-sm text-red-500"
                   :target="fileExist('service_manual_error_descriptions')?'_blank':''"
                   :href="getDownloadFile('service_manual_error_descriptions')">Error Descriptions</a>
              <a v-else class="whitespace-nowrap text-sm text-gray-500">(Not Available) Error Descriptions</a>
            </li>

            <li><a v-if="fileExist('service_manual_maintenance')"
                   class="whitespace-nowrap text-sm text-red-500"
                   :target="fileExist('service_manual_maintenance')?'_blank':''"
                   :href="getDownloadFile('service_manual_maintenance')">Maintenance Monitors</a>
              <a v-else class="whitespace-nowrap text-sm text-gray-500">(Not Available) Maintenance Monitors</a>
            </li>

            <li><a v-if="fileExist('service_manual_circuit_board_replacement')"
                   class="whitespace-nowrap text-sm text-red-500"
                   :target="fileExist('service_manual_circuit_board_replacement')?'_blank':''"
                   :href="getDownloadFile('service_manual_circuit_board_replacement')">Circuit Board Replacement</a>
              <a v-else class="whitespace-nowrap text-sm text-gray-500">(Not Available) Circuit Board Replacement</a>
            </li>

            <li><a v-if="fileExist('service_manual_fan_motor_calibration')"
                   class="whitespace-nowrap text-sm text-red-500"
                   :target="fileExist('service_manual_fan_motor_calibration')?'_blank':''"
                   :href="getDownloadFile('service_manual_fan_motor_calibration')">Fan Motor Calibration</a>
              <a v-else class="whitespace-nowrap text-sm text-gray-500">(Not Available) Fan Motor Calibration</a>
            </li>

            <li><a v-if="fileExist('service_manual_neutralizer_replacement')"
                   class="whitespace-nowrap text-sm text-red-500"
                   :target="fileExist('service_manual_neutralizer_replacement')?'_blank':''"
                   :href="getDownloadFile('service_manual_neutralizer_replacement')">Neutralizer Replacement</a>
              <a v-else class="whitespace-nowrap text-sm text-gray-500">(Not Available) Neutralizer Replacement</a>
            </li>

            <li><a v-if="fileExist('service_manual_manifold_pressures')"
                   class="whitespace-nowrap text-sm text-red-500"
                   :target="fileExist('service_manual_manifold_pressures')?'_blank':''"
                   :href="getDownloadFile('service_manual_manifold_pressures')">Manifold Pressures</a>
              <a v-else class="whitespace-nowrap text-sm text-gray-500">(Not Available) Manifold Pressures</a>
            </li>

            <li><a v-if="fileExist('service_manual_change_default_temperatures')"
                   class="whitespace-nowrap text-sm text-red-500"
                   :target="fileExist('service_manual_change_default_temperatures')?'_blank':''"
                   :href="getDownloadFile('service_manual_change_default_temperatures')"> Change
              Default
              temps</a>
              <a v-else class="whitespace-nowrap text-sm text-gray-500">(Not Available) Change
                Default
                temps</a>
            </li>

            <li><a v-if="fileExist('service_manual_condensate_drain_line')"
                   class="whitespace-nowrap text-sm text-red-500"
                   :target="fileExist('service_manual_condensate_drain_line')?'_blank':''"
                   :href="getDownloadFile('service_manual_condensate_drain_line')">Condensate
              Drain
              Line</a>
              <a v-else class="whitespace-nowrap text-sm text-gray-500">(Not Available) Condensate
                Drain
                Line</a>
            </li>
          </ul>
        </div>


      </div>

    </div>
  </div>
</template>
<script>


export default {
  props: [
    "selected_heater",
    "asset_url"
  ],
  mounted() {

  },
  data() {
    return {};
  },
  setup() {
    return {};
  },
  methods: {
    getDownloadFile(field_name) {
      if (this.fileExist(field_name)) {
        return "/file-download/" + this.selected_heater.model_no + "/" + field_name;
      } else {
        return "javascript:void(0)"
      }
    },
    fileExist(field_name) {
      if (this.selected_heater[field_name] && this.selected_heater[field_name] != '') {
        return true;
      } else {
        return false;
      }
    }
  },
  computed: {}
};
</script>
<style>
.autocomplete-result.is-active,
.autocomplete-result:hover {
  background-color: #1a202c !important;
}
</style>
<style scoped>
.max-h-585 {
  max-height: 585px;
}

@media (min-width: 640px) {
  table.mobile_table {
    display: inline-table !important;
  }

  table.mobile_table thead tr:not(:first-child) {
    display: none;
  }
}

@media (max-width: 639px) {

  table.mobile_table th,
  table.mobile_table td {
    border: 1px solid rgb(229 229 229);
    text-align: left !important;
    margin-top: -1px;
    height: 48px;
  }

  table.mobile_table {
    border: none;
  }

  table.mobile_table td a,
  table.mobile_table td img {
    display: block;
  }

  table.mobile_table td:last-child {
    height: 47px;
  }

  table.mobile_table th:first-child,
  table.mobile_table td:first-child {
    height: 64px;
    display: flex;
    align-items: center;
  }

  table.mobile_table th {
    max-width: 158px;
  }

  table.mobile_table th:first-child,
  table.mobile_table td:first-child,
  table.mobile_table th:nth-child(8),
  table.mobile_table td:nth-child(8),
  table.mobile_table th:nth-child(9),
  table.mobile_table td:nth-child(9) {
    height: 64px;
    display: flex;
    align-items: center;
  }

  table.mobile_table td:nth-child(9) {
    height: 63px !important;
  }
}
</style>
