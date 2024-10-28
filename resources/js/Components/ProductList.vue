<template>
    <div class="flex w-[var(--xl, 1280px)] items-start gap-4">
        <product-filter
            @update-filters="updateFilterParams"
            @update-filters-price="updatePriceRange"
            
            multiple
        />
        <div class="w-[1008px] flex flex-wrap gap-2.5">
            <p class="mb-4 text-2xl font-semibold text-gray-900">Featured Deals</p>
            <div class="w-full flex flex-wrap gap-2.5" v-if="products.length">
                <product-item v-for="product in products" :key="product.id" :product="product" />
            </div>

            <div class="w-full mt-12 flex justify-center mb-2">
                <button
                    :class="['w-[82px] text-sm font-medium text-gray-500 px-3 py-1 border rounded rounded-r-none  border-gray-300 items-center flex-col flex', { 'bg-gray-300': productMeta.current_page === 1 }]"
                    :disabled="productMeta.current_page === 1"
                    @click="newPage(productMeta.current_page - 1)"
                >
                    Previous
                </button>
                <button
                    :class="['w-[82px] text-sm font-medium text-gray-500 px-3 py-1 border rounded rounded-l-none border-gray-300 items-center flex-col flex', { 'bg-gray-300': productMeta.current_page === productMeta.last_page }]"
                    :disabled="productMeta.current_page === productMeta.last_page"
                    @click="newPage(productMeta.current_page + 1)"
                >
                    Next
                </button>
            </div>
        </div>
    </div>
    
    
</template>

<script>
import axios from 'axios';
import ProductItem from './ProductItem.vue';
import ProductFilter from './ProductFilter.vue';

export default {
    components: {
        ProductItem,
        ProductFilter,
    },
    data() {
        return {
            productMeta: [],
            products: [],
            selectedCategories: [],
            selectedBrands: [],
        };
    },
    methods: {
        async fetchProducts() {
            const params = new URLSearchParams(window.location.search);
            try {
                const response = await axios.get('/api/products', {
                    params: {
                        category: params.get('category') || '',
                        brand: params.get('brand') || '',
                        min_price: params.get('minPrice') || '',
                        max_price: params.get('maxPrice') || '',
                        page: params.get('page') ,
                    },
                });
                
                this.products = response.data.data;
                this.productMeta = response.data;
            } catch (error) {
                console.error(error);
            }
        },
        updateFilterParams(key, value) {
            const params = new URLSearchParams(window.location.search);
            params.set(key, value);
            history.replaceState({}, '', `${window.location.pathname}?${params}`);
            this.fetchProducts();
        },
        updatePriceRange(min, max) {
            const params = new URLSearchParams(window.location.search);
            params.set('minPrice', min);
            params.set('maxPrice', max);
            history.replaceState({}, '', `${window.location.pathname}?${params}`);
            this.fetchProducts();
        },
        newPage(page) {
            const params = new URLSearchParams(window.location.search);
            params.set('page', page);
            history.replaceState({}, '', `${window.location.pathname}?${params}`);
            this.fetchProducts();
        },
    },
    mounted() {
        this.fetchProducts();
    },
};
</script>


