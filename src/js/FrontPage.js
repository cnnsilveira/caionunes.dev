class FrontPage {

	constructor() {
	this.events();
	}

	events() {
		jQuery(($) => {
			// Hero content fade out.
            var element = $(".fade-out-effect");
            $(window).scroll(function() {
				var scrollTop = $(this).scrollTop();
				$(element).css({
					opacity: function() {
						var elementHeight = $(this).height();
						return 0 + (elementHeight - scrollTop) / elementHeight;
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
				$('.cndev_particles canvas').css("right", newValueX + "px ");
				$('.cndev_particles canvas').css("bottom", newValueY + "px");
			});
			$('.cndev_home_hero .cndev_button').on('click', (event) => {
				$('html, body').animate({
                    scrollTop: $('.'+$(event.target).attr('id')).offset().top
                }, 0);
			});
			// "Who's Caio?" content.
			const defaultContent = $('.cndev_home_about--content p').html();
			const aboutContent = {
				'for-all': defaultContent,
				'for-costumers': 'The one with the perfect price, the most eye-brightening tricks and the shortest deadlines.',
				'for-companies': 'The best developer you could ever hire.',
				'for-developers': 'Yes, WordPress developers are legit full-stack devel...<br><code>PHP FATAL ERROR: Unexpected ")" on "index.php" at line 1246.</code><br>Oh, sorry, I forgot an "," on my array.',
			};
			$('.cndev_content_selector span').on('click', (event) => {
				$(event.target).addClass('active');
				$(event.target).siblings().removeClass('active');
				$('.cndev_home_about--content p').html(aboutContent[$(event.target).attr('id')]);
			})
		});
	}
}

export default FrontPage;