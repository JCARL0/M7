import '../css/styles.css';
import './bootstrap';

import { createApp } from 'vue';
import ProductApp from './components/ProductApp.vue';
import LoginForm from './components/LoginForm.vue';
import ProductTable from './components/ProductTable.vue';
import ProductForm from './components/ProductForm.vue';

const app = createApp({});
app.component('product-app', ProductApp);
app.component('login-form', LoginForm);
app.component('product-table', ProductTable);
app.component('product-form', ProductForm);

app.mount('#app');


