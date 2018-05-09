;(function(factory) {
	'use strict';
	if(typeof define === 'function' && define.amd) {
		define(['jquery'], factory);
	} else if(typeof exports !== 'undefined') {
		module.exports = factory(require('jquery'));
	} else {
		factory(jQuery);
	}
}(function($) {
	'use strict';

	var Sample = window.Sample || {};

	Sample = (function() {

		var uid = 0;

		function Sample(element, settings) {
			var _ = this, data;

			// Plugin Defaultoptionen
			_.defaults = {
				accessibility: true
			};

			// interne globale Variablen
			_.initials = {
				animating: false,
			};

			$.extend(_, _.initials);

			_.data = $(element).data('sample') || {};

			_.options = $.extend({}, _.defaults, settings, _.data);

			_.proxyMethod = $.proxy(_.proxyMethod, _);

			_.uid = uid++;
			_.init(true);

		}

		return Sample;
	}());

	Sample.prototype.init = function(creation) {
		var _ = this;

		console.log('Sample::init');
	};

	Sample.prototype.proxyMethod = function() {
		var _ = this;

		console.log('Sample::proxyMethod');
	};

	$.fn.sample = function() { 
		var _ = this,
			opt = arguments[0],
			args = Array.prototype.slice.call(arguments, 1),
			l = _.length,
			i,
			ret;

		for(i = 0; i < l; i ++) {
			if(typeof opt == 'object' || typeof opt == 'undefined') {
				_[i].sample = new Sample(_[i], opt);
			} else {
				ret = _[i].sample[opt].apply(_[i].sample, args);
			}

			if(typeof ret != 'undefined') {
				return ret;
			}
		}

		return _;
	};
}));