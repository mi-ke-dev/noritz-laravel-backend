<template>
  <div class="autocomplete">
    <input
            class="block focus:ring-blue-500 focus:border-blue-500 w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
            type="text" @input="onChange"
            v-model="search" @keydown.down="onArrowDown" @keydown.up="onArrowUp" @keydown.enter.prevent="onEnter"
    />
    <ul id="autocomplete-results"
        v-show="isOpen" class="autocomplete-results">
        <li class="loading"
            v-if="isLoading">
            Loading results...
        </li>
        <li v-else
            v-for="(result, i) in results"
            :key="i" @click="setResult(result)" class="autocomplete-result"
            :class="{ 'is-active': i === arrowCounter }">
            {{ result }}
        </li>
    </ul>
</div>
</template>

<script>
export default {
  props: {items: [],
              api:null,
              value:''},
  components: {},
  data() {
    return {
        isOpen: false,
        results: [],
        search: this.value,
        isLoading: false,
        arrowCounter: 0,
        _items:[],
        perPage:100,
        pageNumber:1
    };
  },
  setup() {
    return {
    };
  },
  methods: {
      onChange() {
        // Let's warn the parent (whatever using this component) that a //change was madethis.$emit('input', this.search);
        // Is the data given by an outside ajax request? (server-side)
        if (this.isAsync && this.api != null) {
            this.isLoading = true;
            this.isOpen = true;
            this.api(this.search, this.perPage, this.pageNumber).then(d => {
                this.results =d.data.map(v=>v.model_no);
            }).finally(()=>{this.isLoading = false});
        } else {
            // Let's filter our internal array (client-side)
            this.filterResults();
            this.isOpen = true;
        }
    },

    filterResults() {
        // first uncapitalize all the things
        this.results = this.items.filter((item) => {
            return item.toLowerCase().indexOf(this.search.toLowerCase()) > -1;
        });
    },
    setResult(result) {
        this.search = result;
        this.isOpen = false;
        this.$parent.setAutocomplete(result);
       //emit the changes so the parent component will get notifiedthis.$emit('input', this.search);
    },
    onArrowDown(evt) {
        if (this.arrowCounter < this.results.length) {
            this.arrowCounter = this.arrowCounter + 1;
        }
    },
    onArrowUp() {
        if (this.arrowCounter > 0) {
            this.arrowCounter = this.arrowCounter - 1;
        }
    },
    onEnter() {
        this.search = this.results[this.arrowCounter];
        this.isOpen = false;
        this.arrowCounter = -1;
        this.$emit('input', this.search);
    },
   //this will close the drop-down section when the user click some where// out side of the component
    handleClickOutside(evt) {
        if (!this.$el.contains(evt.target)) {
            this.isOpen = false;
            this.arrowCounter = -1;
        }
    }
  },
};
</script>
<style scoped>
    .autocomplete {
        position: relative;
    }

    .autocomplete-results {
        z-index: 1000;
        position: absolute;
        padding: 0;
        margin: 0;
        border: 1px solid rgb(186, 206, 228);
        border-radius: 4px;
        height: 120px;
        overflow: auto;
        width: 100%;
        background-color: white;
    }

    .autocomplete-result {
        list-style: none;
        text-align: left;
        padding: 4px 2px;
        cursor: pointer;
        background-color: white;
    }

    .autocomplete-result.is-active,
    .autocomplete-result:hover {
        background-color: #4AAE9B;
        color: white;
    }
</style>
