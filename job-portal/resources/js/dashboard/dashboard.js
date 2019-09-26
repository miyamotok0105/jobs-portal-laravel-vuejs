window._ = require('lodash');
try
{
    window.Popper = require('popper.js').default;
    window.$ = window.jQuery = require('jquery');
    require('bootstrap');
    require('admin-lte');
}
catch(e){}
window.axios = require('axios');
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
let token = document.head.querySelector('meta[name="csrf-token"]');
if (token) window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
else console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token');

/**
 * Vue
 */
window.Vue = require('vue');
import { Form, HasError, AlertError } from 'vform'
window.Form = Form;
import Swal from 'sweetalert2'
window.swal = Swal;
Vue.component(HasError.name, HasError)
Vue.component(AlertError.name, AlertError)
Vue.prototype.$userID = document.querySelector("meta[name='user-id']").getAttribute('content');

Vue.component('categories', require('./components/categories.vue').default);// Categories Component
Vue.component('companies', require('./components/companies.vue').default);// Companies Component
Vue.component('locations', require('./components/locations.vue').default);// Locations Component
Vue.component('types', require('./components/types.vue').default);// Types Component
Vue.component('jobs', require('./components/jobs.vue').default);// Jobs Component
Vue.component('users', require('./components/users.vue').default);// Users Component
Vue.component('profile', require('./components/profile.vue').default);// Users Component

const dashboard = new Vue({
    el: '#dashboard'
});
