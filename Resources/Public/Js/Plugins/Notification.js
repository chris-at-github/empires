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
				lastNotification: null,
				cookieEnabled: true,
				cookieName: 'notification',
				onUpdate: null
			};

			// interne globale Variablen
			_.initials = {
				element: $(element),
				lastNotification: null,
				itemClassSeen: 'notification--listing-item-seen',
				itemClassUnseen: 'notification--listing-item-unseen',
				itemsUnseenCount: 0,
				triggerClassSeen: 'notification--trigger-seen',
				triggerClassUnseen: 'notification--trigger-unseen'
			};

			$.extend(_, _.initials);

			_.data = $(element).data('notification') || {};

			_.options = $.extend({}, _.defaults, settings, _.data);

			_.uid = uid++;
			_.init();

		}

		return Notification;
	}());

	Notification.prototype.init = function() {
		var _ = this;

		// Zeitstempel speichern
		_.initializeLastNotificationTime();

		// moegliche Trigger identifizieren
		_.initials.triggers = $('[data-notification-target="' + _.element.data('notification-id') + '"');

		_.items();
		_.updateTriggers();
	};

	Notification.prototype.initializeLastNotificationTime = function(datetime) {
		var _ = this;

		if(_.options.lastNotification !== null) {
			_.initials.lastNotification = _.options.lastNotification;
		}

		if(_.options.cookieEnabled === true && _.getCookie() !== null) {
			var cookieLastNotification = parseInt(_.getCookie());

			// Setzen des Cookieeintrags nur wenn er aktueller ist, als der initiale Wert
			if(_.options.lastNotification === null || cookieLastNotification > _.options.lastNotification) {
				_.initials.lastNotification = cookieLastNotification;
			}
		}

		// sicher gehen das immer ein Zeitstempel gesetzt ist
		// gesamte Berechnung erfolgt anhand von Timestamps
		if(_.initials.lastNotification === null) {
			_.initials.lastNotification = Math.round(new Date().getTime() / 1000);
		}
	};

	Notification.prototype.setLastNotificationTime = function(timestamp) {
		var _ = this;

		if(timestamp !== undefined) {
			_.initials.lastNotification = timestamp;
		}

		if(_.options.cookieEnabled === true) {
			_.setCookie(timestamp);
		}
	};

	Notification.prototype.getLastNotificationTime = function() {
		return this.initials.lastNotification;
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
			}

			$('.notification--trigger-count', trigger).text(_.initials.itemsUnseenCount);
		});
	};

	Notification.prototype.update = function() {
		var _ = this;
		var timestamp = Math.round(new Date().getTime() / 1000);

		// Reset Counter
		_.initials.itemsUnseenCount = 0;

		// Zeit neu setzen
		_.setLastNotificationTime(timestamp);

		// Eintraege und Trigger updaten
		_.items();
		_.updateTriggers();

		// Callback
		if(typeof _.options.onUpdate === 'function') {
			_.options.onUpdate(_, timestamp);
		}
	};

	// @see: https://www.w3schools.com/js/js_cookies.asp
	Notification.prototype.setCookie = function(value) {
		var _ = this;
		var date = new Date();
		var expires;

		date.setTime(date.getTime() + (365 * 24 * 60 * 60 * 1000));
		expires = 'expires=' + date.toUTCString();

		document.cookie = _.options.cookieName + '=' + value + ';' + expires + ';path=/';
	};

	// @see: https://www.w3schools.com/js/js_cookies.asp
	Notification.prototype.getCookie = function() {
		var _ = this;
		var name = _.options.cookieName + '=';
		var decoded = decodeURIComponent(document.cookie);
		var parts = decoded.split(';');

		for(var i = 0; i < parts.length; i ++) {
			var part = parts[i];

			while(part.charAt(0) == ' ') {
				part = part.substring(1);
			}

			if(part.indexOf(name) === 0) {
				return part.substring(name.length, part.length);
			}
		}

		return null;
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