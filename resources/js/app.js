/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import { createApp } from 'vue';
import dayjs from 'dayjs';
require('./bootstrap');
import $ from 'jquery';
window.$ = window.jQuery = $;

// Importar los componentes manualmente
import AdminCollectors from './components/AdminCollectors.vue';
import AdminEnvios from './components/AdminEnvios.vue';
import AdminMessagesFormContact from './components/AdminMessagesFormContact.vue';
import AdminShipmentsStatuses from './components/AdminShipmentsStatuses.vue';
import CollectorShipment from './components/CollectorShipment.vue';
import CustomerEnviosClientes from './components/CustomerEnviosClientes.vue';
import CustomerDirecotorioClientes from './components/CustomerDirecotorioClientes.vue';
import CustomerShipmentCreate from './components/CustomerShipmentCreate.vue';
import TestFecha from './components/TestFecha.vue';
import Envios from './components/Envios.vue';


const app = createApp({});

// Registrar los componentes globalmente

app.component('admin-collectors', AdminCollectors);
app.component('admin-envios', AdminEnvios);
app.component('admin-messages-form-contact', AdminMessagesFormContact);
app.component('admin-shipments-statuses', AdminShipmentsStatuses);
app.component('collector-shipment', CollectorShipment);
app.component('customer-envios-clientes', CustomerEnviosClientes);
app.component('customer-directorio-clientes', CustomerDirecotorioClientes);
app.component('customer-shipment-create', CustomerShipmentCreate);
app.component('test-fecha', TestFecha);
app.component('envios', Envios);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// Montar la aplicación en el `#app`
app.mount('#app');
