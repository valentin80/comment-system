/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('post', require('./components/Post').default);
Vue.component('notification', require('./components/Notification').default);
Vue.component('feed', require('./components/Feed').default);
Vue.component('comment', require('./components/Comment').default);

import { store } from './store';

const app = new Vue({
    el: '#app',
    store: store
});
