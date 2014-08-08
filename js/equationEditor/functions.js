/*=+ jquery.ui.touch-punch.min.js +=*/
(function(b) {
	b.support.touch = "ontouchend" in document;
	if (!b.support.touch) {
		return;
	}
	var c = b.ui.mouse.prototype,
		e = c._mouseInit,
		a;

	function d(g, h) {
		if (g.originalEvent.touches.length > 1) {
			return;
		}
		g.preventDefault();
		var i = g.originalEvent.changedTouches[0],
			f = document.createEvent("MouseEvents");
		f.initMouseEvent(h, true, true, window, 1, i.screenX, i.screenY, i.clientX,
			i.clientY, false, false, false, false, 0, null);
		g.target.dispatchEvent(f);
	}
	c._touchStart = function(g) {
		var f = this;
		if (a || !f._mouseCapture(g.originalEvent.changedTouches[0])) {
			return;
		}
		a = true;
		f._touchMoved = false;
		d(g, "mouseover");
		d(g, "mousemove");
		d(g, "mousedown");
	};
	c._touchMove = function(f) {
		if (!a) {
			return;
		}
		this._touchMoved = true;
		d(f, "mousemove");
	};
	c._touchEnd = function(f) {
		if (!a) {
			return;
		}
		d(f, "mouseup");
		d(f, "mouseout");
		if (!this._touchMoved) {
			d(f, "click");
		}
		a = false;
	};
	c._mouseInit = function() {
		var f = this;
		f.element.bind("touchstart", b.proxy(f, "_touchStart")).bind("touchmove", b
			.proxy(f, "_touchMove")).bind("touchend", b.proxy(f, "_touchEnd"));
		e.call(f);
	};
})(jQuery);
/*=+ json2.js +=*/
"object" !== typeof JSON && (JSON = {});
(function() {
	function m(a) {
		return 10 > a ? "0" + a : a
	}

	function r(a) {
		s.lastIndex = 0;
		return s.test(a) ? '"' + a.replace(s, function(a) {
			var c = u[a];
			return "string" === typeof c ? c : "\\u" + ("0000" + a.charCodeAt(0).toString(
				16)).slice(-4)
		}) + '"' : '"' + a + '"'
	}

	function p(a, l) {
		var c, d, h, q, g = e,
			f, b = l[a];
		b && ("object" === typeof b && "function" === typeof b.toJSON) && (b = b.toJSON(
			a));
		"function" === typeof k && (b = k.call(l, a, b));
		switch (typeof b) {
			case "string":
				return r(b);
			case "number":
				return isFinite(b) ? String(b) : "null";
			case "boolean":
			case "null":
				return String(b);
			case "object":
				if (!b) return "null";
				e += n;
				f = [];
				if ("[object Array]" === Object.prototype.toString.apply(b)) {
					q = b.length;
					for (c = 0; c < q; c += 1) f[c] = p(c, b) || "null";
					h = 0 === f.length ? "[]" : e ? "[\n" + e + f.join(",\n" + e) + "\n" + g +
						"]" : "[" + f.join(",") + "]";
					e = g;
					return h
				}
				if (k && "object" === typeof k)
					for (q = k.length, c = 0; c < q; c += 1) "string" === typeof k[c] && (d =
						k[c], (h = p(d, b)) && f.push(r(d) + (e ? ": " : ":") + h));
				else
					for (d in b) Object.prototype.hasOwnProperty.call(b, d) && (h = p(d, b)) &&
						f.push(r(d) + (e ? ": " : ":") + h);
				h = 0 === f.length ? "{}" : e ? "{\n" + e + f.join(",\n" + e) + "\n" + g +
					"}" : "{" + f.join(",") + "}";
				e = g;
				return h
		}
	}
	"function" !== typeof Date.prototype.toJSON && (Date.prototype.toJSON =
		function() {
			return isFinite(this.valueOf()) ? this.getUTCFullYear() + "-" + m(this.getUTCMonth() +
				1) + "-" + m(this.getUTCDate()) + "T" + m(this.getUTCHours()) + ":" + m(
				this.getUTCMinutes()) + ":" + m(this.getUTCSeconds()) + "Z" : null
		}, String.prototype.toJSON = Number.prototype.toJSON = Boolean.prototype.toJSON =
		function() {
			return this.valueOf()
		});
	var t =
		/[\u0000\u00ad\u0600-\u0604\u070f\u17b4\u17b5\u200c-\u200f\u2028-\u202f\u2060-\u206f\ufeff\ufff0-\uffff]/g,
		s =
		/[\\\"\x00-\x1f\x7f-\x9f\u00ad\u0600-\u0604\u070f\u17b4\u17b5\u200c-\u200f\u2028-\u202f\u2060-\u206f\ufeff\ufff0-\uffff]/g,
		e, n, u = {
			"\b": "\\b",
			"\t": "\\t",
			"\n": "\\n",
			"\f": "\\f",
			"\r": "\\r",
			'"': '\\"',
			"\\": "\\\\"
		},
		k;
	"function" !== typeof JSON.stringify && (JSON.stringify = function(a, l, c) {
		var d;
		n = e = "";
		if ("number" === typeof c)
			for (d = 0; d < c; d += 1) n += " ";
		else "string" === typeof c && (n = c); if ((k = l) && "function" !==
			typeof l && ("object" !== typeof l || "number" !== typeof l.length)) throw Error(
			"JSON.stringify");
		return p("", {
			"": a
		})
	});
	"function" !== typeof JSON.parse && (JSON.parse = function(a, e) {
		function c(a, d) {
			var g, f, b = a[d];
			if (b && "object" === typeof b)
				for (g in b) Object.prototype.hasOwnProperty.call(b, g) && (f = c(b, g),
					void 0 !== f ? b[g] = f : delete b[g]);
			return e.call(a, d, b)
		}
		var d;
		a = String(a);
		t.lastIndex = 0;
		t.test(a) && (a = a.replace(t, function(a) {
			return "\\u" + ("0000" + a.charCodeAt(0).toString(16)).slice(-4)
		}));
		if (/^[\],:{}\s]*$/.test(a.replace(/\\(?:["\\\/bfnrt]|u[0-9a-fA-F]{4})/g,
			"@").replace(
			/"[^"\\\n\r]*"|true|false|null|-?\d+(?:\.\d*)?(?:[eE][+\-]?\d+)?/g, "]"
		).replace(/(?:^|:|,)(?:\s*\[)+/g, ""))) return d = eval("(" + a + ")"),
			"function" === typeof e ? c({
				"": d
			}, "") : d;
		throw new SyntaxError("JSON.parse");
	})
})();
/*=+ button.js +=*/
(function(c) {
	c.fn.MWButton = function(b) {
		var e, f, g, a = this;
		null != b.label && "" != b.label && (a.label = b.label);
		null != b.icon && "" != b.icon && (a.icon = b.icon);
		null != b.title && "" != b.title && (a.title = b.title);
		a.enabled = null != b.enabled ? b.enabled : !0;
		a.togglemode = null != b.togglemode ? b.togglemode : !1;
		a.splitmode = null != b.splitmode ? b.splitmode : !1;
		a.toggled = null != b.toggled ? b.toggled : !1;
		null != b.id && "" != b.id && (a.id = b.id);
		null != b.css && "" != b.css && (a.css = b.css);
		null != b.hovercss && "" != b.hovercss && (a.hovercss = b.hovercss);
		null != b.clickcss && "" != b.clickcss && (a.clickcss = b.clickcss);
		null != b.disabledcss && "" != b.disabledcss && (a.disabledcss = b.disabledcss);
		null != b.disabledhovercss && "" != b.disabledhovercss && (a.disabledhovercss =
			b.disabledhovercss);
		null != b.disabledclickcss && "" != b.disabledclickcss && (a.disabledclickcss =
			b.disabledclickcss);
		null != b.iconcss && "" != b.iconcss && (a.iconcss = b.iconcss);
		null != b.splitbuttoncss && "" != b.splitbuttoncss && (a.splitbuttoncss = b
			.splitbuttoncss);
		null != b.target && "" != b.target && (a.target = b.target);
		null != b.clickhandler && "" != b.clickhandler && (a.clickhandler = b.clickhandler);
		null != a.id && c(a).attr("id", a.id);
		null != a.label && (e = c("<span/>"), c(e).appendTo(c(a)));
		if (null != a.icon) {
			var d = c("<div/>");
			c(d).appendTo(c(a));
			null != a.iconcss && c(d).addClass(a.iconcss);
			f = c("<img />");
			c(f).appendTo(c(d))
		}
		a.splitmode && (b = c("<div/>"), c(b).appendTo(c(a)), null != a.splitbuttoncss &&
			c(b).addClass(a.splitbuttoncss), a.clickhandler = function() {
				g.toggleTargetMenu()
			});
		a.refresh = function() {
			null != a.label && c(e).html(a.label);
			null != a.icon && c(f).attr("src", a.icon);
			null != a.title && c(a).attr("title", a.title);
			a.toggled ? null != a.clickcss && (c(a).removeClass(a.css), c(a).addClass(
				a.clickcss)) : a.enabled || null == a.disabledcss ? null != a.css && (c(
				a).removeClass(a.disabledcss), c(a).addClass(a.css)) : (c(a).removeClass(
				a.css), c(a).addClass(a.disabledcss))
		};
		a.toggleEnabled = function() {
			a.enabled = !a.enabled
		};
		a.toggleButton = function() {
			a.toggled = !a.toggled;
			a.refresh()
		};
		a.toggleMenu = function() {
			c(g).toggleMenu()
		};
		a.refresh();
		if (null != a.hovercss || null != a.disabledhovercss) c(a).mouseenter(
			function() {
				a.toggled || (a.enabled ? null != a.hovercss && (null != a.css && c(this)
						.removeClass(a.css), c(this).addClass(a.hovercss)) : null != a.disabledhovercss &&
					(null != a.disabledcss && c(this).removeClass(a.disabledcss), c(this).addClass(
						a.disabledhovercss)))
			}), c(a).mouseleave(function() {
			a.toggled || (a.enabled ? null != a.hovercss && (c(this).removeClass(a.hovercss),
					null != a.css && c(this).addClass(a.css)) : null != a.disabledhovercss &&
				(c(this).removeClass(a.disabledhovercss), null != a.disabledcss && c(
					this).addClass(a.disabledcss)))
		});
		if (null != a.clickcss || null != a.disabledclickcss) c(a).mousedown(
			function(b) {
				b.stopPropagation();
				a.enabled ? (a.togglemode && a.toggleButton(), null != a.clickcss && (
					null != a.hovercss && c(this).removeClass(a.hovercss), c(this).addClass(
						a.clickcss))) : null != a.disabledclickcss && (null != a.disabledhovercss &&
					c(this).removeClass(a.disabledhovercss), c(this).addClass(a.disabledclickcss)
				)
			}), c(a).mouseup(function(b) {
			b.stopPropagation();
			a.toggled || (a.enabled ? null != a.clickcss && (c(this).removeClass(a.clickcss),
					null != a.hovercss && c(this).addClass(a.hovercss)) : null != a.disabledclickcss &&
				(c(this).removeClass(a.disabledclickcss), null != a.disabledhovercss &&
					c(this).addClass(a.disabledhovercss)))
		});
		null != a.clickhandler && c(a).click(function(b) {
			b.stopPropagation();
			a.enabled && a.clickhandler.call(this, b)
		});
		return a
	}
})(jQuery);
/*=+ jquery.mousewheel.js +=*/
(function(c) {
	"function" === typeof define && define.amd ? define(["jquery"], c) : "object" ===
		typeof exports ? module.exports = c : c(jQuery)
})(function(c) {
	function m(b) {
		var a = b || window.event,
			g = [].slice.call(arguments, 1),
			d = 0,
			e = 0,
			h = 0,
			f = 0,
			f = 0;
		b = c.event.fix(a);
		b.type = "mousewheel";
		a.wheelDelta && (d = a.wheelDelta);
		a.detail && (d = -1 * a.detail);
		a.deltaY && (d = h = -1 * a.deltaY);
		a.deltaX && (e = a.deltaX, d = -1 * e);
		void 0 !== a.wheelDeltaY && (h = a.wheelDeltaY);
		void 0 !== a.wheelDeltaX && (e = -1 * a.wheelDeltaX);
		f = Math.abs(d);
		if (!l || f < l) l = f;
		f = Math.max(Math.abs(h), Math.abs(e));
		if (!k || f < k) k = f;
		a = 0 < d ? "floor" : "ceil";
		d = Math[a](d / l);
		e = Math[a](e / k);
		h = Math[a](h / k);
		g.unshift(b, d, e, h);
		return (c.event.dispatch || c.event.handle).apply(this, g)
	}
	var n = ["wheel", "mousewheel", "DOMMouseScroll", "MozMousePixelScroll"],
		g = "onwheel" in document || 9 <= document.documentMode ? ["wheel"] : [
			"mousewheel", "DomMouseScroll", "MozMousePixelScroll"
		],
		l, k;
	if (c.event.fixHooks)
		for (var p = n.length; p;) c.event.fixHooks[n[--p]] = c.event.mouseHooks;
	c.event.special.mousewheel = {
		setup: function() {
			if (this.addEventListener)
				for (var b = g.length; b;) this.addEventListener(g[--b], m, !1);
			else this.onmousewheel = m
		},
		teardown: function() {
			if (this.removeEventListener)
				for (var b = g.length; b;) this.removeEventListener(g[--b], m, !1);
			else this.onmousewheel = null
		}
	};
	c.fn.extend({
		mousewheel: function(b) {
			return b ? this.bind("mousewheel", b) : this.trigger("mousewheel")
		},
		unmousewheel: function(b) {
			return this.unbind("mousewheel", b)
		}
	})
});
/*=+ utility.js +=*/
String.prototype.replaceAll = function(a, b) {
	return this.replace(RegExp(a.escapeRegExp(), "g"), b)
};
String.prototype.Replace = function(a, b) {
	return this.replace(RegExp(a.escapeRegExp(), "g"), b)
};
String.prototype.escapeRegExp = function() {
	return this.replace(/[-[\]{}()*+?.,\\^$|#\s]/g, "\\$&")
};
String.prototype.remove = function(a, b) {
	return null == b ? this.substring(0, a) : this.substring(0, a) + this.substring(
		a + b)
};
String.prototype.startsWith = function(a) {
	return this.substr(0, a.length) == a
};
String.prototype.StartsWith = function(a) {
	return this.substr(0, a.length) == a
};
String.prototype.endsWith = function(a) {
	return this.slice(-a.length) == a
};
String.prototype.EndsWith = function(a) {
	return this.slice(-a.length) == a
};
String.prototype.contains = function(a) {
	return -1 < this.indexOf(a)
};
String.prototype.Contains = function(a) {
	return -1 < this.indexOf(a)
};
String.prototype.insert = function(a, b) {
	return this.substring(0, a) + b + this.substr(a)
};
String.prototype.isNumeric = function() {
	return " " != this ? !isNaN(this) : !1
};
String.prototype.isLetter = function() {
	return null != this.match(
		/[a-z\u03c0\u221e\u00b0\u03b8\u03b1\u00b5\u03bc\u03c3]/i)
};
String.prototype.IsLetter = function() {
	return null != this.match(
		/[a-z\u03c0\u221e\u00b0\u03b8\u03b1\u00b5\u03bc\u03c3]/i)
};
String.prototype.indicesOf = function(a) {
	for (var b = 0, c = []; - 1 < (b = this.indexOf(a, b));) c.push(b), b += a.length;
	return c
};
String.prototype.ToCharArray = function() {
	return this.split("")
};
String.prototype.Length = function() {
	return this.length
};
String.prototype.Substring = function(a, b) {
	return this.substr(a, b)
};
String.prototype.IndexOf = function(a) {
	return this.indexOf(a)
};
String.prototype.LastIndexOf = function(a) {
	return this.lastIndexOf(a)
};
String.prototype.ToLower = function() {
	return this.toLowerCase()
};
String.prototype.Split = function(a, b) {
	return this.split(a, null != b ? b : 999999)
};
String.prototype.ReplaceBegEnd = function(a, b, c, f) {
	for (var d = this;;) {
		var e = d.IndexOf(a);
		if (-1 == e) break;
		if (-1 == d.IndexOf(b, e)) break;
		var g = d.substring(0, e),
			d = d.substring(e + a.length);
		d.indexOf(a) && (d = d.ReplaceBegEnd(a, b, c, f));
		d = d.replace(b, f);
		d = g + c + d
	}
	return d
};

function ExtractBetween(a, b, c) {
	b = a.indexOf(b);
	return -1 < b && (c = a.substring(b + 1).indexOf(c), -1 < c) ? a.substring(b +
		1, b + c + 1) : null
}
Array.prototype.removeAt = function(a) {
	this.splice(a, 1)
};
Array.prototype.remove = function(a, b) {
	var c = this.slice((b || a) + 1 || this.length);
	this.length = 0 > a ? this.length + a : a;
	return this.push.apply(this, c)
};
Array.prototype.unique = function() {
	for (var a = [], b = this.length; b--;) {
		var c = this[b]; - 1 === $.inArray(c, a) && a.unshift(c)
	}
	return a
};
Array.prototype.clone = function() {
	return JSON.parse(JSON.stringify(this))
};
Array.prototype.Count = function() {
	return this.length
};
Array.prototype.Length = function() {
	return this.length
};
Array.prototype.Add = function(a) {
	this.push(a)
};
Array.prototype.Contains = function(a) {
	for (var b = !1, c = 0; c < this.length; c++)
		if (this[c] == a) {
			b = !0;
			break
		}
	return b
};
Array.prototype.deepCopy = function() {
	return $.extend([], this)
};
Math.Max = function(a, b, c) {
	return Math.max(a, b, c)
};
Math.Min = function(a, b, c) {
	return Math.min(a, b, c)
};
Math.Round = function(a) {
	return Math.round(a)
};
Math.Pow = function(a, b) {
	return Math.pow(a, b)
};
Math.Abs = function(a) {
	return Math.abs(a)
};
Math.Log = function(a) {
	return Math.log(a)
};
Math.Log10 = function(a) {
	return Math.log(a) / Math.LN10
};
Math.getBaseLog = function(a, b) {
	return Math.log(b) / Math.log(a)
};
Math.Sin = function(a) {
	return Math.sin(a)
};
Math.Cos = function(a) {
	return Math.cos(a)
};
Math.Tan = function(a) {
	return Math.tan(a)
};
Math.Asin = function(a) {
	return Math.asin(a)
};
Math.Acos = function(a) {
	return Math.acos(a)
};
Math.Atan = function(a) {
	return Math.atan(a)
};
Math.Sqrt = function(a) {
	return Math.sqrt(a)
};
Math.Sinh = function(a) {
	return Math.log(a + Math.sqrt(a * a + 1))
};
Math.Cosh = function(a) {
	return (Math.exp(a) + Math.exp(-a)) / 2
};
Math.Tanh = function(a) {
	return (Math.exp(a) - Math.exp(-a)) / (Math.exp(a) + Math.exp(-a))
};
/*=+ fprint.js +=*/
function Fprint() {
	function p(a, b, e) {
		if (0 <= a.indexOf(b) && 0 <= a.indexOf(e)) {
			var c = 0;
			do {
				if (a.indexOf(b, c) < a.replaceAll("&", "").indexOf(e, c) && -1 < a.indexOf(
					b, c)) {
					for (var d = a.substr(a.indexOf(b, c) + b.length, a.replaceAll("&", "").indexOf(
							e, c) - (a.indexOf(b, c) + b.length)), g = 0, h = !1, f = 0; f <= d.length -
						1; f++)
						if ("(" == d.charAt(f) || "[" == d.charAt(f) || "{" == d.charAt(f) ||
							"\u00ab" == d.charAt(f)) g += 1;
						else if (")" == d.charAt(f) || "]" == d.charAt(f) || "}" == d.charAt(f) ||
						"\u00bb" == d.charAt(f)) {
						if (g -= 1, 0 > g) {
							h = !0;
							break
						}
					} else if ("<" == d.charAt(f) && f < d.length) {
						if (-1 == k.TagStr.indexOf(d.charAt(f + 1).toString().toUpperCase())) {
							h = !0;
							break
						}
					} else if (">" == d.charAt(f) && 0 < f) {
						if (-1 == k.TagStr.indexOf(d.charAt(f - 1).toString().toUpperCase())) {
							h = !0;
							break
						}
					} else if ("=" == d.charAt(f) || "$" == d.charAt(f)) {
						h = !0;
						break
					}
					0 < g && (h = !0);
					d = a.replaceAll("&", "").indexOf(e, c);
					!1 == h && (a = a.remove(a.indexOf(b, c) + b.length - 1, 1), a = ")" ==
						a.charAt(d - 1).toString() || "]" == a.charAt(d - 1).toString() || "}" ==
						a.charAt(d - 1).toString() || "\u00bb" == a.charAt(d - 1).toString() ?
						a.remove(d - 1, 1) : a.remove(d, 1));
					c = !0 == h ? c + (b.length - 1) : d
				}
				c += 1
			} while (c < a.length)
		}
		return a
	}
	var k = this;
	k.isChemistry = !1;
	k.allowSpaces = !0;
	k.AllowedKeyString = null;
	k.AllowedPhrases = null;
	k.AllowedBegin = null;
	k.AllTagStr = "FERCPNXUBSHOWDTYMZLAGJVQ";
	k.TagStr = "FRCEISMZLAGJW";
	k.InsertAbs = function(a) {
		var b = 0,
			e = 0;
		do {
			if ("|" == a.charAt(b).toString()) a = 0 == e % 2 ? a.insert(b + 1, "(") :
				a.insert(b, ")"), b += 1, e += 1;
			else if ("<" == a.charAt(b).toString())
				if (b < a.length - 2) {
					if (-1 == k.TagStr.indexOf(a.charAt(b + 1).toString().toUpperCase()) ||
						">" != a.charAt(b + 2).toString()) e = 0
				} else e = 0;
			else if (">" == a.charAt(b).toString())
				if (1 < b) {
					if (-1 == k.TagStr.indexOf(a.charAt(b - 1).toString().toUpperCase()) ||
						"<" != a.charAt(b - 2).toString()) e = 0
				} else e = 0;
			else if ("_" == a.charAt(b).toString() || "=" == a.charAt(b).toString() ||
				"$" == a.charAt(b).toString()) e = 0;
			b += 1
		} while (b < a.length);
		return a
	};
	k.AbsCleanup = function(a) {
		var b = 0,
			e = 0;
		do {
			if ("|" == a.charAt(b).toString()) {
				if (0 == e % 2) a = a.remove(b + 1, 1);
				else if (")" == a.charAt(b - 1).toString() || "}" == a.charAt(b - 1).toString() ||
					"\u00bb" == a.charAt(b - 1).toString()) a = a.remove(b - 1, 1), b -= 1;
				e += 1
			} else if (a.indexOf("<N>") == b) e = 0, b += 2;
			else if ("=" == a.charAt(b).toString() || "$" == a.charAt(b).toString()) e =
				0;
			else if (">" == a.charAt(b).toString())
				if (1 < b) {
					if (-1 == k.TagStr.indexOf(a.charAt(b - 1).toString().toUpperCase()) ||
						"<" != a.charAt(b - 2).toString()) e = 0
				} else e = 0;
			else if ("<" == a.charAt(b).toString())
				if (b < a.length - 2) {
					if (-1 == k.TagStr.indexOf(a.charAt(b + 1).toString().toUpperCase()) ||
						">" != a.charAt(b + 2).toString()) e = 0
				} else e = 0;
			b += 1
		} while (b < a.length);
		return a
	};
	k.InsertCTags = function(a) {
		-1 < a.indexOf("?") && (a = a.replaceAll("?", "<C>?<c>"), k.AddExplanation(
			" - A value is needed at <C>?<c>"));
		for (var b = 0, e = 0, c = [], d = !1, g = [], h = !1, f = 0; f <= a.length -
			1; f++) "." != a.charAt(f).toString() && !1 == a.charAt(f).isNumeric() &&
			(b = 0), "|" == a.charAt(f).toString() ? d ? (d = !1, "|" != c[c.length -
				1].toString() ? (k.AddExplanation(
				" - The <C>|<c> is outside the opening <C>|<c>"), g.push(f)) : c.removeAt(
				c.length - 1)) : (d = !0, c.push("|")) : "(" == a.charAt(f).toString() ||
			"{" == a.charAt(f).toString() || "\u00ab" == a.charAt(f).toString() ? (e =
				0, h = !1, 0 < f && "|" == a.charAt(f - 1).toString() && (h = !0), !1 ==
				h && c.push("(")) : ")" == a.charAt(f).toString() || "}" == a.charAt(f).toString() ||
			"\u00bb" == a.charAt(f).toString() ? (h = !1, f < a.length - 1 && "|" == a
				.charAt(f + 1).toString() && (h = !0), !1 == h && (0 == c.length ? (k.AddExplanation(
						" - The <C>)<c> needs an opening <C>(<c>"), g.push(f)) : 1 == e && 1 ==
					c.length ? (e = 0, c.removeAt(c.length - 1)) : "(" != c[c.length - 1].toString() &&
					"{" != c[c.length - 1].toString() && "\u00ab" != c[c.length - 1].toString() ?
					(k.AddExplanation(" - The <C>)<c> needs an opening <C>(<c>"), g.push(f)) :
					c.removeAt(c.length - 1))) : "[" == a.charAt(f).toString() ? (e = 0, c.push(
				"[")) : "]" == a.charAt(f).toString() ? 0 == c.length ? (k.AddExplanation(
				" - The <C>]<c> needs an opening <C>[<c>"), g.push(f)) : 1 == e && 1 == c
			.length ? (e = 0, c.removeAt(c.length - 1)) : "[" != c[c.length - 1].toString() ?
			(k.AddExplanation(" - The <C>]<c> needs an opening <C>[<c>"), g.push(f)) :
			c.removeAt(c.length - 1) : "." == a.charAt(f).toString() ? (b += 1, 1 < b &&
				(k.AddExplanation(
					" - There are too many decimal points in the expression"), g.push(f))) :
			"," == a.charAt(f).toString() ? e += 1 : "=" == a.charAt(f).toString() ||
			"$" == a.charAt(f).toString() ? 0 < c.length && (k.AddExplanation(
				" - There are still open parenthesis, brackets, and/or absolute values on the left side of <C>" +
				a.charAt(f) + "<c>"), g.push(f), c = [], d = !1) : ">" == a.charAt(f).toString() ?
			-1 == k.TagStr.indexOf(a.charAt(f - 1).toString().toUpperCase()) && 0 < c.length &&
			(k.AddExplanation(
				" - There are still open parenthesis, brackets, and/or absolute values on the left side of <C>><c>"
			), g.push(f), c = [], d = !1) : "<" == a.charAt(f).toString() ? f < a.length -
			1 && (-1 == k.TagStr.indexOf(a.charAt(f + 1).toString().toUpperCase()) &&
				0 < c.length) && (k.AddExplanation(
				" - There are still open parenthesis, brackets, and/or absolute values on the left side of <C><<c>"
			), g.push(f), c = [], d = !1) : "_" == a.charAt(f).toString() && (b = 0, c = [],
				d = !1);
		for (f = 0; f <= g.length - 1; f++) a = a.insert(g[f] + 1 + 6 * f, "<c>"),
			a = a.insert(g[f] + 6 * f, "<C>");
		b = a = a.replaceAll(")<C>|<c>", "<C>|<c>");
		a = "";
		a = !1 == k.allowSpaces ? b.replaceAll(" ", "") : b;
		if (0 < k.AllowedPhrases.length)
			for (b = null, b = k.AllowedPhrases.split(";"), c = 0; c <= b.length - 1; c++)
				a = a.replaceAll(b[c], "<K>" + b[c] + "<k>");
		d = k.AllowedBegin.split(";");
		b = k.AllTagStr + "IK";
		e = [];
		for (g = c = 0; g <= d.length - 1; g++)
			if (a.startsWith(d[g])) {
				c += d[g].length;
				break
			} else if (a.startsWith("&" + d[g])) {
			c += d[g].length + 1;
			break
		}
		for (d = 0; c <= a.length - 1; c++) - 1 == k.AllowedKeyString.indexOf(a.charAt(
			c)) && (g = !1, 0 < c && c + 1 < a.length && (h = a.toUpperCase(), "<" ==
			a.charAt(c - 1).toString() && (">" == a.charAt(c + 1).toString() && -1 <
				b.indexOf(h.charAt(c))) && (g = !0, "K" == a.charAt(c).toString() ? d +=
				1 : "k" == a.charAt(c).toString() && (d -= 1))), !1 == g && 0 == d && (
			k.AddExplanation(" - The key <C>" + a.charAt(c) +
				"<c> is not recognized in this problem"), e.push(c)));
		for (c = 0; c <= e.length - 1; c++) a = a.insert(e[c] + 1 + 6 * c, "<c>"),
			a = a.insert(e[c] + 6 * c, "<C>");
		return a = a.replaceAll("<K>", "").replaceAll("<k>", "")
	};
	k.InsertQMarks = function(a) {
		for (var b = "sin cos tan sec cot csc".split(" "), e = 0; e <= b.length - 1; e++)
			a = a.replaceAll(b[e], "(" + b[e]);
		0 <= "UO".indexOf(a.charAt(0).toString()) && !1 == k.isChemistry ? a = a.insert(
			0, "?") : 0 <= "^<>=$*_,:%!;".indexOf(a.charAt(0).toString()) && (a = a.insert(
			0, "?"));
		var e = [],
			c = !1,
			d = 0;
		do {
			if ("|" == a.charAt(d).toString()) c = c ? !1 : !0;
			else if ("_" == a.charAt(d).toString() || "=" == a.charAt(d).toString() ||
				"$" == a.charAt(d).toString() || ">" == a.charAt(d).toString() || "<" ==
				a.charAt(d).toString()) c = !1;
			if ((a.charAt(d).isLetter() || "`" == a.charAt(d).toString()) && d < a.length -
				1) {
				if (a.charAt(d + 1).isNumeric()) {
					var g = !1;
					1 < d && (a.indexOf("sin", d - 2) == d - 2 || a.indexOf("cos", d - 2) ==
						d - 2 || a.indexOf("tan", d - 2) == d - 2 || a.indexOf("sec", d - 2) ==
						d - 2 || a.indexOf("csc", d - 2) == d - 2 || a.indexOf("cot", d - 2) ==
						d - 2 || a.indexOf("log", d - 2) == d - 2 || a.indexOf("for", d - 2) ==
						d - 2) && (g = !0);
					!1 == g && (2 < d && (a.indexOf("sinh", d - 3) == d - 3 || a.indexOf(
						"cosh", d - 3) == d - 3 || a.indexOf("tanh", d - 3) == d - 3 || a.indexOf(
						"sech", d - 3) == d - 3 || a.indexOf("csch", d - 3) == d - 3 || a.indexOf(
						"coth", d - 3) == d - 3) && (g = !0), !1 != k.isChemistry || a.indexOf(
						"U", d) != d && a.indexOf("O", d) != d || (g = !0));
					!1 == g && 0 < d && a.indexOf("ln", d - 1) == d - 1 && (g = !0);
					if (!1 == g)
						if (!1 == k.isChemistry) a = a.insert(d + 1, "^");
						else {
							a = a.insert(d + 1, "[");
							for (var g = d + 3, h = 0; a.length > g;)
								if (a.charAt(g).isNumeric()) g += 1, h += 1;
								else break;
							a = a.insert(g, "]");
							d += h
						}
				}
			} else if (0 <= ")]".indexOf(a.charAt(d)) || "|" == a.charAt(d).toString() &&
				!1 == c) {
				if (0 < d && 0 <= "*-+({\u00ab[<>=$,;".indexOf(a.charAt(d - 1)) && e.push(
					d), d < a.length - 1 && a.charAt(d + 1).isNumeric())
					if (!1 == k.isChemistry) a = a.insert(d + 1, "^");
					else if (")" == a.charAt(d).toString() || "}" == a.charAt(d).toString() ||
					"\u00bb" == a.charAt(d).toString()) {
					a = a.insert(d + 1, "[");
					g = d + 3;
					for (h = 0; a.length > g;)
						if (a.charAt(g).isNumeric()) g += 1, h += 1;
						else break;
					a = a.insert(g, "]");
					d += h
				}
			} else if ((0 <= "([".indexOf(a.charAt(d)) || "|" == a.charAt(d).toString() &&
				c) && d < a.length - 1) 0 <= "*<>=$,;".indexOf(a.charAt(d + 1)) && e.push(
				d + 1);
			else if ("." == a.charAt(d).toString()) 0 < d && (a.charAt(d - 1).isLetter() ||
					0 <= "`:%!".indexOf(a.charAt(d - 1))) && e.push(d), d < a.length - 1 &&
				!1 == a.charAt(d + 1).isNumeric() && ("&" != a.charAt(d + 1).toString() &&
					"?" != a.charAt(d + 1).toString() && "R" != a.charAt(d + 1).toString()) &&
				e.push(d + 1);
			else if (0 <= "=$<>".indexOf(a.charAt(d))) 0 < d && !(0 <= "><".indexOf(a.charAt(
					d - 1)) && "=" == a.charAt(d).toString()) && (0 <= "=".indexOf(a.charAt(
						d - 1)) && ">" == a.charAt(d).toString() && k.isChemistry || 0 <=
					"*+-=$<>_,:;".indexOf(a.charAt(d - 1)) && e.push(d)), d < a.length - 1 &&
				0 <= "*,:;".indexOf(a.charAt(d + 1)) && e.push(d + 1);
			else if ("*" == a.charAt(d).toString() || "" == a.charAt(d).toString() &&
				0 < d) 0 <= "*+-_,:;".indexOf(a.charAt(d - 1)) && e.push(d);
			else if ("!" == a.charAt(d).toString() || "%" == a.charAt(d).toString()) 0 <
				d && !1 == a.charAt(d - 1).isLetter() && (!1 == a.charAt(d - 1).isNumeric() &&
					"&" != a.charAt(d - 1).toString() && "?" != a.charAt(d - 1).toString() &&
					"." != a.charAt(d - 1).toString()) && e.push(d),
				d < a.length - 1 && (a.charAt(d + 1).isLetter() || a.charAt(d + 1).isNumeric()) &&
				e.push(d + 1);
			d += 1
		} while (d < a.length);
		for (d = 0; d <= e.length - 1; d++) a = a.insert(e[d] + d, "?");
		a = a.replaceAll("__", "_?_").replaceAll("__", "_?_");
		a = a.replaceAll(",,", ",?,").replaceAll(",,", ",?,");
		a = a.replaceAll("::", ":?:").replaceAll("::", ":?:");
		a = a.replaceAll(":,", ":?,");
		if (a.endsWith("_") || a.endsWith(",")) a += "?";
		for (e = 0; e <= b.length - 1; e++) a = a.replaceAll("(" + b[e], b[e]);
		a = a.replaceAll("tan+", "tan?+").replaceAll("tan-", "tan?-").replaceAll(
			"tan*", "tan?*").replaceAll("tan/index.html", "tan?/");
		a = a.replaceAll("sin+", "sin?+").replaceAll("sin-", "sin?-").replaceAll(
			"sin*", "sin?*").replaceAll("sin/index.html", "sin?/");
		a = a.replaceAll("cos+", "cos?+").replaceAll("cos-", "cos?-").replaceAll(
			"cos*", "cos?*").replaceAll("cos/index.html", "cos?/");
		a = a.replaceAll("log+", "log?+").replaceAll("log-", "log?-").replaceAll(
			"log*", "log?*").replaceAll("log/index.html", "log?/");
		return a = a.replaceAll("ln+", "ln?+").replaceAll("ln-", "ln?-").replaceAll(
			"ln*", "ln?*").replaceAll("ln/index.html", "ln?/")
	};
	k.formatChemistry = function(a) {
		var b = 0;
		do {
			if (a.charAt(b).isLetter() && b < a.length - 1 && a.charAt(b + 1).isNumeric()) {
				a = a.insert(b + 1, "<S>");
				for (var e = b + 5, c = 0; a.length > e;)
					if (a.charAt(e).isNumeric()) e += 1, c += 1;
					else break;
				a = a.insert(e, "<s>");
				b += c + 3
			}
			b += 1
		} while (b < a.length);
		return a
	};
	k.InsertNTags = function(a) {
		var b = a;
		if (-1 < a.indexOf("_")) {
			var e = null,
				e = a.split("_"),
				b = e[0];
			for (a = 1; a <= e.length - 1; a++) b += "<N>" + e[a] + "<n>"
		}
		return b
	};
	k.InsertSTags = function(a) {
		var b = a.indexOf("&");
		a = a.replaceAll("&", "");
		var e = 0;
		do {
			if (a.indexOf("log<E>", e) == e)
				for (var c = e += 6; c <= a.length - 1; c++)
					if (a.indexOf("<e>", c) == c) {
						a = a.remove(e - 2, 1);
						a = a.insert(e - 2, "S");
						a = a.remove(c + 1, 1);
						a = a.insert(c + 1, "s");
						e = c + 2;
						break
					} else if (a.indexOf("<E>", c) == c) {
				e += 2;
				break
			}
			e += 1
		} while (e < a.length); - 1 < b && (a = a.insert(b, "&"));
		return a
	};
	k.InsertMTags = function(a) {
		var b = 0;
		if (-1 == a.indexOf("]")) return a;
		do {
			if (a.indexOf("M[") == b || a.indexOf("M&[") == b) {
				var e = !1;
				a.indexOf("M&[") == b && (b += 1, e = !0);
				for (var c = 0, b = b + 1, d = b + 2; d <= a.length - 1; d++)
					if ("[" == a.charAt(d).toString() ? c += 1 : "]" == a.charAt(d).toString() &&
						(c -= 1), "]" == a.charAt(d).toString() && -1 == c || -1 == a.substr(d +
							1, a.length - d - 1).indexOf("]")) {
						a = e ? a.remove(b, 1).remove(b - 2, 1).insert(b - 1, "<M>") : a.remove(
							b - 1, 2).insert(b - 1, "<M>");
						a = a.remove(d + 1, 1).insert(d + 1, "<m>");
						b += 5;
						break
					} else "_" == a.charAt(d).toString() && (a = a.remove(d, 1), a = a.insert(
						d, ":"))
			}
			b += 1
		} while (b < a.length); - 1 < a.replaceAll("&", "").indexOf("B[<M>") && (a =
			a.replaceAll("_", ""));
		a = InsertZTags(a);
		b = 0;
		if (-1 != a.indexOf("]")) {
			do {
				if (a.indexOf("L[") == b || a.indexOf("L&[") == b)
					for (e = !1, a.indexOf("L&[") == b && (b += 1, e = !0), c = 0, b += 1, d =
						b + 2; d <= a.length - 1; d++)
						if ("[" == a.charAt(d).toString() ? c += 1 : "]" == a.charAt(d).toString() &&
							(c -= 1), "]" == a.charAt(d).toString() && -1 == c || -1 == a.substr(d +
								1, a.length - d - 1).indexOf("]")) {
							a = e ? a.remove(b, 1).remove(b - 2, 1).insert(b - 1, "<L>") : a.remove(
								b - 1, 2).insert(b - 1, "<L>");
							a = a.remove(d + 1, 1).insert(d + 1, "<l>");
							b += 5;
							break
						}
				b += 1
			} while (b < a.length);
			a = a.replaceAll("<L>:", "<L>?:").replaceAll(":<l>", ":?<l>");
			a = a.replaceAll("<E>-?<e>,", "<E>-<e>,");
			a = a.replaceAll("<E>?<e>+,", "<E>+<e>,");
			a = a.replaceAll("<E>?<e>+&,", "<E>+<e>&,");
			a = a.replaceAll("<E>+?<e>,", "<E>+<e>,")
		}
		b = 0;
		if (-1 != a.indexOf("]")) {
			do {
				if (a.indexOf("S[") == b || a.indexOf("S&[") == b)
					for (e = !1, a.indexOf("S&[") == b && (b += 1, e = !0), c = 0, b += 1, d =
						b + 2; d <= a.length - 1; d++)
						if ("[" == a.charAt(d).toString() ? c += 1 : "]" == a.charAt(d).toString() &&
							(c -= 1), "]" == a.charAt(d).toString() && -1 == c || -1 == a.substr(d +
								1, a.length - d - 1).indexOf("]")) {
							a = e ? a.remove(b, 1).remove(b - 2, 1).insert(b - 1, "<A>") : a.remove(
								b - 1, 2).insert(b - 1, "<A>");
							a = a.remove(d + 1, 1).insert(d + 1, "<a>");
							b += 5;
							break
						}
				b += 1
			} while (b < a.length);
			a = a.replaceAll("<A>", "<A>sum,");
			e = 0;
			b = "";
			if (-1 != a.indexOf("]")) {
				do {
					if (a.indexOf("I[") == e || a.indexOf("I&[") == e) {
						c = !1;
						a.indexOf("I&[") == e && (e += 1, c = !0);
						for (var g = 0, e = e + 1, d = e + 2; d <= a.length - 1; d++)
							if ("[" == a.charAt(d).toString() ? g += 1 : "]" == a.charAt(d).toString() &&
								(g -= 1), "]" == a.charAt(d).toString() && -1 == g || -1 == a.substr(
									d + 1, a.length - d - 1).indexOf("]")) {
								b += a.substr(e + 1, d - (e + 1));
								g = b.split(",");
								b = g[Math.max(0, g.length - 2)];
								a = c ? a.remove(e, 1).remove(e - 2, 1).insert(e - 1, "<A>") : a.remove(
									e - 1, 2).insert(e - 1, "<A>");
								a = 1 == g.length && "?" != b ? a.remove(d + 1, 1).insert(d + 1,
									",?<a>") : a.remove(d + 1, 1).insert(d + 1, "<a>");
								e += 5;
								break
							}
					}
					e += 1
				} while (e < a.length);
				a = a.replaceAll("<A>", "<A>integral,");
				a = a.replaceAll("<A>integral,?<a>", "<A>integral,<a>");
				if ("" != b && null != b) {
					for (e = 0; e <= k.AllTagStr.length - 1; e++) b = b.replaceAll("<" + k.AllTagStr
						.charAt(e) + ">", ""), b = b.replaceAll("<" + k.AllTagStr.charAt(e).toString()
						.toLowerCase() + ">", "");
					if (!(-1 < b.indexOf("x")))
						for (e = 0; e <= b.length - 1; e++)
							if (b.charAt(e).isLetter() && "e" != b.charAt(e).toString() && "i" !=
								b.charAt(e).toString() && "I" != b.charAt(e).toString() && "T" != b.charAt(
									e).toString()) {
								b.charAt(e);
								break
							}
				}
				a = a.replaceAll("integral,sum", "sum")
			}
		}
		b = 0;
		if (-1 != a.indexOf("]")) {
			do {
				if (a.indexOf("T[") == b || a.indexOf("T&[") == b)
					for (e = !1, a.indexOf("T&[") == b && (b += 1, e = !0), b += 1, c = b +
						1; c <= a.length - 1; c++)
						if ("]" == a.charAt(c).toString()) {
							a = e ? a.remove(b, 1).remove(b - 2, 1).insert(b - 1, "<G>") : a.remove(
								b - 1, 2).insert(b - 1, "<G>");
							a = a.remove(c + 1, 1).insert(c + 1, "<g>");
							b += 5;
							break
						} else "?" == a.charAt(c).toString() && (a = a.remove(c, 1).insert(c,
							"!"));
				b += 1
			} while (b < a.length);
			a = a.replaceAll("<G>", "<G>triangle,").replaceAll("<g>", ",A,C,B<g>");
			a = a.replaceAll("!", "<P>Q<p>");
			b = 0;
			if (-1 != a.indexOf("]")) {
				do {
					if (a.indexOf("A[") == b || a.indexOf("A&[") == b)
						for (e = !1, a.indexOf("A&[") == b && (b += 1, e = !0), b += 1, c = b +
							1; c <= a.length - 1; c++)
							if ("]" == a.charAt(c).toString()) {
								a = e ? a.remove(b, 1).remove(b - 2, 1).insert(b - 1, "<G>") : a.remove(
									b - 1, 2).insert(b - 1, "<G>");
								a = a.remove(c + 1, 1).insert(c + 1, "<g>");
								b += 5;
								break
							}
					b += 1
				} while (b < a.length);
				a = a.replaceAll("<G>R,", "<G>area-rectangle,");
				a = a.replaceAll("<G>C,", "<G>area-circle,");
				a = a.replaceAll("<G>T,", "<G>area-triangle,");
				a = a.replaceAll("<G>P,", "<G>area-parallelogram,");
				a = a.replaceAll("<G>Z,", "<G>area-trapezoid,")
			}
			b = 0;
			if (-1 != a.indexOf("]")) {
				do {
					if (a.indexOf("V[") == b || a.indexOf("V&[") == b)
						for (e = !1, a.indexOf("V&[") == b && (b += 1, e = !0), b += 1, c = b +
							1; c <= a.length - 1; c++)
							if ("]" == a.charAt(c).toString()) {
								a = e ? a.remove(b, 1).remove(b - 2, 1).insert(b - 1, "<G>") : a.remove(
									b - 1, 2).insert(b - 1, "<G>");
								a = a.remove(c + 1, 1).insert(c + 1, "<g>");
								b += 5;
								break
							}
					b += 1
				} while (b < a.length);
				a = a.replaceAll("<G>B,", "<G>volume-box,");
				a = a.replaceAll("<G>C,", "<G>volume-cylinder,");
				a = a.replaceAll("<G>O,", "<G>volume-cone,");
				a = a.replaceAll("<G>P,", "<G>volume-pyramid,");
				a = a.replaceAll("<G>S,", "<G>volume-sphere,")
			}
		}
		b = 0;
		if (-1 != a.indexOf("]")) {
			do {
				if (a.indexOf("W[") == b || a.indexOf("W&[") == b)
					for (e = !1, a.indexOf("W&[") == b && (b += 1, e = !0), b += 1, c = b +
						1; c <= a.length - 1; c++)
						if ("]" == a.charAt(c).toString()) {
							a = e ? a.remove(b, 1).remove(b - 2, 1).insert(b - 1, "<V>") : a.remove(
								b - 1, 2).insert(b - 1, "<V>");
							a = a.remove(c + 1, 1).insert(c + 1, "<v>");
							b += 5;
							break
						} else "?" == a.charAt(c).toString() && (a = a.remove(c, 1).insert(c,
							"!"));
				b += 1
			} while (b < a.length);
			b: if (a = a.replaceAll("!", "<P>Q<p>"), b = 0, -1 != a.indexOf("]")) {
				do {
					if (a.indexOf("N[") == b || a.indexOf("N&[") == b)
						for (e = !1, a.indexOf("N&[") == b && (b += 1, e = !0), b += 1, c = !1,
							d = b + 1; d <= a.length - 1; d++)
							if ("]" == a.charAt(d).toString()) {
								if (!1 == c) break b;
								a = e ? a.remove(b, 1).remove(b - 2, 1).insert(b - 1, "<V>sci,") : a
									.remove(b - 1, 2).insert(b - 1, "<V>sci,");
								a = a.remove(d + 5, 1).insert(d + 5, "<v>");
								b += 9;
								break
							} else "," == a.charAt(d).toString() && (c = !0);
					b += 1
				} while (b < a.length)
			}
		}
		b = 0;
		if (-1 != a.indexOf("]")) {
			do {
				if (a.indexOf("R[") == b || a.indexOf("R&[") == b)
					for (e = !1, a.indexOf("R&[") == b && (b += 1, e = !0), b += 1, c = b +
						2; c <= a.length - 1; c++)
						if ("]" == a.charAt(c).toString()) {
							a = e ? a.remove(b, 1).remove(b - 2, 1).insert(b - 1, "<U>over,") : a.remove(
								b - 1, 2).insert(b - 1, "<U>over,");
							a = a.remove(c + 6, 1).insert(c + 6, "<u>");
							b += 10;
							break
						}
				b += 1
			} while (b < a.length)
		}
		b = 0;
		if (-1 != a.indexOf("]")) {
			do {
				if (a.indexOf("P[") == b || a.indexOf("P&[") == b)
					for (e = !1, a.indexOf("P&[") == b && (b += 1, e = !0), b += 1, c = b +
						2; c <= a.length - 1; c++)
						if ("]" == a.charAt(c).toString()) {
							a = e ? a.remove(b, 1).remove(b - 2, 1).insert(b - 1, "<W>") : a.remove(
								b - 1, 2).insert(b - 1, "<W>");
							a = a.remove(c + 1, 1).insert(c + 1, "<w>");
							b += 5;
							break
						} else "_" == a.charAt(c).toString() && (a = a.remove(c, 1).insert(c,
							":"));
				b += 1
			} while (b < a.length);
			a = a.replaceAll("<W>_", "<W>?:");
			a = a.replaceAll(":<w>", ":?<w>");
			a = a.replaceAll("<W>:", "<W>?:");
			a = a.replaceAll(":for", ":?for");
			a = a.replaceAll("for:", "for?:");
			a = a.replaceAll("for<w>", "for?<w>");
			a = a.replaceAll("<W>for", "<W>?for")
		}
		return a
	};
	k.InsertSubscript = function(a) {
		var b = 1;
		do {
			for (var e = b; e <= a.length - 1; e++)
				if (a.indexOf("[", e) == e && (a.charAt(e - 1).isLetter() || ")" == a.charAt(
					e - 1).toString() || "}" == a.charAt(e - 1).toString() || "?" == a.charAt(
					e - 1).toString() || "\u00bb" == a.charAt(e - 1).toString())) {
					for (var c = e + 1, d = 0, g = !1; a.length > c;)
						if (a.charAt(c).isNumeric() || "?" == a.charAt(c) || "." == a.charAt(c) ||
							"/" == a.charAt(c)) c += 1, d += 1;
						else if ("{" == a.charAt(c) && "[" == a.charAt(c - 1)) c += 1, d += 2;
					else if ("}" == a.charAt(c) && "/" == a.charAt(c + 1)) c += 3, d += 3;
					else {
						"}" == a.charAt(c) && "]" == a.charAt(c + 1) ? g = !0 : a.charAt(c).isLetter() &&
							0 == d ? "]" == a.charAt(c + 1).toString() && 3 < c && "log" == a.substr(
								c - 4, 3).toLowerCase() && (g = !0, d += 1) : "]" == a.charAt(c).toString() &&
							(g = !0);
						break
					} if (g) {
						a = a.remove(e, 1).insert(e, "<S>");
						a = a.remove(e + 3 + d, 1).insert(e + 3 + d, "<s>");
						b += 6 + d;
						break
					}
				}
			b += 1
		} while (b < a.length);
		return a
	};
	k.InsertJTags = function(a) {
		var b = a,
			e = 0;
		if (-1 == b.indexOf(";<F>") && -1 == b.indexOf("<f>;") || -1 < b.indexOf(
			"<f>;<F>")) return b;
		do {
			if (0 < e && b.indexOf(";") == e) {
				if (2 < e && (-1 >= b.indexOf(";<F>", e) && b.indexOf("<f>;", e - 3) <= e -
					3 || b.indexOf("<f>;<F>", e - 3) >= e - 3)) return b;
				var b = b.remove(e, 1).insert(e, ","),
					c = e - 1,
					d = 0,
					g = 0,
					h = 0;
				do {
					if (")" == b.charAt(c).toString() || "}" == b.charAt(c).toString() ||
						"\u00bb" == b.charAt(c).toString()) d += 1;
					else if ("(" == b.charAt(c).toString() || "{" == b.charAt(c).toString() ||
						"\u00ab" == b.charAt(c).toString()) {
						if (0 == d && 0 == g && 0 == h) {
							b = b.insert(c + 1, "<J>");
							e += 3;
							break
						}
						d -= 1
					} else if ("]" == b.charAt(c).toString()) g += 1;
					else if ("[" == b.charAt(c).toString()) {
						if (0 == d && 0 == g && 0 == h) {
							b = b.insert(c + 1, "<J>");
							e += 3;
							break
						}
						g -= 1
					} else if ("f" == b.charAt(c).toString()) h += 1;
					else if ("F" == b.charAt(c).toString()) {
						if (0 == d && 0 == g && 0 == h) {
							b = b.insert(c + 2, "<J>");
							e += 3;
							break
						}
						h -= 1
					} else if (0 <= "+-*=$><".indexOf(b.charAt(c)) && 0 == d && 0 == g && 0 ==
						h) {
						b = b.insert(c + 1, "<J>");
						e += 3;
						break
					}
					if (0 == c && 0 == d && 0 == g && 0 == h) {
						b = b.insert(c, "<J>");
						e += 3;
						break
					}
					c -= 1
				} while (0 <= c);
				c = e + 1;
				h = g = d = 0;
				if (c < b.length) {
					do {
						if (")" == b.charAt(c).toString() || "}" == b.charAt(c).toString() ||
							"\u00bb" == b.charAt(c).toString()) {
							if (0 == d && 0 == g && 0 == h) {
								b = b.insert(c, "<j>");
								e = c + 2;
								break
							}
							d += 1
						} else if ("(" == b.charAt(c).toString() || "{" == b.charAt(c).toString() ||
							"\u00ab" == b.charAt(c).toString()) d -= 1;
						else if ("]" == b.charAt(c).toString()) {
							if (0 == d && 0 == g && 0 == h) {
								b = b.insert(c, "<j>");
								e = c + 2;
								break
							}
							g += 1
						} else if ("[" == b.charAt(c).toString()) g -= 1;
						else if ("f" == b.charAt(c).toString()) {
							if (0 == d && 0 == g && 0 == h) {
								b = b.insert(c - 1, "<j>");
								e = c + 2;
								break
							}
							h += 1
						} else if ("F" == b.charAt(c).toString()) h -= 1;
						else if (0 <= "+-*=$".indexOf(b.charAt(c)) && 0 == d && 0 == g && 0 ==
							h) {
							b = b.insert(c, "<j>");
							e = c + 2;
							break
						}
						if (c == b.length - 1 && 0 == d && 0 == g && 0 == h) {
							b = b.insert(b.length, "<j>");
							e = c + 2;
							break
						}
						c += 1
					} while (c < b.length)
				}
			}
			e += 1
		} while (e < b.length);
		if (-1 == b.indexOf("<J>") || -1 == b.indexOf("<j>") || -1 < b.indexOf(
			"<J>,")) b = a;
		return b
	};
	InsertZTags = function(a) {
		var b = 0;
		if (-1 == a.indexOf("]")) return a;
		do {
			if (a.indexOf("B[") == b || a.indexOf("B&[") == b) {
				var e = !1;
				a.indexOf("B&[") == b && (b += 1, e = !0);
				for (var c = 0, b = b + 1, d = b + 2; d <= a.length - 1; d++)
					if ("[" == a.charAt(d).toString() ? c += 1 : "]" == a.charAt(d).toString() &&
						(c -= 1), "]" == a.charAt(d).toString() && -1 == c || -1 == a.substr(d +
							1, a.length - d - 1).indexOf("]")) {
						a = e ? a.remove(b, 1).remove(b - 2, 1).insert(b - 1, "<Z>SET,") : a.remove(
							b - 1, 2).insert(b - 1, "<Z>SET,");
						a = a.remove(d + 5, 1).insert(d + 5, "<z>");
						b += 9;
						break
					} else "_" == a.charAt(d).toString() && (a = a.remove(d, 1), a = a.insert(
						d, ":"))
			}
			b += 1
		} while (b < a.length);
		a = a.replaceAll("B[]", "<Z>SET,<z>");
		b = 0;
		if (-1 != a.indexOf("]")) {
			do {
				if (a.indexOf("C[") == b || a.indexOf("C&[") == b)
					for (e = !1, a.indexOf("C&[") == b && (b += 1, e = !0), c = 0, b += 1, d =
						b + 2; d <= a.length - 1; d++)
						if ("[" == a.charAt(d).toString() ? c += 1 : "]" == a.charAt(d).toString() &&
							(c -= 1), "]" == a.charAt(d).toString() && -1 == c || -1 == a.substr(d +
								1, a.length - d - 1).indexOf("]")) {
							a = e ? a.remove(b, 1).remove(b - 2, 1).insert(b - 1, "<Z>ISET,") : a.remove(
								b - 1, 2).insert(b - 1, "<Z>ISET,");
							a = a.remove(d + 6, 1).insert(d + 6, "<z>");
							b += 10;
							break
						} else "_" == a.charAt(d).toString() && (a = a.remove(d, 1), a = a.insert(
							d, ":"));
				b += 1
			} while (b < a.length);
			a = a.replaceAll("C[]", "<Z>ISET,<z>");
			b = 0;
			if (-1 != a.indexOf("]")) {
				do {
					if (a.indexOf("G[") == b || a.indexOf("G&[") == b)
						for (e = !1, a.indexOf("G&[") == b && (b += 1, e = !0), c = 0, b += 1,
							d = b + 2; d <= a.length - 1; d++)
							if ("[" == a.charAt(d).toString() ? c += 1 : "]" == a.charAt(d).toString() &&
								(c -= 1), "]" == a.charAt(d).toString() && -1 == c || -1 == a.substr(
									d + 1, a.length - d - 1).indexOf("]")) {
								a = e ? a.remove(b, 1).remove(b - 2, 1).insert(b - 1, "<Z>table,") :
									a.remove(b - 1, 2).insert(b - 1, "<Z>table,");
								a = a.remove(d + 7, 1).insert(d + 7, "<z>");
								b += 11;
								break
							} else "_" == a.charAt(d).toString() && (a = a.remove(d, 1), a = a.insert(
								d, ":"));
					b += 1
				} while (b < a.length)
			}
		}
		return a
	};
	k.InsertOTags = function(a, b) {
		var e = a,
			c = 0,
			d;
		do {
			if (0 <= "=<>".indexOf(e.charAt(c)) && 4 <= c) {
				var g = !1;
				c < e.length - 2 && (0 <= k.TagStr.indexOf(e.charAt(c + 1)) || 0 <= k.TagStr
						.toLowerCase().indexOf(e.charAt(c + 1))) && ">" == e.charAt(c + 2).toString() &&
					(g = !0);
				if (!1 == g && (")" == e.charAt(c - 1).toString() || "}" == e.charAt(c -
					1).toString() || "\u00bb" == e.charAt(c - 1).toString()) && e.charAt(c -
					2).isLetter() && ("(" == e.charAt(c - 3).toString() || "{" == e.charAt(
					c - 3).toString() || "\u00ab" == e.charAt(c - 3).toString())) {
					g = "";
					for (d = c - 4; 0 <= d; d += -1)
						if ("'" == e.charAt(d).toString()) g += "'";
						else break;
					d = !1;
					c > 4 + g.length && e.charAt(c - 5 - g.length).isLetter() && (d = !0);
					var h = c - g.length;
					!1 == d && 3 < h && e.charAt(h - 4).isLetter() && (e = e.remove(h - 4, 2 +
						g.length).insert(h - 4, "<O>" + e.charAt(h - 4) + g + ","), e = e.remove(
						c + 2, 1).insert(c + 2, "<o>"))
				}
			}
			c += 1
		} while (c < e.length);
		d = g = c = 0;
		var f = h = !1;
		do {
			e.indexOf("<E>", c) == c ? (f = !0, c += 2) : e.indexOf("<e>", c) == c &&
				(f = !1, c += 2);
			if (c >= e.length) break;
			0 <= "fgh".indexOf(e.charAt(c)) && 1 != g ? (g += 1, 1 == g && (d = c)) :
				"o" == e.charAt(c).toString() ? 0 < g && (g += 1, "o" == e.charAt(c - 1).toString() &&
					(d = g = 0)) : !1 == f && (1 == g % 2 && 2 < g && (e = e.insert(c, "<o>"),
					e = e.insert(d, "<O>fogmode,"), c += 13, h = !0), d = g = 0);
			c += 1
		} while (c < e.length);
		!1 == h && (1 == g % 2 && 2 < g) && (e = e.insert(c, "<o>"), e = e.insert(d,
			"<O>fogmode,"));
		if (b && -1 < e.indexOf("'")) {
			g = [];
			for (c = 0; c <= e.length - 1; c++)
				if ("'" == e.charAt(c).toString() && (d = !1, 0 < c && c < e.length - 1 &&
					(!e.charAt(c - 1).isLetter() && "'" != e.charAt(c - 1).toString() ||
						"(" != e.charAt(c + 1).toString() && "{" != e.charAt(c + 1).toString() &&
						"\u00ab" != e.charAt(c + 1).toString() && "'" != e.charAt(c + 1).toString() ||
						(d = !0)), !1 == d)) {
					d = e;
					for (var h = c, f = -1, n = h - 1; 0 <= n; n += -1)
						if ("O" == d.charAt(n).toString() && n < d.length) {
							if ("[" == d.charAt(n + 1).toString() || ">" == d.charAt(n + 1).toString()) {
								f = n;
								break
							}
						} else if ("]" == d.charAt(n).toString()) break;
					else if ("o" == d.charAt(n).toString()) break;
					n = !1;
					if (-1 < f) {
						for (var l = -1, m = h + 1; m <= d.length - 1; m++)
							if ("o" == d.charAt(m).toString()) {
								l = m;
								break
							} else if ("O" == d.charAt(m).toString()) break;
						f < h && h < l && (n = !0)
					}!1 == n && (k.AddExplanation(
						" - The key <C>'<c> is not recognized in this problem"), g.push(c))
				}
			for (c = 0; c <= g.length - 1; c++) e = e.insert(g[c] + 1 + 6 * c, "<c>"),
				e = e.insert(g[c] + 6 * c, "<C>")
		}
		if (!k.isChemistry && (c = 0, -1 != e.indexOf("]"))) {
			do {
				if (e.indexOf("F[") == c || e.indexOf("F&[") == c)
					for (g = !1, e.indexOf("F&[") == c && (c += 1, g = !0), c += 1, d = c +
						2; d <= e.length - 1; d++)
						if ("]" == e.charAt(d).toString()) {
							e = g ? e.remove(c, 1).remove(c - 2, 1).insert(c - 1, "<O>") : e.remove(
								c - 1, 2).insert(c - 1, "<O>");
							e = e.remove(d + 1, 1).insert(d + 1, "<o>");
							c += 5;
							break
						}
				c += 1
			} while (c < e.length)
		}
		return e
	};
	k.InsertFTags = function(a, b, e) {
		if ("" == a) return "";
		var c = 0;
		do {
			if ("/" == a.charAt(c).toString()) {
				for (var d = 0, g = 0, h = !1, f = c - 1; 0 <= f; f += -1) {
					if ("_" == a.charAt(f).toString() || "," == a.charAt(f).toString()) g =
						d = 0;
					if ("(" == a.charAt(f).toString() || "{" == a.charAt(f).toString() ||
						"\u00ab" == a.charAt(f).toString()) {
						if (d += 1, 0 <= d) {
							a = a.insert(f, "<F>");
							h = !0;
							break
						}
					} else if ("[" == a.charAt(f).toString()) {
						if (g += 1, 0 < g) {
							a = a.insert(f + 1, "<F>");
							h = !0;
							break
						}
					} else if (")" == a.charAt(f).toString() || "}" == a.charAt(f).toString() ||
						"\u00bb" == a.charAt(f).toString()) d -= 1;
					else if ("]" == a.charAt(f).toString()) g -= 1;
					else if (0 <= "+-*=<>\\,:;$\ufffd@ \u00af_".indexOf(a.charAt(f)) && 0 ==
						d && 0 == g)
						if (0 == f) a = a.insert(f + 1, "<F>"), h = !0;
						else if ("-" != a.charAt(f).toString() || "^" != a.charAt(f - 1).toString() &&
						"~" != a.charAt(f - 1).toString())
						if (":" == a.charAt(f).toString()) {
							if (2 < f && "~" != a.charAt(f - 1).toString() && "~" != a.charAt(f -
								2).toString() && "~" != a.charAt(f - 3).toString()) {
								a = a.insert(f + 1, "<F>");
								h = !0;
								break
							}
						} else {
							a = a.insert(f + 1, "<F>");
							h = !0;
							break
						}
				}!1 == h && (a = a.insert(0, "<F>"));
				c += 3;
				g = d = 0;
				h = !1;
				for (f = c + 1; f <= a.length - 1; f++) {
					if ("_" == a.charAt(f).toString() || "," == a.charAt(f).toString()) g =
						d = 0;
					if (e && (a.charAt(f).isLetter() || "`" == a.charAt(f).toString() || "(" ==
							a.charAt(f).toString() || "{" == a.charAt(f).toString() || "\u00ab" ==
							a.charAt(f).toString()) && a.charAt(f - 1).isNumeric() && "^" != a.charAt(
							f - 2).toString() && "^" != a.charAt(f - 3).toString() && f > c + 1 &&
						0 == d && 0 == g) {
						a = a.insert(f, "<f>");
						h = !0;
						break
					}
					if ("(" == a.charAt(f).toString() || "{" == a.charAt(f).toString() ||
						"\u00ab" == a.charAt(f).toString()) d += 1;
					else if ("[" == a.charAt(f).toString()) g += 1;
					else if (")" == a.charAt(f).toString() || "}" == a.charAt(f).toString() ||
						"\u00bb" == a.charAt(f).toString()) {
						if (d -= 1, 0 >= d) {
							a = a.insert(f + 1, "<f>");
							h = !0;
							break
						}
					} else if ("]" == a.charAt(f).toString()) {
						if (g -= 1, 0 > g) {
							a = a.insert(f, "<f>");
							h = !0;
							break
						}
					} else if (0 <= "+-*=<>\\,:;$\ufffd@ \u00af_%".indexOf(a.charAt(f)) && (
						0 == d && 0 == g) && ("-" != a.charAt(f).toString() || "^" != a.charAt(
						f - 1).toString() && "~" != a.charAt(f - 1).toString()) && ("-" != a.charAt(
						f).toString() || f != c + 1))
						if (":" == a.charAt(f).toString()) {
							if (2 < f && "~" != a.charAt(f - 1).toString() && "~" != a.charAt(f -
								2).toString() && "~" != a.charAt(f - 3).toString()) {
								a = a.insert(f, "<f>");
								h = !0;
								break
							}
						} else {
							a = a.insert(f, "<f>");
							h = !0;
							break
						}
				}!1 == h && (a = a.insert(a.length, "<f>"));
				c += 2
			}
			c += 1
		} while (c < a.length);
		for (f = 0; 2 >= f; f++) 0 <= a.indexOf("<F><F>") && 0 <= a.indexOf(
			"<f><f>") && (a = a.replaceAll("<F><F>", "<F>").replaceAll("<f><f>",
			"<f>"));
		if (b)
			for (a = a.replaceAll("<F>/", "<F>?/"), a = a.replaceAll("/<f>",
				"index5556.html?<f>"), f = 0; 2 >= f; f++) a = a.replaceAll("//",
				"index6666.html?/");
		return a
	};
	k.InsertETags = function(a, b) {
		if ("" == a) return "";
		var e = 0;
		do {
			if ("^" == a.charAt(e).toString() && e < a.length - 1 && !1 == a.endsWith(
				"^<e>")) {
				a = a.insert(e + 1, "<E>");
				for (var c = 0, d = 0, g = !1, h = 0, f = 0, n = 0, e = e + 3, l = e + 1; l <=
					a.length - 1; l++) {
					a.indexOf("<R>", l) == l ? f += 1 : a.indexOf("<r>", l) == l ? f -= 1 :
						a.indexOf("<F>", l) == l ? h += 1 : a.indexOf("<f>", l) == l ? h -= 1 :
						a.indexOf("<I>", l) == l ? (n += 1, l += 3) : a.indexOf("<i>", l) == l &&
						(n -= 1, l += 3);
					if ("_" == a.charAt(l).toString() || "," == a.charAt(l).toString() ||
						";" == a.charAt(l).toString()) n = f = h = d = c = 0;
					if ("(" == a.charAt(l).toString() || "{" == a.charAt(l).toString() ||
						"\u00ab" == a.charAt(l).toString()) {
						if (c += 1, l > e + 1 && 1 == c && ("[" != a.charAt(e + 1).toString() ||
							0 == d) && "|" != a.charAt(l - 1).toString()) {
							a = a.insert(l, "<e>");
							g = !0;
							break
						}
					} else if (")" == a.charAt(l).toString() || "}" == a.charAt(l).toString() ||
						"\u00bb" == a.charAt(l).toString()) {
						if (c -= 1, 0 >= c) {
							a = a.insert(l + 1, "<e>");
							g = !0;
							break
						}
					} else if ("[" == a.charAt(l).toString()) {
						if (d += 1, l > e + 1 && 1 == d && ("(" != a.charAt(e + 1).toString() &&
							"{" != a.charAt(e + 1).toString() && "\u00ab" != a.charAt(e + 1).toString() ||
							0 == c)) {
							a = a.insert(l, "<e>");
							g = !0;
							break
						}
					} else if ("]" == a.charAt(l).toString()) {
						if (d -= 1, 0 > d) {
							a = a.insert(l + 1, "<e>");
							g = !0;
							break
						}
					} else if (l != e + 1 || "-" != a.charAt(l).toString() && !a.charAt(l).isLetter() &&
						"`" != a.charAt(l).toString())
						if (l != e + 2 || !a.charAt(l).isLetter() || "-" != a.charAt(l - 1).toString())
							if (0 > h || (0 > f || 0 > n) || (a.charAt(l).isLetter() && "^" != a.charAt(
									l - 1).toString() || 0 <= "+-*=<>/\\$@,; _`:".indexOf(a.charAt(l))) &&
								0 == c && 0 == d) {
								a = a.insert(l, "<e>");
								a.charAt(l + 3).isLetter() && "?" == a.charAt(l - 1).toString() && (a =
									a.remove(l - 1, 1));
								g = !0;
								break
							}
				}!1 == g && (a = a.insert(a.length, "<e>"))
			}
			e += 1
		} while (e < a.length);
		if (b) {
			for (e = 0; e <= a.length - 1; e++) a.length - 1 >= e + 6 && "^" == a.charAt(
				e).toString() && (l = e, "<E><e>" == a.substr(e + 1, 6) && (a = a.insert(
				e + 4, "?"), l += 6), 0 < e && 0 <= "+-*/.({\u00ab[<=$>".indexOf(a.charAt(
				e - 1)) && (c = !1, 2 < e && "<r>" == a.substr(e - 3, 3) && (c = !0), !
				1 == c && (a = a.insert(e, "?"), l += 1)), e = l);
			a = a.replaceAll("<E>-<e>", "<E>-?<e>");
			a.endsWith("^") && (a += "<E>?<e>")
		}
		e = a.replaceAll("^", "").replaceAll("<E><e>", "");
		k.isChemistry && (e = e.replaceAll("+?)<e>", "+)<e>"), e = e.replaceAll(
			"+?)&<e>", "+)<e>"), e = e.replaceAll("+?)&<e>", "+)<e>"), e = e.replaceAll(
			"-?)<e>", "-)<e>"), e = e.replaceAll("-?)&<e>", "-)<e>"), e = e.replaceAll(
			"-?)&<e>", "-)<e>"));
		l = "";
		p(e, "<E>(", ")<e>");
		p(e, "<E>{", "}<e>");
		l = p(e, "<E>\u00ab", "\u00bb<e>");
		return l = p(l, "<E>[", "]<e>")
	};
	k.InsertRTags = function(a, b) {
		if ("" == a) return "";
		var e = 0;
		do {
			if ("~" == a.charAt(e).toString() && e < a.length - 1 && !1 == a.endsWith(
				"~<r>")) {
				a = a.insert(e + 1, "<R>");
				for (var c = 0, d = 0, g = !1, h = 0, f = 0, e = e + 3, k = e + 1, l = e +
					1, m = e + 1; m <= a.length - 1; m++) {
					a.indexOf("<F>", m) == m ? h += 1 : a.indexOf("<f>", m) == m ? h -= 1 :
						a.indexOf("<I>", m) == m ? (f += 1, m += 3) : a.indexOf("<i>", m) == m &&
						(f -= 1, m += 3);
					if ("_" == a.charAt(m).toString() || "," == a.charAt(m).toString()) f =
						h = d = c = 0;
					if (")" == a.charAt(m).toString() && 1 == c && 0 == d || "}" == a.charAt(
							m).toString() && 1 == c && 0 == d || "\u00bb" == a.charAt(m).toString() &&
						1 == c && 0 == d || "]" == a.charAt(m).toString() && 1 == d && 0 == c) {
						a = a.insert(m + 1, "<r>");
						l = m;
						g = !0;
						break
					}
					if ("(" == a.charAt(m).toString() || "{" == a.charAt(m).toString() ||
						"\u00ab" == a.charAt(m).toString()) c += 1;
					else if (")" == a.charAt(m).toString() || "}" == a.charAt(m).toString() ||
						"\u00bb" == a.charAt(m).toString()) {
						if (c -= 1, 0 > c) {
							a = a.insert(m, "<r>");
							l = m;
							g = !0;
							break
						}
					} else if ("[" == a.charAt(m).toString()) d += 1;
					else if ("]" == a.charAt(m).toString()) {
						if (d -= 1, 0 > d) {
							a = a.insert(m, "<r>");
							l = m;
							g = !0;
							break
						}
					} else if (m != e + 1 && ":" != a.charAt(m - 1).toString() && "^" != a.charAt(
						m - 1).toString() || "-" != a.charAt(m).toString())
						if (0 > h || 0 > f || 0 <= "+-*=<>/\\$@,; _".indexOf(a.charAt(m)) && 0 ==
							c && 0 == d) {
							a = a.insert(m, "<r>");
							l = m;
							g = !0;
							break
						}
				}!1 == g && (a = a.insert(a.length, "<r>"), l = a.length - 3);
				c = "";
				if (-1 < a.substring(k, l).indexOf(":")) {
					for (d = k; d <= l && ":" != a.charAt(d).toString(); d++) "~" == a.charAt(
						d).toString() ? (c = "", k = d + 1) : c += a.charAt(d);
					a = a.remove(k, c.length + 1);
					c = "<I>" + c + "<i>";
					a = a.insert(k, c)
				}
			}
			e += 1
		} while (e < a.length);
		if (b) {
			for (e = 0; e <= a.length - 1; e++) a.length - 1 >= e + 6 && ("~" == a.charAt(
				e).toString() && "<R><r>" == a.substr(e + 1, 6)) && (a = a.insert(e + 4,
				"?"), e += 6);
			a = a.replaceAll("<R>-<r>", "<R>-?<r>");
			a.endsWith("~") && (a += "<R>?<r>");
			a = a.replaceAll("<i><r>", "<i>?<r>");
			a = a.replaceAll("<I><i>", "<I>?<i>")
		}
		e = a.replaceAll("~", "").replaceAll("<R><r>", "");
		k = "";
		p(e, "<i>(", ")<r>");
		p(e, "<i>{", "}<r>");
		k = p(e, "<i>\u00ab", "\u00bb<r>");
		k = p(k, "<i>[", "]<r>");
		k = p(k, "<R>(", ")<r>");
		k = p(k, "<R>{", "}<r>");
		k = p(k, "<R>\u00ab", "\u00bb<r>");
		return k = p(k, "<R>[", "]<r>")
	};
	k.AddExplanation = function(a) {};
	return k
};
/*=+ formatting.js +=*/
function Formatting() {
	function h(a, f, e, h) {
		for (var k, g = a; g.contains(h);) {
			k = "";
			for (var b = 0, m = 0, d = 0, c = 0; - 1 != b;) b = g.indexOf(h, b + c), -
				1 != b && (d = b), c = h.length;
			b = d;
			d = 0;
			for (c = b + f.length; c < g.length - 2;) {
				if (g.substr(c, f.length) == f) d += 1;
				else if (g.substr(c, e.length) == e)
					if (0 == d) {
						m = c;
						break
					} else d -= 1;
				c += 1
			}
			k += g.substr(0, b);
			if (m < b) return a;
			c = g.substr(b, m - b + e.length);
			if ("<M>" == f) c = c.remove(c.length - 3), c.startsWith("<M>D") ? (c = c.remove(
					0, 5), c = c.replaceAll(",:", ",<C>?<c>:").replaceAll(":,", ":<C>?<c>,")
				.replaceAll(",", " & ").replaceAll(":", " \\\\ "), c =
				" \\begin{vmatrix} " + c + "\\end{vmatrix} ") : (c = c.remove(0, 3), "<" ==
				c.charAt(0) && (String(c.charAt(1)).isNumeric() && ">" == c.charAt(2)) &&
				(c = c.remove(0, 3)), c = c.replaceAll(",:", ",<C>?<c>:").replaceAll(
					":,", ":<C>?<c>,").replaceAll(",", " & ").replaceAll(":", " \\\\ "), c =
				" \\begin{bmatrix} " + c + "\\end{bmatrix} ");
			else if ("<V>" == f) c.startsWith("<V>sci") && (c = c.remove(0, 7), c = c.remove(
				c.length - 3), c = c.replaceAll(",", "\\times10^{") + "}");
			else if ("<L>" == f) c = c.remove(0, 3), c = c.remove(c.length - 3), c = !
				1 == c.contains(",") ? " \\displaystyle\\lim_{}" + c.replaceAll(":",
					" \\to ") : " \\displaystyle\\lim_{" + c.replaceAll(":", " \\to ").replaceAll(
					",", "} ");
			else if ("<W>" == f) c = c.remove(0, 3), c = c.remove(c.length - 3), c = c
				.replaceAll(",:", ",<C>?<c>:").replaceAll(":,", ":<C>?<c>,").replaceAll(
					",", " & ").replaceAll(":", " \\\\ "), c = " \\begin{cases} " + c +
				"\\end{cases} ";
			else if ("<A>" == f) c.startsWith("<A>sum") ? (c = c.remove(c.length - 3),
				d = null, d = c.split(","), 4 <= d.length ? c = " \\displaystyle\\sum_{" +
				d[1] + "}^{" + d[2] + "} " + d[3] : 3 == d.length ? c =
				" \\displaystyle\\sum_{" + d[1] + "}^{" + d[2] + "} " : 2 == d.length &&
				(c = " \\displaystyle\\sum_{" + d[1] + "}^{ } ")) : c.startsWith(
				"<A>integral") && (c = c.remove(c.length - 3), d = c.split(","), 5 <= d.length ?
				c = " \\displaystyle\\int_{" + d[1] + "}^{" + d[2] + "} \\! " + d[3] +
				" \\, \\mathrm{\u0501}" + d[4] : 4 == d.length ? c =
				" \\displaystyle\\int_{" + d[1] + "}^{" + d[2] + "} \\! " + d[3] +
				" \\, \\mathrm{\u0501} x" : 3 == d.length && (c =
					" \\displaystyle\\int_{}^{} \\! " + d[1] + " \\, \\mathrm{\u0501}" + d[
						2]));
			else if ("<Z>" == f)
				if (c = c.remove(c.length - 3), c.startsWith("<Z>SET")) c = c.remove(0, 7),
					c = " \\left \\{" + c + " \\right \\} ";
				else if (c.startsWith("<Z>ISET")) c = c.remove(0, 8), c = " < \\left \\{" +
				c + " \\right \\} > ";
			else {
				if (c.startsWith("<Z>table")) {
					for (var c = c.remove(0, 9), d = b = null, d = c.split(":"), b = String(
							d[0]).split(","), d = 1 < d.length ? String(d[1]).split(",") : [""],
						c = "", l = 0; l <= Math.min(b.length, d.length) - 1; l++) c += b[l] +
						" & " + d[l], l < b.length - 1 && (c += " \\\\ "), 0 == l && 0 < Math.min(
							b.length, d.length) - 1 && (c += "\\hline ");
					c = " \\begin{array}{c|c} " + c + " \\end{array} "
				}
			} else "<J>" == f ? (c = c.remove(0, 3), c = c.remove(c.length - 3), c = c
					.replaceAll(", \\dfrac", " \\dfrac")) : "<O>" == f ? (c = c.remove(0, 3),
					c = c.remove(c.length - 3), c = c.contains("fogmode") ? c.replaceAll(
						"fogmode,", "").replaceAll("o", " \\circ ") : c.replaceAll(",", "(") +
					")") : "<B>" == f ? c = "" : "<E>" == f ? (c = c.remove(0, 3), c = c.remove(
					c.length - 3), c = "^{" + c + "}", c.contains("<F>") && (c = c.replaceAll(
					"<F>", " \\frac{").replaceAll("<f>", "} ").replaceAll("/", "}{"))) :
				"<S>" == f ? (c = c.remove(0, 3), c = c.remove(c.length - 3), c = "_{" +
					c + "}", c.contains("<F>") && (c = c.replaceAll("<F>", " \\frac{").replaceAll(
						"<f>", "} ").replaceAll("/", "}{"))) : "<F>" == f && (c = c.remove(0, 3),
					c = c.remove(c.length - 3), d = c.split("/"), 2 == d.length ? c =
					" \\dfrac{" + d[0] + "}{" + d[1] + "} " : 3 == d.length ? c =
					" \\dfrac{ \\dfrac{" + d[0] + "}{" + d[1] + "} }{ " + d[2] + "} " : 4 ==
					d.length ? c = " \\dfrac{ \\dfrac{" + d[0] + "}{" + d[1] +
					"} }{ \\dfrac{" + d[2] + "}{" + d[3] + "} } " : 5 == d.length ? c =
					" \\dfrac{ \\dfrac{ \\dfrac{" + d[0] + "}{" + d[1] + "} }{ \\dfrac{" + d[
						2] + "}{" + d[3] + "} } }{ " + d[4] + "} " : 6 == d.length && (c =
						" \\dfrac{ \\dfrac{ \\dfrac{" + d[0] + "}{" + d[1] + "} }{ \\dfrac{" +
						d[2] + "}{" + d[3] + "} } }{ \\dfrac{" + d[4] + "}{" + d[5] + "} } "));
			k += c;
			g = k += g.substr(m + e.length, g.length - m - e.length)
		}
		return g
	}

	function p(a) {
		if ("" == a) return !1;
		if (1 == a.length && null == a.match(/[aI]/)) return !0;
		if (a.endsWith(".") && (a = a.remove(a.length - 1), a.isNumeric())) return !
			1;
		for (var f = 1; 2 >= f; f++)
			if (a.endsWith(".") || a.endsWith(",") || a.endsWith(";") || a.endsWith(
				":") || a.endsWith("'") || a.endsWith(")")) a = a.remove(a.length - 1);
		if (a.startsWith("'") || a.startsWith("(")) a = a.remove(0, 1);
		5 < a.length && (a = a.replaceAll("-", ""));
		return null != a.match(/^[a-zA-Z\s]+$/) ? !1 : !0
	}
	this.FixInput = function(a, f) {
		if ("" == a) return "";
		for (; - 1 < a.indexOf("__");) a = a.replaceAll("__", "_");
		a = a.replaceAll("\u00ab", "").replaceAll("\u00bb", "");
		a.endsWith("_") && (a = a.remove(a.length - 1, 1));
		a.startsWith("_") && (a = a.remove(0, 1));
		a = a.replaceAll(";", ",");
		a = a.replaceAll("\u00d7", "*");
		a = a.replaceAll("\u2265", ">=");
		a = a.replaceAll("\u2264", "<=");
		a = a.replaceAll("\u2013", "-");
		a = a.replaceAll("\u2212", "-");
		a = a.replaceAll("\u2192", "=>");
		a = a.replaceAll("\u03c0", "`");
		a = a.replaceAll("\u221a", "~");
		a = a.replaceAll("\u221e", "[infinity]");
		a = a.replaceAll("\u222b[", "I[");
		if (a.startsWith("\u222b")) {
			a = a.replaceAll("\u222b", "I[");
			var e = "";
			"d" == a.substr(a.length - 2, 1) && (e = a.substr(a.length - 1, 1), a = a.remove(
				a.length - 2, 2));
			a = a.contains("_") ? a.insert(a.indexOf("_"), "," + e + "]") : a + "," +
				e + "]"
		}
		a = a.replaceAll("\u2211[", "S[");
		a = a.replaceAll("\u2229", "[intersection]");
		a = a.replaceAll("\u03b8", "[theta]");
		a = a.replaceAll("\u03a0", "`");
		a = a.replaceAll("\u03b1", "[alpha]");
		a = a.replaceAll("\u00b5", "[mu]");
		a = a.replaceAll("\u03bc", "[mu]");
		a = a.replaceAll("\u03c3", "[sigma]");
		a = a.replaceAll("x\u00af", "[xbar]");
		"Basic Math" == f && !1 == a.contains("box[") && (a = a.replace(RegExp(
			" *[xX] *", "g"), "*"));
		a = a.replaceAll("box[", "V[B,");
		a = a.replaceAll("cylinder[", "V[C,");
		a = a.replaceAll("cone[", "V[O,");
		a = a.replaceAll("pyramid[", "V[P,");
		a = a.replaceAll("sphere[", "V[S,");
		a = a.replaceAll("rectangle[", "A[R,");
		a = a.replaceAll("circle[", "A[C,");
		a = a.replaceAll("triangle[", "A[T,");
		a = a.replaceAll("parallelogram[", "A[P,");
		a = a.replaceAll("trapezoid[", "A[Z,");
		a = a.replaceAll("matrix[", "M[");
		a = a.replaceAll("piecewise[", "P[");
		a = a.replaceAll("limit[", "L[");
		a = a.replaceAll("lim[", "L[");
		a = a.replaceAll("sum[", "S[");
		a = a.replaceAll("integral[", "I[");
		a = a.replaceAll("tri[", "T[");
		a = a.replaceAll("scientific[", "N[");
		a = a.replaceAll("sci[", "N[");
		a = a.replaceAll("table[", "G[");
		a = a.replaceAll("iset[", "C[");
		a = a.replaceAll("set[", "B[");
		a = a.replaceAll("\u00b0", "^{o}");
		a = a.replaceAll("\u00b2", "^2");
		a = a.replaceAll("[pi]", "`");
		a = a.replaceAll("[union]", "U");
		a = a.replaceAll("[intersection]", "O");
		a = a.replaceAll("[theta]", "T");
		a = a.replaceAll("[infinity]", "I");
		a = a.replaceAll("root:", "~");
		a = a.replaceAll("sqrt", "~");
		e = new Fprint;
		e.AllowedBegin = "";
		e.AllowedKeyString =
			"1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ()[].\u2026/\u00f7*+-^~,\u02cf`|{}\u00ab\u00bb<>=?:&_%!'$;\u00af ";
		e.AllowedPhrases = "";
		e.isChemistry = "Chemistry" == f;
		e.Explanation = "";
		if (0 < a.length && (a = a.replaceAll("_x1=", "_x<S>1<s>="), a =
			"Chemistry" != f ? e.InsertCTags(e.InsertETags(e.InsertRTags(e.InsertJTags(
				e.InsertFTags(e.InsertAbs(e.InsertSubscript(e.InsertMTags(a))), !1, !
					0)), !1), !1)) : e.InsertCTags(e.InsertETags(e.InsertRTags(e.InsertJTags(
				e.InsertFTags(e.formatChemistry(e.InsertAbs(e.InsertSubscript(a))), !
					1, !0)), !1), !1)), "" != a && (a = e.InsertOTags(a, !0), a = e.InsertSTags(
					a), a = e.InsertNTags(a), a = e.AbsCleanup(a), "Chemistry" != f && (a =
					a.replaceAll("<I>", "<ZZZ>"), a = a.replaceAll("<U>", "<YYY>"), a = a.replaceAll(
						"<O>", "<XXX>"), a = a.replaceAll("ISET,", "iSET,"), a = a.replaceAll(
						"SET,", "SEt,"), "Linear Algebra" == f ? (a = a.replaceAll("<L>",
						"<WWW>"), a = a.replaceAll("L", "<Z>L<z>"), a = a.replaceAll("<WWW>",
						"<L>")) : a = a.replaceAll("I", "<Z>I<z>").replaceAll("T", "<Z>T<z>"),
					a = a.replaceAll("SEt,", "SET,"), a = a.replaceAll("iSET,", "ISET,"), a =
					a.replaceAll("U", "<Z>U<z>").replaceAll("O", "<Z>X<z>"), a = a.replaceAll(
						"<XXX>", "<O>"), a = a.replaceAll("<YYY>", "<U>"), a = a.replaceAll(
						"<ZZZ>", "<I>")), a = a.replaceAll("[alpha]", "<Z>alpha<z>"), a = a.replaceAll(
					"[mu]", "<Z>mu<z>"), a = a.replaceAll("[sigma]", "<Z>sigma<z>"), a = a.replaceAll(
					"[xbar]", "<U>over,x<u>"), a = a.replaceAll("<Z>mu<z><U>over,x<u>",
					"<Z>mu<z><S><U>over,x<u><s>"), a = a.replaceAll(
					"<Z>sigma<z><U>over,x<u>", "<Z>sigma<z><S><U>over,x<u><s>"),
				"Statistics" == f || "Finite Math" == f)) && (-1 < a.indexOf("P") || -1 <
			a.indexOf("C"))) {
			var h = null,
				h = -1 < a.indexOf("P") ? "P" : "C",
				k = a.split(h);
			if (2 == k.length) {
				var g = k[0],
					g = g.replace("\u00af", "");
				if (g.isNumeric() || "<C>?<c>" == g)
					if (g = k[1], g = g.replace("\u00af", ""), g = g.replaceAll("<E>", "").replaceAll(
						"<e>", ""), g.isNumeric() || "<C>?<c>" == g) a = "<S>" + k[0] + "<s>" +
						h + "<S>" + k[1].replaceAll("<E>", "").replaceAll("<e>", "") + "<s>", -
						1 < a.indexOf("?") && e.AddExplanation(
							" - A value is needed at <C>?<c>")
			}
		}
		return a
	};
	this.LatexOutput = function(a) {
		if ("" == a) return "";
		var f = "",
			e = "",
			n = !1,
			k = !1; - 1 == a.indexOf("<Q>") && (a = a.replaceAll("<N>", " BREAK ").replaceAll(
			"<n>", ""));
		a = a.split(" ");
		for (var g = 0; g <= a.length - 1; g++)
			if (k && (k = !1, a[g] = a[g - 1] + " " + a[g]), p(a[g])) {
				"" != e ? (f += "$\\textrm{" + e + " }$", e = "") : "" == f || n || (f +=
					"$\\textrm{ }$");
				var n = !1,
					b;
				a: {
					b = a[g];
					for (var m = 1; 26 >= m; m++) {
						var d = 0,
							c = 0,
							l = String.fromCharCode(m + 64) & 0;
						if (b.contains(l))
							for (l = 0; l <= b.length - 1; l++) b.indexOf("<" + String.fromCharCode(
								m + 64) + ">", l) == l ? d += 1 : b.indexOf("<" + String.fromCharCode(
								m + 64).toLowerCase() + ">", l) == l && (c += 1);
						if (d > c) {
							b = !0;
							break a
						}
					}
					b = !1
				}!1 == b ? (b = a[g], b = b.replaceAll("\\", " \\pm ").replaceAll("$",
						" \\neq "), b = b.replaceAll("\u2026", " \\ldots "), b = b.replaceAll(
						"\u00f7", " \\div "), b = b.replaceAll("log{", " \\log {").replaceAll(
						"ln{", " \\ln {"), b = b.replaceAll("sinh{", " \\sinh ").replaceAll(
						"cosh{", " \\cosh ").replaceAll("tanh{", " \\tanh "), b = b.replaceAll(
						"sin{", " \\sin ").replaceAll("cos{", " \\cos ").replaceAll("tan{",
						" \\tan "), b = b.replaceAll("csch{", " \\csch ").replaceAll("sech{",
						" \\sech ").replaceAll("coth{", " \\coth "), b = b.replaceAll("csc{",
						" \\csc ").replaceAll("sec{", " \\sec ").replaceAll("cot{", " \\cot "),
					b = b.replaceAll("{", "").replaceAll("}", ""), b = b.replaceAll(
						"\u00ab", "").replaceAll("\u00bb", ""), b = b.replaceAll("%", " \\% "),
					b.contains("<M>D,") && (b = h(b, "<M>", "<m>", "<M>D,")), b.contains(
						"<M>") && (b = h(b, "<M>", "<m>", "<M>")), b.contains("<W>") && (b = h(
						b, "<W>", "<w>", "<W>")), b.contains("<C>") && (b = b.replaceAll(
						"<C><I>-16572022<i>", " \\color{#16387C}{"), b = b.replaceAll(
						"<C><I>-8355712<i>", " \\color{#808080}{"), b = b.replaceAll(
						"<C><I>-10746876<i>", " \\color{#FF0000}{"), b = b.replaceAll(
						"<C><I>-15320964<i>", " \\color{#16387C}{"), b = b.replaceAll("<C>",
						" \\color{#FF0000}{").replaceAll("<c>", "} ")), b.contains("<E>") && (
						b = h(b, "<E>", "<e>", "<E>")), b.contains("<S>") && (b = h(b, "<S>",
						"<s>", "<S>")), b.contains("<X>") && (b = b.replaceAll("<X>",
						" \\cancel{").replaceAll("<x>", "} ")), b.contains("<R>") && (b = b.replaceAll(
							"<R><I>", " \\sqrt[").replaceAll("<i>", "]{").replaceAll("<r>", "} ")
						.replaceAll("<R>", " \\sqrt{")), b.contains("<F>") && (b = h(b, "<F>",
						"<f>", "<F>")), b.contains("<V>sci") && (b = h(b, "<V>", "<v>",
						"<V>sci")), b.contains("<J>") && (b = h(b, "<J>", "<j>", "<J>")), b.contains(
						"<O>") && (b = h(b, "<O>", "<o>", "<O>")), b.contains("<B>") && (b = h(
						b, "<B>", "<b>", "<B>")), b.contains("<A>sum") && (b = h(b, "<A>",
						"<a>", "<A>sum")), b.contains("<A>integral") && (b = h(b, "<A>", "<a>",
						"<A>integral")), b.contains("<L>") && (b = h(b, "<L>", "<l>", "<L>")),
					b = b.replaceAll("`", " \\pi ").replaceAll("*", " \\cdot "), b = b.replaceAll(
						"<U>over,", " \\overline{"), b = b.replaceAll("<u>", "} "), b = b.replaceAll(
						"<U>arc,", " \\stackrel \\frown {"), b.contains("<Z>") && (b.contains(
							"<Z>SET") && (b = h(b, "<Z>", "<z>", "<Z>SET")), b.contains("<Z>ISET") &&
						(b = h(b, "<Z>", "<z>", "<Z>ISET")), b.contains("<Z>table") && (b = h(
							b, "<Z>", "<z>", "<Z>table")), b = b.replaceAll("<Z>PERP<z>",
							" \\perp ").replaceAll("<Z>PARA<z>", " \\parallel "), b = b.replaceAll(
							"<Z>ANGLE<z>", " \\angle ").replaceAll("<Z>CONGRUENT<z>", " \\cong "),
						b = b.replaceAll("<Z>SIM<z>", " \\sim ").replaceAll("<Z>S<Z>I<z>M<z>",
							" \\sim "), b = b.replaceAll("<Z>CIRC<z>", " \\bigodot ").replaceAll(
							"<Z>C<Z>I<z>RC<z>", " \\bigodot "), b = b.replaceAll("<Z>T<z>",
							" \\theta ").replaceAll("<Z>I<z>", " \\infty "), b = b.replaceAll(
							"<Z>U<z>", " \\cup ").replaceAll("<Z>X<z>", " \\cap "), b = b.replaceAll(
							"<Z>BOLD,", " \\mathbf{"), b = b.replaceAll("<Z>ITA<Z>L<z>,", " {").replaceAll(
							"<Z>ITAL,", " {"), b = b.replaceAll("<Z>L<z>", " \\lambda ").replaceAll(
							"<Z>TRI<z>", " \\Delta "), b = b.replaceAll("<Z>alpha<z>",
							" \\alpha ").replaceAll("<Z>mu<z>", " \\mu ").replaceAll(
							"<Z>sigma<z>", " \\sigma "), b = b.replaceAll("<Z>E<z>", " \\in ").replaceAll(
							"<Z>R<z>", " \\mathbb{R} "), b = b.replaceAll("<Z>EPS<z>",
							" \\epsilon ").replaceAll("<Z>APPR<z>", " \\approx "), b = b.replaceAll(
							"<z>", "} ")), b = b.replaceAll("log(", " \\log (").replaceAll("ln(",
						" \\ln ("), b = b.replaceAll("log_", " \\log _").replaceAll("ln(",
						" \\ln ("), b = b.replaceAll("sinh(", " \\sinh (").replaceAll("cosh(",
						" \\cosh (").replaceAll("tanh(", " \\tanh ("), b = b.replaceAll("sin(",
						" \\sin (").replaceAll("cos(", " \\cos (").replaceAll("tan(",
						" \\tan ("), b = b.replaceAll("sin^", " \\sin^").replaceAll("cos^",
						" \\cos^").replaceAll("tan^", " \\tan^"), b = b.replaceAll("csch(",
						" \\operatorname{ csch} (").replaceAll("sech(",
						" \\operatorname{ sech} (").replaceAll("coth(",
						" \\operatorname{ coth} ("), b = b.replaceAll("csc(", " \\csc (").replaceAll(
						"sec(", " \\sec (").replaceAll("cot(", " \\cot ("), b = b.replaceAll(
						"csc^", " \\csc^").replaceAll("sec^", " \\sec^").replaceAll("cot^",
						" \\cot^"), b = b.replaceAll("arc \\", " \\arc"), b = b.replaceAll(
						"\\arcsec", "\\operatorname{ arcsec}"), b = b.replaceAll("\\arccsc",
						"\\operatorname{ arccsc}"), b = b.replaceAll("\\arccot",
						"\\operatorname{ arccot}"), b = b.replaceAll(">=", " \\geq ").replaceAll(
						"<=", " \\leq "), b = b.replaceAll("y intercept", "y-intercept"), b =
					b.replaceAll("<->", " \\leftrightarrow "), b = b.replaceAll("=>",
						" \\rightarrow "), b = b.replaceAll("->", " \\rightarrow "), b = b.replaceAll(
						"<", " < "), b = b.replaceAll(">", " > "), b = b.replaceAll("\u00af",
						" \\ "), f += "$" + b + "$") : k = !0
			} else if (b = a[g], "BREAK" == b) n = !0, "" != e && (f += "$\\textrm{" +
			e + "}$"), f += "<div class='mlinebreak'/>", e = "";
		else {
			if ("" != f && "" == e && !n || "" != e) e += " ";
			n = !1;
			e += b
		}
		"" != e && (f += "$\\textrm{" + e + "}$");
		return f
	};
	return this
};
/*=+ editor.js +=*/
(function(a) {
	a.fn.editorAptitude = function(t) {
		function Q() {
			return RegExp(
				"ln|log|arcsinh|arcsin|sinh|sin|arccosh|arccos|cosh|cos|arctanh|arctan|tanh|tan|arccoth|arccot|coth|cot|arcsech|arcsec|sech|sec|arccsch|arccsc|csch|csc|table|bar|lim|matrix|sci|piecewise|iset|set|\\,m\\=|[\\[\\]\\{\\}\u00ab\u00bb\\(\\)\\|\\^\\/\\_\\,\\:" +
				("Chemistry" != subject ? "\u2192" : "") +
				"\u00d7\u23a1\u23a2\u23a3\u23a4\u23a5\u23a6\u221a\u2211\u222b\u0501]",
				"gi")
		}

		function O(b, C) {
			null == C && (C = !1);
			if (null != k) {
				if ("right" == m)
					if (k.endpos == f) {
						var h;
						a.each(J, function(b, a) {
							if (0 == c.substr(f + 1, 1).search(RegExp(a))) return h = !0, !1
						});
						0 <= c.indexOf("log[") && "/" == b ? (c = c.substring(0, k.startpos) +
								"{" + c.substring(k.startpos, f + 1) + "}" + b + "{?}" + c.substr(k.endpos +
									1), f += 5, m = "left") : h || null == n || "operator" == n.type ||
							"\u00af" == n.text() ? "operator" == k.type ? e.insertText("{?}" + b +
								"{?}", -5, null, !1) : (c = c.substring(0, k.startpos) + "{" + k.text() +
								"}" + b + "{?}" + c.substr(k.endpos + 1), f += 5, m = "left") : (c =
								c.substring(0, k.startpos) + "{" + k.text() + "}" + b + "{" + n.text() +
								"}" + c.substr(n.endpos + 1), f += 4, m = "left")
					} else c = c.substring(0, k.startpos) + "{" + c.substring(k.startpos, f +
						1) + "}" + b + "{" + c.substring(f + 1, k.endpos + 1) + "}" + c.substr(
						k.endpos + 1), f += 5, m = "left";
				else k.startpos == f ? "\u00af" != c.substr(f, 1) ? null != l &&
					"operator" != l.type && "\u00af" != l.text() ? (c = "-" == k.text() ? c
						.substring(0, l.startpos) + "{" + l.text() + "}" + b + "{" + k.text() +
						n.text() + "}" + c.substr(n.endpos + 1) : c.substring(0, l.startpos) +
						"{" + l.text() + "}" + b + "{" + k.text() + "}" + c.substr(k.endpos +
							1), f += 3) : (c = c.substring(0, k.startpos) + "{?}" + b + "{" + k.text() +
						"}" + c.substr(k.endpos + 1), f += 1) : null != l && "operator" != l.type &&
					"\u00af" != l.text() ? (a.each(J, function(b, a) {
							if (0 == c.substr(f + 1, 1).search(RegExp(a))) return h = !0, !1
						}), c = h || null == n || "operator" == n.type || "\u00af" == n.text() ?
						c.substring(0, l.startpos) + "{" + l.text() + "}" + b + "{?}" + c.substr(
							l.endpos + 1) : c.substring(0, l.startpos) + "{" + l.text() + "}" + b +
						"{" + n.text() + "}" + c.substr(n.endpos + 1), f += 3) : (c = null !=
						n && "operator" != n.type && "\u00af" != n.text() ? "{?}" + b + "{" +
						n.text() + "}" + c.substr(n.endpos + 1) : "{?}" + b + "{?}", f += 1) :
					(c = c.substring(0, k.startpos) + "{" + c.substring(k.startpos, f) +
						"}" + b + "{" + c.substring(f, k.endpos + 1) + "}" + c.substr(k.endpos +
							1), f += 4), m = "left";
				C || v();
				L()
			} else e.insertText("{?}" + b + "{?}", -5, null, !1)
		}

		function L() {
			var b = 0,
				C = 0,
				e = 0,
				d = c.match(Q());
			if (null != d) {
				var g = c;
				a.each(d, function(a, d) {
					var f = g.indexOf(d);
					if (u >= f + C) g = c.substr(f + d.length + e), b += d.length, C += f,
						e += f + d.length;
					else return !1
				})
			}
			f = u + b
		}

		function Y() {
			u = f;
			var b = c.substring(0, f).match(Q());
			null != b && a.each(b, function(b, a) {
				u -= a.length
			})
		}

		function ga() {
			var b = !0,
				e, b = !0;
			do e = c.search(/\s\s|\_\_|\_\s/), -1 < e ? (c = c.substring(0, e + 1) +
				c.substr(e + 2), f >= e && f--) : b = !1; while (b); - 1 != c.substr(0,
				1).search(/[\s\_]/) && (c = c.substr(1), 0 < f && f--);
			b = !0;
			do e = c.search(RegExp("[\u00af\\?]")), -1 < e ? (c = c.substring(0, e) +
				c.substr(e + 1), f >= e && f--) : b = !1; while (b);
			b = !0;
			do e = c.search(/\.\.\./), -1 < e ? (c = c.substring(0, e) + "\u2026" + c
				.substr(e + 3), f >= e && (f -= 2)) : b = !1; while (b);
			b = !0;
			do e = c.search(/\[bar\]/), -1 < e ? (c = c.substring(0, e) + c.substr(e +
				5), f >= e + 6 ? f -= 6 : f >= e && (f -= f - e + 1)) : b = !1; while (b);
			b = !0;
			do e = c.search(RegExp(/sqrt/i)), -1 < e ? (c = c.substring(0, e) +
				"\u221a{}" + c.substr(e + 4), f >= e && (f -= 2)) : b = !1; while (b);
			b = !0;
			do e = c.search(RegExp(/pi(?!ecewise)/i)), -1 < e ? (c = c.substring(0, e) +
				"\u03c0" + c.substr(e + 2), f >= e && (f -= 1)) : b = !1; while (b);
			b = !0;
			do e = c.search(RegExp(/sigma/i)), -1 < e ? (c = c.substring(0, e) +
				"\u03c3" + c.substr(e + 5), f >= e && (f -= 4)) : b = !1; while (b);
			b = !0;
			do e = c.search(RegExp(/theta/i)), -1 < e ? (c = c.substring(0, e) +
				"\u03b8" + c.substr(e + 5), f >= e && (f -= 4)) : b = !1; while (b);
			b = !0;
			do e = c.search(RegExp(/alpha/i)), -1 < e ? (c = c.substring(0, e) +
				"\u03b1" + c.substr(e + 5), f >= e && (f -= 4)) : b = !1; while (b);
			b = !0;
			do e = c.search(RegExp(/mu/i)), -1 < e ? (c = c.substring(0, e) +
				"\u03bc" + c.substr(e + 2), f >= e && (f -= 1)) : b = !1; while (b);
			b = !0;
			do e = c.search(/abs/), -1 < e ? (c = c.substring(0, e) + "{||}" + c.substr(
				e + 3), f >= e && f--) : b = !1; while (b);
			b = !0;
			do e = c.search(/\>\=/), -1 < e ? (c = c.substring(0, e) + "\u2265" + c.substr(
				e + 2), f >= e && f--) : b = !1; while (b);
			b = !0;
			do e = c.search(/\<\=/), -1 < e ? (c = c.substring(0, e) + "\u2264" + c.substr(
				e + 2), f >= e && f--) : b = !1; while (b);
			b = !0;
			do e = c.search(/\=\>/), -1 < e ? (c = c.substring(0, e) + "\u2192" + c.substr(
				e + 2), f >= e && f--) : b = !1; while (b);
			b = !0;
			do e = c.search(/\-\>/), -1 < e ? (c = c.substring(0, e) + "\u2192" + c.substr(
				e + 2), f >= e && f--) : b = !1; while (b);
			b = !0;
			do e = c.search(RegExp(
					"sin(?![\\(\\{\\^h])|cos(?![\\(\\{\\^h])|tan(?![\\(\\{\\^h])|sec(?![\\(\\{\\^h])|csc(?![\\(\\{\\^h])|cot(?![\\(\\{\\^h])|log(?![\\(\\{\\[])"
				)), -1 < e ? (c = c.substring(0, e + 3) + "()" + c.substr(e + 3), f++) :
				b = !1; while (b);
			b = !0;
			do e = c.search(/ln(?![\(\{])/), -1 < e ? (c = c.substring(0, e + 2) +
				"()" + c.substr(e + 2), f++) : b = !1; while (b);
			a.each(P, function(h, d) {
				d.contains("\u00bb") || a.each(R, function(a, h) {
					var g = h[0];
					if (!g.contains("\u00ab") && "\\[" != g) {
						b = !0;
						do
							if (e = c.search(RegExp(d + g)), -1 < e) {
								var m = D(d).length;
								D(g);
								c = c.substring(0, e + m) + "\u00af" + c.substr(e + m);
								f >= e && f++
							} else b = !1;
						while (b)
					}
				})
			});
			a.each(R, function(h, d) {
				var g = d[0];
				g.contains("\u00ab") || "\\[" == g || a.each(R, function(a, d) {
					var h = d[0];
					if (!h.contains("\u00ab") && "\\[" != h) {
						b = !0;
						do
							if (e = c.search(RegExp(g + h)), -1 < e) {
								var m = D(g).length;
								D(h);
								c = c.substring(0, e + m) + "\u00af" + c.substr(e + m);
								f >= e && f++
							} else b = !1;
						while (b)
					}
				})
			});
			a.each(P, function(h, d) {
				d.contains("\u00bb") || "\\]" == d || a.each(P, function(a, h) {
					if (!h.contains("\u00bb") && "\\]" != h) {
						b = !0;
						do
							if (e = c.search(RegExp(d + h)), -1 < e) {
								var g = D(d).length;
								D(h);
								c = c.substring(0, e + g) + "\u00af" + c.substr(e + g);
								f >= e && f++
							} else b = !1;
						while (b)
					}
				})
			});
			a.each(R, function(h, d) {
				var g = d[0];
				g.contains("\u00ab") || "\\]" == g || a.each(J, function(a, d) {
					b = !0;
					do
						if (e = c.search(RegExp(d + g)), -1 < e) {
							D(g);
							var h = D(d).length;
							c = c.substring(0, e + h) + "\u00af" + c.substr(e + h);
							f >= e && f++
						} else b = !1;
					while (b)
				})
			});
			a.each(P, function(h, d) {
				d.contains("\u00bb") || a.each(J, function(a, h) {
					b = !0;
					do
						if (e = c.search(RegExp(d + h)), -1 < e) {
							var g = D(d).length;
							D(h);
							c = c.substring(0, e + g) + "\u00af" + c.substr(e + g);
							f >= e && f++
						} else b = !1;
					while (b)
				})
			});
			a.each(R, function(b, a) {
				if (0 == c.search(a[0])) return c = "\u00af" + c, f++, !1
			});
			a.each(P, function(b, a) {
				if (0 == c.substr(c.length - 1, 1).search(a)) return f == c.length - 1 &&
					f++, c += "\u00af", !1
			});
			"_" == c.substr(c.length - 1, 1) && (f == c.length - 1 && f++, c +=
				"\u00af");
			a.each(Z, function(b, a) {
				var e = !0;
				do {
					var C = c.search(RegExp(a)); - 1 < C ? (c = c.substr(0, C + 1) + "?" +
						c.substr(C + 1), f >= C && f++) : e = !1
				} while (e)
			})
		}

		function ha() {
			var b, a, c, d;
			B = B.replace(RegExp("\\$\\$", "g"), "");
			a = B = B.replace(/\\color\{\#FF0000\}\{\?\}/g,
				"{\\color{#FFFFFF}\\colorbox{#E9E9E9}{?}}");
			d = 0;
			b = !0;
			do c = a.indexOf("log["), -1 < c ? (d += c, a = a.substr(c), c = a.indexOf(
				"]"), -1 < c ? (B = B.substring(0, d) + "\\log _{" + B.substring(d + 5,
					d + c - 1) + "}" + B.substr(d + c + 1), a = a.substr(c + 1), d += c +
				2) : b = !1) : b = !1; while (b)
		}

		function v(b, C) {
			"canvas" == e.mode && aa();
			C ? a(e).triggerHandler("focus") : a(e).focus();
			ga();
			e.enablepaste && ("" != c ? a(K).css("z-index", "-1") : a(K).css(
				"z-index", "0"));
			A = c.replace(Q(), "");
			Y();
			var h = new Formatting,
				d = h.FixInput(c, subject),
				h = h.LatexOutput(d);
			null == b && (b = !0);
			b && (0 < M.length && I < M.length - 1 && (M = M.slice(0, I + 1)), I++, d =
				new ia(c, f, m), M.push(d));
			var g = !1;
			B = h; - 1 == B.search(ja) ? (ha(), a(y).html(B), MathJax.Hub.Queue([
				"Typeset", MathJax.Hub, "editorAptitude" + e.id
			]), MathJax.Hub.Queue(function() {
				0 < a("span.noError").length && (g = !0);
				ba(g)
			})) : (g = !0, ba(g));
			e.error = g; - 1 < B.indexOf("color{#FF0000}") && (e.error = !0);
			e.text = c;
			e.text = e.text.replace(RegExp("\u00af", "g"), "");
			e.text = e.text.replaceAll("\u02cf", ",");
			e.text = e.text.replaceAll("iset[", "set["); - 1 < e.text.indexOf(
				"\u2026") && (e.text = e.text.replaceAll("set[", "iset["), e.text = e.text
				.replaceAll("\u2026,", ""), e.text = e.text.replaceAll(",\u2026", ""));
			e.latex = B;
			null == C && "function" == typeof _editorChanged && _editorChanged(); - 1
				!= c.search("table\\[") ? 0 == a("#mwstatcontrolcontainer" + e.id).length &&
				(h = a("<div id='mwstatcontrolcontainer" + e.id + "'/>").appendTo(a(e)),
					a("<div id='mwstatremovebutton" + e.id + "'/>").appendTo(a(h)).MWButton({
						icon: e.iconpath + "/minus.png",
						title: "Remove Row",
						css: "editorAptitudeControlButton",
						hovercss: "editorAptitudeControlButtonHover",
						clickcss: "editorAptitudeControlButtonClick",
						clickhandler: function(b) {
							b = c.indexOf("_");
							var a = c.substring(0, b).lastIndexOf(","); - 1 != a && (c = c.substring(
									0, a) + c.substr(b), a <= f && (f -= b - a), b = c.indexOf("]"),
								a = c.lastIndexOf(","), c = c.substring(0, a) + c.substr(b), a <=
								f && (f -= b - a), v())
						}
					})) : a("#mwstatcontrolcontainer" + e.id).remove()
		}

		function ba(b) {
			b && "editor" == e.mode  ? (e.undo(!1), setTimeout(function() {
				alert("The input you entered is not valid.")
			}, 100)) : (a(".mtext").each(function() {
				"" == a.trim(a(this).text()) && (a(this).width(5), a(this).css(
					"background-color", e.defaultbg), a(this).css("border",
					"2px solid " + a(y).css("background-color")), a(this).css("border",
					"2px solid " + a(y).css("background-color") + " !important"))
			}), a("#editorAptitude" + e.id).find("span[id ^= 'MathJax-Color-']").css(
				"background-color", e.emptybg + " !important"), F())
		}

		function aa() {
			"canvas" == e.mode && (a(T).hide(), e.mode = "editor", a(y).show(), "" !=
				c ? (u = 0, L(), m = "left") : (f = u = -1, m = "right"), F())
		}










		function F() {
			a("#editorAptitude" + e.id + " .mi, #editorAptitude" + e.id +
				" .mn, #editorAptitude" + e.id + " .mo").each(function() {
				var b = a(this).text();
				"?" == b ? (a(this).css("background-color", e.emptybg), a(this).css(
					"background-color", e.emptybg + " !important")) : a(this).hasClass(
					"mi") && "normal" == a(this).css("font-style") && "\u221e" != b ? (a(
					this).css("background-color", "transparent"), a(this).css(
					"background-color", "transparent !important")) : a(this).hasClass(
					"mo") || "" == b || (a(this).css("background-color", e.defaultbg), a(
					this).css("background-color", e.defaultbg + " !important"))
			});
			U();
			if ("" != c) {
				var b = [];
				a("#editorAptitude" + e.id + " .mi, #editorAptitude" + e.id +
					" .mo, #editorAptitude" + e.id + " .mn, #editorAptitude" + e.id +
					" .mtext, #editorAptitude" + e.id + " .mlinebreak").each(function() {
					var d = new ca(a(this).attr("id") + "", a(this).attr("class") + "", a(
						this).text() + "");
					b.push(d)
				}); - 1 == c.search("table\\[") && b.sort(function(b, a) {
					var d = new Number(b.id.replace("MathJax-Span-", "")),
						c = new Number(a.id.replace("MathJax-Span-", ""));
					return d - c
				});
				var g = null;
				a.each(b, function(d, c) {
					if ("\u222b" == c.text) {
						g = d;
						var e = a("#" + c.id).parent().nextAll();
						if (2 == e.length) {
							var f = a(e[0]).find(".mi, .mo, .mn, .mtext"),
								e = a(e[1]).find(".mi, .mo, .mn, .mtext"),
								h = b.slice(g + f.length + 1, g + f.length + e.length + 1);
							b.splice(g + 1 + f.length, e.length);
							a.each(h, function(a, d) {
								b.splice(g + 1 + a, 0, d)
							})
						}
					}
				});
				var h = null,
					d = null,
					X = null,
					p = null,
					r = null,
					k = null,
					l = null;
				a("#editorAptitude" + e.id).find(
					".mroot, .mroot .mi, .mroot .mo, .mroot .mn, .mroot .mtext").each(
					function() {
						a(this).hasClass("mroot") && (null != h && (d = X, a.each(b, function(
							a, c) {
							null == p && Number(c.id.replace("MathJax-Span-", "")) > Number(
								h.replace("MathJax-Span-", "")) ? r = p = a : (null == r || a >
								r) && Number(c.id.replace("MathJax-Span-", "")) == Number(d.replace(
								"MathJax-Span-", "")) && (k = a, l = b[k], b.splice(k, 1), b.splice(
								p, 0, l), k = p = null)
						}), found = !1), h = a(this).attr("id"), d = null);
						X = a(this).attr("id")
					});
				null != h && (d = X, p = null, a.each(b, function(a, c) {
					null == p && Number(c.id.replace("MathJax-Span-", "")) > Number(h.replace(
						"MathJax-Span-", "")) ? p = a : (null == r || a > r) && Number(c.id
						.replace("MathJax-Span-", "")) == Number(d.replace("MathJax-Span-",
						"")) && (k = a, l = b[k], b.splice(k, 1), b.splice(p, 0, l), k = p =
						null)
				}));
				var n = 0,
					x = u,
					q = "";
				a.each(b, function(d, c) {
					var f = c.text;
					if ("10" != f || "\u00d7" != q)
						if ("m" != f || "," != q)
							if ("=" != f || "m" != q) {
								f = c.text.replace(Q(), "");
								f = f.replaceAll("\u00af", "");
								if ("mlinebreak" == c.classname) n++, x++;
								else {
									if ("mtext" != c.classname || "italic" == a("#" + c.id).css(
										"font-style")) f = f.replace(RegExp("\\s", "g"), "");
									n += f.length
								} if (n > x && "mlinebreak" != c.classname || d == b.length - 1) {
									if ("?" == f || "" == f || "\u00af" == A.substr(u, 1)) m = "left";
									"left" == m ? a(G).text(f.substring(0, f.length - (n - x))) : a(G)
										.text(f.substring(0, f.length - (n - x) + 1));
									"transparent" != e.activebg && ("mo" != c.classname && "mtext" !=
										c.classname) && a("#" + c.id).css("background-color", e.activebg);
									"transparent" != e.activebg && ("mo" != c.classname && "mtext" !=
										c.classname) && a("#" + c.id).css("background-color", e.activebg +
										" !important");
									a(G).css("font-family", a("#" + c.id).css("font-family"));
									a(G).css("font-size", a("#" + c.id).css("font-size"));
									a(G).css("font-style", a("#" + c.id).css("font-style"));
									var h;
									h = "" != a.trim(f) ? ea + parseInt(a(G).width()) : ea + 5;
									h = 0 <= h ? "+" + h.toString() : h.toString();
									var g = ka,
										g = 0 <= g ? "+" + g.toString() : g.toString();
									a(E).css("font-family", a("#" + c.id).css("font-family"));
									a(E).css("font-size", a("#" + c.id).css("font-size"));
									a(E).css("padding-left", a("#" + c.id).css("padding-left"));
									setTimeout(function() {
										a(E).show();
										try {
											a(E).position({
												my: "left" + h + " top" + g,
												at: "left top",
												of: a("#" + c.id),
												collision: "none"
											})
											console.log(a(E).position);
										} catch (b) {}
									}, 10);
									return !1
								}
							}
					q = c.text
				})
			} else a(E).css("font-family", a(y).css("font-family")), a(E).css(
				"font-size", a(y).css("font-size")), a(E).css("padding-left", a(y).css(
				"padding-left")), setTimeout(function() {
				a(E).show();
				a(E).position({
					my: "left top",
					at: "left top",
					of: a(y),
					collision: "none"
				})
			}, 10); - 1 == f && 0 < c.length && (u = f = 0); - 1 == f && (m = "right");
			fa()
		}
















		function U() {
			e.showconsole && a("#debug").html("");
			q = [];
			n = k = l = null;
			if ("" != c) {
				for (var b = !1, g = !1, h, d = 0; d < c.length; d++) {
					h = c.substr(d);
					var m = !1;
					a.each(R, function(a, c) {
						if (0 == h.search(RegExp(c[0]))) {
							m = !0;
							if (b || g) {
								g = b = !1;
								for (var e = q.length - 1; 0 <= e; e--) {
									var f = q[e];
									if (null == f.endpos) {
										f.endpos = d - 1;
										break
									}
								}
							}
							f = new H(null, d, null, "container", c[1], c[2]);
							q.push(f);
							d += D(c[0]).length - 1;
							return !1
						}
					});
					m || a.each(la, function(a, c) {
						if (0 == h.search(RegExp(c))) {
							m = !0;
							if (b || g) {
								g = b = !1;
								for (var e = q.length - 1; 0 <= e; e--) {
									var f = q[e];
									if (null == f.endpos) {
										f.endpos = d - 1;
										break
									}
								}
							}
							f = new H(null, d, d, "operator");
							q.push(f);
							d += D(c).length - 1;
							return !1
						}
					});
					m || a.each(P, function(a, c) {
						if (0 == h.search(RegExp(c))) {
							m = !0;
							if (b || g) {
								g = b = !1;
								for (var e = q.length - 1; 0 <= e; e--) {
									var f = q[e];
									if (null == f.endpos) {
										f.endpos = d - 1;
										break
									}
								}
							}
							for (e = q.length - 1; 0 <= e; e--)
								if (f = q[e], null == f.endpos && "container" == f.type && f.endgroupregex ==
									c) {
									f.endpos = d + D(c).length - 1;
									break
								}
							d += D(c).length - 1;
							return !1
						}
					});
					m || a.each(J, function(a, c) {
						if (0 == h.search(RegExp(c))) {
							m = !0;
							if (b || g) {
								g = b = !1;
								for (var e = q.length - 1; 0 <= e; e--) {
									var f = q[e];
									if (null == f.endpos) {
										f.endpos = d - 1;
										break
									}
								}
							}
							d += D(c).length - 1;
							return !1
						}
					});
					if (!m && "{" != h.substr(0, 1) && "\u00ab" != h.substr(0, 1))
						if ("?" == h.substr(0, 1)) {
							if (b || g)
								for (var g = b = !1, p = q.length - 1; 0 <= p; p--) {
									var r = q[p];
									if (null == r.endpos) {
										r.endpos = d - 1;
										break
									}
								}
							r = new H(null, d, d, "generic");
							q.push(r)
						} else if ("\u00af" == h.substr(0, 1)) {
						if (b || g)
							for (g = b = !1, p = q.length - 1; 0 <= p; p--)
								if (r = q[p], null == r.endpos) {
									r.endpos = d - 1;
									break
								}
						r = new H(null, d, d, "space");
						q.push(r)
					} else if (h.substr(0, 1).isLetter()) {
						if (b)
							for (b = !1, p = q.length - 1; 0 <= p; p--)
								if (r = q[p], null == r.endpos) {
									r.endpos = d - 1;
									break
								}
						g || (g = !0, r = new H(null, d, null, "char"), q.push(r))
					} else if (h.substr(0, 1).isNumeric()) {
						if (g)
							for (g = !1, p = q.length - 1; 0 <= p; p--)
								if (r = q[p], null == r.endpos) {
									r.endpos = d - 1;
									break
								}
						b || (b = !0, r = new H(null, d, null, "numeric"), q.push(r))
					}
				}
				if (b || g)
					for (p = q.length - 1; 0 <= p; p--)
						if (r = q[p], null == r.endpos) {
							r.endpos = c.length - 1;
							break
						}
				var u = [];
				a.each(q, function(b, a) {
					null != a.endpos && u.push(a)
				});
				q = u;
				q.sort(function(b, a) {
					var d = new Number(b.startpos * c.length + (c.length - b.endpos)),
						e = new Number(a.startpos * c.length + (c.length - a.endpos));
					return d - e
				});
				a.each(q, function(b, a) {
					a.index = b
				});
				var s = [],
					m = !1;
				a.each(q, function(b, a) {
					var c = a.text();
					"container" == a.type && (c.startsWith("[") && c.endsWith("]")) && (c =
						a.prevsibling(), null != c && "char" == c.type && (m = !0, c = new H(
							null, c.startpos, a.endpos, "container"), s.push(c)))
				});
				m && (q = q.concat(s), q.sort(function(b, a) {
					var d = new Number(b.startpos * c.length + (c.length - b.endpos)),
						e = new Number(a.startpos * c.length + (c.length - a.endpos));
					return d - e
				}), a.each(q, function(b, a) {
					a.index = b
				}));
				s = [];
				m = !1;
				a.each(q, function(b, a) {
					var c = a.text();
					if ("/" == c || "^" == c) {
						m = !0;
						var c = a.prevsibling(),
							d = a.nextsibling();
						null != c && null != d && (c = new H(null, c.startpos, d.endpos,
							"compound"), s.push(c))
					}
				});
				m && (q = q.concat(s), q.sort(function(b, a) {
					var d = new Number(b.startpos * c.length + (c.length - b.endpos)),
						e = new Number(a.startpos * c.length + (c.length - a.endpos));
					return d - e
				}), a.each(q, function(b, a) {
					a.index = b
				}));
				var da = 9999,
					x = -1,
					w = -1;
				a.each(q, function(b, a) {
					a.index = b;
					f >= a.startpos && f <= a.endpos ? a.startpos > x && (x = a.startpos,
							k = a) : f > a.endpos ? a.endpos > w && (w = a.endpos, l = a) : a.startpos <
						da && (da = a.startpos, n = a)
				});
				null == k && (k = null != l ? null != n ? new H(null, l.endpos + 1, n.startpos -
						1, "generic") : new H(null, l.endpos + 1, c.length - 1, "generic") :
					null != n ? new H(null, 0, n.startpos - 1, "generic") : new H(null, 0,
						c.length - 1, "generic"));
				null != l && V("prev group:" + l.text() + ", startpos:" + l.startpos +
					", endpos:" + l.endpos + ", type:" + l.type);
				V("current group:" + k.text() + ", startpos:" + k.startpos + ", endpos:" +
					k.endpos + ", type:" + k.type);
				r = k;
				do p = r.parent(), null != p && V("parent group:" + p.text() +
					", startpos:" + p.startpos + ", endpos:" + p.endpos + ", type:" + p.type
				), r = p; while (null != p);
				null != n && V("next group:" + n.text() + ", startpos:" + n.startpos +
					", endpos:" + n.endpos + ", type:" + n.type)
			}
		}

		function D(b) {
			var a = b;
			if (null != b) {
				do a = a.replace("\\", ""); while (-1 < a.indexOf("\\"))
			}
			return a
		}

		function ca(b, a, c) {
			this.id = b;
			this.classname = a;
			this.text = c;
			return this
		}

		function H(b, e, f, d, g, m) {
			var r = this;
			r.index = b;
			r.startpos = e;
			r.endpos = f;
			r.type = d;
			r.endgroupregex = g;
			r.backspace = m;
			r.text = function() {
				return c.substring(r.startpos, r.endpos + 1)
			};
			r.parent = function() {
				var b = null;
				a.each(q, function(a, c) {
					c.index != r.index && (r.startpos >= c.startpos && r.endpos <= c.endpos) &&
						(b = c)
				});
				return b
			};
			r.prevsibling = function() {
				var b = null,
					c = r.parent();
				a.each(q, function(a, d) {
					if (d.index >= r.index) return !1;
					if (null == c) null == d.parent() && (b = d);
					else {
						var e = d.parent();
						null != e && e.index == c.index && (b = d)
					}
				});
				return b
			};
			r.nextsibling = function() {
				var b = null,
					c = r.parent();
				a.each(q, function(a, d) {
					if (d.index > r.index)
						if (null == c) {
							if (null == d.parent()) return b = d, !1
						} else {
							var e = d.parent();
							if (null != e && e.index == c.index) return b = d, !1
						}
				});
				return b
			};
			return r
		}

		function ia(b, a, c) {
			this.inputtext = b;
			this.inputpos = a;
			this.cursoralign = c;
			return this
		}

		function fa() {
			if (e.showconsole) {
				a("#inputtext").text("'" + c + "'");
				a("#formattext").text("'" + A + "'");
				a("#latextext").text(B);
				a("#inputpos").text(f);
				a("#formatpos").text(u);
				a("#cursoralign").text(m);
				var b = "",
					g = !1;
				a.each(q, function(a, c) {
					"" != b && (b += "<br/>");
					f >= c.startpos && f <= c.endpos && (b += "<span class='Label'>", g = !
						0);
					b += c.index + ": " + c.text() + ", startpos:" + c.startpos +
						", endpos:" + c.endpos + ", type:" + c.type;
					g && (g = !1, b += "</span>")
				});
				a("#groups").html(b)
			}
		}

		function V(b) {
			e.showconsole && ("" != a("#debug").html() && a("#debug").html(a("#debug")
				.html() + "<br/>"), a("#debug").html(a("#debug").html() + b))
		}
		var e = this;
		e.mode = "editor";
		e.shapetype = "";
		e.text = "";
		e.latex = "";
		e.error = !1;
		var ea = -5,
			ka = 0,
			g = 202,
			S = 320,
			ja = RegExp("< A >|< L >|M\\[|S\\[", "g"),
			R = [
				["ln\\(", "\\)", !0],
				["log\\(", "\\)", !0],
				["\u00ablog", "\u00bb", !0],
				["arcsinh\\(", "\\)", !0],
				["arcsin\\(", "\\)", !0],
				["sinh\\(", "\\)", !0],
				["sin\\(", "\\)", !0],
				["\u00absin\\^\u00ab", "\\)\u00bb", !1],
				["arccosh\\(", "\\)", !0],
				["arccos\\(", "\\)", !0],
				["cosh\\(", "\\)", !0],
				["cos\\(", "\\)", !0],
				["\u00abcos\\^\u00ab", "\u00bb", !1],
				["arctanh\\(", "\\)", !0],
				["arctan\\(", "\\)", !0],
				["tanh\\(", "\\)", !0],
				["tan\\(", "\\)", !0],
				["\u00abtan\\^\u00ab", "\u00bb", !1],
				["arccoth\\(", "\\)", !0],
				["arccot\\(", "\\)", !0],
				["coth\\(", "\\)", !0],
				["cot\\(", "\\)", !0],
				["\u00abcot\\^\u00ab", "\u00bb", !1],
				["arcsech\\(", "\\)", !0],
				["arcsec\\(", "\\)", !0],
				["sech\\(", "\\)", !0],
				["sec\\(", "\\)", !0],
				["\u00absec\\^\u00ab", "\u00bb", !1],
				["arccsch\\(", "\\)", !0],
				["arccsc\\(", "\\)", !0],
				["csch\\(", "\\)", !0],
				["csc\\(", "\\)", !0],
				["\u00abcsc\\^\u00ab", "\u00bb", !1],
				["lim\\[", "\\]", !1],
				["matrix\\[", "\\]", !1],
				["sci\\[", "\\]", !1],
				["piecewise\\[", "\\]", !1],
				["iset\\[", "\\]", !0],
				["set\\[", "\\]", !0],
				["table\\[", "\\]", !1],
				["\u2211\\[", "\\]", !1],
				["\u222b\\[", "\\]", !1],
				["\u00ab\\(", "\\)\u00bb", !1],
				["\\(", "\\)", !0],
				["\\{\\|", "\\|\\}", !0],
				["\\{", "\\}", !1],
				["\\[", "\\]", !0],
				["\u00ab", "\u00bb", !1]
			],
			la = "\\+ \\- \\* \u00f7 \\/ \\^ \\= \u02cf U \u2229 < > \u2265 \u2264".split(
				" "),
			J = ["\\,", "\\_", "\\:", "\\s"],
			P = "\\)\u00bb \\|\\} \\} \u00bb \\) \\]".split(" "),
			Z =
			"\\(\\) \\[\\] \\|\\| \\{\\} \u00ab\u00bb \\{\\/ \\/\\} \\{\\^ \\^\\} \\:\\} \\:\\, \\[\\, \\[\\: \\[\\_ \\_\\] \\,\\, \\,\\_ \\_\\, \\_\\_ \\,\\] \\(\\, \\,\\) \\(\u02cf \u02cf\\) \\=\\}"
			.split(" "),
			c = "",
			A = "",
			B = "",
			f = -1,
			u = -1,
			q = [],
			m = "right",
			l, k, n, M = [],
			I = -1;
		e.id = "";
		e.showconsole = !1;
		e.showcontrols = !0;
		e.testmode = !1;
		e.enablepaste = !0;
		e.emptytext = "Type your problem here";
		e.defaultbg = "transparent";
		e.activebg = "transparent";
		e.hoverbg = "transparent";
		e.emptybg = "#E9E9E9";
		e.iconpath = "/aptitude/img/editor";
		e.onfocus = null;
		e.onblur = null;
		null != t && (null != t.id && (e.id = t.id), null != t.showconsole && (e.showconsole =
				t.showconsole), null != t.showcontrols && (e.showcontrols = t.showcontrols),
			null != t.testmode && (e.testmode = t.testmode), null != t.enablepaste &&
			(e.enablepaste = t.enablepaste), null != t.emptytext && (e.emptytext = t.emptytext),
			null != t.defaultbg && (e.defaultbg = t.defaultbg), null != t.activebg &&
			(e.activebg = t.activebg), null != t.hoverbg && (e.hoverbg = t.hoverbg),
			null != t.emptybg && (e.emptybg = t.emptybg), null != t.iconpath && (e.iconpath =
				t.iconpath), null != t.canvasheight && (g = t.canvasheight), null != t.canvaswidth &&
			(S = t.canvaswidth), null != t.onfocus && (e.onfocus = t.onfocus), null !=
			t.onblur && (e.onblur = t.onblur));
		e.showconsole && a(
			"<div id='aptitudeDebug'><table border='1' cellpadding='10' style='width:100%; border-collapse:collapse;'><tr><td valign='top'><span class='Label'>Input Text: </span></td><td style='width:100%;'><div id='inputtext'></div></td></tr><tr><td valign='top'><span class='Label'>Formatted Text: </span></td><td><div id='formattext'></div></td></tr><tr><td valign='top'><span class='Label'>Latex Text: </span></td><td><div id='latextext'></div></td></tr><tr><td><span class='Label'>Input Pos: </span></td><td><div id='inputpos'></div></td></tr><tr><td><span class='Label'>Formatted Pos: </span></td><td><div id='formatpos'></div></td></tr><tr><td><span class='Label'>Cursor Align: </span></td><td><div id='cursoralign'></div></td></tr><tr><td valign='top'><span class='Label'>Groups: </span></td><td><div id='groups'></div></td></tr><tr><td valign='top'><span class='Label'>Debug: </span></td><td><div id='debug'></div></td></tr></table></div>"
		).appendTo(a(e).parent());
		var y = a("<div id='editorAptitude" + e.id +
			"' class='editorAptitudeEmpty'/>").appendTo(a(e));
		if (e.enablepaste) var K = a(
			"<textarea style='position:absolute;top:0px;left:-50px;height:100%;width:100px;color:transparent;background:transparent;border:none;outline:none;resize:none;overflow:hidden;'></textarea>"
		).appendTo(a(e));
		var T = a("<div id='editorAptitudecanvaswrapper" + e.id +
				"' class='editorAptitudeCanvasWrapper'/>").appendTo(a(e)),
			N = null,
			s;
		if (e.showcontrols) var W = a("<div id='mwcontrolcontainer" + e.id +
				"' class='editorAptitudeControlContainer'/>").appendTo(a(e)),
			ma = a("").appendTo(a(W));
		var E = a("<div id='aptitudeCursor" + e.id +
				"' class='editorAptitudeCursor'>|</div>").appendTo(a(e)),
			G = a("<div id='aptitudestringmeasure" + e.id +
				"' class='AptitudeStringMeasure'/>").appendTo(a(e));
		a(e).attr("tabindex", "0");
		a(y).on("selectstart", function() {
			return !1
		});
		a(E).on("selectstart", function() {
			return !1
		});
		if (e.showcontrols) a(W).on("selectstart", function() {
			return !1
		});
		a(y).text(e.emptytext);
		e.enablepaste && (a(K).on("paste", function(b) {
			setTimeout(function() {
				var b = a(K).val();
				a(K).val("");
				e.loadText(b);
				a(K).blur()
			}, 0)
		}), a(K).on("click", function(b) {
			1 == b.which && a(e).focus()
		}));
		setInterval(function() {
			a(E).animate({
				opacity: 0
			}, "fast", "swing").animate({
				opacity: 1
			}, "fast", "swing")
		}, 600);
		"transparent" != e.hoverbg && (a("#editorAptitude" + e.id).on("mouseenter",
			".mi, .mn, .mtext", function() {
				var b = a(this).text();
				"?" != b && (a(this).hasClass("mi") && "normal" == a(this).css(
						"font-style") && "\u221e" != b ? (a(this).css("background-color",
						"transparent"), a(this).css("background-color",
						"transparent !important")) : a(this).hasClass("mtext") && "" == b ?
					(a(this).css("background-color", e.hoverbg), a(this).css(
						"background-color", e.hoverbg + " !important")) : "" != b && (a(this)
						.css("background-color", e.hoverbg), a(this).css("background-color",
							e.hoverbg + " !important")))
			}), a("#editorAptitude" + e.id).on("mouseleave", ".mi, .mn, .mtext",
			function() {
				var b = a(this).text();
				"?" != b && (a(this).hasClass("mi") && "normal" == a(this).css(
						"font-style") && "\u221e" != b ? (a(this).css("background-color",
						"transparent"), a(this).css("background-color",
						"transparent !important")) : a(this).hasClass("mtext") && "" == b ?
					(a(this).css("background-color", e.defaultbg), a(this).css(
						"background-color", e.defaultbg + " !important")) : "" != b && (a(
						this).css("background-color", e.defaultbg), a(this).css(
						"background-color", e.defaultbg + " !important")))
			}));
		a(e).focus(function(b) {
			a(e).addClass("Active");
			a(y).hasClass("editorAptitudeEmpty") && a(y).removeClass(
				"editorAptitudeEmpty");
			a(y).hasClass("editorAptitude") || a(y).addClass("editorAptitude");
			"editor" == e.mode && ("" == c && a(y).text(""), a(E).show());
			"function" == typeof _editorActivated && _editorActivated(e.id);
			null != e.onfocus && e.onfocus.call(this, b)
		});
		a(e).blur(function(b) {
			a("#editorAptitude" + e.id + " .mi, #editorAptitude" + e.id +
				" .mn, #editorAptitude" + e.id + " .mo").each(function() {
				var b = a(this).text();
				"?" == b ? (a(this).css("background-color", e.emptybg), a(this).css(
					"background-color", e.emptybg + " !important")) : a(this).hasClass(
					"mi") && "normal" == a(this).css("font-style") && "\u221e" != b ? (
					a(this).css("background-color", "transparent"), a(this).css(
						"background-color", "transparent !important")) : a(this).hasClass(
					"mo") || "" == b || (a(this).css("background-color", e.defaultbg),
					a(this).css("background-color", e.defaultbg + " !important"))
			});
			a(e).removeClass("Active");
			"editor" == e.mode && ("" == c ? (a(y).hasClass("editorAptitude") && a(y)
					.removeClass("editorAptitude"), a(y).hasClass("editorAptitudeEmpty") ||
					a(y).addClass("editorAptitudeEmpty"), a(y).text(e.emptytext), e.enablepaste &&
					a(K).css("z-index", "0")) : e.enablepaste && a(K).css("z-index", "-1"),
				a(E).hide());
			null != e.onblur && e.onblur.call(this, b)
		});
		a(y).click(function(b) {
			"editor" == e.mode && (a(e).focus(), m = "right", u = A.length - 1, L(),
				F(), e.testmode && logAction({
					action: "positionCursor",
					modifiers: {
						inputpos: f,
						formatpos: u,
						cursoralign: m
					}
				}))
		});
		a(e).keydown(function(b) {
			e.keydown(b)
		});
		e.keydown = function(b) {
			if ("editor" == e.mode) switch (b.which) {
				case 8:
					b.preventDefault();
					e.backspace();
					break;
				case 35:
					b.preventDefault();
					0 < c.length && (u = A.length - 1, m = "right", L(), F());
					break;
				case 36:
					b.preventDefault();
					0 < c.length && (f = u = 0, m = "left", F());
					break;
				case 37:
					b.preventDefault();
					e.leftArrow();
					break;
				case 38:
					b.preventDefault();
					e.upArrow();
					break;
				case 9:
				case 39:
					b.preventDefault();
					e.rightArrow();
					break;
				case 40:
					b.preventDefault();
					e.downArrow();
					break;
				case 46:
					b.preventDefault(), e.deleteText()
			}
		};
		a(e).keypress(function(b) {
			e.keypress(b)
		});
		e.keypress = function(b) {
			if ((48 <= b.which && 57 >= b.which || 65 <= b.which && 90 >= b.which ||
					97 <= b.which && 122 >= b.which || 13 == b.which || 32 == b.which || 33 ==
					b.which || 37 == b.which || 39 == b.which || 40 == b.which || 42 == b.which ||
					43 == b.which || 44 == b.which || 45 == b.which || 46 == b.which || 47 ==
					b.which || 59 == b.which || 60 == b.which || 61 == b.which || 62 == b.which ||
					91 == b.which || 94 == b.which || 123 == b.which || 124 == b.which) &&
				"editor" == e.mode) {
				switch (b.which) {
					case 13:
						"" != c && e.insertText("_", 1, "left");
						break;
					case 32:
						null != n && "space" == n.type ? e.rightArrow() : e.insertText(String.fromCharCode(
							b.which));
						break;
					case 40:
						e.wrapText("(", ")");
						break;
					case 44:
					case 59:
						e.insertText("\u02cf");
						break;
					case 47:
						e.fraction();
						break;
					case 91:
						e.wrapText("[", "]");
						break;
					case 94:
						e.exponent();
						break;
					case 123:
						e.wrapText("set[", "]");
						break;
					case 124:
						e.wrapText("{|", "|}");
						break;
					default:
						e.insertText(String.fromCharCode(b.which))
				}
				b.preventDefault()
			}
		};
		a("#editorAptitude" + e.id).on("click", ".mi, .mo, .mn, .mtext", function(b) {
			a(e).focus();
			var g = a(this),
				h = a(this).text().replace(Q(), ""),
				h = h.replaceAll("\u00af", "");
			u = 0;
			var d = [];
			a("#editorAptitude" + e.id + " .mi, #editorAptitude" + e.id +
				" .mo, #editorAptitude" + e.id + " .mn, #editorAptitude" + e.id +
				" .mtext, #editorAptitude" + e.id + " .mlinebreak").each(function() {
				var b = new ca(a(this).attr("id") + "", a(this).attr("class") + "", a(
					this).text() + "");
				d.push(b)
			}); - 1 == c.search("table\\[") && d.sort(function(b, a) {
				var c = new Number(b.id.replace("MathJax-Span-", "")),
					d = new Number(a.id.replace("MathJax-Span-", ""));
				return c - d
			});
			var k = null;
			a.each(d, function(b, c) {
				if ("\u222b" == c.text) {
					k = b;
					var e = a("#" + c.id).parent().nextAll();
					if (2 == e.length) {
						var f = a(e[0]).find(".mi, .mo, .mn, .mtext"),
							e = a(e[1]).find(".mi, .mo, .mn, .mtext"),
							h = d.slice(k + f.length + 1, k + f.length + e.length + 1);
						d.splice(k + 1 + f.length, e.length);
						a.each(h, function(b, a) {
							d.splice(k + 1 + b, 0, a)
						})
					}
				}
			});
			var p = null,
				r = null,
				l = null,
				n = null,
				q = null,
				s = null;
			a("#editorAptitude" + e.id).find(
				".mroot, .mroot .mi, .mroot .mo, .mroot .mn, .mroot .mtext").each(
				function() {
					a(this).hasClass("mroot") && (null != p && (r = l, a.each(d, function(
						b, a) {
						null == n && Number(a.id.replace("MathJax-Span-", "")) > Number(
								p.replace("MathJax-Span-", "")) ? n = b : Number(a.id.replace(
								"MathJax-Span-", "")) == Number(r.replace("MathJax-Span-", "")) &&
							(q = b, s = d[q], d.splice(q, 1), d.splice(n, 0, s), q = n =
								null)
					})), p = a(this).attr("id"), r = null);
					l = a(this).attr("id")
				});
			null != p && (r = l, a.each(d, function(b, a) {
				null == n && Number(a.id.replace("MathJax-Span-", "")) > Number(p.replace(
						"MathJax-Span-", "")) ? n = b : Number(a.id.replace(
						"MathJax-Span-", "")) == Number(r.replace("MathJax-Span-", "")) &&
					(q = b, s = d[q], d.splice(q, 1), d.splice(n, 0, s), q = n = null)
			}));
			var w = "";
			a.each(d, function(b, c) {
				if (c.id == a(g).attr("id")) return !1;
				var d = c.text;
				if ("10" != d || "\u00d7" != w)
					if ("m" != d || "," != w)
						if ("=" != d || "m" != w)
							if (d = c.text.replace(Q(), ""), d = d.replaceAll("\u00af", ""),
								"mlinebreak" == c.classname) u++;
							else {
								if ("mtext" != c.classname || "italic" == a("#" + c.id).css(
									"font-style")) d = d.replace(RegExp("\\s", "g"), "");
								u += d.length
							}
				w = c.text
			});
			var t = b.pageX - a(g).offset().left,
				y = 0;
			a(G).css("font-family", a(g).css("font-family"));
			a(G).css("font-size", a(g).css("font-size"));
			a(G).css("font-style", a(g).css("font-style"));
			for (var $ = 0; $ < h.length; $++)
				if (a(G).text(h.substr($, 1)), t > y) m = "?" != h && "" != h && t > y +
					a(G).width() / 2 ? "right" : "left", y += a(G).width(), u++;
				else break;
			u--;
			u = Math.max(u, 0);
			L();
			F();
			b.stopPropagation();
			a(document).trigger("click");
			e.testmode && logAction({
				action: "positionCursor",
				modifiers: {
					inputpos: f,
					formatpos: u,
					cursoralign: m
				}
			})
		});
		e.positionCursor = function(b, a, c) {
			f = b;
			u = a;
			m = c;
			F()
		};
		e.erase = function(b) {
			e.testmode && (null != b ? b : 1) && logAction({
				action: "erase"
			});
			c = "";
			f = -1;
			A = "";
			u = -1;
			m = "right";
			"canvas" == e.mode && aa();
			v()
		};
		e.undo = function(b) {
			e.testmode && (null != b ? b : 1) && logAction({
				action: "undo"
			});
			I--;
			I = Math.max(I, -1); - 1 < I ? (b = M[I], c = b.inputtext, f = b.inputpos,
				m = b.cursoralign) : (A = c = "", u = f = -1, m = "right");
			v(!1)
		};
		e.redo = function(b) {
			e.testmode && (null != b ? b : 1) && logAction({
				action: "redo"
			});
			I < M.length - 1 && (I++, b = M[I], c = b.inputtext, f = b.inputpos, m =
				b.cursoralign, v(!1))
		};
		e.replaceText = function(b, a, h) {
			e.testmode && (null != h ? h : 1) && logAction({
				action: "replaceText",
				modifiers: {
					text: b,
					offset: a
				}
			});
			m = "right";
			c = b;
			f = c.length - 1;
			null != a && (f += a);
			v()
		};
		e.insertText = function(b, a, h, d) {
			e.testmode && (null != d ? d : 1) && logAction({
				action: "insertText",
				modifiers: {
					text: b,
					offset: a,
					cursoralign: h
				}
			});
			"canvas" == e.mode && (c = "", f = -1, A = "", u = -1, m = "right");
			if ("" != c && -1 < f) {
				if (b.isNumeric() && ("Chemistry" != subject && "[" != c.substr(f - 1, 1)) &&
					(d = c.substr(f, 1), "Statistics" != subject || "P" != d && "C" != d)) {
					if ("right" == m && "char" == k.type) {
						O("^");
						e.insertText(b, 2, null, !1);
						return
					}
					if ("left" == m && null != l && "char" == l.type && l.endpos == f - 1 &&
						":" != c.substr(f - 1, 1)) {
						O("^");
						e.insertText(b, 2, null, !1);
						return
					}
					if ("left" == m && (null != l && "container" == l.type) && (d = l.text(),
						d.startsWith("(") && d.endsWith(")") || d.startsWith("{|") && d.endsWith(
							"|}"))) {
						O("^");
						e.insertText(b, 2, null, !1);
						return
					}
				}
				if (-1 != "=><\u2265\u2264\u222a\u2229".split("").indexOf(b) && (null !=
					k && null != k.parent()) && (d = k.parent(), "container" == d.type &&
					-1 == d.text().search(RegExp("piecewise|\u2211")))) {
					if (null != d.parent()) {
						var g = d.parent();
						f = "compound" == g.type ? g.endpos + 1 : d.endpos + 1
					} else f = d.endpos + 1;
					F()
				}
			}
			d = 0;
			"editor" == e.mode && ("right" != m && "\u00af" != c.substr(f, 1)) && (d =
				1);
			f += b.length - d;
			c = "editor" == e.mode && "?" == c.substr(f, 1) ? c.substr(0, f) + b + c.substr(
				f + 1) : c.substring(0, f) + b + c.substring(f);
			null != a && (f += a);
			m = null != h ? h : "right";
			v()
		};
		e.wrapText = function(b, a, h, d) {
			e.testmode && (null != d ? d : 1) && logAction({
				action: "wrapText",
				modifiers: {
					starttext: b,
					endtext: a,
					offset: h
				}
			});
			"canvas" == e.mode && (c = "", f = -1, A = "", u = -1, m = "right");
			d = f;
			"editor" == e.mode && "right" != m && d--;
			c = "editor" == e.mode && "?" == c.substr(f, 1) ? c.substr(0, d + 1) + b +
				a + c.substr(d + 2) : c.substring(0, d + 1) + b + a + c.substring(d + 1);
			f = d + b.length;
			null != h && (f += h);
			m = "right";
			v()
		};
		e.backspace = function(b) {
			e.testmode && (null != b ? b : 1) && logAction({
				action: "backspace"
			});
			if ("" != c && -1 < f)
				if ("right" == m) c = c.substr(0, f) + c.substr(f + 1), 0 == f && (m =
					"left"), f == k.endpos ? f-- : f == k.startpos && f < c.length - 1 ? (
					m = "left", a.each(Z, function(b, a) {
						var e = !0,
							f = c,
							g = 0;
						do {
							var m = f.search(RegExp(a)); - 1 < m ? (c = c.substr(0, g + m + 1) +
								"?" + c.substr(g + m + 1), g += m + 2, f = c.substr(g)) : e = !1
						} while (e)
					})) : ("_" != c.substr(f - 1, 1) && f--, f = Math.max(f, -1)), v();
				else if (0 < f) {
				if (k.startpos == f) {
					if (null != l)
						if ("_" == c.substr(f - 1, 1) && "\u00af" == c.substr(f, 1)) c = c.substr(
							0, f - 1) + c.substr(f), f -= 2, m = "right";
						else {
							if ("compound" == l.type) {
								e.leftArrow(!1);
								return
							}
							if ("container" == l.type && (null == k.parent() || !k.parent().text()
								.startsWith("[")) && (null == n || "/" != n.text() && "^" != n.text()))
								if (b = l.prevsibling(), null == b || "/" != b.text() && "^" != b.text()) {
									if (l.backspace) {
										e.leftArrow(!1);
										return
									}
									b = k.parent();
									if (null == b || null != b && b.backspace) c = c.substr(0, l.startpos) +
										c.substr(f), m = "right", f -= l.endpos - l.startpos + 2
								} else c = c.substr(0, b.prevsibling().startpos) + c.substr(f), m =
									"right", f -= l.endpos - b.prevsibling().startpos + 2;
							else if ("/" == l.text() || "^" == l.text()) {
								b = l.prevsibling();
								var g = l.nextsibling();
								if ("?" == c.substr(f, 1) || "\u00af" == c.substr(f, 1)) m = "right";
								c = c.substr(0, b.startpos) + c.substr(b.startpos + 1, b.endpos - 1 -
									(b.startpos + 1) + 1) + c.substr(g.startpos + 1, g.endpos - 1 - (g
									.startpos + 1) + 1) + c.substr(g.endpos + 1);
								f -= 4
							} else if (0 != c.substr(f - 1, 1).search(RegExp("[" + J.join("") +
								"]")))
								if (k.parent() == l.parent()) b = k.parent(), null != b && b.text().contains(
									"^\u00ab") || (c = c.substr(0, f - 1) + c.substr(f), f--);
								else if (null == l || "log" != l.text() || "[" != c.substr(f - 1, 1))
								b = k.parent(), null != b && b.backspace && (c = c.substr(0, b.startpos) +
									c.substr(b.endpos + 1), f -= k.startpos - b.startpos + 1, m =
									"right")
						}
				} else c = c.substr(0, f - 1) + c.substr(f), f--;
				f = Math.max(f, -1);
				v()
			}
		};
		e.deleteText = function(b) {
			e.testmode && (null != b ? b : 1) && logAction({
				action: "deleteText"
			});
			if ("" != c && f <= c.length - 1 && "?" != c.substr(f, 1)) {
				if ("right" == m || "\u00af" == c.substr(f, 1))
					if (k.endpos == f) {
						if (null != n) {
							if ("compound" == n.type) {
								e.rightArrow(!1);
								return
							}
							if ("container" == n.type) {
								b = n.nextsibling();
								if (n.backspace) {
									e.rightArrow(!1);
									return
								}
								c = null == b || "/" != b.text() && "^" != b.text() ? c.substr(0, f +
									1) + c.substr(n.endpos + 1) : c.substr(0, f + 1) + c.substr(b.nextsibling()
									.endpos + 1)
							} else if ("/" == n.text() || "^" == n.text()) {
								b = n.prevsibling();
								var g = n.nextsibling();
								if ("?" == c.substr(f, 1) || "\u00af" == c.substr(f, 1)) m = "right";
								c = c.substr(0, b.startpos) + c.substr(b.startpos + 1, b.endpos - 1 -
									(b.startpos + 1) + 1) + c.substr(g.startpos + 1, g.endpos - 1 - (g
									.startpos + 1) + 1) + c.substr(g.endpos + 1);
								f -= 1
							} else 0 != c.substr(f + 1, 1).search(RegExp("[" + J.join("") + P.join(
								"") + "]")) && (c = c.substr(0, f + 1) + c.substr(f + 2))
						}
					} else c = c.substr(0, f + 1) + c.substr(f + 2);
				else c = c.substr(0, f) + c.substr(f + 1), f > k.startpos && f == k.endpos ?
					(f--, 0 < f && (m = "right")) : a.each(Z, function(b, a) {
						var e = !0,
							f = c,
							g = 0;
						do {
							var m = f.search(RegExp(a)); - 1 < m ? (c = c.substr(0, g + m + 1) +
								"?" + c.substr(g + m + 1), g += m + 2, f = c.substr(g)) : e = !1
						} while (e)
					});
				f > c.length - 1 && (m = "right", f--, f = Math.max(f, -1));
				v()
			} else "?" == c.substr(f, 1) && (null == l || "/" != l.text() && "^" != l
				.text() ? null == n || "/" != n.text() && "^" != n.text() ? (b = k.parent(),
					null != b && b.backspace && (c = c.substr(0, b.startpos) + c.substr(b.endpos +
						1), f -= k.startpos - b.startpos, m = "right", v())) : (b = n.prevsibling(),
					g = n.nextsibling(), c = c.substr(0, b.startpos) + c.substr(b.startpos +
						1, b.endpos - 1 - (b.startpos + 1) + 1) + c.substr(g.startpos + 1, g.endpos -
						1 - (g.startpos + 1) + 1) + c.substr(g.endpos + 1), v()) : (b = l.prevsibling(),
					g = l.nextsibling(), m = "right", c = c.substr(0, b.startpos) + c.substr(
						b.startpos + 1, b.endpos - 1 - (b.startpos + 1) + 1) + c.substr(g.startpos +
						1, g.endpos - 1 - (g.startpos + 1) + 1) + c.substr(g.endpos + 1), f -=
					4, v()))
		};
		e.leftArrow = function(a) {
			e.testmode && (null != a ? a : 1) && logAction({
				action: "leftArrow"
			});
			if ("" != c && -1 < u) {
				if ("left" == m) {
					if (a = f, u--, u = Math.max(u, 0), L(), k.startpos == a && null != l)
						if ("operator" == k.type && "char" != l.type && "numeric" != l.type) m =
							"right";
						else if ("container" == l.type || "compound" == l.type || "operator" ==
						l.type && 0 == c.substr(l.startpos, 1).search(/[\/\^]/)) m = "right";
					else {
						var g = k.parent(),
							h = l.parent();
						null != g && null == h || null == g && null != h ? m = "right" : null !=
							g && null != h && g.index != h.index ? m = "right" : 0 == c.substr(a -
								1, 1).search(RegExp("[" + J.join("") + "]")) && (m = "right")
					}
				} else m = "left";
				F()
			}
		};
		e.rightArrow = function(a) {
			e.testmode && (null != a ? a : 1) && logAction({
				action: "rightArrow"
			});
			if ("" != c && u <= A.length) {
				if ("?" == A.substr(u, 1) || "\u00af" == A.substr(u, 1) || "right" == m) {
					if (a = f, u++, u = Math.min(u, A.length - 1), L(), k.endpos == a &&
						null != n)
						if ("operator" == k.type && "char" != n.type && "numeric" != n.type) m =
							"left";
						else if ("container" == n.type || "compound" == n.type || "operator" ==
						n.type && 0 == c.substr(n.startpos, 1).search(/[\/\^]/)) m = "left";
					else {
						var g = k.parent(),
							h = n.parent();
						null != g && null == h || null == g && null != h ? m = "left" : null !=
							g && null != h && g.index != h.index ? m = "left" : 0 == c.substr(a +
								1, 1).search(RegExp("[" + J.join("") + "]")) && (m = "left")
					}
				} else m = "right";
				F()
			}
		};
		e.upArrow = function(a) {
			e.testmode && (null != a ? a : 1) && logAction({
				action: "upArrow"
			});
			if ("right" == m && null != n && "^" == n.text()) e.rightArrow(!1);
			else if (null != k) {
				a = k.parent();
				for (var c; null != a && null == c;) {
					var g = a.prevsibling();
					null != g && "/" == g.text() ? c = g.prevsibling() : a = a.parent()
				}
				null != c && (f = c.startpos + 1, m = "left", Y(), F())
			}
		};
		e.downArrow = function(a) {
			e.testmode && (null != a ? a : 1) && logAction({
				action: "downArrow"
			});
			if (null != l && "^" == l.text()) m = "right", e.rightArrow(!1);
			else if (null != k) {
				a = k.parent();
				for (var c; null != a && null == c;) {
					var g = a.nextsibling();
					null != g && "/" == g.text() ? c = g.nextsibling() : a = a.parent()
				}
				null != c && (f = c.startpos + 1, m = "left", Y(), F())
			}
		};
		e.fraction = function(a) {
			e.testmode && (null != a ? a : 1) && logAction({
				action: "fraction"
			});
			"canvas" == e.mode && (c = "", f = -1, A = "", u = -1, m = "right");
			O("/")
		};
		e.exponent = function(a) {
			e.testmode && (null != a ? a : 1) && logAction({
				action: "exponent"
			});
			"canvas" == e.mode && (c = "", f = -1, A = "", u = -1, m = "right");
			O("^")
		};
		e.subscript = function(a) {
			e.testmode && (null != a ? a : 1) && logAction({
				action: "subscript"
			});
			"canvas" == e.mode && (c = "", f = -1, A = "", u = -1, m = "right");
			null != l && "char" == l.type && "left" == m ? (c = c.substring(0, l.startpos) +
				"\u00ab\u00ab" + l.text() + "\u00bb[]\u00bb" + c.substr(l.endpos + 1),
				f += 3, v()) : null != k && "char" == k.type && "right" == m ? (c = c.substring(
				0, k.startpos) + "\u00ab\u00ab" + k.text() + "\u00bb[]\u00bb" + c.substr(
				k.endpos + 1), f += 4, v()) : e.wrapText("\u00ab\u00ab",
				"\u00bb[]\u00bb", null, !1)
		};
		e.parentheses = function(a) {
			e.wrapText("(", ")");
		};
		e.brackets = function(a) {
			e.wrapText("[", "]");
		}
		e.absoluteBraces = function(a) {
			e.wrapText("{|", "|}");
		}
		e.mixedNumber = function(a) {
			e.insertText("\u00AB\u00BB{}/{}", -6);
		}
		e.squareRoot = function(a) {
			e.wrapText("{√\u00AB{", "}\u00BB}");
		}
		e.nthRoot = function(a) {
			e.wrapText("{√\u00AB", "\u00BB:\u00AB{}\u00BB}");
		}
		e.addPoint = function(a) {
			e.wrapText("(", "ˏ)");
		}
		e.base10Log = function(a) {
			e.wrapText("log(", ")");
		}
		e.naturalLog = function(a) {
			e.wrapText("ln(", ")");
		}
		return e
	}
})(jQuery);
/*=+ default.js +=*/
var answerbutton = null;
$(document).ready(function() {
	editor = $("#editor").editorAptitude({
		showconsole: !1,
		emptytext: "",
		defaultbg: "#FFFFFF",
		emptybg: "E9E9E9",
		activebg: "#E9E9E9",
		hoverbg: "#E9E9E9"
	});
		
	var a = subject;
	subject = "";
	scrollToTab();
});

function answer() {
	var d;
	"Geometry" != subject ? (d = editor.latex) : (getGivenItems(), getProveItems(),
		d = JSON.stringify(shapes) + "||" + whiteboard.fetchIntersectionData() +
		"||" + JSON.stringify(givenitems) + "||" + JSON.stringify(proveitems));
	a = JSON.stringify({
		latextext: d,
	});
	//console.log(d);
	return d;
}


/*=+ default.master.js +=*/
var subjectbar = null,
	tabcount, isproblem;
$(document).ready(function() {
	var a = location.href;
	isproblem = !1;
	calculateSolved()
});

function scrollToTab() {
	isproblem && 1590 > $(window).width()
}

function setUser(a) {
	user = a;
	"function" == typeof showOpenButton && showOpenButton()
}

function calculateSolved() {
	var a = $("#total"),
		b = $(a).html();
	"" == b && (b = 0);
	b = (b + "").replace(/,/g, "");
	b = Number(b);
	isNaN(b) || (b += Math.floor(34 * Math.random()), $(a).html("" + addCommas(b)),
		setTimeout(calculateSolved, 1E3))
}

function addCommas(a) {
	x = (a + "").split(".");
	x1 = x[0];
	x2 = 1 < x.length ? "." + x[1] : "";
	for (a = /(\d+)(\d{3})/; a.test(x1);) x1 = x1.replace(a, "$1,$2");
	return x1 + x2
};
