var c = (function(t) {
	this.wrapper = t, this.divs = this.wrapper.find(".star-item"), this.arr = [], this.arr1 = [], this.arr2 = [], this.len = this.divs.length, this.pos = []
});
c.prototype.init = function() {
	this.initPosition(), this.bindEvent();
	for (var t = 0; 3 > t; t++) for (var a = 0; 3 > a; a++) this.arr.push([t, a])
};
c.prototype.initPosition = function() {
	for (var t = [
		[0, 0],
		[0, 2],
		[1, 2],
		[2, 0],
		[2, 1],
		[2, 2]
	], a = this, i = 0; i < this.len; i++) {
		var e = this.divs.eq(i);
		this.pos.push([e.position().left, e.position().top])
	}
	this.divs.each(function(i, e) {
		jQuery(e).css({
			left: a.pos[i][0],
			top: a.pos[i][1],
			position: "absolute"
		}).data({
			row: t[i][0],
			col: t[i][1]
		})
	}), this.pos = null
};
c.prototype.bindEvent = function() {
	var t = this,
		a = null;
	this.wrapper.on("mouseenter", ".star-item", function() {
		clearTimeout(a);
		var i = jQuery(this);
		a = setTimeout(function() {
			if (i.find("em").removeClass("no-transition"), i.addClass("focus"), !(i.hasClass("active") || t.wrapper.find(".star-item:animated").length > 0)) {
				var a = i.data("row"),
					e = i.data("col");
				t.getPos(a, e), i.stop().animate({
					left: t.arr1[1] * starData.m,
					top: t.arr1[0] * starData.m,
					width: starData.W,
					height: starData.W
				}, function() {
					i.data({
						col: t.arr1[1],
						row: t.arr1[0]
					}).addClass("active")
				});
				var s = i;
				t.wrapper.find(".star-item").not(s).each(function(a) {
					jQuery(this).stop().animate({
						width: starData.w,
						height: starData.w,
						top: t.arr2[a][0] * starData.m,
						left: t.arr2[a][1] * starData.m
					}).data({
						col: t.arr2[a][1],
						row: t.arr2[a][0]
					}).removeClass("active")
				})
			}
		}, 200)
	}).on("mouseleave", ".star-item", function() {
		clearTimeout(a), jQuery(this).find("em").addClass("no-transition"), jQuery(this).removeClass("focus")
	})
};
c.prototype.getPos = function(t, a) {
	var i = !1;
	this.arr2 = [], len = 0;
	for (var e = 0; e < this.arr.length; e++) 1 == a ? Math.abs(this.arr[e][0] - t) <= 1 && this.arr[e][1] - a <= 0 && 4 > len ? (i || (this.arr1 = [this.arr[e][0], this.arr[e][1]], i = !0), len++) : this.arr2.push(this.arr[e]) : Math.abs(this.arr[e][0] - t) <= 1 && Math.abs(this.arr[e][1] - a) <= 1 && 4 > len ? (i || (this.arr1 = [this.arr[e][0], this.arr[e][1]], i = !0), len++) : this.arr2.push(this.arr[e])
};
jQuery(function() {
	function t() {
		window.starData = jQuery("body").hasClass("w1000") ? {
			W: 232,
			w: 112,
			m: 120
		} : {
			W: 258,
			w: 125,
			m: 133
		}
	}
	function e() {
		var t = jQuery(".star-wrap"),
			a = t.outerWidth(!0),
			i = t.length;
		jQuery(".star-content").css("width", a * i)
	}
	window.starData = null;
	t(), e();
	jQuery(".star-list").each(function(t, a) {
		var i = jQuery(a),
			e = new c(i);
		e.init()
	});
	var s = jQuery("body").attr("class");
	jQuery(window).on("resize", function() {
		var i = jQuery("body").attr("class");
		if (i != s) {
			t();
			e();
			jQuery(".star-item").each(function(t, a) {
				var i = jQuery(a);
				jQuery(this).css(i.hasClass("active") ? {
					width: starData.W,
					height: starData.W,
					left: jQuery(this).data("col") * starData.m,
					top: jQuery(this).data("row") * starData.m
				} : {
					width: starData.w,
					height: starData.w,
					left: jQuery(this).data("col") * starData.m,
					top: jQuery(this).data("row") * starData.m
				})
			});
			var n = jQuery(".star-wrap").outerWidth(!0),
				r = jQuery(".star-content").data("scroll");
			jQuery(".star-content").css("left", -r * n), s = i
		}
	})
})