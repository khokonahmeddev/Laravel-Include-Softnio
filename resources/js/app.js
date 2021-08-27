require('./bootstrap');

window.Vue = require('vue').default;


import './helpers/helper'

Vue.component('app-login', require('./components/auth/Login.vue').default);
Vue.component('app-register', require('./components/auth/Register.vue').default);
Vue.component('app-reset-password', require('./components/auth/ResetPassword.vue').default);
Vue.component('app-navbar', require('./components/includes/Navbar.vue').default);
Vue.component('app-dashboard', require('./components/dashboard/Dashboard').default);
Vue.component('app-kyc', require('./components/profile/Kyc').default);
Vue.component('app-profile', require('./components/profile/Profile').default);
Vue.component('app-profile-modal', require('./components/profile/ProfileModal').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});
