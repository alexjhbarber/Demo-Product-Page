<template>
        <div class="flex w-[var(--xl, 1280px)] items-start gap-4">
        <product-filter
            @update-filters="updateFilterParams"
            @update-filters-price="updatePriceRange"
            multiple
        />
        
        <div class="w-full flex flex-wrap gap-2.5" v-if="products.length">
            <product-item v-for="product in products" :key="product.id" :product="product" />
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
                    },
                });
                this.products = response.data.data;
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
    },
    mounted() {
        this.fetchProducts();
    },
};
</script>


