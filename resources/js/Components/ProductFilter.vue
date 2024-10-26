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
    },
    data() {
        return {
            selectedCategories: [],
            selectedBrands: [],
        };
    },
    methods: {
        onCategoryChange() {
            this.$emit('update-category', this.selectedCategories);
        },
        onBrandChange() {
            this.$emit('update-brand', this.selectedBrands);
        },
    },
};
</script>

