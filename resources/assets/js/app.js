require('./bootstrap');
require('./jquery');

Vue.component('posts', require('./components/Posts.vue'));

const app = new Vue({
    el: '#app'
});
