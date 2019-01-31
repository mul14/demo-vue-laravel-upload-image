window.Vue = require('vue');
window.axios = require('axios');

// window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

const token = document.head.querySelector('meta[name="csrf-token"]');
window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;

Vue.component('Uploader', require('./components/Uploader.vue').default);
Vue.component('FormDataUploader', require('./components/FormDataUploader.vue').default);

const app = new Vue({
    el: '#app'
});
