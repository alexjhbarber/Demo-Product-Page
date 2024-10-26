<template>
    <div >
        
        <div v-if="products.length">
            <product-item v-for="product in products" :key="product.id" :product="product" />
        </div>
    </div>
</template>

<script>
import axios from 'axios';
import ProductItem from './ProductItem.vue';

export default {
    components: {
        ProductItem,
    },
    data() {
        return {
            products: [],
        };
    },
    methods: {
        async fetchProducts() {
            try {
                const response = await axios.get('/api/products', {
                });
                this.products = response.data.data;
            } catch (error) {
                console.error(error);
            }
        },
    },
    mounted() {
        this.fetchProducts();
    },
};
</script>

