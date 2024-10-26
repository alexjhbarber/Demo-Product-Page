import "./bootstrap";
import { createApp } from "vue";
import ProductList from './Components/ProductsList.vue';

import App from "./App.vue";

createApp(App).mount("#app");

// const app = createApp({});
// app.component('product-list', ProductList);
// app.mount('#app');