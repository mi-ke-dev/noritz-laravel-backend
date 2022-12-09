<template>
  <div class="p-4">
    <ul class="flex flex-wrap" v-if="is_step">
      <li :class="(is_step == 1)?'bg-red-600 text-white':''" class="px-5 py-2 rounded-md">Step 1</li>
      <li :class="(is_step == 2)?'bg-red-600 text-white':''" class="px-5 py-2 rounded-md">Step 2</li>
      <li :class="(is_step == 3)?'bg-red-600 text-white':''" class="px-5 py-2 rounded-md">Step 3</li>
      <li :class="(is_step == 4)?'bg-red-600 text-white':''" class="px-5 py-2 rounded-md">Step 4</li>
      <li :class="(is_step == 5)?'bg-red-600 text-white':''" class="px-5 py-2 rounded-md">Step 5</li>

    </ul>

    <div v-if="is_step == 0" class="mt-6">
      <p class="pb-4">Please contact Noritz Technical Support at 866-766-7489 to troubleshoot your heater. Agent are
        available Monday-Friday, 5am-6pm PST, Saturday, 7am-3pm PST. </p>
      <p><a href=""
            class="bg-red-600 border border-red-600 rounded-full text-white font-bold px-8 py-2 hover:bg-transparent hover:text-red-600 focus:outline-none uppercase mt-5">Back
        to Home</a></p>
    </div>

    <div v-if="is_step == 1" class="mt-6">
      <div class="flex flex-col">
        <div class="overflow-x-auto">
          <div class="w-full">
            <div class="">
              <table class="min-w-full divide-y divide-gray-200 border border-gray-500">
                <thead class="bg-black">
                <tr>
                  <th scope="col" class="px-6 py-3 text-left font-bold text-white uppercase tracking-wider w-3/4">
                    &nbsp;
                  </th>
                  <th scope="col" class="px-6 py-3 text-right font-bold text-white uppercase tracking-wider w-1/4">
                    <span class="mr-8">Yes</span> <span class="mr-3">No</span>
                  </th>
                </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-500">
                <tr>
                  <td class="px-6 py-4 whitespace-nowrap text-black-500">
                    Is this a heater?
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-black-500">
                    <div class="flex items-center justify-end">
                      <label v-for="(yn, index) in yes_no" class="ml-6 flex items-center">
                        <input
                          type="radio"
                          name="is_heater"
                          v-model="form.is_heater"
                          :value="index"
                          class="mr-2"
                        />
                        <b> {{ yn }}</b>
                      </label>
                    </div>
                    <div v-if="errors.is_venting_accessories_parts !=''" class="flex items-center justify-end"><span
                      class="border border-red-600 rounded-sm mt-2 text-red-600 px-3 py-1 bg-red-50 ">{{
                        errors.is_venting_accessories_parts
                      }}</span></div>
                  </td>
                </tr>
                <tr>
                  <td class="px-6 py-4 whitespace-nowrap text-black-500">
                    Is this venting, accessories, and/or parts?
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-black-500">
                    <div class="flex items-center justify-end">
                      <label v-for="(yn, index) in yes_no" class="ml-6 flex items-center">
                        <input
                          type="radio"
                          v-model="form.is_venting_accessories_parts"
                          name="is_venting_accessories_parts"
                          :value="index"
                          class="mr-2"
                        />
                        <b> {{ yn }}</b>
                      </label>
                    </div>
                    <div v-if="errors.is_venting_accessories_parts !=''" class="flex items-center justify-end"><span
                      class="border border-red-600 rounded-sm mt-2 text-red-600 px-3 py-1 bg-red-50 ">{{
                        errors.is_venting_accessories_parts
                      }}</span></div>
                  </td>
                </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <div class="flex justify-end mt-6">
        <button @click="showStep2()"
                class="bg-red-600 border border-red-600 rounded-full text-white font-bold px-8 py-2 hover:bg-transparent hover:text-red-600 focus:outline-none uppercase">
          Next Step
        </button>
      </div>
    </div>

    <div v-if="is_step == 2" class="mt-6">
      <div class="flex flex-col">
        <div class="overflow-x-auto">
          <div class="w-full">
            <div class="">
              <table class="min-w-full divide-y divide-gray-200 border border-gray-500">
                <thead class="bg-gray-500">
                <tr>
                  <th scope="col" class="px-6 py-3 text-left font-bold text-white uppercase tracking-wider w-3/4">
                    &nbsp;
                  </th>
                  <th scope="col" class="px-6 py-3 text-right font-bold text-white uppercase tracking-wider w-1/4">
                    <span class="mr-8">Yes</span> <span class="mr-3">No</span>
                  </th>
                </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-500">
                <tr>
                  <td class="px-6 py-4 whitespace-nowrap text-black-500">
                    Has this been installed?
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-black-500">
                    <div class="flex items-center justify-end">
                      <label v-for="(yn, index) in yes_no" class="ml-6 flex items-center">
                        <input
                          type="radio"
                          v-model="form.has_been_installed"
                          name="has_been_installed"
                          :value="index"
                          class="mr-2"
                        />
                        <b>{{ yn }}</b>
                      </label>
                    </div>
                    <div v-if="errors.has_been_installed !=''" class="flex items-center justify-end"><span
                      class="border border-red-600 rounded-sm mt-2 text-red-600 px-3 py-1 bg-red-50 ">{{
                        errors.has_been_installed
                      }}</span></div>
                  </td>
                </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <div class="flex justify-end mt-6">
        <button @click="prevStep(1)"
                class="bg-red-600 border border-red-600 rounded-full text-white font-bold px-8 py-2 hover:bg-transparent hover:text-red-600 focus:outline-none uppercase">
          Prev Step
        </button>
        <button @click="showStep3"
                class="bg-red-600 border border-red-600 rounded-full text-white font-bold px-8 py-2 hover:bg-transparent hover:text-red-600 focus:outline-none uppercase ml-4">
          Next Step
        </button>
      </div>
    </div>

    <div v-if="is_step == 3" class="mt-6">
      <div class="flex flex-col">
        <div class="overflow-x-auto">
          <div class="w-full">
            <div class="">
              <table class="min-w-full divide-y divide-gray-200 border border-gray-500">
                <thead class="bg-gray-500">
                <tr>
                  <th scope="col" class="px-6 py-3 text-left font-bold text-white uppercase tracking-wider w-3/4">
                    &nbsp;
                  </th>
                  <th scope="col" class="px-6 py-3 text-right font-bold text-white uppercase tracking-wider w-1/4">
                    <span class="mr-8">Yes</span> <span class="mr-3">No</span>
                  </th>
                </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-500">
                <tr>
                  <td class="px-6 py-4 whitespace-nowrap text-black-500">
                    Have you contacted Technical Support for troubleshooting?
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-black-500">
                    <div class="flex items-center justify-end">
                      <label v-for="(yn, index) in yes_no" class="ml-6 flex items-center">
                        <input
                          type="radio"
                          v-model="form.is_contected_technical_support"
                          name="is_contected_technical_support"
                          :value="index"
                          class="mr-2"
                        />
                        <b> {{ yn }}</b>
                      </label>
                    </div>
                    <div v-if="errors.is_contected_technical_support !=''" class="flex items-center justify-end"><span
                      class="border border-red-600 rounded-sm mt-2 text-red-600 px-3 py-1 bg-red-50 ">{{
                        errors.is_contected_technical_support
                      }}</span></div>
                  </td>
                </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <div class="flex justify-end mt-6">
        <button @click="prevStep(2)"
                class="bg-red-600 border border-red-600 rounded-full text-white font-bold px-8 py-2 hover:bg-transparent hover:text-red-600 focus:outline-none uppercase">
          Prev Step
        </button>
        <button @click="showStep4"
                class="bg-red-600 border border-red-600 rounded-full text-white font-bold px-8 py-2 hover:bg-transparent hover:text-red-600 focus:outline-none uppercase ml-4">
          Next Step
        </button>
      </div>
    </div>

    <div v-if="is_step == 4" class="mt-6">
      <div class="flex flex-col">
        <div class="overflow-x-auto">
          <div class="w-full">
            <div class="">
              <table class="min-w-full divide-y divide-gray-200 border border-gray-500">
                <thead class="bg-gray-500">
                <tr>
                  <th scope="col" class="px-6 py-3 text-left font-bold text-white uppercase tracking-wider w-3/4">
                    &nbsp;
                  </th>
                  <th scope="col" class="px-6 py-3 text-right font-bold text-white uppercase tracking-wider w-1/4">
                    <span class="mr-8">Yes</span> <span class="mr-3">No</span>
                  </th>
                </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-500">
                <tr>
                  <td class="px-6 py-4 whitespace-nowrap text-black-500">
                    Was the item received damaged?
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-black-500">
                    <div class="flex items-center justify-end">
                      <label v-for="(yn, index) in yes_no" class="ml-6 flex items-center">
                        <input
                          type="radio"
                          v-model="form.is_item_received_damaged"
                          name="is_item_received_damaged"
                          :value="index"
                          class="mr-2"
                          @change="checkStep4HideShow"
                        />
                        <b> {{ yn }}</b>
                      </label>
                    </div>
                    <div v-if="errors.is_item_received_damaged !=''" class="flex items-center justify-end"><span
                      class="border border-red-600 rounded-sm mt-2 text-red-600 px-3 py-1 bg-red-50 ">{{
                        errors.is_item_received_damaged
                      }}</span></div>
                  </td>
                </tr>
                <tr>
                  <td class="px-6 py-4 whitespace-nowrap text-black-500">
                    Did you receive incorrect item or quantities?
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-black-500">
                    <div class="flex items-center justify-end">
                      <label v-for="(yn, index) in yes_no" class="ml-6 flex items-center">
                        <input
                          type="radio"
                          v-model="form.did_you_receive_incorrenct_item_or_quantities"
                          name="did_you_receive_incorrenct_item_or_quantities"
                          :value="index"
                          class="mr-2"
                          @change="checkStep4HideShow"
                        />
                        <b> {{ yn }}</b>
                      </label>
                    </div>
                    <div v-if="errors.did_you_receive_incorrenct_item_or_quantities !=''"
                         class="flex items-center justify-end"><span
                      class="border border-red-600 rounded-sm mt-2 text-red-600 px-3 py-1 bg-red-50 ">{{
                        errors.did_you_receive_incorrenct_item_or_quantities
                      }}</span></div>
                  </td>
                </tr>
                <tr v-if="is_show_item_defective">
                  <td class="px-6 py-4 whitespace-nowrap text-black-500">
                    Is the item defective?
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-black-500">
                    <div class="flex items-center justify-end">
                      <label v-for="(yn, index) in yes_no" class="ml-6 flex items-center">
                        <input
                          type="radio"
                          v-model="form.is_item_defective"
                          name="is_item_defective"
                          :value="index"
                          class="mr-2"
                          @change="checkStep4HideShow"
                        />
                        <b>{{ yn }}</b>
                      </label>
                    </div>
                    <div v-if="errors.is_item_defective !=''" class="flex items-center justify-end"><span
                      class="border border-red-600 rounded-sm mt-2 text-red-600 px-3 py-1 bg-red-50 ">{{
                        errors.is_item_defective
                      }}</span></div>
                  </td>
                </tr>
                <tr v-if="is_show_new_unused_and_needs_to_returned">
                  <td class="px-6 py-4 whitespace-nowrap text-black-500">
                    Is this new, unused and needs to be returned?
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-black-500">
                    <div class="flex items-center justify-end">
                      <label v-for="(yn, index) in yes_no" class="ml-6 flex items-center">
                        <input
                          type="radio"
                          v-model="form.new_unused_and_needs_to_returned"
                          name="new_unused_and_needs_to_returned"
                          :value="index"
                          class="mr-2"
                        />
                        <b> {{ yn }}</b>
                      </label>
                    </div>
                    <div v-if="errors.new_unused_and_needs_to_returned !=''" class="flex items-center justify-end"><span
                      class="border border-red-600 rounded-sm mt-2 text-red-600 px-3 py-1 bg-red-50 ">{{
                        errors.new_unused_and_needs_to_returned
                      }}</span></div>
                  </td>
                </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <div class="flex justify-end mt-6">
        <button @click="prevStep(3)"
                class="bg-red-600 border border-red-600 rounded-full text-white font-bold px-8 py-2 hover:bg-transparent hover:text-red-600 focus:outline-none uppercase">
          Prev Step
        </button>
        <button @click="showStep5"
                class="bg-red-600 border border-red-600 rounded-full text-white font-bold px-8 py-2 hover:bg-transparent hover:text-red-600 focus:outline-none uppercase ml-4">
          Next Step
        </button>
      </div>
    </div>


    <div v-if="is_step == 5" class="mt-6">
      <div class="flex flex-col">
        <div class="overflow-x-auto">
          <div class="w-full">
            <div class="">
              <table class="min-w-full divide-y divide-gray-200 border border-gray-500">
                <thead class="bg-gray-500">
                <tr>
                  <th scope="col" class="px-6 py-3 text-left font-bold text-white uppercase tracking-wider w-3/6">
                    &nbsp;
                  </th>
                  <th scope="col" class="px-6 py-3 text-center font-bold text-white uppercase tracking-wider ">
                    Damaged
                  </th>
                  <th scope="col" class="px-6 py-3 text-center font-bold text-white uppercase tracking-wider ">
                    Defective
                  </th>
                  <th scope="col" class="px-6 py-3 text-center font-bold text-white uppercase tracking-wider ">
                    Mis-shipment
                  </th>
                </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-500">
                <tr>
                  <td class="px-6 py-4 whitespace-nowrap text-black-500">
                    Type of Claim
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-black-500">
                    <label class="ml-6 flex justify-center items-center">
                      <input
                        type="radio"
                        v-model="form.type_of_claim"
                        name="type_of_claim"
                        value="Damaged"
                      />
                    </label>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-black-500">
                    <label class="ml-6 flex justify-center items-center">
                      <input
                        type="radio"
                        v-model="form.type_of_claim"
                        name="type_of_claim"
                        value="Defective"
                      />
                    </label>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-black-500">
                    <label class="ml-6 flex justify-center items-center">
                      <input
                        type="radio"
                        v-model="form.type_of_claim"
                        name="type_of_claim"
                        value="Mis-shipment"
                      />
                    </label>
                    <div v-if="errors.type_of_claim !=''" class="flex items-center justify-end"><span
                      class="border border-red-600 rounded-sm mt-2 text-red-600 px-3 py-1 bg-red-50 ">{{
                        errors.type_of_claim
                      }}</span></div>
                  </td>
                </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <div class="flex justify-end mt-6">
        <button @click="prevStep(4)"
                class="bg-red-600 border border-red-600 rounded-full text-white font-bold px-8 py-2 hover:bg-transparent hover:text-red-600 focus:outline-none uppercase">
          Prev Step
        </button>
        <button @click="submitStep5"
                class="bg-red-600 border border-red-600 rounded-full text-white font-bold px-8 py-2 hover:bg-transparent hover:text-red-600 focus:outline-none uppercase ml-4">
          Submit
        </button>
      </div>
    </div>


  </div>
</template>

<script>
import Label from "@/Jetstream/Label";

export default {
  props: ["yes_no"],

  components: {
    Label,
  },

  data() {
    return {
      form: this.$inertia.form({
        is_heater: "",
        is_venting_accessories_parts: "",
        has_been_installed: "",
        is_contected_technical_support: "",
        is_item_received_damaged: "",
        did_you_receive_incorrenct_item_or_quantities: "",
        is_item_defective: "",
        new_unused_and_needs_to_returned: "",
        type_of_claim: ''
      }),
      errors: {
        is_heater: "",
        is_venting_accessories_parts: "",
        has_been_installed: "",
        is_contected_technical_support: "",
        is_item_received_damaged: "",
        did_you_receive_incorrenct_item_or_quantities: "",
        is_item_defective: "",
        new_unused_and_needs_to_returned: "",
        type_of_claim: ""
      },
      is_step: 1,
      is_show_contected_technical_support: 1,
      is_show_item_defective: 1,
      is_show_new_unused_and_needs_to_returned: 1,
      is_error: 1
    };
  },

  methods: {
    prevStep(st) {
      if (st == 3) {
        if (this.form.is_heater == 'YES' && this.form.has_been_installed == 'YES') {
          this.is_step = st;
        } else {
          this.is_step = 2;
        }
      } else {
        this.is_step = st;
      }

    },
    showStep2() {
      console.log("showStep2");
      this.resetError();
      if (this.form.is_heater == '') {
        this.errors.is_heater = "This field is required";
        this.is_error = 1;
      }
      if (this.form.is_venting_accessories_parts == '') {
        this.errors.is_venting_accessories_parts = "This field is required";
        this.is_error = 1;
      }

      if (!this.is_error) {
        this.is_step = 2;
      }

    },
    showStep3() {
      console.log("showStep3");
      this.resetError();
      if (this.form.has_been_installed == '') {
        this.errors.has_been_installed = "This field is required";
        this.is_error = 1;
      } else {
        if (this.form.is_heater == 'YES' && this.form.has_been_installed == 'YES') {
          this.is_show_contected_technical_support = 1;
          this.is_step = 3;
        } else {
          this.is_show_contected_technical_support = 0;
          this.showStep4();
        }
      }
    },

    showStep4() {
      console.log("showStep4");
      this.resetError();
      this.form.new_unused_and_needs_to_returned = '';
      this.is_show_new_unused_and_needs_to_returned = 1;
      this.is_show_item_defective = 1;
      this.form.is_item_defective = '';

      if (this.is_show_contected_technical_support == 1) {
        if (this.form.is_contected_technical_support == '') {
          this.errors.is_contected_technical_support = "This field is required";
          this.is_error = 1;
        }
      }


      if (this.is_error == 0) {
        if ((this.form.is_heater == 'YES' && this.form.has_been_installed == 'YES' && this.form.is_contected_technical_support == 'NO')) {
          console.log("condition 1 or 2");
          this.is_step = 0;
          //alert("Please contact Noritz Technical Support at 866-766-7489 to troubleshoot your heater. Agent are available Monday-Friday, 5am-6pm PST, Saturday, 7am-3pm PST.");
        } else if ((this.form.is_heater == 'YES' && this.form.has_been_installed == 'YES' && this.form.is_contected_technical_support == 'YES')) {
          console.log("condition 3 or 4");
          // alert('RMA Form');
          this.$inertia.get('/rma-form', this.searchForm, {preserveState: true});
          //claim-form.rma
        } else if (
          // CONDITION 5
          (
            this.form.is_heater == 'NO'
            && this.form.is_venting_accessories_parts == "YES"
            && this.form.has_been_installed == 'NO'
          ) ||
          // CONDITION 6
          (
            this.form.is_heater == 'YES'
            && this.form.is_venting_accessories_parts == "NO"
            && this.form.has_been_installed == 'NO'
          ) ||
          // CONDITION 7
          (
            this.form.is_heater == 'YES'
            && this.form.is_venting_accessories_parts == "YES"
            && this.form.has_been_installed == 'NO'
          )
        ) {
          console.log("condition 5 6 7 ");
          this.is_step = 4;
          // alert('RGA1 Form');
          //this.$inertia.get('/rga1-form', this.searchForm, { preserveState: true });
        } else {
          this.is_step = 4;
        }

      }

      this.checkStep4HideShow();

    },

    showStep5() {
      console.log("showStep5");
      this.resetError();
      if (this.is_show_item_defective == 1) {
        if (this.form.is_item_defective == '') {
          this.errors.is_item_defective = "This field is required";
          this.is_error = 1;
        }
      }
      if (this.is_show_new_unused_and_needs_to_returned == 1) {
        if (this.form.new_unused_and_needs_to_returned == '') {
          this.errors.new_unused_and_needs_to_returned = "This field is required";
          this.is_error = 1;
        }
      }
      if (this.form.is_item_received_damaged == '') {
        this.errors.is_item_received_damaged = "This field is required";
        this.is_error = 1;
      }
      if (this.form.did_you_receive_incorrenct_item_or_quantities == '') {
        this.errors.did_you_receive_incorrenct_item_or_quantities = "This field is required";
        this.is_error = 1;
      }

      if (this.is_error == 0) {

        if (
          // RGA 1 - Condition 9
          (
            this.form.is_heater == 'NO'
            && this.form.is_venting_accessories_parts == "YES"
            && this.form.has_been_installed == 'NO'
            && this.form.is_item_received_damaged == 'NO'
            && this.form.did_you_receive_incorrenct_item_or_quantities == 'NO'
            && this.form.is_item_defective == 'NO'
            && this.form.new_unused_and_needs_to_returned == 'YES'
          ) ||
          // RGA 1 - Condition 10
          (
            this.form.is_heater == 'YES'
            && this.form.is_venting_accessories_parts == "NO"
            && this.form.has_been_installed == 'NO'
            && this.form.is_item_received_damaged == 'NO'
            && this.form.did_you_receive_incorrenct_item_or_quantities == 'NO'
            && this.form.is_item_defective == 'NO'
            && this.form.new_unused_and_needs_to_returned == 'YES'
          ) ||
          // RGA 1 - Condition 11
          (
            this.form.is_heater == 'YES'
            && this.form.is_venting_accessories_parts == "YES"
            && this.form.has_been_installed == 'NO'
            && this.form.is_item_received_damaged == 'NO'
            && this.form.did_you_receive_incorrenct_item_or_quantities == 'NO'
            && this.form.is_item_defective == 'NO'
            && this.form.new_unused_and_needs_to_returned == 'YES'
          )) {
          console.log("RGA");
          this.$inertia.get('/rga1-form', this.searchForm, {preserveState: true});
        } else if (
          (
            // RGA 2 - Condition 14
            this.form.is_heater == 'YES'
            && this.form.is_venting_accessories_parts == "YES"
            && this.form.has_been_installed == 'NO'
            && this.form.is_item_received_damaged == 'YES'
            && this.form.did_you_receive_incorrenct_item_or_quantities == 'NO'
          ) ||
          (
            // RGA 2 - Condition 15
            this.form.is_heater == 'YES'
            && this.form.is_venting_accessories_parts == "NO"
            && this.form.has_been_installed == 'NO'
            && this.form.is_item_received_damaged == 'YES'
            && this.form.did_you_receive_incorrenct_item_or_quantities == 'NO'
          ) ||
          (
            // RGA 2 - Condition 16 & 17
            this.form.is_heater == 'NO'
            && this.form.is_venting_accessories_parts == "YES"
            && this.form.has_been_installed == 'NO'
            && this.form.is_item_received_damaged == 'YES'
            && this.form.did_you_receive_incorrenct_item_or_quantities == 'NO'
          ) ||
          (
            // RGA 2 - Condition 18 & 19
            this.form.is_heater == 'NO'
            && this.form.is_venting_accessories_parts == "NO"
            && this.form.has_been_installed == 'NO'
            && this.form.is_item_received_damaged == 'YES'
            && this.form.did_you_receive_incorrenct_item_or_quantities == 'NO'
          )) {
          console.log("RGA 2");
          this.$inertia.get('/rga2-form', this.searchForm, {preserveState: true});
        } else if (
          (
            // RGA 2 - Condition 20 - 31
            this.form.is_heater == 'YES'
            && this.form.is_venting_accessories_parts == "YES"
            && this.form.has_been_installed == 'NO'
            && this.form.is_item_received_damaged == 'NO'
            && this.form.did_you_receive_incorrenct_item_or_quantities == 'YES'
          ) ||
          (
            // RGA 2 - Condition 20 - 31
            this.form.is_heater == 'YES'
            && this.form.is_venting_accessories_parts == "NO"
            && this.form.has_been_installed == 'NO'
            && this.form.is_item_received_damaged == 'NO'
            && this.form.did_you_receive_incorrenct_item_or_quantities == 'YES'
          ) ||
          (
            // RGA 2 - Condition 20 - 31
            this.form.is_heater == 'NO'
            && this.form.is_venting_accessories_parts == "YES"
            && this.form.has_been_installed == 'NO'
            && this.form.is_item_received_damaged == 'NO'
            && this.form.did_you_receive_incorrenct_item_or_quantities == 'YES'
          ) ||
          (
            // RGA 2 - Condition 20 - 31
            this.form.is_heater == 'NO'
            && this.form.is_venting_accessories_parts == "NO"
            && this.form.has_been_installed == 'NO'
            && this.form.is_item_received_damaged == 'NO'
            && this.form.did_you_receive_incorrenct_item_or_quantities == 'YES'
          )) {
          console.log("RGA 2");
          this.$inertia.get('/rga2-form', this.searchForm, {preserveState: true});
        } else if (
          (
            // CONDITION 5
            this.form.is_heater == 'NO'
            && this.form.is_venting_accessories_parts == "YES"
            && this.form.has_been_installed == 'NO'
            && this.form.is_item_received_damaged == 'NO'
            && this.form.did_you_receive_incorrenct_item_or_quantities == 'NO'
          ) ||
          (
            // CONDITION 6
            this.form.is_heater == 'YES'
            && this.form.is_venting_accessories_parts == "NO"
            && this.form.has_been_installed == 'NO'
            && this.form.is_item_received_damaged == 'NO'
            && this.form.did_you_receive_incorrenct_item_or_quantities == 'NO'
          ) ||
          (
            // CONDITION 7
            this.form.is_heater == 'YES'
            && this.form.is_venting_accessories_parts == "YES"
            && this.form.has_been_installed == 'NO'
            && this.form.is_item_received_damaged == 'NO'
            && this.form.did_you_receive_incorrenct_item_or_quantities == 'NO'
          )
        ) {
          console.log("condition 5 6 7 ");

          // alert('RGA1 Form');
          // this.$inertia.get('/rga1-form', this.searchForm, { preserveState: true });
        } else if (
          (
            // CONDITION 8
            this.form.is_heater == 'NO'
            && this.form.is_venting_accessories_parts == "YES"
            && this.form.has_been_installed == 'YES'
            && this.form.is_item_received_damaged == 'NO'
            && this.form.did_you_receive_incorrenct_item_or_quantities == 'NO'
          ) ||
          (
            // CONDITION 9
            this.form.is_heater == 'YES'
            && this.form.is_venting_accessories_parts == "YES"
            && this.form.has_been_installed == 'NO'
            && this.form.is_item_received_damaged == 'NO'
            && this.form.did_you_receive_incorrenct_item_or_quantities == 'YES'
          )
        ) {
          console.log("condition 8 - 9 ");
          //  this.$inertia.get('/rga2-form', this.searchForm, { preserveState: true });
        } else if (
          (
            // CONDITION 10
            this.form.is_heater == 'YES'
            && this.form.is_venting_accessories_parts == "YES"
            && this.form.has_been_installed == 'NO'
            && this.form.is_item_received_damaged == 'YES'
            && this.form.did_you_receive_incorrenct_item_or_quantities == 'YES'
          ) ||
          (
            // CONDITION 11
            this.form.is_heater == 'YES'
            && this.form.is_venting_accessories_parts == "NO"
            && this.form.has_been_installed == 'NO'
            && this.form.is_item_received_damaged == 'YES'
            && this.form.did_you_receive_incorrenct_item_or_quantities == 'NO'
          ) ||
          (
            // CONDITION 12
            this.form.is_heater == 'NO'
            && this.form.is_venting_accessories_parts == "YES"
            && this.form.has_been_installed == 'NO'
            && this.form.is_item_received_damaged == 'YES'
            && this.form.did_you_receive_incorrenct_item_or_quantities == 'NO'
          ) ||
          (
            // CONDITION 13
            this.form.is_heater == 'NO'
            && this.form.is_venting_accessories_parts == "NO"
            && this.form.has_been_installed == 'NO'
            && this.form.is_item_received_damaged == 'YES'
            && this.form.did_you_receive_incorrenct_item_or_quantities == 'NO'
          ) ||
          (
            // CONDITION 14
            this.form.is_heater == 'NO'
            && this.form.is_venting_accessories_parts == "NO"
            && this.form.has_been_installed == 'NO'
            && this.form.is_item_received_damaged == 'NO'
            && this.form.did_you_receive_incorrenct_item_or_quantities == 'YES'
          ) ||
          (
            // CONDITION 15
            this.form.is_heater == 'YES'
            && this.form.is_venting_accessories_parts == "NO"
            && this.form.has_been_installed == 'NO'
            && this.form.is_item_received_damaged == 'NO'
            && this.form.did_you_receive_incorrenct_item_or_quantities == 'YES'
          ) ||
          (
            // CONDITION 16
            this.form.is_heater == 'NO'
            && this.form.is_venting_accessories_parts == "YES"
            && this.form.has_been_installed == 'NO'
            && this.form.is_item_received_damaged == 'NO'
            && this.form.did_you_receive_incorrenct_item_or_quantities == 'YES'
          )
        ) {
          console.log("condition 10-16 ");
          //  alert('RGA2 Defective');
          // this.$inertia.get('/rga2-form', this.searchForm, { preserveState: true });
        } else {
          //   alert('No found');
          // this.$inertia.get('/rma-form', this.searchForm, { preserveState: true });
        }
        this.is_step = 5;
      }
    },
    submitStep5() {
      this.is_error = 0;
      if (this.form.type_of_claim == '') {
        this.is_error = 1;
        this.errors.type_of_claim = "Please select type of claim";
      }
      if (this.is_error == 0) {
        if (this.form.type_of_claim == 'Damaged') {
          this.$inertia.get('/rga2-form', this.searchForm, {preserveState: true});
        } else if (this.form.type_of_claim == 'Defective') {
          this.$inertia.get('/rga2-form', this.searchForm, {preserveState: true});
        } else if (this.form.type_of_claim == 'Mis-shipment') {
          this.$inertia.get('/rma-form', this.searchForm, {preserveState: true});
        }
      }

    },
    resetError() {
      this.is_error = 0;
      this.errors = {
        is_heater: "",
        is_venting_accessories_parts: "",
        has_been_installed: "",
        is_contected_technical_support: "",
        is_item_received_damaged: "",
        did_you_receive_incorrenct_item_or_quantities: "",
        is_item_defective: "",
        new_unused_and_needs_to_returned: "",
        type_of_claim: ""
      };
    },

    checkStep4HideShow() {
      if (
        // CONDITION 8
        (
          this.form.is_heater == 'NO'
          && this.form.is_venting_accessories_parts == "YES"
          && this.form.has_been_installed == 'YES'
          && this.form.is_item_received_damaged == 'NO'
          && this.form.did_you_receive_incorrenct_item_or_quantities == 'NO'
          && this.form.is_item_defective == 'YES'
        ) ||
        // CONDITION 9
        (
          this.form.is_heater == 'YES'
          && this.form.is_venting_accessories_parts == "YES"
          && this.form.has_been_installed == 'NO'
          && this.form.is_item_received_damaged == 'NO'
          && this.form.did_you_receive_incorrenct_item_or_quantities == 'YES'
          && this.form.is_item_defective == 'NO'
        )
      ) {
        console.log("condition 8 - 9 ");
        this.form.new_unused_and_needs_to_returned = 'NO';
        this.is_show_new_unused_and_needs_to_returned = 0;
      } else if (
        // CONDITION 10
        (
          this.form.is_heater == 'YES'
          && this.form.is_venting_accessories_parts == "YES"
          && this.form.has_been_installed == 'NO'
          && this.form.is_item_received_damaged == 'YES'
          && this.form.did_you_receive_incorrenct_item_or_quantities == 'NO'

        ) ||
        // CONDITION 11
        (
          this.form.is_heater == 'YES'
          && this.form.is_venting_accessories_parts == "NO"
          && this.form.has_been_installed == 'NO'
          && this.form.is_item_received_damaged == 'YES'
          && this.form.did_you_receive_incorrenct_item_or_quantities == 'NO'
        ) ||

        // CONDITION 12
        (
          this.form.is_heater == 'NO'
          && this.form.is_venting_accessories_parts == "YES"
          && this.form.has_been_installed == 'NO'
          && this.form.is_item_received_damaged == 'YES'
          && this.form.did_you_receive_incorrenct_item_or_quantities == 'NO'
        ) ||

        // CONDITION 13
        (
          this.form.is_heater == 'NO'
          && this.form.is_venting_accessories_parts == "NO"
          && this.form.has_been_installed == 'NO'
          && this.form.is_item_received_damaged == 'YES'
          && this.form.did_you_receive_incorrenct_item_or_quantities == 'NO'
        ) ||

        // CONDITION 14
        (
          this.form.is_heater == 'NO'
          && this.form.is_venting_accessories_parts == "NO"
          && this.form.has_been_installed == 'NO'
          && this.form.is_item_received_damaged == 'NO'
          && this.form.did_you_receive_incorrenct_item_or_quantities == 'YES'
        ) ||
        // CONDITION 15
        (
          this.form.is_heater == 'YES'
          && this.form.is_venting_accessories_parts == "NO"
          && this.form.has_been_installed == 'NO'
          && this.form.is_item_received_damaged == 'NO'
          && this.form.did_you_receive_incorrenct_item_or_quantities == 'YES'
        ) ||
        // CONDITION 16
        (
          this.form.is_heater == 'NO'
          && this.form.is_venting_accessories_parts == "YES"
          && this.form.has_been_installed == 'NO'
          && this.form.is_item_received_damaged == 'NO'
          && this.form.did_you_receive_incorrenct_item_or_quantities == 'YES'
        )
      ) {
        console.log("condition 10-16 ");
        //alert('RGA2 Defective');
        this.form.new_unused_and_needs_to_returned = 'NO';
        this.is_show_new_unused_and_needs_to_returned = 0;
        this.is_show_item_defective = 0;
        this.form.is_item_defective = 'NO';
        this.is_step = 4;
        // alert("16");
      } else {
        this.is_show_new_unused_and_needs_to_returned = 1;
      }
    },
  },
};
</script>
<style scoped>
[type='checkbox'], [type='radio'] {
  color: #dc2626;
}

[type='checkbox']:focus, [type='radio']:focus {
  --tw-ring-color: #dc2626;
}
</style>
