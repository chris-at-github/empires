var Vue = require('vue');

Vue.component('vue-object-listing', require('./Components/VueObjectListing'));

const application = new Vue({
	el: '#vue-application'
});