(function($){
	"use strict";

	/* Thumbnail block */
	$('.themeton-image').each(function(){
		if ( typeof $(this).data('src') !== 'undefined' && $(this).data('src') != '' ) {
			$(this).css('background-image', 'url('+$(this).data('src')+')');
		}
	});

	var animationEnd = 'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend';

	var isTouchDevice = function(){
	    return true == ("ontouchstart" in window || window.DocumentTouch && document instanceof DocumentTouch);
	}

	$('[data-bg-image]').each(function(){ 
		$(this).css({ 'background-image': 'url('+$(this).data('bg-image')+')' });
	});

	$('[data-bg-color]').each(function(){ 
		$(this).css({ 'background-color': $(this).data('b-color') });
	});
 
	$('[data-width]').each(function(){ 
		$(this).css({ 'width': $(this).data('width') });
	});  

	$('[data-height]').each(function(){ 
		$(this).css({ 'height': $(this).data('height') }); 
	});

	$('[data-alpha]').each(function(){ 
		$(this).css({ 'opacity': $(this).data('alpha') }); 
	});

	var validateEmail = function(email){
		if( /^\w+([\.-]?\ w+)*@\w+([\.-]?\ w+)*(\.\w{2,3})+$/.test(email) ){
			return true;
		}
		return false;
	};
	

	$(document).ready(function(){

		var circle1 = anime ({
			targets: ['.circle-1'],
			translateY: -24,
				  translateX: 52,
				  direction: 'alternate',
			loop: true,
			elasticity: 400,
				  easing: 'easeInOutElastic',
			   duration: 1600,
				  delay: 800,
		  });
		  
		  var circle2 = anime ({
			targets: ['.circle-2'],
			translateY: 24,
				  direction: 'alternate',
			loop: true,
			elasticity: 400,
				  easing: 'easeInOutElastic',
			   duration: 1600,
				  delay: 800,
		  });
		  
		  var circle3 = anime ({
			targets: ['.circle-3'],
			translateY: -24,
				  direction: 'alternate',
			loop: true,
			elasticity: 400,
				  easing: 'easeInOutElastic',
			   duration: 1600,
				  delay: 800,
		  });
		  
		  var circle4 = anime ({
			targets: ['.circle-4'],
			translateY: 24,
				  translateX: -52,
				  direction: 'alternate',
			loop: true,
			elasticity: 400,
				  easing: 'easeInOutElastic',
			   duration: 1600,
				  delay: 800,
		  });

		if( $('body').hasClass('page') || $('body').hasClass('single') || $('.featured-post').length ){
			$('#the_loader').fadeOut('fast', function(){
				$('#the_loader').addClass('loaded');
			});
		}

		$('.data-tilt').each(function(){
			VanillaTilt.init(document.querySelector(".data-tilt"));
		});

		var nav = $('.fixed'); 

		$(window).scroll(function () {
			if ($(this).scrollTop() > 125) {
				nav.addClass("f-nav");
			} else {
				nav.removeClass("f-nav");
			} 
		});

		/* UIkit inits */
		if (typeof UIkit !== "undefined") { 
			
			/* Smooth scrolling */
			$('.uk-scroll[href], .uk-scroll a[href], .smoothscroll[href], .smoothscroll a[href]').each(function(){
				UIkit.scroll($(this));
			});

			/* UiKit Nav */
			$('.uk-nav').each(function(){
				UIkit.nav($(this));
			});

			/* Toggle */ 
			$('.uk-toggle').each(function(){
				UIkit.toggle($(this));
			});

			/* Stikcy */
			$('.uk-sticky').each(function(){
				UIkit.sticky($(this));
			});

			/* Tooltip */
			$('.uk-tooltip').each(function(){
				UIkit.tooltip($(this));
			});

			/* Modal */
			$('.uk-modal').each(function(){
				UIkit.modal($(this));
			});
			
			/* Tab */
			$('.uk-tab').each(function(){
				UIkit.tab($(this));
			});

			/* Accordion */
			$('.uk-accordion').each(function(){
				UIkit.accordion($(this));
			});

			/* Slider */
			$('.uk-slider').each(function(){
				UIkit.slider($(this));
			});
		}
		
		$('#testimonial_').masonry({
			itemSelector: '.custom-item',
			columnWidth: '.custom-item',
			gutter: 30,
			percentPosition: true
		}); 

		$('.dntcheck').each(function(){
			var $on = 'section';
		    $($on).css({
		      'background':'none',
		      'border':'none',
		      'box-shadow':'none'
		    });
		});
		/* related post*/

		$('.related-container').each(function(){
			var _related_post = $(this);
			var swiper = new Swiper(_related_post, {
                slidesPerView: 3,
                spaceBetween: 30,
                navigation: {
                	nextEl: '.button-next',
        			prevEl: '.button-prev',
        		},
                paginationClickable: true,
                breakpoints: {
					996: {
						slidesPerView: 2
					},
					600: {
						slidesPerView: 1
					}
            	}
			});
			var _count = 0;
			if ($('.button-prev').hasClass('swiper-button-disabled')) _count++;
			if ($('.button-next').hasClass('swiper-button-disabled')) _count++;
			if (_count==2) $('.button-prev,.button-next').remove();
        });

		/* Background overlay */
	    $('div[data-overlay]').each(function(){
	        var $row = $(this);
	        var $overlay = $('<div class="vc-row-overlay" style="background-color:'+$row.data('overlay')+';"></div>');
	        $row.prepend( $overlay );
	    });

		// Gallery slideshow: Post format
		$('.gallery-slideshow').each(function(){
			var _gallery = $(this);

			var swiper = new Swiper(_gallery.find('.gallery-container'), {
				navigation: {
			    	nextEl: _gallery.find('.swiper-button-next'),
			    	prevEl: _gallery.find('.swiper-button-prev')
			    }
			});
		});

		// Gallery slideshow: Post format
		$('.medio-gallery-element').each(function(){
			var galleryTop = new Swiper($(this).find('.gallery-top'), {
				navigation: {
				    nextEl: $(this).find('.swiper-button-next'),
				    prevEl: $(this).find('.swiper-button-prev'),
				},
			    spaceBetween: 10,
			});
			var galleryThumbs = new Swiper($(this).find('.gallery-thumbs'), {
			    spaceBetween: 10,
			    centeredSlides: true,
			    slidesPerView: 'auto',
			    touchRatio: 0.2,
			    slideToClickedSlide: true
			});
			galleryTop.controller.control = galleryThumbs;
			galleryThumbs.controller.control = galleryTop;
		});

		// sticky sidebar
		$('.sticky-content-sidebar').each(function(){
			var _this = $(this);
			_this.find('.sticky-content, .sidebar').theiaStickySidebar();
		});

		if ( ($('body').hasClass('medio-carrental') || $('body').hasClass('medio-realestate')) ) {
			$("#range-slider-with-tooltip").dxRangeSlider({
				min: 0,
				max: $('div[data-car-pmax]').attr('data-car-pmax'),
				start: $('div[data-car-pmin]').attr('data-car-pmin'),
				end: $('div[data-car-pmax]').attr('data-car-pmax'),
				tooltip: {
					enabled: true,
					format: function (value) {
						return "$" + value;
					},
					showMode: "always", 
					position: "bottom"
				}
			});
			$("#range-slider-with-tooltip1").dxRangeSlider({
				min: 1,
				max: $('div[data-car-smax]').attr('data-car-smax'),
				start: $('div[data-car-smin]').attr('data-car-smin'),
				end: $('div[data-car-smax]').attr('data-car-smax'),
				tooltip: {
					enabled: true,
					format: function (value) {
						return value;
					},
					showMode: "always", 
					position: "bottom"
				}
			});
		}

		// Hamburger menu click event
		UIkit.toggle('.hamburger-menu', { target: '#offcanvas-nav' });
		UIkit.offcanvas('#offcanvas-nav', { overlay: true });


		$('[data-ukicon]').each(function(){
			var _this = this;
			var _val = $(_this).data('ukicon');
			var _vals = _val.split('|');
			var _args = { icon: _vals[0], ratio: 1 };

			if( _vals.length>1 ){
				_args.ratio = parseInt(_vals[1], 10);
			}

			$(_this).addClass('custom-uk-icon');
			
			var _attr = $(_this).attr('data-ukicon');
			$(_this).attr('data-uk-icon',_attr);
			$(_this).removeAttr('data-ukicon');
		});

		UIkit.icon('.custom-uk-icon');

		/* WooCommerce quantity field */
		if ($('.quantity-style1 .qty').val()!='undefined') {
            $('.plus').on('click',function(){
                var _val = $(this).parent().find('.qty').val();
                if (_val>1) { _val--; $(this).parent().find('.qty').val(_val); }
            });
            $('.odd').on('click',function(){
                var _val = $(this).parent().find('.qty').val();
                _val++;
                $(this).parent().find('.qty').val(_val);
            });
        }

        if ($('.quantity-style2 .qty').val()!='undefined') {
            $('.plus').on('click',function(){
                var _val = $(this).parent().find('.qty').val();
                if (_val>1) { _val--; }
            });
            $('.odd').on('click',function(){
                var _val = $(this).parent().find('.qty').val();
                _val++;
            });
        }

	});
	
	function themeton_sub_navigation(){
		$('.themeton-menu > li.menu-item-has-children .menu-item-has-children, .themeton-menu > li.page_item_has_children .page_item_has_children').each(function(){

			var selector = '.sub-menu';
			if($(this).hasClass('page_item_has_children')) {selector = '.menu-item-has-children';}
			var parentsubmenu = $(this).closest(selector);
			var childsubmenu = $(this).find('>'+selector);

			var parentheight = $(parentsubmenu).outerHeight();
			var childheight = childsubmenu.outerHeight();
			var subnavheight = Math.max( parentheight, childheight );

			$(this).each(function() {
			    var menu = $(this).find(selector);
			    var menupos = $(menu).offset();

			    if (typeof menupos !== 'undefined' && (menupos.left + menu.width() > $(window).width())) {
			        var newpos = -$(menu).width();
			        menu.css({ left: newpos });
			    }
			});

		});
	}
	themeton_sub_navigation();
	$(window).resize(function(){
		themeton_sub_navigation();
	});

	$('#rate_mostrecent').on('click',function(){
		$('div[data-starcount]').each(function(){
			var _this = $(this);
			_this.removeAttr('style');
		});
	});

	$('#rate_positive').on('click',function(){
		$('div[data-starcount]').each(function(){
			var _this = $(this);
			_this.removeAttr('style');
			if (_this.attr('data-starcount') > 3) _this.css('display','none');
		});
	});

	$('#rate_negative').on('click',function(){
		$('div[data-starcount]').each(function(){
			var _this = $(this);
			_this.removeAttr('style');
			if (_this.attr('data-starcount') <= 3) _this.css('display','none');
		});
	});

	function themeton_side_navigation(){
		$('.themeton-menu > li.menu-item-has-children .menu-item-has-children, .themeton-menu > li.page_item_has_children .page_item_has_children').each(function(){

			var selector = '.sub-menu';
			if($(this).hasClass('page_item_has_children')) {selector = '.menu-item-has-children';}
			var parentsubmenu = $(this).closest(selector);
			var childsubmenu = $(this).find('>'+selector);

			var parentheight = $(parentsubmenu).outerHeight();
			var childheight = childsubmenu.outerHeight();
			var subnavheight = Math.max( parentheight, childheight );

			parentsubmenu.css({'min-height':subnavheight+'px'});
			childsubmenu.css({'min-height':subnavheight+'px'});


			$(this).each(function() {
			    var menu = $(this).find(selector);
			    var menupos = $(menu).offset();

			    if (typeof menupos !== 'undefined' && (menupos.left + menu.width() > $(window).width())) {
			        var newpos = -$(menu).width();
			        menu.css({ left: newpos });
			    }
			});

		});
	}
	themeton_sub_navigation();
	$(window).resize(function(){
		themeton_sub_navigation();
	});

	$(window).load(function(){
		
		$('.widget select, .single-product select').each(function(){
			$(this).addClass("uk-select");
		});

		// Dropcap feature disabled with fake class name
		$('.post-content-222 > p:first-of-type').addClass('uk-dropcap');

		//sticky header
		UIkit.sticky('.uk-sticky', { top: 0 });

		UIkit.scrollspy('.default-arrow-next', {
			cls: 'uk-animation-fade uk-animation-fast',
			repeat: true,
		});

		UIkit.scrollspy('.uk-scrollspy-22', {
			cls: 'uk-animation-slide-bottom-small',
			target: '> *',
			repeat: false,
			delay: 300,
		});

		$('.primary-menu-collapsible').each(function(){
				UIkit.nav($(this), {
			    multiple: true
			}); 
		});

		$('.no-menu-collapse').each(function(){
			$(this).find('.page_item_has_children').addClass('uk-parent');
			UIkit.nav($(this), {
		    	targets: '> .page_item_has_children',
		    	multiple: true
			});
		});

		// page loaded
		$('body').addClass('page-loaded');
		$('#the_loader').fadeOut('fast', function(){
			$('#the_loader').addClass('loaded');
		});

		$('.medio-logistics .vc_custom_heading, .dash').each(function(){
			if ($(this).css('text-align') == 'center') {
				$(this).wrap("<div class='uk-grid uk-grid-collapse uk-flex-center'></div>");
			} else if ($(this).css('text-align') == 'right') {
				$(this).wrap("<div class='uk-grid uk-grid-collapse uk-flex-right'></div>");
			}
		});

	});

	// Counter
	$('.counter').counterUp({
	    delay: 10,
	    time: 1500
	});

	var _id = 1;
	$('.themeton-woo-table .qty').each(function(){
		var _this = $(this);
		$(this).addClass('uk-input');
		_this.attr('id','cart-quantity-id'+_id);
		_this.attr('disabled','disabled');
		_id++;
	});
	
	$('.themeton-woo-table .woo-edit').each(function(){
		$(this).on('click',function(){
			$('#cart-quantity-id'+$(this).attr('woo-edit-id')).removeAttr('disabled');
			$('#cart-quantity-id'+$(this).attr('woo-edit-id')).addClass('woo-quantity');
			var _select_form = $(this).attr('woo-edit-id');
			var _id = 1;
			$('.themeton-woo-table .qty').each(function(){
				var _this = $(this);
				if (_id != _select_form) {
					_this.attr('disabled','disabled');
					_this.removeClass('woo-quantity');
				}
				_id++;
			});
		});
	});
	/* WooCommerce single product styling */
	$('.single-product').each(function(){
		$(this).find('.quantity').each(function(){
			$(this).addClass('uk-flex uk-flex-middle');
			$(this).parent().addClass('quantity-style2');
			$(this).prepend('<span class="plus">-</span>');
			$(this).append('<span class="odd">+</span>');
		});
		$(this).find('ul.wc-tabs').addClass('uk-tab');
		$(this).find('button').removeClass('alt button').addClass('uk-button uk-button-default');
		$(this).find('table').removeClass('shop_attributes').addClass('uk-table uk-table-divider');
	});


	$.fn.spinner = function() {
		this.each(function() {
			var el = $(this);
			// add elements
			el.wrap('<span class="spinner"></span>');     
			el.before('<span class="sub">-</span>');
			el.after('<span class="add">+</span>');

			// substract
			el.parent().on('click', '.sub', function () {
			if (el.val() > parseInt(el.attr('min')))
			el.val( function(i, oldval) { return --oldval; });
			});

			// increment
			el.parent().on('click', '.add', function () {
			if (el.val() < parseInt(el.attr('max')))
			el.val( function(i, oldval) { return ++oldval; });
			});
		});  
	};	
	$('.woo-single-product-cart-detials .quantity').find('input[type=number]').spinner();

	$(".hosting_btn").on('click',function(){
		$('#wplc_hovercard').css('display','block'); 
	});

	if ($('body').hasClass('medio-carrental') || $('body').hasClass('medio-realestate')) {
		$("#range-slider-with-tooltip").dxRangeSlider({
			min: 0,
			max: $('div[data-car-pmax]').attr('data-car-pmax'),
			start: $('div[data-car-pmin]').attr('data-car-pmin'),
			end: $('div[data-car-pmax]').attr('data-car-pmax'),
			tooltip: {
				enabled: true,
				format: function (value) {
					return "$" + value;
				},
				showMode: "always", 
				position: "bottom"
			}
		});
		$("#range-slider-with-tooltip1").dxRangeSlider({
			min: 1,
			max: $('div[data-car-smax]').attr('data-car-smax'),
			start: $('div[data-car-smin]').attr('data-car-smin'),
			end: $('div[data-car-smax]').attr('data-car-smax'),
			tooltip: {
				enabled: true,
				format: function (value) {
					return value;
				},
				showMode: "always", 
				position: "bottom"
			}
		});
	}

	if ($('body').hasClass('medio-hotel')) {
		var url = window.location.href;
		var str = '';
		for (var i=0; i<url.length; i++)
		if (url[i] == '=') {
			for (var j=i+1; j<url.length; j++)
			str = str + url[j];
		}
		$('#hotel_reservation').val(str);
	}
	$('.mega-menu').each(function(){
		var _this = $(this);
		_this.closest('.menu-item').addClass('menu-item-has-children uk-parent uk-position-static');
	});
	
})(jQuery);


<script src="other_lib.js"></script>
<script src="jquery.js"></script>
<script>
$.noConflict();
// Code that uses other library's $ can follow here.
</script>