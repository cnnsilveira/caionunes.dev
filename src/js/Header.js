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

			// Loader spinner
			
			$(window).on('load', () => {
				setTimeout(() => {
					$('.cndev_loader').toggleClass('loading complete');

					setTimeout(() => {
						$('.cndev_loader').slideUp(500);
						setTimeout(() => {
							$('.cndev_loader').remove();
						}, 600);
					}, 1500);
				}, 750);
			});
			

			// Scroll event.
            if ( $(window).scrollTop() > 0 && ! $('body').hasClass('scrolled') ) {
                $('body').addClass('scrolled');
            }
            $(window).scroll( function() {
                if ( $(this).scrollTop() > $(window).height() / 2) {
                    $('body').addClass('scrolled');
                } else {
                    $('body').removeClass('scrolled');
                }
            });

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
			
		});
    }
}

export default Header;