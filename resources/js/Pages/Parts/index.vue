<template>
  <div>
    <div class="md:p-8 p-5 md:pb-0 pb-0">
      <h3 class="font-semibold text-2xl text-blue-500">Instruction</h3>
      <p>
        To find the part you are looking for, first select a model
        number, then enter as much search criteria as you have in one or
        more of the Parts List ID, Part Number, or Part Name/Description
        search fields. Some parts are not interchangeable between gas
        types, so be sure to select NG or LP carefully.
      </p>
    </div>
    <div class="md:p-8 p-5 md:pb-0 pb-0">
      <h3 class="font-semibold text-xl text-blue-500 italic">
        Disclaimer
      </h3>
      <p class="italic">
        The Parts Search Tool is for reference purposes only. Before
        ordering a part, the location and shape of the part should be
        visually confirmed in the Parts List that came with the product
        or by a Noritz professional.
      </p>
    </div>
    <div class="md:p-8 p-5 md:pb-0 pb-0">
      <!-- Header -->
      <div class="lg:flex flex-wrap -mx-3">
        <div class="w-full px-3 mb-3 lg:w-1/2 xl:w-1/5">
          <label
            for="country"
            class="block text-lg font-semibold text-gray-700"
          >
            Model Number
          </label>
          <div class="mt-1">
            <Autocomplete
              :items="heater_list"
              :value="form.model_number"
            ></Autocomplete>
          </div>
        </div>

        <div class="w-full px-3 mb-3 lg:w-1/2 xl:w-1/5">
          <label
            for="country"
            class="block text-lg font-semibold text-gray-700"
          >
            Parts List ID
          </label>
          <div class="mt-1">
            <input
              type="text"
              v-model="form.part_list_id"
              class="block focus:ring-blue-500 focus:border-blue-500 w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
            />
          </div>
        </div>

        <div class="w-full px-3 mb-3 lg:w-1/2 xl:w-1/5">
          <label
            for="country"
            class="block text-lg font-semibold text-gray-700"
          >
            Part Number
          </label>
          <div class="mt-1">
            <input
              type="text"
              v-model="form.part_number"
              class="block focus:ring-blue-500 focus:border-blue-500 w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
            />
          </div>
        </div>

        <div class="w-full px-3 mb-3 lg:w-1/2 xl:w-1/5">
          <label
            for="country"
            class="block text-lg font-semibold text-gray-700"
          >
            Part Name / Description
          </label>
          <div class="mt-1">
            <input
              type="text"
              v-model="form.part_name"
              class="block focus:ring-blue-500 focus:border-blue-500 w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
            />
          </div>
        </div>

        <div class="w-full px-3 mb-3 xl:w-1/5">
          <label
            for="country"
            class="hidden xl:block text-lg font-semibold text-gray-700"
          >
            &nbsp;
          </label>
          <div class="flex flex-wrap -mx-2 mt-1">
            <div class="px-2 mb-3">
              <button
                class="w-full text-white bg-blue-400 px-4 py-2 font-semibold rounded-md"
                @click="searchParts"
              >
                Search
              </button>
            </div>

            <div class="px-2 mb-3">
              <button
                @click="resetParts"
                class="w-full text-white bg-blue-400 px-4 py-2 font-semibold rounded-md"
              >
                Reset Search
              </button>
            </div>
          </div>
        </div>
      </div>

      <!-- Header End -->
      <div v-if="heater_model ">
        <p>

          <label class="flex items-center" for=""><b> Download Parts List File : </b>
            <a :href="'/file-download/'+ heater_model.model_no +'/parts_list'" target="_blank" class="ml-2">
              <img :src="asset_url+'vendor/parts-lookup/img/unlock.png'" alt="">
            </a>
          </label>
        </p>
      </div>
      <br>

      <!-- <h3 class="w-full text-white bg-blue-400 px-4 py-2 font-semibold text-xl rounded-tl-md rounded-tr-md mb-2">Overview</h3> -->
      <div class="lg:flex mb-8">
        <div class="w-full">
          <div class="overflow-hidden border border-gray-200 mobile-border-none">
            <table
              class="min-w-full divide-y divide-gray-200 mobile_table flex flex-row flex-no-wrap"
            >
              <thead>
              <tr
                class="text-white bg-blue-400 text-left flex flex-col flex-no wrap sm:table-row mb-2 sm:mb-0"
                v-for="part in parts.data"
              >
                <th class="px-5 py-2">PARTS LIST ID</th>
                <th class="px-5 py-2">PART NAME / DESCRIPTION</th>
                <th class="px-5 py-2">PART NUMBER(FOR ORDERING)</th>
                <th v-if="true || is_login" class="px-5 py-2">VERSION</th>
                <th v-if="true || is_login" class="px-5 py-2">SEQ.</th>
                <th v-if="is_login || softlock === false" class="px-5 py-2">
                  UPGRADE REASON
                </th>
                <th v-if="true || is_login" class="px-5 py-2">
                  AVAIL. FOR SALE
                </th>
                <th class="px-5 py-2">APPLICABLE MODELS {{ !(is_login || softlock !== false) ? 'out' : 'in'}}</th>
              </tr>
              </thead>
              <tbody
                class="bg-white divide-y divide-gray-200 flex-1 sm:flex-none"
              >


              <template
                v-if="parts && parts.data && parts.data.length > 0"
                v-for="part in parts.data"
              >
                <tr
                  class="flex flex-col flex-no wrap sm:table-row mb-2 sm:mb-0"
                  v-if="(softlock === false) || (!(softlock === false) && part.available_for_sale != 'N')">
                  <td
                    class="px-5 py-2 text-sm text-gray-500"
                    v-html="replaceString(part.part_list_id, part_list_id)"
                  >

                  </td>
                  <td
                    class="px-5 py-2 text-sm font-bold text-gray-900"
                    v-html="replaceString(part.part_description_en, part_name)"
                  >
                  </td>
                  <!-- <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium"> -->
                  <td
                    class="px-5 py-2 text-sm font-bold text-gray-900"
                    v-html="partNumber(part.part_number, part_number)"
                  >
                  </td>
                  <td
                    v-if="true || is_login"
                    class="px-5 py-2 text-sm font-bold text-gray-900"
                  >
                    {{ part.version }}
                  </td>
                  <td
                    v-if="true || is_login"
                    class="px-5 py-2 text-sm font-bold text-gray-900"
                  >
                    {{ part.sequence }}
                  </td>
                  <td
                    v-if="is_login || softlock === false"
                    class="px-5 py-2 text-sm font-bold text-gray-900"
                  >
                    {{ part.upgrade_reason_en }}
                  </td>
                  <td
                    v-if="true || is_login"
                    class="px-5 py-2 text-sm font-bold text-gray-900"
                  >
                    {{ part.available_for_sale }}
                  </td>
                  <td
                    class="px-5 py-2 text-sm font-bold text-gray-900"
                  >
                    <custom-select
                      :items="part.heaters"
                      :value="selectedModel"
                    ></custom-select>
                  </td>
                </tr>
              </template>
              <tr v-if="parts && parts.data &&  parts.data.length == 0 && is_search">
                <td colspan="4" class="px-5 py-2 text-red-400 pt-5 pb-5">Please enter at least 1 search criteria. No
                  parts are found.
                </td>

              </tr>
              <tr v-if="parts && ((parts.data && parts.data.length == 0) || !parts.data) && !is_search">
                <td colspan="4" class="px-5 py-2">No parts are found.</td>
              </tr>
              </tbody>
            </table>
          </div>
          <links :softlock="softlock" v-if="parts && parts.data &&  parts.data.length > 0 " :urlsArray="links"></links>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import Autocomplete from "./autocomplete";
import CustomSelect from "./customSelect";
import Links from './paginate';
// Optional: Import default CSS
export default {
  props: [
    "parts",
    "heater_list",
    "part_list_id",
    "model_number",
    "part_number",
    "part_name",
    "is_login",
    "heater_model",
    "is_search",
    "asset_url",
    "softlock"

  ],
  components: {Autocomplete, CustomSelect, Links},
  data() {
    return {
      base_url: "/storage/",
      form: {
        part_list_id: this.part_list_id,
        model_number: this.model_number,
        part_number: this.part_number,
        part_name: this.part_name,
        is_search: true,
        softlock: this.softlock

      },
      selectedModel: this.model_number,
      links: (this.parts && this.parts.links) ? this.parts.links : []
    };
  },
  setup() {
    return {};
  },
  methods: {
    searchParts() {
      this.$inertia.get("/parts", this.form, {
        // preserveState: true,
        preserveScroll: true,
      });
    },
    changeSelect() {
      this.form.model_number = this.selectedModel;
      this.searchParts();
    },
    resetParts() {
      this.form = {};
      this.searchParts();
    },
    setAutocomplete(vals) {
      this.form.model_number = vals;
      // console.log("vals", vals);
    },
    setFormSubmit(vals) {
      this.form.model_number = vals;
      this.searchParts();
    },
    replaceString(part_string, replace_value) {
      if (replace_value && part_string) {
        // part_string = 123456798;
        // replace_value = 67;
        let new_replace_value = '<span class="highlight_string">' + replace_value + '</span>';
        console.log("new_replace_value", new_replace_value);
        console.log("part_string", part_string);
        console.log("replace_value", replace_value);
        return part_string.toString().replaceAll(replace_value.toString(), new_replace_value);
      } else {
        return part_string;
      }

    },
    partNumber(part_string, part_number) {
      let str = this.replaceString(part_string, part_number);
      str = `<a href="#" style="color:#dc2626" onclick="window.open('https://support.noritz.com/cart?item-number=${part_string}', '_blank'); return false" target="_parent">${str}</a>`;
      return str;
    }

  },
};
</script>
<style>
.highlight_string {
  background: #F8DCB8;
}

.autocomplete-result.is-active, .autocomplete-result:hover {
  background-color: #1a202c !important;
}
</style>
<style scoped>
.bg-blue-400 {
  background: #dc2626;
}

.text-blue-500 {
  color: #dc2626;
}

@media (max-width: 1023px) {
  th {
    font-size: 14px;
  }
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
  table.mobile_table th, table.mobile_table td {
    border: 1px solid rgb(229 229 229);
    text-align: left !important;
    margin-top: -1px;
    height: 52px;
    padding: 5px 10px;
    line-height: normal;
    display: flex;
    align-items: center;
    font-size: 12px;
  }

  table.mobile_table {
    border: none;
  }

  table.mobile_table td a, table.mobile_table td img {
    display: block;
  }

  table.mobile_table td:last-child {
    height: 51px;
  }

  table.mobile_table th:nth-child(3), table.mobile_table td:nth-child(3) {
    height: 64px;
  }

  .mobile-border-none {
    border: none
  }
}
</style>

<style>
@media (max-width: 639px) {
  table.mobile_table td button {
    padding: 0 8px;
  }

  table.mobile_table td:last-child select {
    min-width: 140px;
  }
}
</style>
