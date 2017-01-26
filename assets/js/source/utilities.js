/*global ScrollMagic:true, ScrollScene:true, TweenMax */

jQuery(document).ready(function($) {
	$.fn.serializeToObject = function() {
		var o = {};
		var a = this.serializeArray();
		$.each(a, function() {
			if (o[this.name] !== undefined) {
				if (!o[this.name].push) {
					o[this.name] = [o[this.name]];
				}
				o[this.name].push(this.value || '');
			} else {
				o[this.name] = this.value || '';
			}
		});
		return o;
	};

	$.fn.serializeFormJSON = function(options) {
		options = $.extend({}, options);
		var self = this,
			json = {},
			push_counters = {},
			patterns = {
				"validate": /^[a-zA-Z][a-zA-Z0-9_]*(?:\[(?:\d*|[a-zA-Z0-9_]+)\])*$/,
				"key":      /[a-zA-Z0-9_]+|(?=\[\])/g,
				"push":     /^$/,
				"fixed":    /^\d+$/,
				"named":    /^[a-zA-Z0-9_]+$/
			};
		this.build = function(base, key, value){
			base[key] = value;
			return base;
		};
		this.push_counter = function(key){
			if(push_counters[key] === undefined){
				push_counters[key] = 0;
			}
			return push_counters[key]++;
		};
		$.each($(this).serializeArray(), function(){
			// skip invalid keys
			if(!patterns.validate.test(this.name)){
				return;
			}
			var k,
				keys = this.name.match(patterns.key),
				merge = this.value,
				reverse_key = this.name;
			while((k = keys.pop()) !== undefined){
				// adjust reverse_key
				reverse_key = reverse_key.replace(new RegExp("\\[" + k + "\\]$"), '');
				// push
				if(k.match(patterns.push)){
					merge = self.build([], self.push_counter(reverse_key), merge);
				} else if(k.match(patterns.fixed)){
					merge = self.build([], k, merge);
				} else if(k.match(patterns.named)){
					merge = self.build({}, k, merge);
				}
			}
			json = $.extend(true, json, merge);
		});
		return json;
	};
	$.unserialize = function(serializedString){
		var str = decodeURI(serializedString);
		var pairs = str.split('&');
		var obj = {}, p, idx, val;
		for (var i=0, n=pairs.length; i < n; i++) {
			p = pairs[i].split('=');
			idx = p[0];

			if (idx.indexOf("[]") === (idx.length - 2)) {
				var ind = idx.substring(0, idx.length-2);
				if (obj[ind] === undefined) {
					obj[ind] = [];
				}
				obj[ind].push(p[1]);
			}
			else {
				obj[idx] = p[1];
			}
		}
		return obj;
	};

});