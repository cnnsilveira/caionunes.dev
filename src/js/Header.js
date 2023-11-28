class Header {

    constructor() {
        this.events();
    }

    events() {
        jQuery( function( $ ) {
			/**
			 * onClassChange extension.
			 * @source https://stackoverflow.com/questions/19401633/how-to-fire-an-event-on-class-change-using-jquery
			 */
			$.fn.onClassChange = function(cb) {
				return $(this).each((_, el) => {
					new MutationObserver(mutations => {
						mutations.forEach(mutation => cb && cb(mutation.target, mutation.target.className));
					}).observe(el, {
						attributes: true,
						attributeFilter: ['class'] // only listen for class attribute changes 
					});
				});
			}

			/**
			 * -------------------------------------------
			 * Constants
			 * -------------------------------------------
			 */
			const contentSections = $('.cndev_main .cndev_section');
			const headerInner = $('.cndev_header--inner');

			/**
			 * -------------------------------------------
			 * Functions
			 * -------------------------------------------
			 */
			function cndev__toggleClasses(selector, add, remove) {
				$(selector).addClass(add);
				$(selector).removeClass(remove);
			}

			/**
			 * -------------------------------------------
			 * Content toggle based on body classes
			 * -------------------------------------------
			 */
			$('body').onClassChange((el, newClass) => {
				var bodyClasses = newClass.split(' ');
				var lastElement = bodyClasses[bodyClasses.length - 1];

				$(contentSections).each((index, selector) => {
					if ( $(selector).data('content') === lastElement ) {
						cndev__toggleClasses(selector, 'visible', 'hidden');
					} else if ( $(selector).data('content') === 'hero' && 'cndev' === lastElement ) {
						cndev__toggleClasses(selector, 'visible', 'hidden');
					} else {
						cndev__toggleClasses(selector, 'hidden', 'visible');
					}
				});

				let footerOpacity = 'projects' === lastElement ? '1' : '0';
				$('footer').css('opacity', footerOpacity);
			});
			$(contentSections).onClassChange((el, newClass) => {
				var bodyClasses = newClass.split(' ');
				var lastElement = bodyClasses[bodyClasses.length - 1];
				var parallaxTop = 0, lastScrollTop = 0, delta = 5, speed = 0.5;
				switch (lastElement) {
					case 'hidden':
						$(el).fadeOut(500);
						break;
					case 'visible':
						setTimeout(() => {
							$(el).fadeIn(500);
							setTimeout(() => {
								$(window).on('scroll', () => {
									var scrollTop = $(this).scrollTop();
									if (Math.abs(lastScrollTop - scrollTop) >= delta) {
										$(el).css({
											top: function() {
												if (scrollTop > lastScrollTop) {
													parallaxTop -= speed;
												} else {
													parallaxTop += speed;
												}
												return parallaxTop;
											}
										});
										lastScrollTop = scrollTop;
									}
								});
							}, 550);
						}, 650);
						break;
				}
			});

			/**
			 * -------------------------------------------
			 * Loader spinner
			 * -------------------------------------------
			 */
			$(window).on('load', () => {
				let contentSize = 0;
				var bodyClasses = $('body').attr('class').split(' ');
				var lastClass = bodyClasses[bodyClasses.length - 1];
				if ( 'cndev' === lastClass ) {
					lastClass = 'hero';
				}
				$(contentSections).each((index, selector) => {
					contentSize += $(selector).height();
					if ( $(selector).data('content') === lastClass ) {
						cndev__toggleClasses(selector, 'visible', 'hidden');
						$(selector).fadeIn(500);
					} else {
						cndev__toggleClasses(selector, 'hidden', 'visible');
						$(selector).fadeOut(500);
					}
				});
				$('.cndev_scrolling').css('height', contentSize + 'px');
				setTimeout(() => {
					$('.cndev_loader').toggleClass('loading complete');

					setTimeout(() => {
						$('.cndev_loader').fadeOut(500);
						setTimeout(() => {
							$('.cndev_loader').remove();
						}, 600);
					}, 1500);
				}, 750);
			});
			
			/**
			 * -------------------------------------------
			 * Loader spinner
			 * -------------------------------------------
			 */
            // if ( $(window).scrollTop() > 0 && ! $('body').hasClass('scrolled') ) {
            //     $('body').addClass('scrolled');
            // }
            // $(window).scroll( function() {
            //     if ( $(this).scrollTop() > 100 ) {
            //         $('body').addClass('scrolled');
            //     } else {
            //         $('body').removeClass('scrolled');
            //     }
            // });

			// Scroll to top.
			$('header .cndev_logo, .cndev_header--scroll').on('click', () => {
				$('html, body').animate({
					scrollTop: 0
				}, 0);
			});

			// Inner content.
			$("header").onClassChange((el, newClass) => {
				if ( $('header').hasClass('scrolled') ) {
					$('.cndev_header--inner').css({background: 'linear-gradient(360deg, #0807082a, #00000000)', backdropFilter: 'blur(20px)', width: '1000px'});
				} else {
					$('.cndev_header--inner').css({width: '135px'});
					setTimeout(() => {
						$('.cndev_header--inner').css({background: 'none', blur: '0px'});
					}, 250);
				}
			});

			// $(window).on('scroll', () => {
			// 	var scrollTop = $(this).scrollTop();
			// 	if ( scrollTop >= 0 && scrollTop < 1000 ) {
			// 		$(headerInner).width(scrollTop);
			// 	}
			// })
		});
    }
}

export default Header;