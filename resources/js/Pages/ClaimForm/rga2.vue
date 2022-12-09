<template>
  <div id="primaryContainer">
    <jet-form-section @submitted="createRGA2Form">
      <template #form>
        <h1 class="text-red-600 md:text-3xl text-xl font-bold mb-4">
          Damage/Defective/Misshipment Claim Request Form
        </h1>
        <div v-if="is_susscess">
          Thank you for submitting your request.Your Claim # is C144499. Upon
          approval, a Noritz RET# will be emailed to you to authorize return.
        </div>

        <div class="md:pt-8 pt-4 space-y-8 divide-y divide-gray-200 sm:space-y-5">
          <div>
            <div>
              <h3 class="text-lg leading-6 font-bold text-gray-900">
                Information
              </h3>
              <p class="mt-1 max-w-2xl text-gray-500"></p>
            </div>
            <div class="space-y-6 sm:space-y-5">
              <div
                class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5"
              >
                <label class="block font-bold text-gray-700 sm:mt-px sm:pt-2">
                  Date
                </label>
                <div class="mt-1 sm:mt-0 sm:col-span-2">
                  <input
                    type="date"
                    name="date"
                    v-model="form.date"
                    class="max-w-lg block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:max-w-xs sm:text-sm border-gray-300 rounded-md"
                  />
                </div>
              </div>

              <div
                class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5"
              >
                <label class="block font-bold text-gray-700 sm:mt-px sm:pt-2">
                  Company/Customer Name
                </label>
                <div class="mt-1 sm:mt-0 sm:col-span-2">
                  <input
                    type="text"
                    name="companycustomer_name"
                    v-model="form.companycustomer_name"
                    class="max-w-lg block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:max-w-xs sm:text-sm border-gray-300 rounded-md"
                  />
                </div>
              </div>

              <div
                class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5"
              >
                <label class="block font-bold text-gray-700 sm:mt-px sm:pt-2">
                  Contact Person
                </label>
                <div class="mt-1 sm:mt-0 sm:col-span-2">
                  <input
                    type="text"
                    name="contact_person"
                    v-model="form.contact_person"
                    class="max-w-lg block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:max-w-xs sm:text-sm border-gray-300 rounded-md"
                  />
                </div>
              </div>

              <div
                class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5"
              >
                <label class="block font-bold text-gray-700 sm:mt-px sm:pt-2">
                  Email *
                </label>
                <div class="mt-1 sm:mt-0 sm:col-span-2">
                  <input
                    type="text"
                    name="email"
                    v-model="form.email"
                    class="max-w-lg block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:max-w-xs sm:text-sm border-gray-300 rounded-md"
                  />
                  <jet-input-error :message="errors.email" class="mt-2"/>
                </div>
              </div>

              <div
                class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5"
              >
                <label class="block font-bold text-gray-700 sm:mt-px sm:pt-2">
                  Email (Confirm) *
                </label>
                <div class="mt-1 sm:mt-0 sm:col-span-2">
                  <input
                    type="text"
                    name="email_confirm"
                    v-model="form.email_confirm"
                    class="max-w-lg block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:max-w-xs sm:text-sm border-gray-300 rounded-md"
                  />
                </div>
              </div>

              <div
                class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5"
              >
                <label class="block font-bold text-gray-700 sm:mt-px sm:pt-2">
                  Phone
                </label>
                <div class="mt-1 sm:mt-0 sm:col-span-2">
                  <input
                    type="text"
                    name="phone"
                    v-model="form.phone"
                    placeholder="(xxx) xxx - xxxx"
                    class="max-w-lg block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:max-w-xs sm:text-sm border-gray-300 rounded-md"
                  />
                </div>
              </div>

              <div
                class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5"
              >
                <label class="block font-bold text-gray-700 sm:mt-px sm:pt-2">
                  Sales Order Number
                </label>
                <div class="mt-1 sm:mt-0 sm:col-span-2">
                  <input
                    type="text"
                    name="sales_order_number"
                    v-model="form.sales_order_number"
                    class="max-w-lg block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:max-w-xs sm:text-sm border-gray-300 rounded-md"
                  />
                </div>
              </div>

              <div
                class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5"
              >
                <label class="block font-bold text-gray-700 sm:mt-px sm:pt-2">
                  PO Number
                </label>
                <div class="mt-1 sm:mt-0 sm:col-span-2">
                  <input
                    type="text"
                    name="po_number"
                    v-model="form.po_number"
                    class="max-w-lg block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:max-w-xs sm:text-sm border-gray-300 rounded-md"
                  />
                </div>
              </div>

              <div
                class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5"
              >
                <label class="block font-bold text-gray-700 sm:mt-px sm:pt-2">
                  Customer Reference Number
                </label>
                <div class="mt-1 sm:mt-0 sm:col-span-2">
                  <input
                    type="text"
                    name="customer_reference_number"
                    v-model="form.customer_reference_number"
                    class="max-w-lg block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:max-w-xs sm:text-sm border-gray-300 rounded-md"
                  />
                </div>
              </div>
            </div>
          </div>

          <div class="pt-8 space-y-6 sm:pt-10 sm:space-y-5">
            <div>
              <h3 class="text-lg leading-6 font-bold text-gray-900">
                Reason for Return
              </h3>
              <p class="mt-1 max-w-2xl text-gray-500">
                Please describe the item received.
              </p>
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
                            name="was_the_item_received_damaged"
                            value="1"
                            v-model="form.was_the_item_received_damaged"
                            type="checkbox"
                            class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded"
                          />
                        </div>
                        <div class="ml-3">
                          <label class="block font-bold text-gray-600">
                            Was the item received damaged?
                          </label>
                        </div>
                      </div>
                      <div class="relative flex items-center">
                        <div class="flex items-center h-5">
                          <input
                            name="did_you_receive_incorrect_items_andor_quantities"
                            value="1"
                            v-model="form.did_you_receive_incorrect_items_andor_quantities"
                            type="checkbox"
                            class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded"
                          />
                        </div>
                        <div class="ml-3">
                          <label class="block font-bold text-gray-600">
                            Did you receive incorrect items and/or quantities?
                          </label>
                        </div>
                      </div>
                      <div class="relative flex items-center">
                        <div class="flex items-center h-5">
                          <input
                            name="is_the_item_defective"
                            value="1"
                            v-model="form.is_the_item_defective"
                            type="checkbox"
                            class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded"
                          />
                        </div>
                        <div class="ml-3">
                          <label class="block font-bold text-gray-600">
                            Is the item defective?
                          </label>
                        </div>
                      </div>
                      <div class="relative flex items-center">
                        <div class="flex items-center h-5">
                          <input
                            name="is_this_new_unused_and_needs_to_be_returned"
                            value="1"
                            v-model="form.is_this_new_unused_and_needs_to_be_returned"
                            type="checkbox"
                            class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded"
                          />
                        </div>
                        <div class="ml-3">
                          <label class="block font-bold text-gray-600">
                            Is this new, unused and needs to be returned?
                          </label>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>


          <div class="pt-8 space-y-6 sm:pt-10 sm:space-y-5">
            <div>
              <h3 class="text-lg leading-6 font-bold text-gray-900">
                Depending claim, on type of please check the appropriate boxes
              </h3>
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
                            name="was_the_packaging_damaged"
                            value="1"
                            v-model="form.was_the_packaging_damaged"
                            type="checkbox"
                            class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded"
                          />
                        </div>
                        <div class="ml-3">
                          <label class="block font-bold text-gray-600">
                            Was the packaging damaged?
                          </label>
                        </div>
                      </div>
                      <div class="relative flex items-center">
                        <div class="flex items-center h-5">
                          <input
                            name="was_the_carrier_notified_of_the_damage"
                            value="1"
                            v-model="form.was_the_carrier_notified_of_the_damage"
                            type="checkbox"
                            class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded"
                          />
                        </div>
                        <div class="ml-3">
                          <label class="block font-bold text-gray-600">
                            Was the carrier notified of the damage?
                          </label>
                        </div>
                      </div>
                      <div class="relative flex items-center">
                        <div class="flex items-center h-5">
                          <input
                            name="were_any_items_refused_from_the_shipment"
                            value="1"
                            v-model="form.were_any_items_refused_from_the_shipment"
                            type="checkbox"
                            class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded"
                          />
                        </div>
                        <div class="ml-3">
                          <label class="block font-bold text-gray-600">
                            Were any items refused from the shipment?
                          </label>
                        </div>
                      </div>
                      <div class="relative flex items-center">
                        <div class="flex items-center h-5">
                          <input
                            name="was_the_quantity_on_the_packing_slip_correct"
                            value="1"
                            v-model="form.was_the_quantity_on_the_packing_slip_correct"
                            type="checkbox"
                            class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded"
                          />
                        </div>
                        <div class="ml-3">
                          <label class="block font-bold text-gray-600">
                            Was the quantity on the packing slip correct?
                          </label>
                        </div>
                      </div>
                      <div class="relative flex items-center">
                        <div class="flex items-center h-5">
                          <input
                            name="did_the_received_item_match_the_packing_slip"
                            value="1"
                            v-model="form.did_the_received_item_match_the_packing_slip"
                            type="checkbox"
                            class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded"
                          />
                        </div>
                        <div class="ml-3">
                          <label class="block font-bold text-gray-600">
                            Did the received item match the packing slip?
                          </label>
                        </div>
                      </div>
                      <div class="relative flex items-center">
                        <div class="flex items-center h-5">
                          <input
                            name="is_the_item_missing_components"
                            value="1"
                            v-model="form.is_the_item_missing_components"
                            type="checkbox"
                            class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded"
                          />
                        </div>
                        <div class="ml-3">
                          <label class="block font-bold text-gray-600">
                            Is the item missing components?
                          </label>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="pt-8 space-y-6 sm:pt-10 sm:space-y-5">
            <div>
              <h3 class="text-lg leading-6 font-bold text-gray-900">
                Purchase or Return
              </h3>
            </div>
            <div class="space-y-6 sm:space-y-5">
              <div
                class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5"
              >
                <label class="block font-bold text-gray-700 sm:mt-px sm:pt-2">
                  In case of overage, would you like to purchase or return the items?
                </label>
                <div class="mt-1 sm:mt-0 sm:col-span-2">

                  <select name="purchase_overage" v-model="form.purchase_overage"
                          class="max-w-lg block focus:ring-indigo-500 focus:border-indigo-500 w-full shadow-sm sm:max-w-xs sm:text-sm border-gray-300 rounded-md">
                    <option v-for="(val, index) in PurchaseReturn" :value="index">{{ val }}</option>
                  </select>
                </div>
              </div>
            </div>
          </div>

          <div class="pt-8 space-y-6 sm:pt-10 sm:space-y-5">
            <div>
              <h3 class="text-lg leading-6 font-bold text-gray-900">
                Replacement or Credit?
              </h3>
            </div>
            <div class="space-y-6 sm:space-y-5">
              <div
                class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5"
              >
                <label class="block font-bold text-gray-700 sm:mt-px sm:pt-2">
                  In case of damage, defect, or shortage, would you like a replacement item or credit?
                </label>
                <div class="mt-1 sm:mt-0 sm:col-span-2">

                  <select name="purchase_damage" v-model="form.purchase_damage"
                          class="max-w-lg block focus:ring-indigo-500 focus:border-indigo-500 w-full shadow-sm sm:max-w-xs sm:text-sm border-gray-300 rounded-md">
                    <option v-for="(val, index) in ReplacementCredit" :value="index">{{ val }}</option>
                  </select>
                </div>
              </div>
            </div>
          </div>

          <div class="pt-8 space-y-6 sm:pt-10 sm:space-y-5">

            <div>
              <h3 class="text-lg leading-6 font-bold text-gray-900">
                Claim Photos
              </h3>
              <p class="mt-1 max-w-2xl text-gray-500">MANDATORY: Depending claim, on type of please check the
                appropriate boxes</p>
            </div>
            <div class="space-y-6 sm:space-y-5">
              <div
                class="w-full sm:border-t sm:border-gray-200 sm:pt-5"
              >
                <div class="mt-1 sm:mt-0 sm:col-span-2">
                  <table class="w-full text-left table-auto">
                    <thead>
                    <tr>
                      <th class="px-4 py-2 pl-0 text-sm md:text-base">Damaged or Defective Photos</th>
                      <th class="px-4 py-2 pr-0 text-sm md:text-base"><span @click="addPhotoItems"
                                                                            class="w-max pr-4 border border-red-600 rounded-full text-red-600 font-semibold md:px-5 md:py-2 px-3 py-1 hover:bg-red-600 hover:text-white focus:outline-none cursor-pointer whitespace-nowrap">+ Attach</span>
                      </th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="(itemPhoto, index) in itemPhotos" v-bind:key="index">
                      <td class="px-4 py-2 pl-0">
                          <input type="file" @change="changeFile(index)" :ref="'item_photo_'+index" name="claim_photos[]" class="block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border-gray-300 rounded-md"/>
                      </td>
                      <td class="px-4 py-2 pr-0">
                        <div
                          class="w-max pr-4 border border-red-600 rounded-full text-red-600 font-semibold md:px-5 md:py-2 px-3 py-1 hover:bg-red-600 hover:text-white focus:outline-none cursor-pointer whitespace-nowrap text-sm md:text-base"
                          v-if="itemPhotos.length != 1" @click="removePhotoItems(index)">Delete
                        </div>
                      </td>
                    </tr>
                    </tbody>
                  </table>

                </div>
              </div>
            </div>
          </div>


          <div class="pt-8 space-y-6 sm:pt-10 sm:space-y-5">
            <div>
              <h3 class="text-lg leading-6 font-bold text-gray-900">
                Applicable Products
              </h3>
              <p class="mt-1 max-w-2xl text-gray-500">Please tell us about the product in your Return Goods
                Authorization Request.</p>
            </div>
            <div class="space-y-6 sm:space-y-5">
              <div
                class="w-full sm:border-t sm:border-gray-200 sm:pt-5"
              >
                <div class="mt-1 sm:mt-0 sm:col-span-2 overflow-auto">
                  <table class="w-full text-left table-auto">
                    <thead>
                    <tr>
                      <th class="md:px-4 px-2 py-2 pl-0 text-sm md:text-base">Items Received</th>
                      <th class="md:px-4 px-2 py-2 text-sm md:text-base">Packing Slip Quantity</th>
                      <th class="md:px-4 px-2 py-2 text-sm md:text-base">Quantity Received</th>
                      <th class="md:px-4 px-2 py-2 text-sm md:text-base">Quantity Damaged/ Defective</th>
                      <th class="md:px-4 px-2 py-2 text-sm md:text-base">Serial Number</th>
                      <th class="md:px-4 px-2 py-2 pr-0 text-sm md:text-base"><span @click="addItems"
                                                                                    class="w-max pr-4 border border-red-600 rounded-full text-red-600 font-semibold md:px-5 md:py-2 px-3 py-1 hover:bg-red-600 hover:text-white focus:outline-none cursor-pointer whitespace-nowrap">+ Attach</span>
                      </th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="(item, index) in form.items_received" v-bind:key="index">
                      <td class="md:px-4 px-2 py-2 pl-0"><input
                        type="text"
                        name="items_received"
                        v-model="item.items_received"
                        class="max-w-lg block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border-gray-300 rounded-md"
                      /></td>
                      <td class="md:px-4 px-2 py-2"><input
                        type="number"
                        name="packing_slip_quantity"
                        v-model="item.packing_slip_quantity"
                        class="max-w-lg block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border-gray-300 rounded-md"
                      /></td>
                      <td class="md:px-4 px-2 py-2"><input
                        type="text"
                        name="quantity_received"
                        v-model="item.quantity_received"
                        class="max-w-lg block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border-gray-300 rounded-md"
                      /></td>

                      <td class="md:px-4 px-2 py-2"><input
                        type="text"
                        name="quantity_defective_or_damaged"
                        v-model="item.quantity_defective_or_damaged"
                        class="max-w-lg block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border-gray-300 rounded-md"
                      /></td>

                      <td class="md:px-4 px-2 py-2"><input
                        type="text"
                        name="serial_number"
                        v-model="item.serial_number"
                        placeholder="xxxx.xx-xxxxxx"
                        class="max-w-lg block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border-gray-300 rounded-md"
                      /></td>
                      <td class="md:px-4 px-2 py-2 pr-0"><span v-if="form.items_received.length != 1"
                                                               @click="removeItem(index)"
                                                               class="w-max pr-4 border border-red-600 rounded-full text-red-600 font-semibold md:px-5 md:py-2 px-3 py-1 hover:bg-red-600 hover:text-white focus:outline-none cursor-pointer whitespace-nowrap text-sm md:text-base">Delete</span>
                      </td>
                    </tr>
                    </tbody>
                  </table>

                </div>
              </div>
            </div>
          </div>


          <div class="pt-8 space-y-6 sm:pt-10 sm:space-y-5">
            <div>
              <h3 class="text-lg leading-6 font-bold text-gray-900">
                Problem Description
              </h3>
              <p class="mt-1 max-w-2xl text-gray-500">Please specify as much information as possible.</p>

            </div>
            <div class="space-y-6 sm:space-y-5">
              <div
                class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5"
              >
                <label class="block font-bold text-gray-700 sm:mt-px sm:pt-2">
                  Describe the issue *
                </label>
                <div class="mt-1 sm:mt-0 sm:col-span-2">

                    <textarea
                      name="describe_the_issue"
                      v-model="form.describe_the_issue"
                      class="max-w-lg block focus:ring-indigo-500 focus:border-indigo-500 w-full shadow-sm sm:max-w-xs sm:text-sm border-gray-300 rounded-md"
                    ></textarea>
                  <jet-input-error :message="errors.describe_the_issue" class="ml-2"/>
                </div>
              </div>
            </div>
          </div>


          <div class="pt-8 space-y-6 sm:pt-10 sm:space-y-5">
            <div role="group" aria-labelledby="label-email">
              <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-baseline">
                <div>
                  <div class="block font-bold text-gray-700 sm:mt-px sm:pt-2">
                    Acceptance
                  </div>
                </div>
                <div class="mt-4 sm:mt-0 sm:col-span-2">
                  <div class="max-w-lg space-y-4">
                    <div class="relative flex items-center">
                      <div class="flex items-center h-5">
                        <input
                          name="i_agree_to_the_terms_and_conditions"
                          v-model="form.i_agree_to_the_terms_and_conditions"
                          type="checkbox"
                          value="1"
                          class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded"
                        />
                        <jet-input-error :message="errors.i_agree_to_the_terms_and_conditions" class="ml-2"/>
                      </div>
                      <div class="ml-3">
                        <label
                          for="first_name"
                          class="block font-bold text-gray-700 sm:mt-px"
                        >I agree to the Accept
                          Terms and Conditions *
                        </label>
                      </div>
                    </div>
                  </div>
                </div>
              </div>


            </div>
            <div class="flex flex-wrap mb-5">
              <p>Note:</p>
              <p>*Please keep items in original packaging. Upon claim approval an RGA confirmation will be emailed to
                authorize any returns and credit will be issued when items are received by Noritz. Noritz will file
                damage claims with freight carriers. Claims must be sent within 5 days of receiving the shipment for
                visible damage, 30 days for concealed damage.*</p>
              <b>Thank you for your cooperation and we apologize for any inconvenience.</b>
            </div>
          </div>


        </div>

        <div v-if="!is_susscess" class="pt-5 sm:border-t sm:border-gray-200 mt-5 mb-10">
          <div class="flex justify-end">

            <button
              type="btn"
              :disabled="form.processing"
              class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm font-bold rounded-md text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500"
            >
              Save
            </button>
          </div>
        </div>

      </template>
    </jet-form-section>
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
                  Return Material Authorization (RMA) Request Form Noritz America may service its products under
                  conditions stipulated in applicable product warranty terms and as outlined below:
                </p>
                <h4 class="text-lg leading-6 font-bold text-gray-600 mb-3 mt-5">RETURN AUTHORIZATION PROCESS RMA</h4>
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

export default {
  props: ["errors", "ReplacementCredit", "PurchaseReturn"],

  components: {
    Label,
    JetFormSection,
    JetInputError,
    JetActionMessage,
    JetButton,
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
  data() {
    return {
      is_show_term_and_condition: 0,
      itemRefs: [],
      is_susscess: 0,
      itemPhotos: [
        {
          photo: ""
        },
      ],
      form: this.$inertia.form({
        date: "",
        companycustomer_name: "",
        contact_person: "",
        email: "",
        email_confirm: "",
        phone: "",
        sales_order_number: "",
        po_number: "",
        customer_reference_number: "",
        was_the_item_received_damaged: null,
        did_you_receive_incorrect_items_andor_quantities: null,
        is_the_item_defective: null,
        is_this_new_unused_and_needs_to_be_returned: null,
        was_the_packaging_damaged: null,
        was_the_carrier_notified_of_the_damage: null,
        were_any_items_refused_from_the_shipment: null,
        was_the_quantity_on_the_packing_slip_correct: null,
        did_the_received_item_match_the_packing_slip: null,
        is_the_item_missing_components: null,
        purchase_overage: "",
        purchase_damage: "",
        claim_photos: [
          {
            photos: "",
          },
        ],
        items_received: [
          {
            items_received: "",
            packing_slip_quantity: "",
            quantity_received: "",
            quantity_defective_or_damaged: "",
            serial_number: "",
          },
        ],
        describe_the_issue: "",
        i_agree_to_the_terms_and_conditions: null,
        photos: [],
      }),
    };
  },
  methods: {
    changeFile(indexs){
        let $vm = this;
        console.log("this.$refs.file.files[0]", indexs, this.$refs['item_photo_'+indexs].files[0]);
        Vapor.store(this.$refs.['item_photo_'+indexs].files[0], {
            visibility: 'public-read'
        }).then(response => {
            console.log("response", response);
            let key = response.key.replace("tmp/", "");
            $vm.itemPhotos[indexs].photo = key;
            axios.post('/file-upload', {
                uuid: response.uuid,
                key: response.key,
                bucket: response.bucket,
                name: this.$refs['item_photo_'+indexs].files[0].name,
                content_type: this.$refs['item_photo_'+indexs].files[0].type,
            });
            // ...
        })
    },
    createRGA2Form() {
      let _this = this;
      console.log("this.itemPhotos", this.itemPhotos);
      this.itemPhotos.forEach((value, index) => {
        if (value.photo != '') {
          _this.form.photos.push(value.photo);
        }
      });
      console.log("_this.form.photos", _this.form.photos);
      this.form.post(route("claim-form.save-rga2-form"), {
        preserveScroll: true,
        preserveState: true,
      });
    },
    addItems() {
      this.form.items_received.push({
        items_received: "",
        packing_slip_quantity: "",
        quantity_received: "",
        quantity_defective_or_damaged: "",
        serial_number: "",
      });
    },
    removeItem(index) {
      this.form.items_received.splice(index, 1);
    },
    addPhotoItems() {
      this.itemPhotos.push({
        photo: ""
      });

    },
    removePhotoItems(index) {
      console.log("index ", index);
      this.itemPhotos.splice(index, 1);
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

[type="file"] {
  -webkit-appearance: none;
  -moz-appearance: none;
  appearance: none;
  background-color: #fff;
  border-width: 1px;
  padding-top: 0.5rem;
  padding-right: 0.75rem;
  padding-bottom: 0.5rem;
  padding-left: 0.75rem;
  font-size: 1rem;
  line-height: 1.5rem;
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
