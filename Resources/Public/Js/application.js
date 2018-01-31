var Vue = require('vue');

Vue.component('object-listing', require('./Components/ObjectListing'));

const application = new Vue({
	el: '#vue-application'
});