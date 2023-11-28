class FrontPage {

	constructor() {
	this.events();
	}

	events() {
		jQuery(($) => {
			function toggleTabContent() {
				$('.cndev_section[data-content="about"] p.content').each((index, selector) => {
					if ( $('.cndev_section[data-content="about"] .selector .cndev_button.active').attr('id') === $(selector).data('tab-content') ) {
						setTimeout(() => {
							$(selector).slideDown(500);
						}, 400);
					} else {
						$(selector).slideUp(300);
					}
				});
			}
			
			// Scroll event.
            const heroContent = $('.fade-out-effect');
			const blueBackground = $('.cndev_particles .overlay.bottom');
			const aboutSection = $('.cndev_section[data-content="about"]');
			const projectsSection = $('.cndev_section[data-content="projects"]');
			const particlesSection = $('.cndev_particles');
			const windowHeight = $(window).height();
			const scrollHeight = (windowHeight * 1.5) * $('.cndev_main .cndev_section').length;
			console.log(scrollHeight);
			const displayAbout = windowHeight / 2;
			const displayProjects = windowHeight * 1.3;

			var particlesParallax;
            $(window).scroll(function() {
				var scrollTop = $(this).scrollTop();
				// Hero fade.
				// $(heroContent).css({
				// 	opacity: function() {
				// 		var elementHeight = $(this).height();
				// 		return 0 + (elementHeight - scrollTop) / elementHeight;
				// 	}
				// });

				if ( scrollTop >= displayAbout ) {
					$('header').addClass('scrolled');
				} else {
					$('header').removeClass('scrolled');
				}

				if ( scrollTop >= displayAbout ) {
					if ( ! $('body').hasClass('about') && ! $('body').hasClass('projects') ) {
						$('body').addClass('about');
					}
				} else {
					if ( $('body').hasClass('about' ) ) {
						$('body').removeClass('about');
					}
				}

				if ( scrollTop >= displayProjects ) {
					if ( ! $('body').hasClass('projects') ) {
						$('body').addClass('projects');
					}
				} else {
					if ( $('body').hasClass('projects') ) {
						$('body').removeClass('projects');
					}
				}

				// particlesParallax = `-${ scrollTop * 0.10 }px`;
				// $(particlesSection).css({'bottom': particlesParallax});

				
				// if (Math.abs(lastScrollTop - scrollTop) >= delta) {
				// 	$(blueBackground).css({
				// 		bottom: function() {
				// 			// controllingScroll = -scrollTop;
				// 			// if ( ! $('body').hasClass('about') ) {
				// 			// 	controllingScroll = -scrollTop;
				// 			// 	return -scrollTop;
				// 			// }

				// 			let bottomValue = parseInt($(blueBackground).css('bottom'));
				// 			let speed = 30;

				// 			if ( bottomValue <= 0 && bottomValue >= -windowHeight ) {
				// 				if (scrollTop > lastScrollTop) {
				// 					controllingScroll -= speed;
				// 				} else {
				// 					controllingScroll += speed;
				// 				}
				// 			} else {
				// 				if (scrollTop > lastScrollTop) {
				// 					controllingScroll += speed;
				// 				} else {
				// 					controllingScroll -= speed;
				// 				}
				// 			}

				// 			return controllingScroll;
				// 		}
				// 	});
				// 	lastScrollTop = scrollTop;
				// }
            });

			// Background movement.
			var movementStrength = 50;
			var height = movementStrength / $(window).height();
			var width = movementStrength / $(window).width();
			$(window).mousemove((e) => {
				var pageX = e.pageX - ($(window).width() / 2);
				var pageY = e.pageY - ($(window).height() / 2);
				var newValueX = width * pageX;
				var newValueY = height * pageY;
				$('.cndev_particles canvas').css("right", newValueX + "px ");
				$('.cndev_particles canvas').css("bottom", newValueY + "px");
			});

			// Hero scroll.
			$('.cndev_section[data-content="hero"] .cndev_button').on('click', (event) => {
				$('html, body').animate({
                    scrollTop: $('.cndev_section[data-content="'+$(event.target).attr('id')).offset().top+'"]'
                }, 0);
			});

			// Tabs content.
			toggleTabContent();
			$('.cndev_section[data-content="about"] .selector .cndev_button').on('click', (event) => {
				$(event.target).addClass('active');
				$(event.target).siblings().removeClass('active');
				toggleTabContent();
			});

			// Prev/next section icons.
			const availableSections = {
				'about': 'Who\'s Caio?',
				'projects': 'My work',
				'contact': 'Get in touch',
			};
			const firstSection = Object.keys(availableSections)[0];
			const lastSection = Object.keys(availableSections).pop();
			const reverseKeys = Object.keys(availableSections).reverse();
			// Prev loop.
			$('.cndev_prev_section').on('click', (e) => {
				let nextChecker = 0;
				let toReturn;
				$.each(reverseKeys, (index, key) => {
					var value = availableSections[key];
					if ( 0 < nextChecker ) {
						showHideIcons(e.target, key, firstSection);
						$('.cndev_next_section').show();
						$( 'h2.section-title' ).html(value);
						$( 'h2.section-title' ).attr('id', key);
						$( '#cndev_current-section' ).val(key);
						toReturn = key;
						return false;
					}
					if ( value === $('h2.section-title').html() ) {
						nextChecker++;
					}
				});
				contentChange(toReturn);
			});
			// Next loop.
			$('.cndev_next_section').on('click', (e) => {
				let nextChecker = 0;
				let toReturn;
				$.each(availableSections, (key, value) => {
					if ( 0 < nextChecker ) {
						showHideIcons(e.target, key, lastSection);
						$('.cndev_prev_section').show();
						$( 'h2.section-title' ).html(value);
						$( 'h2.section-title' ).attr('id', key);
						$( '#cndev_current-section' ).val(key);
						toReturn = key;
						return false;
					}
					if ( value === $('h2.section-title').html() ) {
						nextChecker++;
					}
				});
				contentChange(toReturn);
			});

			function showHideIcons(element, key, section) {
				if ( key === section ) {
					$(element).hide();
				} else {
					$(element).show();
				}
			}
			// Content.
			function contentChange(key) {
				$('.cndev_section[data-content="about"] .content').each((index, selector) => {
					if ( $(selector).data('content') === key ) {
						$(selector).show();
					} else {
						$(selector).hide();
					}
				});
			};

			$('.project-thumb--click').on('click', (e) => {
				const thumbBox = $(e.target).parent();
				
				toggleProjects(thumbBox, $('[data-project-id]'));
			});

			function toggleProjects(thumb, element) {
				$(element).each((index, selector) => {
					if ( $(selector).data('project-id') === $(thumb).data('project-id') ) {
						if ( $(selector).hasClass('left--inner') ) {
							setTimeout(() => {
								$(selector).slideDown(300);
							}, 400);
						} else {
							$(selector).addClass('active');
						}
						$(thumb).parent().addClass('active');
					} else {
						if ( $(selector).hasClass('left--inner') ) {
							$(selector).slideUp(300);
						} else {
							$(selector).removeClass('active');
						}
						$(thumb).parent().removeClass('active');
					}
				});
			}
		});
	}
}

export default FrontPage;