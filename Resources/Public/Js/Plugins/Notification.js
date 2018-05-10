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

	var Notification = window.Notification || {};

	Notification = (function() {

		var uid = 0;

		function Notification(element, settings) {
			var _ = this, data;

			// Plugin Defaultoptionen
			_.defaults = {
				accessibility: true
			};

			// interne globale Variablen
			_.initials = {
				element: $(element),
				lastNotification: 15,
				itemClassSeen: 'notification--listing-item-seen',
				itemClassUnseen: 'notification--listing-item-unseen',
				itemsUnseenCount: 0,
				triggerClassSeen: 'notification--trigger-seen',
				triggerClassUnseen: 'notification--trigger-unseen'
			};

			$.extend(_, _.initials);

			_.data = $(element).data('notification') || {};

			_.options = $.extend({}, _.defaults, settings, _.data);

			_.proxyMethod = $.proxy(_.proxyMethod, _);

			_.uid = uid++;
			_.init();

		}

		return Notification;
	}());

	Notification.prototype.init = function() {
		var _ = this;

		// moegliche Trigger identifizieren
		_.initials.triggers = $('[data-notification-target="' + _.element.data('notification-id') + '"');

		_.items();
		_.updateTriggers();
	};

	Notification.prototype.getLastNotificationTime = function() {
		var _ = this;

		return _.initials.lastNotification;
	};

	Notification.prototype.items = function() {
		var _ = this;

		$('.notification--listing li', _.initials.element).each(function() {
			var item = $(this);
			var datetime = item.data('notification-datetime');

			if(datetime <= _.getLastNotificationTime()) {
				item.addClass(_.initials.itemClassSeen);
			
			} else {
				item.addClass(_.initials.itemClassUnseen);

				// Counter fuer die Trigger-Anzeige hochzaehlen
				_.initials.itemsUnseenCount++;
			}
		});
	};

	Notification.prototype.updateTriggers = function() {
		var _ = this;

		_.initials.triggers.each(function() {
			var trigger = $(this);

			if(_.initials.itemsUnseenCount === 0) {
				trigger
					.removeClass(_.initials.triggerClassUnseen)
					.addClass(_.initials.triggerClassSeen);
			
			} else {
				trigger
					.removeClass(_.initials.triggerClassSeen)
					.addClass(_.initials.triggerClassUnseen);

				$('.notification--trigger-count', trigger).text(_.initials.itemsUnseenCount);
			}
		});
	};

	Notification.prototype.proxyMethod = function() {
		var _ = this;

		console.log('Notification::proxyMethod');
	};

	$.fn.notification = function() { 
		var _ = this,
			opt = arguments[0],
			args = Array.prototype.slice.call(arguments, 1),
			l = _.length,
			i,
			ret;

		for(i = 0; i < l; i ++) {
			if(typeof opt == 'object' || typeof opt == 'undefined') {
				_[i].notification = new Notification(_[i], opt);
			} else {
				ret = _[i].notification[opt].apply(_[i].notification, args);
			}

			if(typeof ret != 'undefined') {
				return ret;
			}
		}

		return _;
	};
}));