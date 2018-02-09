var Vue = require('vue');

Vue.component('play-object-listing', require('./Components/PlayObjectListing'));

const application = new Vue({
	el: '#vue-application'
});