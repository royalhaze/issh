import Vue from 'vue';
import router from "./services/router/router";
import VueRouter from "vue-router";
import Loading from 'vue-loading-overlay';
import 'vue-loading-overlay/dist/vue-loading.css';
import LaravelVuePagination from 'laravel-vue-pagination';
import VuePersianDatetimePicker from 'vue-persian-datetime-picker';
import VModal from "vue-js-modal";
import vSelect from 'vue-select';
import 'vue-select/dist/vue-select.css';

import VueSweetalert2 from 'vue-sweetalert2';
// If you don't need the styles, do not connect
import 'sweetalert2/dist/sweetalert2.min.css';
import './../css/app.css';
Vue.use(VueSweetalert2);
Vue.component('v-select', vSelect)
Vue.use(VModal,{ componentName: 'modal' });
Vue.component('date-picker', VuePersianDatetimePicker);
Vue.use(VueRouter);
Vue.use(Loading,{
    loader:'dots',
    opacity:0.9,
    height:150,
    width:150,
    canCancel:false
});
Vue.component('pagination',LaravelVuePagination);
const app = new Vue({
    el:'#app',
    router
});

export default app;
