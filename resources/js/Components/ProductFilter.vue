<template>
    <div class="w-full 2xl:w-[256px] flex flex-col 2xl:rounded-lg border-gray-200 p-0 border-0 border-b ">
        <button
            class="2xl:hidden max-md:justify-center px-4 py-3 gap-2 flex w-full scratch text-start text-gray-900 hover:text-gray-500 leading-tight text-base font-semibold"
            @click="toggleFilter(filters.menu)"
        >
            <svg width="16" height="17" viewBox="0 0 16 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M13.098 2.1H10.7451C10.7451 1.67565 10.5798 1.26869 10.2856 0.968629C9.99146 0.668571 9.59247 0.5 9.17645 0.5H6.82351C6.40748 0.5 6.0085 0.668571 5.71432 0.968629C5.42015 1.26869 5.25488 1.67565 5.25488 2.1H2.90194C2.48591 2.1 2.08693 2.26857 1.79275 2.56863C1.49858 2.86869 1.33331 3.27565 1.33331 3.7V14.9C1.33331 15.3243 1.49858 15.7313 1.79275 16.0314C2.08693 16.3314 2.48591 16.5 2.90194 16.5H13.098C13.514 16.5 13.913 16.3314 14.2072 16.0314C14.5014 15.7313 14.6666 15.3243 14.6666 14.9V3.7C14.6666 3.27565 14.5014 2.86869 14.2072 2.56863C13.913 2.26857 13.514 2.1 13.098 2.1ZM6.82351 2.1H9.17645V4.5H6.82351V2.1ZM13.098 14.9H2.90194V3.7H5.25488V4.5C5.04687 4.5 4.84738 4.58429 4.70029 4.73431C4.5532 4.88434 4.47057 5.08783 4.47057 5.3C4.47057 5.51217 4.5532 5.71566 4.70029 5.86569C4.84738 6.01571 5.04687 6.1 5.25488 6.1H10.7451C10.9531 6.1 11.1526 6.01571 11.2997 5.86569C11.4468 5.71566 11.5294 5.51217 11.5294 5.3C11.5294 5.08783 11.4468 4.88434 11.2997 4.73431C11.1526 4.58429 10.9531 4.5 10.7451 4.5V3.7H13.098V14.9Z" fill="#111928"/>
                <path d="M10.7451 7.7H5.25488C5.04687 7.7 4.84738 7.78429 4.70029 7.93431C4.5532 8.08434 4.47057 8.28783 4.47057 8.5C4.47057 8.71217 4.5532 8.91566 4.70029 9.06569C4.84738 9.21571 5.04687 9.3 5.25488 9.3H10.7451C10.9531 9.3 11.1526 9.21571 11.2997 9.06569C11.4468 8.91566 11.5294 8.71217 11.5294 8.5C11.5294 8.28783 11.4468 8.08434 11.2997 7.93431C11.1526 7.78429 10.9531 7.7 10.7451 7.7Z" fill="#111928"/>
                <path d="M10.7451 10.9H5.25488C5.04687 10.9 4.84738 10.9843 4.70029 11.1343C4.5532 11.2843 4.47057 11.4878 4.47057 11.7C4.47057 11.9122 4.5532 12.1157 4.70029 12.2657C4.84738 12.4157 5.04687 12.5 5.25488 12.5H10.7451C10.9531 12.5 11.1526 12.4157 11.2997 12.2657C11.4468 12.1157 11.5294 11.9122 11.5294 11.7C11.5294 11.4878 11.4468 11.2843 11.2997 11.1343C11.1526 10.9843 10.9531 10.9 10.7451 10.9Z" fill="#111928"/>
            </svg>

            Filters
            <svg v-if="!filters.menu.open" class="block size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="m6 9 6 6 6-6"></path>
            </svg>
            <svg v-else class="block size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="m18 15-6-6-6 6"></path>
            </svg>
        </button>
        <div v-if="filters.menu.open" class="2xl:hidden overflow-hidden transition-[height] flex max-md:flex-col 2xl:flex-col flex-row md:flex-wrap rounded-lg border-gray-200 p-0 md:border-t-0">
            <div class="p-4 2xl:pt-4 md:pt-0 flex flex-col align-start gap-3 align-sketch w-full md:w-1/2 2xl:w-full">
                <button
                    class="flex justify-between items-center w-full scratch text-start text-gray-900 hover:text-gray-500 leading-tight text-base font-semibold"
                    @click="toggleFilter(filters.price)"
                >
                    Price
                    <svg v-if="!filters.price.open" class="block size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="m6 9 6 6 6-6"></path>
                    </svg>
                    <svg v-else class="block size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="m18 15-6-6-6 6"></path>
                    </svg>
                </button>
                <div v-if="filters.price.open" class="overflow-hidden transition-[height] duration-300 flex flex-row flex-start gap-4">
                    <div class="w-[100px] flex flex-col flex-start gap-2 text-gray-900 text-sm font-medium">
                        From
                    <input
                        type="number"
                        min="0"
                        v-model="selectedMinPrice"
                        @change="onPriceChange"
                        class="flex py-2 px-4 items-center rounded-lg border border-gray-300 bg-grey-50 text-gray-500 text-sm font-normal"
                    /> 
                    </div>
                    <div class="w-[100px] flex flex-col flex-start gap-2 text-gray-900 text-sm font-medium">
                        To
                    <input
                        type="number"
                        min="0"
                        v-model="selectedMaxPrice"
                        @change="onPriceChange"
                        class="flex py-2 px-4 items-center rounded-lg border border-gray-300 bg-grey-50 text-gray-500 text-sm font-normal"
                    /> 
                    </div>
                    
                    
                </div>
            </div>
            
            <div class="p-4 pt-0 flex flex-col align-start gap-3 align-sketch w-full md:w-1/2 2xl:w-full">
                <button
                    class="flex justify-between items-center w-full font-semibold text-start text-gray-800 hover:text-gray-500 rounded-lg"
                    @click="toggleFilter(filters.brand)"
                >
                    Brand
                    <svg v-if="!filters.brand.open" class="block size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="m6 9 6 6 6-6"></path>
                    </svg>
                    <svg v-else class="block size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="m18 15-6-6-6 6"></path>
                    </svg>
                </button>
                <div v-if="filters.brand.open" class="overflow-hidden transition-[height] duration-300">
                    <div v-if="brands.length > 0" v-for="brand in brands" :key="brand" class="flex p-0 items-center gap-2 mb-3">
                        <input
                            type="checkbox"
                            :value="brand"
                            v-model="selectedBrands"
                            @change="onBrandChange"
                            class="flex w-4 h-4 rounded border-gray-300 bg-grey-50"
                        />
                        <label class="text-gray-900 text-sm font-medium">{{ brand }}</label>
                    </div>
                </div>
            </div>

            <div class="p-4 pt-0 flex flex-col align-start gap-3 align-sketch w-full  md:w-1/2 2xl:w-full">
                <button
                    class="flex justify-between items-center w-full font-semibold text-start text-gray-800 hover:text-gray-500 rounded-lg"
                    @click="toggleFilter(filters.categories)"
                >
                    Categories
                    <svg v-if="!filters.categories.open" class="block size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="m6 9 6 6 6-6"></path>
                    </svg>
                    <svg v-else class="block size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="m18 15-6-6-6 6"></path>
                    </svg>
                </button>
                <div v-if="filters.categories.open" class="overflow-hidden transition-[height] duration-300">
                    <div v-if="categories.length > 0" v-for="category in categories" :key="category" class="flex p-0 items-center gap-2 mb-3">
                        <input
                            type="checkbox"
                            :value="category"
                            v-model="selectedCategories"
                            @change="onCategoryChange"
                            class="flex w-4 h-4 rounded border-gray-300 bg-grey-50"
                        />
                        <label class="text-gray-900 text-sm font-medium">{{ category }}</label>
                    </div> 
                </div>
            </div>

            <div class="p-4 pt-0 flex flex-col align-start gap-3 align-sketch w-full  md:w-1/2 2xl:w-full">
                <button
                    class="flex justify-between items-center w-full font-semibold text-start text-gray-800 hover:text-gray-500 rounded-lg"
                    @click="toggleFilter(filters.condition)"
                >
                    Condition
                    <svg v-if="!filters.condition.open" class="block size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="m6 9 6 6 6-6"></path>
                    </svg>
                    <svg v-else class="block size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="m18 15-6-6-6 6"></path>
                    </svg>
                </button>
                <div v-if="filters.condition.open" class="overflow-hidden transition-[height] duration-300">
                    
                </div>
            </div>

            <div class="p-4 pt-0 flex flex-col align-start gap-3 align-sketch w-full md:w-1/2 2xl:w-full">
                <button
                    class="flex justify-between items-center w-full font-semibold text-start text-gray-800 hover:text-gray-500 rounded-lg"
                    @click="toggleFilter(filters.rating)"
                >
                    Rating
                    <svg v-if="!filters.rating.open" class="block size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="m6 9 6 6 6-6"></path>
                    </svg>
                    <svg v-else class="block size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="m18 15-6-6-6 6"></path>
                    </svg>
                </button>
                <div v-if="filters.rating.open" class="overflow-hidden transition-[height] duration-300">
                    
                </div>
            </div> 
        </div>

        <div class="max-2xl:hidden overflow-hidden transition-[height] flex max-md:flex-col 2xl:flex-col flex-row md:flex-wrap rounded-lg border-gray-200 p-0 md:border-t-0">
            <div class="p-4 2xl:pt-4 md:pt-0 flex flex-col align-start gap-3 align-sketch w-full md:w-1/2 2xl:w-full">
                <button
                    class="flex justify-between items-center w-full scratch text-start text-gray-900 hover:text-gray-500 leading-tight text-base font-semibold"
                    @click="toggleFilter(filters.price)"
                >
                    Price
                    <svg v-if="!filters.price.open" class="block size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="m6 9 6 6 6-6"></path>
                    </svg>
                    <svg v-else class="block size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="m18 15-6-6-6 6"></path>
                    </svg>
                </button>
                <div v-if="filters.price.open" class="overflow-hidden transition-[height] duration-300 flex flex-row flex-start gap-4">
                    <div class="w-[100px] flex flex-col flex-start gap-2 text-gray-900 text-sm font-medium">
                        From
                    <input
                        type="number"
                        min="0"
                        v-model="selectedMinPrice"
                        @change="onPriceChange"
                        class="flex py-2 px-4 items-center rounded-lg border border-gray-300 bg-grey-50 text-gray-500 text-sm font-normal"
                    /> 
                    </div>
                    <div class="w-[100px] flex flex-col flex-start gap-2 text-gray-900 text-sm font-medium">
                        To
                    <input
                        type="number"
                        min="0"
                        v-model="selectedMaxPrice"
                        @change="onPriceChange"
                        class="flex py-2 px-4 items-center rounded-lg border border-gray-300 bg-grey-50 text-gray-500 text-sm font-normal"
                    /> 
                    </div>
                    
                    
                </div>
            </div>
            
            <div class="p-4 pt-0 flex flex-col align-start gap-3 align-sketch w-full md:w-1/2 2xl:w-full">
                <button
                    class="flex justify-between items-center w-full font-semibold text-start text-gray-800 hover:text-gray-500 rounded-lg"
                    @click="toggleFilter(filters.brand)"
                >
                    Brand
                    <svg v-if="!filters.brand.open" class="block size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="m6 9 6 6 6-6"></path>
                    </svg>
                    <svg v-else class="block size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="m18 15-6-6-6 6"></path>
                    </svg>
                </button>
                <div v-if="filters.brand.open" class="overflow-hidden transition-[height] duration-300">
                    <div v-if="brands.length > 0" v-for="brand in brands" :key="brand" class="flex p-0 items-center gap-2 mb-3">
                        <input
                            type="checkbox"
                            :value="brand"
                            v-model="selectedBrands"
                            @change="onBrandChange"
                            class="flex w-4 h-4 rounded border-gray-300 bg-grey-50"
                        />
                        <label class="text-gray-900 text-sm font-medium">{{ brand }}</label>
                    </div>
                </div>
            </div>

            <div class="p-4 pt-0 flex flex-col align-start gap-3 align-sketch w-full  md:w-1/2 2xl:w-full">
                <button
                    class="flex justify-between items-center w-full font-semibold text-start text-gray-800 hover:text-gray-500 rounded-lg"
                    @click="toggleFilter(filters.categories)"
                >
                    Categories
                    <svg v-if="!filters.categories.open" class="block size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="m6 9 6 6 6-6"></path>
                    </svg>
                    <svg v-else class="block size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="m18 15-6-6-6 6"></path>
                    </svg>
                </button>
                <div v-if="filters.categories.open" class="overflow-hidden transition-[height] duration-300">
                    <div v-if="categories.length > 0" v-for="category in categories" :key="category" class="flex p-0 items-center gap-2 mb-3">
                        <input
                            type="checkbox"
                            :value="category"
                            v-model="selectedCategories"
                            @change="onCategoryChange"
                            class="flex w-4 h-4 rounded border-gray-300 bg-grey-50"
                        />
                        <label class="text-gray-900 text-sm font-medium">{{ category }}</label>
                    </div> 
                </div>
            </div>

            <div class="p-4 pt-0 flex flex-col align-start gap-3 align-sketch w-full  md:w-1/2 2xl:w-full">
                <button
                    class="flex justify-between items-center w-full font-semibold text-start text-gray-800 hover:text-gray-500 rounded-lg"
                    @click="toggleFilter(filters.condition)"
                >
                    Condition
                    <svg v-if="!filters.condition.open" class="block size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="m6 9 6 6 6-6"></path>
                    </svg>
                    <svg v-else class="block size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="m18 15-6-6-6 6"></path>
                    </svg>
                </button>
                <div v-if="filters.condition.open" class="overflow-hidden transition-[height] duration-300">
                    
                </div>
            </div>

            <div class="p-4 pt-0 flex flex-col align-start gap-3 align-sketch w-full md:w-1/2 2xl:w-full">
                <button
                    class="flex justify-between items-center w-full font-semibold text-start text-gray-800 hover:text-gray-500 rounded-lg"
                    @click="toggleFilter(filters.rating)"
                >
                    Rating
                    <svg v-if="!filters.rating.open" class="block size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="m6 9 6 6 6-6"></path>
                    </svg>
                    <svg v-else class="block size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="m18 15-6-6-6 6"></path>
                    </svg>
                </button>
                <div v-if="filters.rating.open" class="overflow-hidden transition-[height] duration-300">
                    
                </div>
            </div> 
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            minPrice: {
                type: Number,
                default: '',
            },
            maxPrice: {
                type: Number,
                default: '',
            },
        },
        data() {
            return {
                filters: {
                    menu: { open: false },
                    price: { open: true },
                    categories: { open:true},
                    brand: { open: false },
                    condition: { open: false },
                    rating: { open: false },
                },
                categories: [],
                brands: [],
                selectedCategories: new URLSearchParams(window.location.search).get('category')?.split(',') ?? [],
                selectedBrands: new URLSearchParams(window.location.search).get('brand')?.split(',') ?? [],
                selectedMinPrice: this.minPrice,
                selectedMaxPrice: this.maxPrice,
            };
        },
        methods: {
            async fetchFilters() {
                console.log(window.innerWidth)
                try {
                    const response = await axios.get('/api/products/filters');
                    this.brands = response.data.brands;
                    this.categories = response.data.categories;
                } catch (error) {
                    console.error(error);
                }
                
            },
            onCategoryChange() {
                this.$emit('update-filters', 'category', this.selectedCategories);
            },
            onBrandChange() {
                this.$emit('update-filters', 'brand', this.selectedBrands);
            },
            onPriceChange() {
                this.$emit('update-filters-price', this.selectedMinPrice, this.selectedMaxPrice);
            },
            toggleFilter(filter) {
                filter.open = !filter.open;
            },
        },
        mounted() {
            this.fetchFilters();
        },
    };
</script>





