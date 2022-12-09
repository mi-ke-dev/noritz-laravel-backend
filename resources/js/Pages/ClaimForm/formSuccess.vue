<template>
  <div class="p-4">


    <div  class="mt-6">
        <p class="pb-4">Your form has been submitted successfully</p>

         <p>  <a :href="route('claim-form.index')" class="bg-red-600 border border-red-600 rounded-full text-white font-bold px-8 py-2 hover:bg-transparent hover:text-red-600 focus:outline-none uppercase mt-5">Back to Home</a></p>

    </div>



  </div>
</template>

<script>
import Label from "@/Jetstream/Label";

export default {
  props: [],

  components: {
    Label,
  },

  data() {
    return {};
  },

  methods: {

  },
};
</script>
