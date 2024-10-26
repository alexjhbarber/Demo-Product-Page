<template>
    <div>
        <product-filter
            :categories="categories"
            :brands="brands"
            @update-category="updateCategory"
            @update-brand="updateBrand"
            multiple
        />
        
        <div v-if="products.length">
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
            categories: [
                'Laptops',
                'Console',
                'Desktop PC',
                'Monitors',
                'Phone',
                'Tablets',
            ],
            brands: [
                'Acer',
                'Amazon',
            ],
            selectedCategories: [],
            selectedBrands: [],
        };
    },
    methods: {
        async fetchProducts() {
            try {
                const response = await axios.get('/api/products', {
                    params: {
                        category: this.selectedCategories.length ? this.selectedCategories.join(',') : '',
                        brand: this.selectedBrands.length ? this.selectedBrands.join(',') : '',
                    },
                });
                this.products = response.data.data;
            } catch (error) {
                console.error(error);
            }
        },
        updateCategory(newCategories) {
            this.selectedCategories = newCategories;
            this.fetchProducts();
        },
        updateBrand(newBrands) {
            this.selectedBrands = newBrands;
            this.fetchProducts();
        },
    },
    mounted() {
        this.fetchProducts();
    },
};
</script>

