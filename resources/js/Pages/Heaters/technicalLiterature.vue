<template>
    <div>
        <div v-if="queryParams['embed'] !== 'true'" class="md:flex md:p-8 p-5 pb-0 w-full items-center">
            <div class="flex items-center">
                <label for="country" class="font-semibold text-xl text-red-600 pr-4 whitespace-nowrap">Search by</label>
                <div class="md:block flex">
                    <div>
                        <label class="flex items-center cursor-pointer md:mb-3 md:mr-0 mr-3">
                            <input type="checkbox"
                                   class="form-checkbox h-5 w-5 text-red-600 focus:outline-none border-red-600 ring-0 focus:ring-0"
                                   @change="changeCheckbox($event, 'search_type', 'heater')" v-model="form.search_type"
                                   value="heater" name="search_type"/>
                            <span class="font-bold pl-2">Heater</span>
                        </label>
                    </div>
                    <div>
                        <label class="flex items-center cursor-pointer">
                            <input type="checkbox" name="search_type"
                                   class="form-checkbox h-5 w-5 text-red-600 focus:outline-none border-red-600 ring-0 focus:ring-0"
                                   @change="changeCheckbox($event, 'search_type', 'accessories')"
                                   v-model="form.search_type" value="accessories"/>
                            <span class="font-bold pl-2">Accessories</span>
                        </label>
                    </div>
                </div>
            </div>
            <form class="sm:flex sm:items-center md:pl-5 mt-5 md:mt-0" @submit="submitTechnicalLiterature">
                <div class="w-full lg:w-96 md:w-60">
                    <label for="email" class="sr-only"></label>
                    <Autocomplete :items="heater_list" :value="form1.search_string"></Autocomplete>
                    <!-- <input
            type="text"
            v-model="form1.search_string"
            class="shadow-sm focus:ring-red-600 focus:border-red-600 block w-full sm:text-sm border-gray-300 rounded-md"
          /> -->
                </div>
                <div class="flex">
                    <button type="submit"
                            class="mt-3 w-full inline-flex items-center justify-center px-4 py-2 border border-transparent shadow-sm font-medium rounded-md text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-600 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm"
                            @click="searchTechnicalLiterature">
                        Search
                    </button>
                    <button type="submit" @click="resetForm"
                            class="mt-3 w-full inline-flex items-center justify-center px-4 py-2 border border-transparent shadow-sm font-medium rounded-md text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-600 sm:mt-0 ml-3 sm:w-auto sm:text-sm whitespace-nowrap">
                        Reset Search
                    </button>
                </div>
            </form>
        </div>
        <div class="md:flex md:p-8 p-5 pb-3 w-full">
            <div v-if="queryParams['embed'] !== 'true'" class="lg:w-1/4 md:w-1/3 md:pl-10 order-2 md:mt-7">
                <h4 class="text-red-600 font-bold text-xl mb-3">
                    Filter by Model Category:
                </h4>
                <div class="mb-8">
                    <label class="flex items-center cursor-pointer mb-3">
                        <input type="checkbox" @change="changeCheckbox($event, 'model_category', 'Residential')"
                               v-model="form.model_category" name="model_category" value="Residential"
                               class="form-checkbox h-5 w-5 text-red-600 focus:outline-none border-red-600 ring-0 focus:ring-0"/>
                        <span class="font-semibold pl-2">Residential</span>
                    </label>
                    <label class="flex items-center cursor-pointer mb-3">
                        <input type="checkbox" @change="changeCheckbox($event, 'model_category', 'Commercial')"
                               v-model="form.model_category" name="model_category" value="Commercial"
                               class="form-checkbox h-5 w-5 text-red-600 focus:outline-none border-red-600 ring-0 focus:ring-0"/>
                        <span class="font-semibold pl-2">Commercial</span>
                    </label>
                    <label class="flex items-center cursor-pointer mb-3">
                        <input type="checkbox" @change="changeCheckbox($event, 'model_category', 'Boiler')"
                               v-model="form.model_category" name="model_category" value="Boiler"
                               class="form-checkbox h-5 w-5 text-red-600 focus:outline-none border-red-600 ring-0 focus:ring-0"/>
                        <span class="font-semibold pl-2">Boiler</span>
                    </label>
                </div>

                <h4 class="text-red-600 font-bold text-xl mb-3">
                    Filter by Technology:
                </h4>
                <div class="mb-8">
                    <label class="flex items-center cursor-pointer mb-3">
                        <input type="checkbox" @change="changeCheckbox($event, 'technology', 'Yes')"
                               v-model="form.technology" name="technology" value="Yes"
                               class="form-checkbox h-5 w-5 text-red-600 focus:outline-none border-red-600 ring-0 focus:ring-0"/>
                        <span class="font-semibold pl-2">Condensing</span>
                    </label>
                    <label class="flex items-center cursor-pointer mb-3">
                        <input type="checkbox" @change="changeCheckbox($event, 'technology', 'No')"
                               v-model="form.technology" name="technology" value="No"
                               class="form-checkbox h-5 w-5 text-red-600 focus:outline-none border-red-600 ring-0 focus:ring-0"/>
                        <span class="font-semibold pl-2">Non-Condensing</span>
                    </label>
                </div>

                <h4 class="text-red-600 font-bold text-xl mb-3">
                    Filter by Generation:
                </h4>
                <div class="mb-8">
                    <label class="flex items-center cursor-pointer mb-3">
                        <input type="checkbox" @change="changeCheckbox($event, 'generation', 'in-production')"
                               v-model="form.generation" name="generation" value="in-production"
                               class="form-checkbox h-5 w-5 text-red-600 focus:outline-none border-red-600 ring-0 focus:ring-0"/>
                        <span class="font-semibold pl-2">In Production</span>
                    </label>
                    <label class="flex items-center cursor-pointer mb-3">
                        <input type="checkbox" @change="changeCheckbox($event, 'generation', 'classic-models')"
                               v-model="form.generation" name="generation" value="classic-models"
                               class="form-checkbox h-5 w-5 text-red-600 focus:outline-none border-red-600 ring-0 focus:ring-0"/>
                        <span class="font-semibold pl-2">Classic Models</span>
                    </label>
                </div>

                <h4 v-if="is_login" class="text-red-600 font-bold text-xl mb-3">Filter by Brand:</h4>
                <div v-if="is_login" class="mb-8">
                    <label class="flex items-center cursor-pointer mb-3">
                        <input type="checkbox" @change="changeCheckbox($event, 'brand', 'oem')" v-model="form.brand"
                               name="brand" value="oem"
                               class="form-checkbox h-5 w-5 text-red-600 focus:outline-none border-red-600 ring-0 focus:ring-0"/>
                        <span class="font-semibold pl-2">Show OEM models</span>
                    </label>
                </div>

                <!--        <div>-->
                <!--          <a href="http://www.noritz.com/eztr" target="_blank">-->
                <!--            <img src="http://support.noritz.com/images/EZTR40forTechLit.png"/>-->
                <!--          </a>-->
                <!--        </div>-->
            </div>
            <div class="bodyContainerClasses">
                <!-- <div>
          <a href="#" class="text-red-600 underline">Edit allowed sales rep</a>
        </div> -->
                <div class="mt-5" v-if="is_login">
                    <p>
                        <strong>Important Service Manual Disclaimer</strong> <br/>Service Manuals are credentialed
                        documents. You do
                        not obtain any ownership right, title, or other interest in Noritz Service Manuals or copyrights
                        by
                        downloading, copying, or otherwise using Service Manuals. The Service Manual should not be
                        viewed,
                        downloaded, printed, or otherwise used by anyone other than an authorized, trained, and
                        contracted Service
                        Rep of Noritz America. By downloading the service manual, you are agreeing to this disclaimer.
                    </p>
                </div>
                <div class="flex flex-col mt-8">
                    <div class="-my-2 -mx-2 overflow-auto">
                        <div class="py-2 px-2 align-middle inline-block min-w-full">
                            <div class="overflow-hidden">
                                <table
                                    class="min-w-full border-2 border-gray-300 divide-y divide-gray-200 mobile_table flex flex-row flex-no-wrap"
                                >
                                    <thead>
                                    <tr v-for="(product, index) in products.data"
                                        class="bg-red-600 flex flex-col flex-no wrap sm:table-row mb-2 sm:mb-0">
                                        <th
                                            scope="col"
                                            class="md:px-6 py-3 px-3 text-left text-sm font-bold text-white uppercase tracking-wider"
                                        >
                                            MODEL #
                                        </th>
                                        <th
                                            scope="col"
                                            class="md:px-6 py-3 px-3 text-center text-sm font-bold text-white uppercase tracking-wider"
                                        >
                                            NPA
                                        </th>
                                        <th
                                            scope="col"
                                            class="md:px-6 py-3 px-3 text-center text-sm font-bold text-white uppercase tracking-wider"
                                        >
                                            SPEC SHEET
                                        </th>
                                        <th
                                            scope="col"
                                            class="md:px-6 py-3 px-3 text-center text-sm font-bold text-white uppercase tracking-wider"
                                        >
                                            OWNER'S GUIDE
                                        </th>
                                        <th
                                            scope="col"
                                            class="md:px-6 py-3 px-3 text-center text-sm font-bold text-white uppercase tracking-wider"
                                        >
                                            INSTALL MANUAL
                                        </th>
                                        <th
                                            scope="col"
                                            class="md:px-6 py-3 px-3 text-center text-sm font-bold text-white uppercase tracking-wider"
                                        >
                                            PARTS LIST
                                        </th>
                                        <th
                                            scope="col"
                                            class="md:px-6 py-3 px-3 text-center text-sm font-bold text-white uppercase tracking-wider"
                                        >
                                            CERT.
                                        </th>
                                        <th v-if="is_login || softlock === false"
                                            scope="col"
                                            class="md:px-6 py-3 px-3 text-center text-sm font-bold text-white uppercase tracking-wider"
                                        >
                                            FIELD MAN/ TECH SHEET
                                        </th>
                                        <th v-if="is_login || softlock === false"
                                            scope="col"
                                            class="md:px-6 py-3 px-3 text-center text-sm font-bold text-white uppercase tracking-wider"
                                        >
                                            SERVICE MANUAL
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200 flex-1 sm:flex-none">
                                    <!-- Odd row  bg-gray-50 -->
                                    <tr
                                        v-if="
                        products && products.data && products.data.length > 0
                      " v-for="(product, index) in products.data" :class="index % 2 == 0 ? 'bg-white' : 'bg-gray-50'"
                                        class="flex flex-col flex-no wrap sm:table-row mb-2 sm:mb-0">
                                        <td
                                            class="md:px-6 py-3 px-3 text-left text-sm font-extrabold text-gray-900">
                                            {{ product.model_no }}
                                        </td>
                                        <td
                                            class="md:px-6 py-3 px-3 text-center whitespace-nowrap text-sm text-gray-500">
                                            <a v-if="
                            product.npa &&
                            product.npa != '' &&
                            product.npa != 'NULL'
                          " class="inline-block" target="blank" :href="getDownloadFile('npa', product.model_no)">
                                                <img class="w-4" :src="checkLockOrUnlock('unlock')"/>
                                            </a>
                                            <span v-else> X </span>
                                        </td>
                                        <td
                                            class="md:px-6 py-3 px-3 text-center whitespace-nowrap text-sm text-gray-500">
                                            <a v-if="
                            product.spec_sheet &&
                            product.spec_sheet != '' &&
                            product.spec_sheet != 'NULL'
                          " class="inline-block" target="blank" :href="
                            getDownloadFile('spec_sheet', product.model_no)
                          ">
                                                <img class="w-4" :src="checkLockOrUnlock('unlock')"/>
                                            </a>
                                            <span v-else> X </span>
                                        </td>
                                        <td
                                            class="md:px-6 py-3 px-3 text-center whitespace-nowrap text-sm text-gray-500">
                                            <a v-if="
                            product.owners_guide &&
                            product.owners_guide != '' &&
                            product.owners_guide != 'NULL'
                          " class="inline-block" target="blank" :href="
                            getDownloadFile('owners_guide', product.model_no)
                          ">
                                                <img class="w-4" :src="checkLockOrUnlock('unlock')"/>
                                            </a>
                                            <span v-else> X </span>
                                        </td>
                                        <td
                                            class="md:px-6 py-3 px-3 text-center whitespace-nowrap text-sm text-gray-500">
                                            <a v-if="
                            product.installation_manual &&
                            product.installation_manual != '' &&
                            product.installation_manual != 'NULL'
                          " class="inline-block" target="blank" :href="
                            getDownloadFile(
                              'installation_manual',
                              product.model_no
                            )
                          ">
                                                <img class="w-4" :src="checkLockOrUnlock('unlock')"/>
                                            </a>
                                            <span v-else> X </span>
                                        </td>
                                        <td
                                            class="md:px-6 py-3 px-3 text-center whitespace-nowrap text-sm text-gray-500">
                                            <a v-if="
                            product.parts_list &&
                            product.parts_list != '' &&
                            product.parts_list != 'NULL'
                          " class="inline-block" target="blank" :href="
                            getDownloadFile('parts_list', product.model_no)
                          ">
                                                <img class="w-4" :src="checkLockOrUnlock('unlock')"/>
                                            </a>
                                            <span v-else> X </span>
                                        </td>
                                        <td
                                            class="md:px-6 py-3 px-3 text-center whitespace-nowrap text-sm text-gray-500">
                                            <a v-if="
                            product.certification &&
                            product.certification != '' &&
                            product.certification != 'NULL'
                          " class="inline-block" target="blank" :href="
                            getDownloadFile('certification', product.model_no)
                          ">
                                                <img class="w-4" :src="checkLockOrUnlock('unlock')"/>
                                            </a>
                                            <span v-else> X </span>
                                        </td>

                                        <td v-if="is_login || softlock === false"
                                            class="md:px-6 py-3 px-3 text-center whitespace-nowrap text-sm text-gray-500"
                                        >
                                            <a
                                                v-if="
                            product.field_manual &&
                            product.field_manual != '' &&
                            product.field_manual != 'NULL'
                          " class="inline-block" target="blank" :href="
                            getDownloadFile('field_manual', product.model_no)
                          ">
                                                <img class="w-4" :src="checkLockOrUnlock('lock')"/>
                                            </a>
                                            <span v-else> X </span>
                                        </td>

                                        <td v-if="is_login || softlock === false"
                                            class="md:px-6 py-3 px-3 text-center whitespace-nowrap text-sm text-gray-500"
                                        >
                                            <a
                                                v-if="
                            product.service_manual &&
                            product.service_manual != '' &&
                            product.service_manual != 'NULL'
                          " class="inline-block" href="javascript:void(0)
                          " @click="confirmServiceManual(product.model_no)">
                                                <img class="w-4" :src="checkLockOrUnlock('lock')"/>
                                            </a>
                                            <span v-else> X </span>
                                        </td>
                                    </tr>

                                    <tr v-else>
                                        <td class="p-5 font-bold" colspan="5">
                                            NO MODEL FOUND
                                        </td>

                                    </tr>

                                    <!-- More people... -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <links :softlock="softlock" v-if="queryParams['embed'] !== 'true' && products && products.data && products.data.length > 0"
                       :urlsArray="links"></links>
            </div>
        </div>
    </div>
</template>
<script>

const parseQueryString = function () {

    var str = window.location.search;
    var objURL = {};

    str.replace(
        new RegExp("([^?=&]+)(=([^&]*))?", "g"),
        function ($0, $1, $2, $3) {
            objURL[$1] = $3;
        }
    );
    return objURL;
};

import Links from "./paginate";
import Autocomplete from "./autocomplete1";

export default {
    props: [
        "search_type",
        "search_string",
        "heater_list",
        "model_category",
        "asset_url",
        "technology",
        "generation",
        "brand",
        "products",
        "is_service_manual",
        "is_field_manual",
        "is_login",
        "softlock"
    ],
    components: {Links, Autocomplete},
    mounted() {

    },
    data() {
        return {
            queryParams: parseQueryString(),
            form: {
                search_type: (this.search_type) ? [this.search_type] : [],
                search_string: "",
                model_category: (this.model_category) ? [this.model_category] : [],
                technology: (this.technology) ? [this.technology] : [],
                generation: (this.generation) ? [this.generation] : [],
                brand: (this.brand) ? [this.brand] : [],
            },
            form1: {
                search_type: this.search_type,
                search_string: this.search_string,
                model_category: this.model_category,
                technology: this.technology,
                generation: this.generation,
                brand: this.brand,
                softlock: this.softlock,
            },
            links: this.products && this.products.links ? this.products.links : [],
        };
    },
    setup() {
        return {};
    },
    methods: {

        changeCheckbox($event, keys, vals) {
            if ($event.target.checked) {
                this.form[keys] = [vals];
                this.form1[keys] = vals;
            } else {
                this.form1[keys] = '';
            }
            this.searchTechnicalLiterature();
        },
        setAutocomplete(vals) {
            this.form1.search_string = vals;
            //   this.searchTechnicalLiterature();
        },
        searchTechnicalLiterature() {
            console.log("this.form", this.form1);
            this.$inertia.get("/technical-literature", this.form1, {
                preserveScroll: true,
            });
        },
        submitTechnicalLiterature(e) {
            e.preventDefault();
            this.searchTechnicalLiterature();
        },
        resetForm() {
            this.form = {
                search_type: [],
                search_string: [],
                model_category: [],
                technology: [],
                generation: [],
                brand: [],
                softlock: this.softlock,
            };
            this.form1 = {
                search_type: "",
                search_string: "",
                model_category: "",
                technology: "",
                generation: "",
                brand: "",
                softlock: this.softlock,
            };
            this.searchTechnicalLiterature();
        },
        checkLockOrUnlock(file_type) {
            // console.log("this.security_permissions", file_type, this.security_permissions);
            if (file_type == "lock") {
                return this.asset_url + "vendor/technical-info/img/lock.png";
            } else {
                return this.asset_url + "vendor/technical-info/img/unlock.png";
            }
        },
        checkBlank(file_value) {
            console.log("heaters", this.heaters[file_value]);
            return this.heaters[file_value];
        },
        getDownloadFile(field_name, model_no) {
            return "/file-download/" + model_no.replace('[', '%5B').replace(']', '%5D') + "/" + field_name;
        },
        confirmServiceManual(m) {
            if (confirm(`Service Manual Disclaimer
Service Manuals are credentialed documents. You do not obtain any ownership right, title,or other interest in Noritz Service Manuals or copyrights by downloading, copying, or otherwise using Service Manuals. The Service Manual should not be viewed, downloaded, printed, or otherwise used by anyone other than an authorized, trained, and contracted Service Rep of Noritz America. By downloading the service manual, you are agreeing to this disclaimer.`)) {
                window.open(this.route('heaters.technical-literature') + '?selected_model=' + m, m, "resizable=yes,scrollbars=yes,width = 700, height = 700");
            }
        }
    },
    computed: {
        bodyContainerClasses() {
            return (queryParams['embed'] === "true") ? "lg:w-full md:w-full" : "lg:w-3/4 md:w-2/3";
        }
    }
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
