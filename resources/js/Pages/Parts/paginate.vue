<template>
    <div>
   <ul class="flex justify-center pl-px list-none rounded my-2 mt-5">
      <li
         class="relative block py-2 px-3 leading-tight bg-white border border-gray-300 text-blue-700 -ml-px hover:bg-gray-200 text-red-600"
         v-for="(eachUrlArray, index) in urlsArray"
         :key="eachUrlArray.indexKey"
         :class="{'bg-red-500 active':eachUrlArray.active}"
         >
         <span class="text-red-600" v-if="!eachUrlArray.active && eachUrlArray.url">
            <InertiaLink
               :href="eachUrlArray.url"
                class="page-link"
               >
        <span v-if="index == 0">  &laquo; </span>
        <span v-else-if="index == urlsArray.length-1">  &raquo; </span>
         <span v-else class="text-red-600" v-html="eachUrlArray.label">
         </span>


            </InertiaLink>
         </span>
         <span class="text-red-600" v-else-if="index == 0">  &laquo; </span>
         <span class="text-red-600" v-else-if="index == urlsArray.length-1">  &raquo; </span>
         <span class="text-red-600" v-else v-html="eachUrlArray.label" >
         </span>
      </li>

   </ul>
</div>
</template>
<style scoped>
li.active span {
    color: #fff;
}
</style>
<script>
export default {
    props : ['urlsArray','previousPageUrl','nextPageUrl'],
}
</script>
