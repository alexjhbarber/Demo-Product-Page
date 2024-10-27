<template>
    <div>
        <div>Categories</div>
        <div v-for="category in categories" :key="category">
            <input
                type="checkbox"
                :value="category"
                v-model="selectedCategories"
                @change="onCategoryChange"
            />
            <label>{{ category }}</label>
        </div>
        <div>Brands</div>
        <div v-for="brand in brands" :key="brand">
            <input
                type="checkbox"
                :value="brand"
                v-model="selectedBrands"
                @change="onBrandChange"
            />
            <label>{{ brand }}</label>
        </div>
        <div>Price Range</div>
        <div>
            <input
                type="number"
                min="0"
                v-model="selectedMinPrice"
                @change="onPriceChange"
            />
            -
            <input
                type="number"
                min="0"
                v-model="selectedMaxPrice"
                @change="onPriceChange"
            />
        </div>
    </div>
</template>

<script>
export default {
    props: {
        categories: {
            type: Array,
            default: () => [],
        },
        brands: {
            type: Array,
            default: () => [],
        },
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
            selectedCategories: [],
            selectedBrands: [],
            selectedMinPrice: this.minPrice,
            selectedMaxPrice: this.maxPrice,
        };
    },
    methods: {
        onCategoryChange() {
            this.$emit('update-filters', 'category', this.selectedCategories);
        },
        onBrandChange() {
            this.$emit('update-filters', 'brand', this.selectedBrands);
        },
        onPriceChange() {
            this.$emit('update-filters-price', this.selectedMinPrice, this.selectedMaxPrice);
        },
    },
};
</script>





