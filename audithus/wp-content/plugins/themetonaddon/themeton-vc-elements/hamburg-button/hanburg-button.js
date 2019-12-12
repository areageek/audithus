

(function($){
    'use strict';

    $(document).ready(function(){

    	$('#menu-toggle').click(function(){
		  $(this).toggleClass('open');
		})
		      
			// mobile menu
		$('#mobile-menu').on('click', function(){
			if( $(window).width()<992 ){
				$('nav.main-nav').addClass('show-mobile-menu');
			}
		});
		$('#close-menu').on('click', function(){
			$('nav.main-nav.show-mobile-menu').removeClass('show-mobile-menu');
			return false;
		});
		$('ul.one-page-menu a').on('click', function(){
			var $this = $(this);
			var href = $this.attr('href') + '';
			href = href.replace('#', '');

			var $row_c = $('div[data-onepage-slug="'+href+'"]');
			if( $row_c.length ){
				var otop = $row_c.offset().top;
				otop = otop - $('header').height();
				if(otop<0){ otop = 0; }
				$("html, body").animate({ scrollTop: otop }, "slow");
			}
			return false;
		});
		// Preparing Menu
		var preparing_menu = function(){
			var $gmc = $('.grid-menu-container');
			$gmc.find('.grid-menu').html("");

			// building menus
			$('.burger-menu nav.main-nav > ul > li').each(function(){
				var _level1 = $(this);
				var _a = _level1.find('> a').clone();
				var _menu = $('<div class="grid-menu-item"><span></span></div>');

				_menu.find('span').append(_a);
				if( _level1.find('>ul').length ){
					_menu.addClass('has-children');
				}

				$gmc.find('.grid-menu').append( _menu );
				setTimeout(function(){
					pm_showing();
				}, 100);
			});

			// setting menu items count
			$gmc.find('.grid-menu').attr('data-grid', $gmc.find('.grid-menu .grid-menu-item').length);

			// menu item click handler
			$gmc.find('.grid-menu').find('.grid-menu-item a').off('click').on('click', function(){
				var _link = $(this);

				// has child menu
				if( _link.parents('.grid-menu-item').hasClass('has-children') ){

					pm_closing();

					var _index = $gmc.find('.grid-menu').find('.grid-menu-item').index( _link.parents('.grid-menu-item') );
					setTimeout(function(){
						$gmc.find('.grid-menu').html("");

						// add back menu
						var _mback = $('<div class="grid-menu-item menu-back"><span></span></div>');
						_mback.find('span').append( $('<a href="javascript:;"></a>').html('...') );
						$gmc.find('.grid-menu').append( _mback );

						// add sub menu items
						$('.burger-menu nav.main-nav > ul > li').eq(_index).find('> ul > li').each(function(){
							var _level1 = $(this);
							var _a = _level1.find('> a').clone();
							var _menu = $('<div class="grid-menu-item"><span></span></div>');

							_menu.find('span').append(_a);
							if( _level1.find('>ul').length ){
								_menu.addClass('has-children');
							}

							$gmc.find('.grid-menu').append( _menu );
						});

						// setting menu items count
						setTimeout(function(){
							$gmc.find('.grid-menu').attr('data-grid', $gmc.find('.grid-menu .grid-menu-item').length);
							pm_showing();
						}, 100);

						// back menu button handler
						$gmc.find('.grid-menu').find('.grid-menu-item a').on('click', function(){
							var _sm = $(this);
							if( _sm.parents('.grid-menu-item').hasClass('menu-back') ){
								pm_closing();
								setTimeout(function(){
									preparing_menu();
								}, $gmc.find('.grid-menu').find('.grid-menu-item').length*100+200);
								return false;
							}
							else{
								pm_closing();
								setTimeout(function(){
									$('#menu-handler').trigger('click');
									window.location.href = _sm.attr('href');
								}, $gmc.find('.grid-menu').find('.grid-menu-item').length*100+200);
								return false;
							}
						});

					},800);

					return false;
				}
				else{
					pm_closing();
					setTimeout(function(){
						$('#menu-handler').trigger('click');
						window.location.href = _link.attr('href');
					}, $gmc.find('.grid-menu').find('.grid-menu-item').length*100+200);


					// <<< one page menu
					if( $('ul.one-page-menu').length ){
						var href = _link.attr('href') + '';
						href = href.replace('#', '');

						var $row_c = $('div[data-onepage-slug="'+href+'"]');
						if( $row_c.length ){
							var otop = $row_c.offset().top;
							otop = otop - $('header').height();
							if(otop<0){ otop = 0; }
							$("html, body").animate({ scrollTop: otop }, "slow");
						}
					}
					// one page menu >>>
					

					return false;
				}
			});
			
		};


		var pm_showing = function(){
			var $gmc = $('.grid-menu-container');
			var _duration = 0;
			$gmc.find('.grid-menu').find('.grid-menu-item').each(function(index){
				_duration = (index+1)/10+0.1;
				$(this).css({
					'-webkit-transition-delay': _duration+'s',
					'-moz-transition-delay': _duration+'s',
					'transition-delay': _duration+'s'
				});
				$(this).addClass('showing-item');
			});

			setTimeout(function(){
				$gmc.find('.grid-menu').find('.grid-menu-item').each(function(index){
					$(this).css({
						'-webkit-transition-delay': '0s',
						'-moz-transition-delay': '0s',
						'transition-delay': '0s'
					});
				});
			}, _duration*1000);
		};

		var pm_closing = function(){
			var $gmc = $('.grid-menu-container');
			var _i = $gmc.find('.grid-menu').find('.grid-menu-item').length-1;
			var _ani = 1;
			for( var _j=_i; _j>=0; _j-- ){
				$gmc.find('.grid-menu').find('.grid-menu-item').eq(_j).css({
					'-webkit-transition-delay': _ani/10+'s',
					'-moz-transition-delay': _ani/10+'s',
					'transition-delay': _ani/10+'s'
				});
				$gmc.find('.grid-menu').find('.grid-menu-item').eq(_j).addClass('hiding-item');
				_ani++;
			}
		};


		$('#menu-handler').on('click', function(){
			$('body').toggleClass('opened-menu');

			if( $('body').hasClass('opened-menu') ){
				preparing_menu();
			}
		});

    
    });
}(jQuery));