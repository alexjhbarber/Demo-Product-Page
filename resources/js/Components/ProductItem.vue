<template>
    <div >
        <h2 >{{ product.name }}</h2>
        <p >{{ product.category }}</p>
        <p >{{ product.brand}}</p>
        <p>{{ product.description }}</p>
        <p >{{ product.price | currency }}</p>
    </div>
</template>

<script>
export default {
    props: {
        product: {
            type: Object,
            required: true,
        },
    },
    filters: {
        currency(value) {
            return `$${parseFloat(value).toFixed(2)}`;
        },
    },
};
</script>