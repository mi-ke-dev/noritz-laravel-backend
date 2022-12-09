<template>
  <div id="primaryContainer">
    <jet-form-section @submitted="createRGA1Form">
      <template #form>
        <h1 class="text-red-600 md:text-3xl text-xl font-bold mb-4">
          Return Goods Authorization Request (RGA) Form
        </h1>
        <div class="flex flex-wrap mb-5">
            <p>Return Materials Authorization Request Form: TECH-RELATED only
                <br/><b>Do Not fill out this form if:</b><br/>
                <b>Product is/has been installed</b><br/>
                Product is a mis-shipment, defective or damaged</p>
          <p>
          </p>
        </div>

        <div class="pt-8 space-y-8 divide-y divide-gray-200 sm:space-y-5">
          <div>
            <div>
              <h3 class="text-lg leading-6 font-bold text-gray-900">
                Customer Information
              </h3>
              <p class="mt-1 max-w-2xl text-gray-500">
                This section is intended to collect information about the
                customer.
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
                  Company/Customer Name
                </label>
                <div class="mt-1 sm:mt-0 sm:col-span-2">
                  <input
                    type="text"
                    name="companycustomer_name"
                    v-model="form.companycustomer_name"
                    class="max-w-lg block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border-gray-300 rounded-md"
                  />
                </div>
              </div>
            </div>

            <div class="pt-8 space-y-6 sm:space-y-5">
              <div
                class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5"
              >
                <label
                  for="first_name"
                  class="block font-bold text-gray-700 sm:mt-px sm:pt-2"
                >
                  Sales Order Number
                </label>
                <div class="mt-1 sm:mt-0 sm:col-span-2">
                  <input
                    type="text"
                    name="sales_order_number"
                    v-model="form.sales_order_number"
                    class="max-w-lg block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border-gray-300 rounded-md"
                  />
                </div>
              </div>
            </div>

            <div class="pt-8 space-y-6 sm:space-y-5">
              <div
                class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5"
              >
                <label
                  for="first_name"
                  class="block font-bold text-gray-700 sm:mt-px sm:pt-2"
                >
                  Customer Reference Number
                </label>
                <div class="mt-1 sm:mt-0 sm:col-span-2">
                  <input
                    type="text"
                    name="customer_reference_number"
                    v-model="form.customer_reference_number"
                    class="max-w-lg block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border-gray-300 rounded-md"
                  />
                </div>
              </div>
            </div>

            <div class="pt-8 space-y-6 sm:space-y-5">
              <div
                class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5"
              >
                <label
                  for="first_name"
                  class="block font-bold text-gray-700 sm:mt-px sm:pt-2"
                >
                  Customer Purchase Order Number
                </label>
                <div class="mt-1 sm:mt-0 sm:col-span-2">
                  <input
                    type="text"
                    name="customer_purchase_order_number"
                    v-model="form.customer_purchase_order_number"
                    class="max-w-lg block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border-gray-300 rounded-md"
                  />
                </div>
              </div>
            </div>
          </div>

          <div class="pt-8 space-y-6 sm:pt-10 sm:space-y-5">
            <div>
              <h3 class="text-lg leading-6 font-bold text-gray-900">
                Applicable Products
              </h3>
              <p class="mt-1 max-w-2xl text-gray-500">
                Please tell us about the products in your Return Goods
                Authorization Request.
              </p>
            </div>

            <div
              class=" sm:items-start sm:border-t sm:border-gray-200 sm:pt-5 overflow-auto"
            >
              <table class="w-full text-left table-auto">
                <thead>
                  <tr>
                    <th class="md:px-4 px-2 py-2 pl-0 text-sm md:text-base">Items</th>
                    <th class="md:px-4 px-2 py-2 text-sm md:text-base">PO/Customer Requisition</th>
                    <th class="md:px-4 px-2 py-2 text-sm md:text-base">Quantity</th>
                    <th class="md:px-4 px-2 py-2 text-sm md:text-base">Serial Number</th>
                    <th class="md:px-4 px-2 py-2 pr-0 text-sm md:text-base">
                      <span
                        @click="addItems"
                        class="w-max pr-4 border border-red-600 rounded-full text-red-600 font-semibold md:px-5 md:py-2 px-3 py-1 hover:bg-red-600 hover:text-white focus:outline-none cursor-pointer whitespace-nowrap"
                        >+ Add New Items</span
                      >
                    </th>
                  </tr>
                </thead>
                <tbody>
                  <tr v-for="(item, index) in form.items" v-bind:key="index">
                    <td class="md:px-4 px-2 py-2 pl-0">
                      <input
                        type="text"
                        name="items"
                        v-model="item.items"
                        class="max-w-lg block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border-gray-300 rounded-md"
                      />
                    </td>
                    <td class="md:px-4 px-2 py-2">
                      <input
                        type="text"
                        name="po_customer_requisition"
                        v-model="item.po_customer_requisition"
                        class="max-w-lg block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border-gray-300 rounded-md"
                      />
                    </td>
                    <td class="md:px-4 px-2 py-2">
                      <input
                        type="number"
                        name="quantity"
                        v-model="item.quantity"
                        class="max-w-lg block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border-gray-300 rounded-md"
                      />
                    </td>
                    <td class="md:px-4 px-2 py-2">
                      <input
                        type="text"
                        name="serial_number"
                        v-model="item.serial_number"
                        placeholder="xxxx.xx-xxxxxx"
                        class="max-w-lg block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border-gray-300 rounded-md"
                      />
                    </td>
                    <td class="md:px-4 px-2 py-2 pr-0">
                      <div
                        v-if="form.items.length != 1"
                        @click="removeItem(index)"
                        class="border border-red-600 rounded-full text-red-600 font-semibold w-10 h-10 flex items-center hover:bg-red-600 hover:text-white focus:outline-none cursor-pointer justify-center"
                      >
                        X
                      </div>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>

          <div class="pt-8 space-y-6 sm:pt-10 sm:space-y-5">
            <div>
              <h3 class="text-lg leading-6 font-bold text-gray-900">
                Problem Description
              </h3>
              <p class="mt-1 max-w-2xl text-gray-500">
                Please specify as much information as possible.
              </p>
            </div>

            <div>
              <div
                class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5"
              >
                <label
                  for="first_name"
                  class="block font-bold text-gray-700 sm:mt-px sm:pt-2"
                >
                  Describe the issue *
                </label>
                <div class="mt-1 sm:mt-0 sm:col-span-2">
                  <textarea
                    name="describe_the_issue"
                    v-model="form.describe_the_issue"
                    class="max-w-lg block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border-gray-300 rounded-md"
                  ></textarea>
                  <jet-input-error :message="errors.describe_the_issue" class="mt-2" />
                </div>
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
                            name="has_the_box_been_opened"
                            v-model="form.has_the_box_been_opened"
                            value="1"
                            type="checkbox"
                            class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded"
                          />
                        </div>
                        <div class="ml-3">
                          <label class="block font-bold text-gray-600">
                            Has tde box been opened?
                          </label>
                        </div>
                      </div>
                      <div class="relative flex items-center">
                        <div class="flex items-center h-5">
                          <input
                            name="has_the_item_been_installed"
                            v-model="form.has_the_item_been_installed"
                            value="1"
                            type="checkbox"
                            class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded"
                          />
                        </div>
                        <div class="ml-3">
                          <label class="block font-bold text-gray-600">
                            Has the item been installed?
                          </label>
                        </div>
                      </div>
                      <div class="relative flex items-center">
                        <div class="flex items-center h-5">
                          <input
                            name="is_the_items_in_new_resalable_condition"
                            v-model="form.is_the_items_in_new_resalable_condition"
                            value="1"
                            type="checkbox"
                            class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded"
                          />
                        </div>
                        <div class="ml-3">
                          <label class="block font-bold text-gray-600">
                            Is the item(s) in new resalable condition?
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
                Reason for Return
              </h3>
              <p class="mt-1 max-w-2xl text-gray-500">
                Why are you returning this?
              </p>
            </div>

            <div>
              <div
                class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5"
              >
                <label
                  for="first_name"
                  class="block font-bold text-gray-700 sm:mt-px sm:pt-2"
                >
                 Reason for return?
                </label>
                <div class="mt-1 sm:mt-0 sm:col-span-2">
                  <textarea
                    name="reason_for_return"
                    v-model="form.reason_for_return"
                    class="max-w-lg block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border-gray-300 rounded-md"
                  ></textarea>
                </div>
              </div>
            </div>
          </div>

          <div class="pt-8 space-y-6 sm:pt-10 sm:space-y-5">
            <div>
              <h3 class="text-lg leading-6 font-bold text-gray-900">
                Terms and Conditions
              </h3>
              <ul class="mt-1 list-disc text-gray-500 list-outside pl-5 space-y-3">
                  <li>All items are subject to a <strong>25% restocking fee</strong> and customer <strong>is responsible</strong> for <strong>shipping expenses</strong> associated with returning the item(s).</li>
                  <li>Original shipping fees (if any) are non-refundable. <strong>Items must be returned in the original packaging</strong>.</li>

                  <li>Items returned will be inspected by Noritz. Upon inspection, any items determined to have been installed or used, are missing parts/accessories, are damaged and/or not in 100% new condition, <strong>will not be given credit</strong>.</li>

              </ul>
              <p class="mt-1 w-full text-gray-500">
Items must be returned within 30 days of the original shipment (see invoice date). This form is : request only and is NOT YET AUTHORIZED until an
authorization number is issued via email.
              </p>
            </div>
          </div>


        <div class="pt-8 space-y-6 sm:pt-10 sm:space-y-5">
            <div>
              <h3 class="text-lg leading-6 font-bold text-gray-900">
                Contact Information
              </h3>
              <p class="mt-1 max-w-2xl text-gray-500">
                How can we contact you?
              </p>
            </div>

            <div class="space-y-6 sm:space-y-5">
              <div
                class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5"
              >
                <label
                  class="block font-bold text-gray-700 sm:mt-px sm:pt-2"
                >
                 Name
                </label>
                <div class="mt-1 sm:mt-0 sm:col-span-2">
                  <input
                    type="text"
                    name="name"
                    v-model="form.name"
                    class="max-w-lg block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border-gray-300 rounded-md"
                  />
                </div>
              </div>
            </div>

            <div>
              <div
                class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5"
              >
                <label
                  class="block font-bold text-gray-700 sm:mt-px sm:pt-2"
                >
                 Phone
                </label>
                <div class="mt-1 sm:mt-0 sm:col-span-2">
                  <input
                    type="text"
                    name="phone"
                    v-model="form.phone"
                    placeholder="(xxx) xxx - xxxx"
                    class="max-w-lg block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border-gray-300 rounded-md"
                  />
                </div>
              </div>
            </div>

            <div>
              <div
                class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5"
              >
                <label
                  class="block font-bold text-gray-700 sm:mt-px sm:pt-2"
                >
                 Email *
                </label>
                <div class="mt-1 sm:mt-0 sm:col-span-2">
                  <input
                    type="text"
                    name="email"
                    v-model="form.email"
                    class="max-w-lg block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border-gray-300 rounded-md"
                  />
                  <jet-input-error :message="errors.email" class="mt-2" />
                </div>
              </div>
            </div>

            <div>
              <div
                class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5"
              >
                <label
                  class="block font-bold text-gray-700 sm:mt-px sm:pt-2"
                >
                 Email (Confirm) *
                </label>
                <div class="mt-1 sm:mt-0 sm:col-span-2">
                  <input
                    type="email"
                    name="email_confirm"
                    v-model="form.email_confirm"
                    class="max-w-lg block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border-gray-300 rounded-md"
                  />
                  <jet-input-error :message="errors.email_confirm" class="mt-2" />
                </div>
              </div>
            </div>


          </div>

        </div>
        <div class="pt-5 sm:border-t sm:border-gray-200 mt-5 mb-10">
          <div class="flex justify-end">
            <button
              :disabled="form.processing"
              type="btn"
              @click="createRGA1Form"
              class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm font-bold rounded-md text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500"
            >
              Save
            </button>
          </div>
        </div>
      </template>

    </jet-form-section>
  </div>
</template>

<script>
import Label from "@/Jetstream/Label";
import JetFormSection from "@/JetstreamCustom/FormSection";
import JetInputError from "@/Jetstream/InputError";
import JetActionMessage from "@/Jetstream/ActionMessage";
import JetButton from "@/Jetstream/Button";

export default {
  props: ["yes_no", "errors"],

  components: {
    Label,
    JetFormSection,
    JetInputError,
    JetActionMessage,
    JetButton,
  },

  data() {
    return {
      form: this.$inertia.form(
        {
          companycustomer_name: "",
          sales_order_number: "",
          customer_reference_number: "",
          customer_purchase_order_number: "",
          items: [
            {
              items: "",
              po_customer_requisition: "",
              quantity: "",
              serial_number: "",
            },
          ],
          describe_the_issue: "",
          has_the_box_been_opened: null,
          has_the_item_been_installed: null,
          is_the_items_in_new_resalable_condition: null,
          reason_for_return: "",
          name: "",
          phone: "",
          email: "",
          email_confirm: "",
        },
        {
          bag: "createRga1Form",
          resetOnSuccess: false,
        }
      ),
    };
  },
  mounted() {
    setTimeout(function(){
      let h = document.getElementById('primaryContainer').offsetHeight;
      const message = {
        frameHeight: h
      };
      window.parent.postMessage(message, '*');
    }, 1000);
  },
  methods: {
    addItems() {
      this.form.items.push({
        items: "",
        po_customer_requisition: "",
        quantity: "",
        serial_number: "",
      });
    },
    removeItem(index) {
      this.form.items.splice(index, 1);
    },
    createRGA1Form() {
      this.form.post(route("claim-form.save-rga1-form"), {
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
