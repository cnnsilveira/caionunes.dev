class FrontPage {

	constructor() {
	this.events();
	}

	events() {
		jQuery(($) => {
			function toggleTabContent() {
				$('.cndev__section[data-content="about"] p.content').each((index, selector) => {
					if ( $('.cndev__section[data-content="about"] .selector .cndev__button.active').attr('id') === $(selector).data('tab-content') ) {
						setTimeout(() => {
							$(selector).slideDown(500);
						}, 400);
					} else {
						$(selector).slideUp(300);
					}
				});
			}
			
			// Scroll event.
            var heroContent = $(".fade-out-effect");
			var blueBackground = $('.cndev__particles .overlay.bottom');
            $(window).scroll(function() {
				var scrollTop = $(this).scrollTop();
				// Hero fade.
				$(heroContent).css({
					opacity: function() {
						var elementHeight = $(this).height();
						return 0 + (elementHeight - scrollTop) / elementHeight;
					}
				});
				$(blueBackground).css({
					bottom: function() {
						return -scrollTop;
					}
				});
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
				$('.cndev__particles canvas').css("right", newValueX + "px ");
				$('.cndev__particles canvas').css("bottom", newValueY + "px");
			});

			// Scrolling to sections.
			$('.cndev__section_link').on('click', (event) => {
				$('html, body').animate({
                    scrollTop: $('.cndev__section[data-content="'+ $(event.target).data('content') +'"]').offset().top
                }, 0);
			});

			// Tabs content.
			toggleTabContent();
			$('.cndev__section[data-content="about"] .selector .cndev__button').on('click', (event) => {
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
			$('.cndev__prev_section').on('click', (e) => {
				let nextChecker = 0;
				let toReturn;
				$.each(reverseKeys, (index, key) => {
					var value = availableSections[key];
					if ( 0 < nextChecker ) {
						showHideIcons(e.target, key, firstSection);
						$('.cndev__next_section').show();
						$( 'h2.section-title' ).html(value);
						$( 'h2.section-title' ).attr('id', key);
						$( '#cndev__current-section' ).val(key);
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
			$('.cndev__next_section').on('click', (e) => {
				let nextChecker = 0;
				let toReturn;
				$.each(availableSections, (key, value) => {
					if ( 0 < nextChecker ) {
						showHideIcons(e.target, key, lastSection);
						$('.cndev__prev_section').show();
						$( 'h2.section-title' ).html(value);
						$( 'h2.section-title' ).attr('id', key);
						$( '#cndev__current-section' ).val(key);
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
				$('.cndev__section[data-content="about"] .content').each((index, selector) => {
					if ( $(selector).data('content') === key ) {
						$(selector).show();
					} else {
						$(selector).hide();
					}
				});
			};

			$('.project-thumb--click').on('click', (e) => {
				toggleProjects($(e.target).parent(), $('[data-project-id]'));
			});

			function toggleProjects(thumb, element) {
				$(element).each((index, selector) => {
					if ( $(selector).data('project-id') === $(thumb).data('project-id') ) {
						$(selector).addClass('active');
						$(thumb).parent().addClass('active');
					} else {
						$(selector).removeClass('active');
						$(thumb).parent().removeClass('active');
					}
				});
			}
		});
	}
}

export default FrontPage;