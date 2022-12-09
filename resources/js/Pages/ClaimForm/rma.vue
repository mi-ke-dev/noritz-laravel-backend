<template>
  <div id="primaryContainer">
    <jet-form-section
      @submitted="createRmaForm"
      class="space-y-8 divide-y divide-gray-200"
    >

      <template #form>
        <h1 class="text-red-600 text-3xl font-bold mb-4">Return Material Authorization (RMA) Request Form</h1>
        <div class="flex flex-wrap mb-5">

          <p>Return Materials Authorization Request Form: TECH-RELATED only</p>
          <p>***This is a REQUEST only(NOT YET AUTHORIZED), Items will be return if shipped with this form.***
            (For installed & used product only. For new & unused product, please use this
            <inertia-link :href="route('claim-form.index')" class="">
              form
            </inertia-link>
            .)
          </p>
          <hr>
          <p>***All RMA heaters include NH series (Boilers) must be sent to CA for repairs.***</p>

        </div>


        <div class="pt-8 space-y-8 divide-y divide-gray-200 sm:space-y-5">
          <div>
            <div class="pt-8 space-y-6 sm:space-y-5">
              <div
                class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start  sm:border-gray-200 sm:pt-5"
              >
                <label
                  for="first_name"
                  class="block font-bold text-gray-700 sm:mt-px sm:pt-2"
                >
                  Party requesting the RMA and responsible for charges?
                </label>
                <div class="mt-1 sm:mt-0 sm:col-span-2">
                  <select
                    name="party_requesting_the_rma_and_responsible_for_charges"
                    v-model="
                      form.party_requesting_the_rma_and_responsible_for_charges
                    "
                    class="max-w-lg block focus:ring-indigo-500 focus:border-indigo-500 w-full shadow-sm sm:max-w-xs sm:text-sm border-gray-300 rounded-md"
                  >
                    <option v-for="(cp, index) in ChargeParty" :value="index">
                      {{ cp }}
                    </option>
                  </select>
                </div>
              </div>
            </div>
          </div>


          <div class="pt-8 space-y-6 sm:pt-10 sm:space-y-5">
            <div>
              <h3 class="text-lg leading-6 font-bold text-gray-900">
                Distributor Information
              </h3>
              <p class="mt-1 max-w-2xl text-gray-500">
                This section is intended to collect information about the Noritz
                distributor.
              </p>
            </div>


            <div class="pt-8 space-y-6 sm:space-y-5">
              <div
                class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5"
              >
                <label
                  for="first_name"
                  class="block font-bold text-gray-700 sm:mt-px sm:pt-2"
                >
                  Noritz Distributor
                </label>
                <div class="mt-1 sm:mt-0 sm:col-span-2">
                  <input
                    type="text"
                    name="noritz_distributor"
                    v-model="form.noritz_distributor"
                    class="max-w-lg block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:max-w-xs sm:text-sm border-gray-300 rounded-md"
                  />
                </div>
              </div>
            </div>

            <div class="space-y-6 sm:space-y-5">
              <div
                class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5"
              >
                <label
                  for="first_name"
                  class="block font-bold text-gray-700 sm:mt-px sm:pt-2"
                >
                  Contact Name
                </label>
                <div class="mt-1 sm:mt-0 sm:col-span-2">
                  <input
                    type="text"
                    name="contact_name"
                    v-model="form.contact_name"
                    class="max-w-lg block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:max-w-xs sm:text-sm border-gray-300 rounded-md"
                  />
                </div>
              </div>
            </div>

            <div class="space-y-6 sm:space-y-5">
              <div
                class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5"
              >
                <label
                  for="first_name"
                  class="block font-bold text-gray-700 sm:mt-px sm:pt-2"
                >
                  Street Address
                </label>
                <div class="mt-1 sm:mt-0 sm:col-span-2">
                  <textarea
                    name="distributor_address.street_address"
                    v-model="form.distributor_address.street_address"
                    rows="3"
                    class="max-w-lg shadow-sm block w-full focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border-gray-300 rounded-md"
                  ></textarea>
                </div>
              </div>
            </div>

            <div class="space-y-6 sm:space-y-5">
              <div
                class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5"
              >
                <label
                  for="first_name"
                  class="block font-bold text-gray-700 sm:mt-px sm:pt-2"
                >
                  City
                </label>
                <div class="mt-1 sm:mt-0 sm:col-span-2">
                  <input
                    type="text"
                    name="distributor_address.city"
                    v-model="form.distributor_address.city"
                    autocomplete="given-name"
                    class="max-w-lg block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:max-w-xs sm:text-sm border-gray-300 rounded-md"
                  />
                </div>
              </div>
            </div>

            <div class="space-y-6 sm:space-y-5">
              <div
                class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5"
              >
                <label
                  for="first_name"
                  class="block font-bold text-gray-700 sm:mt-px sm:pt-2"
                >
                  State
                </label>
                <div class="mt-1 sm:mt-0 sm:col-span-2">
                  <select
                    name="distributor_address.state"
                    v-model="form.distributor_address.state"
                    class="max-w-lg block focus:ring-indigo-500 focus:border-indigo-500 w-full shadow-sm sm:max-w-xs sm:text-sm border-gray-300 rounded-md"
                  >
                    <option value="">Select State</option>
                    <option v-for="state in usStateEnums" :value="state">
                      {{ state }}
                    </option>
                  </select>
                </div>
              </div>
            </div>

            <div class="space-y-6 sm:space-y-5">
              <div
                class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5"
              >
                <label
                  for="first_name"
                  class="block font-bold text-gray-700 sm:mt-px sm:pt-2"
                >
                  Zip Code
                </label>
                <div class="mt-1 sm:mt-0 sm:col-span-2">
                  <input
                    type="number"
                    name="distributor_address.zip_code"
                    v-model="form.distributor_address.zip_code"
                    class="max-w-lg block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:max-w-xs sm:text-sm border-gray-300 rounded-md"
                  />
                </div>
              </div>
            </div>
          </div>

          <div class="pt-8 space-y-6 sm:pt-10 sm:space-y-5">
            <div>
              <h3 class="text-lg leading-6 font-bold text-gray-900">
                Sales Information
              </h3>
              <p class="mt-1 max-w-2xl text-gray-500">
                This section is intended to collect information about sales.
              </p>
            </div>
            <div class="space-y-6 sm:space-y-5">
              <div
                class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5"
              >
                <label
                  for="first_name"
                  class="block font-bold text-gray-700 sm:mt-px sm:pt-2"
                >
                  Noritz Sales Representative
                </label>
                <div class="mt-1 sm:mt-0 sm:col-span-2">
                  <input
                    type="text"
                    name="noritz_sales_representative"
                    v-model="form.noritz_sales_representative"
                    class="max-w-lg block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:max-w-xs sm:text-sm border-gray-300 rounded-md"
                  />
                </div>
              </div>

              <div
                class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5"
              >
                <label
                  for="first_name"
                  class="block font-bold text-gray-700 sm:mt-px sm:pt-2"
                >
                  Installing Company
                </label>
                <div class="mt-1 sm:mt-0 sm:col-span-2">
                  <input
                    type="text"
                    name="installing_company"
                    v-model="form.installing_company"
                    class="max-w-lg block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:max-w-xs sm:text-sm border-gray-300 rounded-md"
                  />
                </div>
              </div>

              <div
                class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5"
              >
                <label
                  for="first_name"
                  class="block font-bold text-gray-700 sm:mt-px sm:pt-2"
                >
                  Installer Contact
                </label>
                <div class="mt-1 sm:mt-0 sm:col-span-2">
                  <input
                    type="text"
                    name="installer_contact"
                    v-model="form.installer_contact"
                    class="max-w-lg block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:max-w-xs sm:text-sm border-gray-300 rounded-md"
                  />
                </div>
              </div>

              <div
                class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5"
              >
                <label
                  for="first_name"
                  class="block font-bold text-gray-700 sm:mt-px sm:pt-2"
                >
                  Installer Phone Number
                </label>
                <div class="mt-1 sm:mt-0 sm:col-span-2">
                  <input
                    type="text"
                    name="installer_phone_number"
                    v-model="form.installer_phone_number"
                    placeholder="(xxx) xxx - xxxx"
                    class="max-w-lg block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:max-w-xs sm:text-sm border-gray-300 rounded-md"
                  />
                </div>
              </div>

              <div
                class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5"
              >
                <label
                  for="first_name"
                  class="block font-bold text-gray-700 sm:mt-px sm:pt-2"
                >
                  Noritz Engineer
                </label>
                <div class="mt-1 sm:mt-0 sm:col-span-2">
                  <input
                    type="text"
                    name="noritz_engineer"
                    v-model="form.noritz_engineer"
                    class="max-w-lg block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:max-w-xs sm:text-sm border-gray-300 rounded-md"
                  />
                </div>
              </div>

              <div
                class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5"
              >
                <label
                  for="first_name"
                  class="block font-bold text-gray-700 sm:mt-px sm:pt-2"
                >
                  Street Address
                </label>
                <div class="mt-1 sm:mt-0 sm:col-span-2">
                  <input
                    type="text"
                    name="installer_address.street_address"
                    v-model="form.installer_address.street_address"
                    class="max-w-lg block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:max-w-xs sm:text-sm border-gray-300 rounded-md"
                  />
                </div>
              </div>

              <div
                class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5"
              >
                <label
                  for="first_name"
                  class="block font-bold text-gray-700 sm:mt-px sm:pt-2"
                >
                  City
                </label>
                <div class="mt-1 sm:mt-0 sm:col-span-2">
                  <input
                    type="text"
                    name="installer_address"
                    v-model="form.installer_address.city"
                    class="max-w-lg block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:max-w-xs sm:text-sm border-gray-300 rounded-md"
                  />
                </div>
              </div>

              <div class="space-y-6 sm:space-y-5">
                <div
                  class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5"
                >
                  <label
                    for="first_name"
                    class="block font-bold text-gray-700 sm:mt-px sm:pt-2"
                  >
                    State
                  </label>
                  <div class="mt-1 sm:mt-0 sm:col-span-2">
                    <select
                      name="installer_address.state"
                      v-model="form.installer_address.state"
                      class="max-w-lg block focus:ring-indigo-500 focus:border-indigo-500 w-full shadow-sm sm:max-w-xs sm:text-sm border-gray-300 rounded-md"
                    >
                      <option value="">Select State</option>
                      <option v-for="state in usStateEnums" :value="state">
                        {{ state }}
                      </option>
                    </select>
                  </div>
                </div>
              </div>

              <div
                class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5"
              >
                <label
                  for="first_name"
                  class="block font-bold text-gray-700 sm:mt-px sm:pt-2"
                >
                  Zip Code
                </label>
                <div class="mt-1 sm:mt-0 sm:col-span-2">
                  <input
                    type="text"
                    name="installer_address"
                    v-model="form.installer_address.zip_code"
                    class="max-w-lg block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:max-w-xs sm:text-sm border-gray-300 rounded-md"
                  />
                </div>
              </div>
            </div>
          </div>

          <div class="pt-8 space-y-6 sm:pt-10 sm:space-y-5">
            <div>
              <h3 class="text-lg leading-6 font-bold text-gray-900">
                Installation Information
              </h3>
              <p class="mt-1 max-w-2xl text-gray-500">
                This section is intended to collect information about
                installation.
              </p>
            </div>
            <div class="space-y-6 sm:space-y-5">
              <div
                class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5"
              >
                <label
                  for="first_name"
                  class="block font-bold text-gray-700 sm:mt-px sm:pt-2"
                >
                  Owner Name
                </label>
                <div class="mt-1 sm:mt-0 sm:col-span-2">
                  <input
                    type="text"
                    name="owner_name"
                    v-model="form.owner_name"
                    class="max-w-lg block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:max-w-xs sm:text-sm border-gray-300 rounded-md"
                  />
                </div>
              </div>
            </div>

            <div class="space-y-6 sm:space-y-5">
              <div
                class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5"
              >
                <label
                  for="first_name"
                  class="block font-bold text-gray-700 sm:mt-px sm:pt-2"
                >
                  Owner Phone Number
                </label>
                <div class="mt-1 sm:mt-0 sm:col-span-2">
                  <input
                    type="text"
                    name="owner_phone_number"
                    v-model="form.owner_phone_number"
                    placeholder="(xxx) xxx - xxxx"
                    class="max-w-lg block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:max-w-xs sm:text-sm border-gray-300 rounded-md"
                  />
                </div>
              </div>
            </div>

            <div class="space-y-6 sm:space-y-5">
              <div
                class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5"
              >
                <label
                  for="first_name"
                  class="block font-bold text-gray-700 sm:mt-px sm:pt-2"
                >
                  Street Address
                </label>
                <div class="mt-1 sm:mt-0 sm:col-span-2">
                  <input
                    type="text"
                    name="installation_address.street_address"
                    v-model="form.installation_address.street_address"
                    class="max-w-lg block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:max-w-xs sm:text-sm border-gray-300 rounded-md"
                  />
                </div>
              </div>
            </div>

            <div
              class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5"
            >
              <label
                for="first_name"
                class="block font-bold text-gray-700 sm:mt-px sm:pt-2"
              >
                City
              </label>
              <div class="mt-1 sm:mt-0 sm:col-span-2">
                <input
                  type="text"
                  name="installer_address"
                  v-model="form.installation_address.city"
                  class="max-w-lg block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:max-w-xs sm:text-sm border-gray-300 rounded-md"
                />
              </div>
            </div>

            <div class="space-y-6 sm:space-y-5">
              <div
                class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5"
              >
                <label
                  for="first_name"
                  class="block font-bold text-gray-700 sm:mt-px sm:pt-2"
                >
                  State
                </label>
                <div class="mt-1 sm:mt-0 sm:col-span-2">
                  <select
                    name="installation_address.state"
                    v-model="form.installation_address.state"
                    class="max-w-lg block focus:ring-indigo-500 focus:border-indigo-500 w-full shadow-sm sm:max-w-xs sm:text-sm border-gray-300 rounded-md"
                  >
                    <option value="">Select State</option>
                    <option v-for="state in usStateEnums" :value="state">
                      {{ state }}
                    </option>
                  </select>
                </div>
              </div>
            </div>

            <div class="space-y-6 sm:space-y-5">
              <div
                class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5"
              >
                <label
                  for="first_name"
                  class="block font-bold text-gray-700 sm:mt-px sm:pt-2"
                >
                  Zip Code
                </label>
                <div class="mt-1 sm:mt-0 sm:col-span-2">
                  <input
                    type="text"
                    name="installer_address"
                    v-model="form.installation_address.zip_code"
                    class="max-w-lg block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:max-w-xs sm:text-sm border-gray-300 rounded-md"
                  />
                </div>
              </div>
            </div>

            <div class="space-y-6 sm:space-y-5">
              <div
                class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5"
              >
                <label
                  for="first_name"
                  class="block font-bold text-gray-700 sm:mt-px sm:pt-2"
                >
                  Return Shipping Street Address
                </label>
                <div class="mt-1 sm:mt-0 sm:col-span-2">
                  <input
                    type="text"
                    name="return_shipping_address"
                    v-model="form.return_shipping_address.street_address"
                    class="max-w-lg block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:max-w-xs sm:text-sm border-gray-300 rounded-md"
                  />
                </div>
              </div>
            </div>

            <div
              class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5"
            >
              <label
                for="first_name"
                class="block font-bold text-gray-700 sm:mt-px sm:pt-2"
              >
                City
              </label>
              <div class="mt-1 sm:mt-0 sm:col-span-2">
                <input
                  type="text"
                  name="return_shipping_address"
                  v-model="form.return_shipping_address.city"
                  class="max-w-lg block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:max-w-xs sm:text-sm border-gray-300 rounded-md"
                />
              </div>
            </div>

            <div class="space-y-6 sm:space-y-5">
              <div
                class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5"
              >
                <label
                  for="first_name"
                  class="block font-bold text-gray-700 sm:mt-px sm:pt-2"
                >
                  State
                </label>
                <div class="mt-1 sm:mt-0 sm:col-span-2">
                  <select
                    name="return_shipping_address.state"
                    v-model="form.return_shipping_address.state"
                    class="max-w-lg block focus:ring-indigo-500 focus:border-indigo-500 w-full shadow-sm sm:max-w-xs sm:text-sm border-gray-300 rounded-md"
                  >
                    <option value="">Select State</option>
                    <option v-for="state in usStateEnums" :value="state">
                      {{ state }}
                    </option>
                  </select>
                </div>
              </div>
            </div>

            <div class="space-y-6 sm:space-y-5">
              <div
                class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5"
              >
                <label
                  for="first_name"
                  class="block font-bold text-gray-700 sm:mt-px sm:pt-2"
                >
                  Zip Code
                </label>
                <div class="mt-1 sm:mt-0 sm:col-span-2">
                  <input
                    type="text"
                    name="return_shipping_address"
                    v-model="form.return_shipping_address.zip_code"
                    class="max-w-lg block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:max-w-xs sm:text-sm border-gray-300 rounded-md"
                  />
                </div>
              </div>
            </div>
          </div>

          <div class="pt-8 space-y-6 sm:pt-10 sm:space-y-5">
            <div>
              <h3 class="text-lg leading-6 font-bold text-gray-900">
                Product Information
              </h3>
              <p class="mt-1 max-w-2xl text-gray-500">
                This section is intended to collect information about the
                installed product.
              </p>
            </div>

            <div
              class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5"
            >
              <label
                for="first_name"
                class="block font-bold text-gray-700 sm:mt-px sm:pt-2"
              >
                Model Number
              </label>
              <div class="mt-1 sm:mt-0 sm:col-span-2">
                <input
                  type="text"
                  name="model_number"
                  v-model="form.model_number"
                  class="max-w-lg block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:max-w-xs sm:text-sm border-gray-300 rounded-md"
                />
              </div>
            </div>

            <div class="space-y-6 sm:space-y-5">
              <div
                class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5"
              >
                <label
                  for="first_name"
                  class="block font-bold text-gray-700 sm:mt-px sm:pt-2"
                >
                  Gas Type
                </label>
                <div class="mt-1 sm:mt-0 sm:col-span-2">
                  <select
                    name="gas_type"
                    v-model="form.gas_type"
                    class="max-w-lg block focus:ring-indigo-500 focus:border-indigo-500 w-full shadow-sm sm:max-w-xs sm:text-sm border-gray-300 rounded-md"
                  >
                    <option value="">Select Gas Type</option>
                    <option v-for="(gas_type, index) in GasType" :value="index">
                      {{ gas_type }}
                    </option>
                  </select>
                </div>
              </div>
            </div>

            <div
              class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5"
            >
              <label
                for="first_name"
                class="block font-bold text-gray-700 sm:mt-px sm:pt-2"
              >
                Serial Number
              </label>
              <div class="mt-1 sm:mt-0 sm:col-span-2">
                <input
                  type="text"
                  name="serial_number"
                  v-model="form.serial_number"
                  placeholder="xxxx.xx-xxxxxx"
                  class="max-w-lg block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:max-w-xs sm:text-sm border-gray-300 rounded-md"
                />
              </div>
            </div>

            <div class="space-y-6 sm:space-y-5">
              <div
                class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5"
              >
                <label
                  for="first_name"
                  class="block font-bold text-gray-700 sm:mt-px sm:pt-2"
                >
                  Application Type
                </label>
                <div class="mt-1 sm:mt-0 sm:col-span-2">
                  <select
                    name="application_type"
                    v-model="form.application_type"
                    class="max-w-lg block focus:ring-indigo-500 focus:border-indigo-500 w-full shadow-sm sm:max-w-xs sm:text-sm border-gray-300 rounded-md"
                  >
                    <option value="">Select Application Type</option>
                    <option
                      v-for="(vals, index) in ApplicationType"
                      :value="index"
                    >
                      {{ vals }}
                    </option>
                  </select>
                </div>
              </div>
            </div>

            <div class="space-y-6 sm:space-y-5">
              <div
                class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5"
              >
                <label
                  for="first_name"
                  class="block font-bold text-gray-700 sm:mt-px sm:pt-2"
                >
                  Recirculation Pump
                </label>
                <div class="mt-1 sm:mt-0 sm:col-span-2">
                  <select
                    name="recirculation_pump"
                    v-model="form.recirculation_pump"
                    class="max-w-lg block focus:ring-indigo-500 focus:border-indigo-500 w-full shadow-sm sm:max-w-xs sm:text-sm border-gray-300 rounded-md"
                  >
                    <option value="">Select Recirculation Pump</option>
                    <option v-for="(vals, index) in YesNo" :value="index">
                      {{ vals }}
                    </option>
                  </select>
                </div>
              </div>
            </div>
          </div>

          <div class="pt-8 space-y-6 sm:pt-10 sm:space-y-5">
            <div>
              <h3 class="text-lg leading-6 font-bold text-gray-900">
                Return Material Authorization Details
              </h3>
              <p class="mt-1 max-w-2xl text-gray-500">
                Please specify as much information as possible.
              </p>
            </div>

            <div
              class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5"
            >
              <label
                for="first_name"
                class="block font-bold text-gray-700 sm:mt-px sm:pt-2"
              >
                Reason For Return
              </label>
              <div class="mt-1 sm:mt-0 sm:col-span-2">
                <textarea
                  name="reason_for_return"
                  v-model="form.reason_for_return"
                  class="max-w-lg block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:max-w-xs sm:text-sm border-gray-300 rounded-md"
                ></textarea>
              </div>
            </div>
            <div class="pt-6 sm:pt-5 sm:items-center sm:border-t sm:border-gray-200">
              <div role="group" aria-labelledby="label-email">
                <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-baseline">
                  <div>
                    <div class="block font-bold text-gray-700 sm:mt-px sm:pt-2">
                      Describe Your Issue
                    </div>
                  </div>
                  <div class="mt-4 sm:mt-0 sm:col-span-2">
                    <div class="max-w-lg space-y-4">
                      <div class="relative flex items-center">
                        <div class="flex items-center h-5">
                          <input
                            name="return_box"
                            v-model="form.return_box"
                            value="1"
                            type="checkbox"
                            class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded"
                          />
                        </div>
                        <div class="ml-3">
                          <label class="block font-bold text-gray-600">
                            Return Box
                          </label>
                        </div>
                      </div>
                      <div class="relative flex items-center">
                        <div class="flex items-center h-5">
                          <input
                            name="return_remote_controller"
                            value="1"
                            v-model="form.return_remote_controller"
                            type="checkbox"
                            class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded"
                          />
                        </div>
                        <div class="ml-3">
                          <label class="block font-bold text-gray-600">
                            Return Remote Controller
                          </label>
                        </div>
                      </div>
                      <div class="relative flex items-center">
                        <div class="flex items-center h-5">
                          <input
                            name="return_remote_cord"
                            v-model="form.return_remote_cord"
                            value="1"
                            type="checkbox"
                            class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded"
                          />
                        </div>
                        <div class="ml-3">
                          <label class="block font-bold text-gray-600">
                            Return Remote Cord
                          </label>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div
              class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5"
            >
              <label
                for="first_name"
                class="block font-bold text-gray-700 sm:mt-px sm:pt-2"
              >
                Other
              </label>
              <div class="mt-1 sm:mt-0 sm:col-span-2">
                <textarea
                  name="other"
                  id=""
                  v-model="form.other"
                  class="max-w-lg block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:max-w-xs sm:text-sm border-gray-300 rounded-md"
                ></textarea>
              </div>
            </div>

            <div
              class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5"
            >
              <label
                for="first_name"
                class="block font-bold text-gray-700 sm:mt-px sm:pt-2"
              >
                Pre-Approve the Total amount for Repair
              </label>
              <div class="mt-1 sm:mt-0 sm:col-span-2">
                <select
                  name="preapprove_the_total_amount_for_repair"
                  v-model="form.preapprove_the_total_amount_for_repair"
                  class="max-w-lg block focus:ring-indigo-500 focus:border-indigo-500 w-full shadow-sm sm:max-w-xs sm:text-sm border-gray-300 rounded-md"
                >
                  <option value="">
                    Select Pre-Approve the Total amount for Repair
                  </option>
                  <option
                    v-for="(vals, index) in PreApproveRepairTotals"
                    :value="index"
                  >
                    {{ vals }}
                  </option>
                </select>
              </div>
            </div>

            <div class="pt-6 sm:pt-5 sm:items-center sm:border-t sm:border-gray-200">
              <div role="group" aria-labelledby="label-email">
                <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-baseline">
                  <div>
                    <div class="block font-bold text-gray-700 sm:mt-px sm:pt-2">
                      Describe Your Issue
                    </div>
                  </div>
                  <div class="mt-4 sm:mt-0 sm:col-span-2">
                    <div class="max-w-lg space-y-4">
                      <div class="relative flex items-center">
                        <div class="flex items-center h-5">
                          <input
                            name="box_purchase_distributors_only"
                            value="1"
                            v-model="form.box_purchase_distributors_only"
                            type="checkbox"
                            class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded"
                          />
                        </div>
                        <div class="ml-3">
                          <label class="block font-bold text-gray-600">
                            Box Purchase (Distributors Only)
                          </label>
                        </div>
                      </div>
                      <div class="relative flex items-center">
                        <div class="flex items-center h-5">
                          <input
                            type="checkbox"
                            name="remote_controller_purchase_distributors_only"
                            v-model="form.remote_controller_purchase_distributors_only"
                            value="1"
                            class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded"
                          />
                        </div>
                        <div class="ml-3">
                          <label class="block font-bold text-gray-600">
                            Remote Controller Purchase (Distributors Only)
                          </label>
                        </div>
                      </div>
                      <div class="relative flex items-center">
                        <div class="flex items-center h-5">
                          <input
                            type="checkbox"
                            name="remote_cord_purchase_distributors_only"
                            v-model="form.remote_cord_purchase_distributors_only"
                            value="1"
                            class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded"
                          />
                        </div>
                        <div class="ml-3">
                          <label class="block font-bold text-gray-600">
                            Remote Cord Purchase (Distributors Only)
                          </label>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div
              class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5"
            >
              <label
                for="first_name"
                class="block font-bold text-gray-700 sm:mt-px sm:pt-2"
              >
                Initials
              </label>
              <div class="mt-1 sm:mt-0 sm:col-span-2">
                <textarea
                  name="initials"
                  v-model="form.initials"
                  class="max-w-lg block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:max-w-xs sm:text-sm border-gray-300 rounded-md"
                ></textarea>
              </div>
            </div>
          </div>

          <div class="pt-6 sm:pt-5 sm:items-center sm:border-t sm:border-gray-200">
            <div role="group" aria-labelledby="label-email">
              <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-baseline">
                <div>
                  <div class="block font-bold text-gray-700 sm:mt-px sm:pt-2">
                    Acceptance and Terms *
                  </div>
                </div>
                <div class="mt-4 sm:mt-0 sm:col-span-2">
                  <div class="max-w-lg space-y-4">
                    <div class="relative flex items-center">
                      <div class="flex items-center h-5">
                        <input
                          type="checkbox"
                          name="accept_terms_and_conditions"
                          v-model="form.accept_terms_and_conditions"
                          value="1"
                          class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded"
                        />
                        <jet-input-error
                          :message="errors.accept_terms_and_conditions"
                          class="ml-3"
                        />
                      </div>
                      <div class="ml-3">
                        <label
                          for="first_name"
                          class="block font-bold text-gray-700 sm:mt-px"
                        >Accept
                          <a class="text-red-600" href="javascript:void(0)"
                             @click="is_show_term_and_condition = !is_show_term_and_condition">
                            Terms and Conditions
                          </a>
                        </label>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="pt-5 space-y-6 sm:space-y-5">
            <div
              class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start"
            >
              <label
                for="first_name"
                class="block font-bold text-gray-700 sm:mt-px sm:pt-2"
              >
                Name
              </label>
              <div class="mt-1 sm:mt-0 sm:col-span-2">
                <input
                  type="text"
                  name="name" v-model="form.name"
                  class="max-w-lg block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:max-w-xs sm:text-sm border-gray-300 rounded-md"
                />
              </div>
            </div>

            <div
              class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5"
            >
              <label
                for="first_name"
                class="block font-bold text-gray-700 sm:mt-px sm:pt-2"
              >
                Email *
              </label>
              <div class="mt-1 sm:mt-0 sm:col-span-2">
                <input
                  type="text"
                  name="email" v-model="form.email"
                  class="max-w-lg block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:max-w-xs sm:text-sm border-gray-300 rounded-md"
                />
                <jet-input-error :message="errors.email" class="mt-2"/>
              </div>
            </div>

            <div
              class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5"
            >
              <label
                for="first_name"
                class="block font-bold text-gray-700 sm:mt-px sm:pt-2"
              >
                Fax Number
              </label>
              <div class="mt-1 sm:mt-0 sm:col-span-2">
                <input
                  type="text"
                  name="fax_number" v-model="form.fax_number"
                  class="max-w-lg block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:max-w-xs sm:text-sm border-gray-300 rounded-md"
                />
              </div>
            </div>


          </div>
        </div>

        <div class="pt-5 sm:border-t sm:border-gray-200 mt-5 mb-10">
          <div class="flex justify-end">

            <button
              type="btn"
              @click="createRmaForm"
              class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm font-bold rounded-md text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500"
            >
              Save
            </button>
          </div>
        </div>
      </template>

    </jet-form-section>

    <!-- This example requires Tailwind CSS v2.0+ -->
    <div
      v-if="is_show_term_and_condition"
      class="fixed z-10 inset-0 overflow-y-auto"
    >
      <div
        class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0"
      >
        <div class="fixed inset-0 transition-opacity" aria-hidden="true">
          <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>
        <div
          class="inline-block align-bottom bg-white rounded-lg px-4 pt-5 pb-4 text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle w-full sm:max-w-3xl sm:p-6"
          role="dialog"
          aria-modal="true"
          aria-labelledby="modal-headline"
        >
          <div>
            <span
              @click="is_show_term_and_condition = !is_show_term_and_condition"
              class="w-6 h-auto absolute right-2 top-2 cursor-pointer"
              aria-hidden="true"
            >
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
              </span
              >
            <div class="">
              <h3
                class="text-2xl leading-6 font-bold text-gray-600 mb-5 border-b pb-3"
                id="modal-headline"
              >
                Return Material Authorization (RMA) Request Form
              </h3>
              <div class="mt-2">
                <p class="text-gray-500">
                  Noritz America may service its products under conditions stipulated in applicable product warranty
                  terms and as outlined below:
                </p>
                <h4 class="text-lg leading-6 font-bold text-gray-600 mb-3 mt-5">RETURN AUTHORIZATION PROCESS</h4>
                <ul class="list-disc text-gray-500 list-outside pl-5 space-y-3">
                  <li>RMA Request Form must be filled out completely and submitted online. Submission of RMA Request
                    Form serves as a request only and is NOT an authorization.
                  </li>
                  <li>RMA Request Form processing may take up to 10 business days from the date of submission of a
                    complete RMA Request Form.
                  </li>
                  <li>Once RMA Request Form is processed and Return Authorization # is issued to the applicable
                    customer, the applicable customer may return the product.
                  </li>
                  <li>Return Authorization # issued by Noritz America must be clearly indicated on the outside of the
                    packaging.
                  </li>
                  <li>Product must be returned with a copy of Return Authorization notice issued by Noritz America and
                    the packing slip.
                  </li>
                  <li>Any product returned without a Return Authorization # and proper documentation will be rejected
                    and returned to the applicable customer.
                  </li>
                  <li>Applicable customer is responsible for shipping fees associated with returning the product. Noritz
                    America recommends customers to obtain shipping insurance as Noritz America takes no responsibility
                    whatsoever for damages occurring during transit.
                  </li>
                </ul>
                <h4 class="text-lg leading-6 font-bold text-gray-600 mb-3 mt-5">CONDITIONS</h4>
                <p class="text-gray-500">Noritz America will not accept for credit any water heater or accessory which
                  has been installed and put into service. Noritz America strongly recommends that all troubleshooting
                  be coordinated through the Noritz America Technical Service Department (866-766-7489, option 1). After
                  proper investigation, Noritz America will provide either a replacement part(s) or a replacement unit
                  based on the warranty status. Under no circumstances will Noritz America issue credit for units
                  removed from the installation location without prior authorization.</p>
                <ul class="list-disc text-gray-500 list-outside pl-5 space-y-3 my-5">
                  <li>All heaters must be returned to California for repairs.</li>
                  <li>Upon receipt of the product, Noritz America will inspect and determine the necessary repairs.
                    Repairs under warranty will be performed in accordance with the warranty. Repairs deemed
                    non-warranty will be charged to the customer including parts, labor and shipping fee. Non-warranty
                    repairs are subject to a minimum service fee of $60.
                  </li>
                  <li>Noritz America will request authorization from the customer before completing non-warranty repairs
                    in excess of the minimum service fee or the customer pre-approved amount.
                  </li>
                  <li>In case the customer provides no instructions or response to Noritz America’s request on handling
                    of the service and if the product is left in Noritz America’s possession for more than 5 business
                    days, such products may be either returned to the customer at the customer’s expense or disposed of
                    at Noritz America’s discretion.
                  </li>
                  <li>Upon completion of the repair, the product will be returned to the customer. Shipping costs for
                    non-warranty repairs will be charged to the customer.
                  </li>
                </ul>
                <p class="text-gray-500">*Before removing water heater from its installed location, Noritz America
                  strongly recommends troubleshooting with the Noritz America Technical Service Department at (866)
                  766-7489.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import Label from "@/Jetstream/Label";
import JetFormSection from "@/JetstreamCustom/FormSection";
import JetInputError from "@/Jetstream/InputError";
import JetActionMessage from "@/Jetstream/ActionMessage";
import JetButton from "@/Jetstream/Button";
import JetResponsiveNavLink from "@/Jetstream/ResponsiveNavLink";

// import moment from 'moment'
// import Datepicker from 'vuejs-datepicker';

export default {
  props: [
    "errors",
    "ChargeParty",
    "GasType",
    "ApplicationType",
    "YesNo",
    "PreApproveRepairTotals",
    "ResponsiveNavLink",
    "usStateEnums",
  ],

  components: {
    Label,
    JetFormSection,
    JetInputError,
    JetActionMessage,
    JetButton
  },

  data() {
    return {
      form: this.$inertia.form(
        {
          party_requesting_the_rma_and_responsible_for_charges: "",
          noritz_distributor: "",
          contact_name: "",
          distributor_address: {
            street_address: "",
            city: "",
            state: "",
            zip_code: "",
          },
          phone_number: "",
          noritz_sales_representative: "",
          installing_company: "",
          installer_contact: "",
          installer_phone_number: "",
          noritz_engineer: "",
          installer_address: {
            street_address: "",
            city: "",
            state: "",
            zip_code: "",
          },
          owner_name: "",
          owner_phone_number: "",
          installation_address: {
            street_address: "",
            city: "",
            state: "",
            zip_code: "",
          },
          return_shipping_address: {
            street_address: "",
            city: "",
            state: "",
            zip_code: "",
          },
          model_number: "",
          gas_type: "",
          serial_number: "",
          application_type: "",
          recirculation_pump: "",
          reason_for_return: "",
          return_box: 0,
          return_remote_controller: 0,
          return_remote_cord: 0,
          other: "",
          preapprove_the_total_amount_for_repair: "",
          box_purchase_distributors_only: 0,
          remote_controller_purchase_distributors_only: 0,
          remote_cord_purchase_distributors_only: 0,
          initials: "",
          accept_terms_and_conditions: null,
          name: "",
          email: "",
          fax_number: "",
        },
        {
          bag: "createRmaForm",
          resetOnSuccess: false,
        }
      ),
      is_show_term_and_condition: 0,
    };
  },
  mounted() {
    setTimeout(function () {
      let h = document.getElementById('primaryContainer').offsetHeight;
      const message = {
        frameHeight: h
      };
      window.parent.postMessage(message, '*');
    }, 1000);
  },
  methods: {
    createRmaForm() {
      this.form.post(route("claim-form.save-rma-form"), {
        preserveScroll: true,
      });
    },
  },
};
</script>
<style scoped>
[type="checkbox"],
[type="radio"] {
  color: #dc2626;
}

[type="checkbox"]:focus,
[type="radio"]:focus {
  --tw-ring-color: #dc2626;
}

textarea {
  height: 120px;
}

[type="text"]:focus,
[type="email"]:focus,
[type="url"]:focus,
[type="password"]:focus,
[type="number"]:focus,
[type="date"]:focus,
[type="datetime-local"]:focus,
[type="month"]:focus,
[type="search"]:focus,
[type="tel"]:focus,
[type="time"]:focus,
[type="week"]:focus,
[multiple]:focus,
textarea:focus,
select:focus {
  --tw-ring-color: #dc2626;
  border-color: #dc2626;
}
</style>
