<template>
  <div class="whitespace-nowrap flex">
      <select class="max-w-lg focus:ring-indigo-500 focus:border-indigo-500 w-full shadow-sm sm:text-sm border-gray-300 rounded-md border-r-0 rounded-tr-none  rounded-br-none h-10" v-model="value" >
        <option v-for="item in items" :value="item.model_no">{{ item.model_no }}</option>
      </select>
      <button class="text-white bg-blue-400 px-4 py-2 font-semibold rounded-md rounded-tl-none rounded-bl-none h-10" @click="onChange">Search</button>
</div>
</template>

<script>
export default {
  props: {items: [],
              value:''},
  components: {},
  data() {
    return {
    };
  },
  setup() {
    return {
    };
  },
  methods: {
      onChange() {
          this.$parent.setFormSubmit(this.value);
    },


  },
};
</script>
<style scoped>
.bg-blue-400 {
    background: #dc2626;
}
select{
  min-width: 150px
}
@media (max-width: 1023px){
   select{
      font-size: 12px;
      padding-right: 30px;
  }
  td{
    padding-left: 0.5rem;
    padding-right: 0.5rem;
  }
}
</style>
