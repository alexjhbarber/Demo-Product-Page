<template>
    <div class="w-[256px] flex flex-col rounded-lg border-gray-200 p-0">
    
        <div class="p-4 flex flex-col align-start gap-3 align-sketch">
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
        
        <div class="p-4 pt-0 flex flex-col align-start gap-3 align-sketch ">
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

        <div class="p-4 pt-0 flex flex-col align-start gap-3 align-sketch">
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

        <div class="p-4 pt-0 flex flex-col align-start gap-3 align-sketch">
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

        <div class="p-4 pt-0 flex flex-col align-start gap-3 align-sketch">
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
</template>

<script>
    export default {
        props: {
            minPrice: {
                type: Number,
                default: 300,
            },
            maxPrice: {
                type: Number,
                default: 3500,
            },
        },
        data() {
            return {
                filters: {
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




