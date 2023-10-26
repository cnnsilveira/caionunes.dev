class FrontPage {

	constructor() {
	this.events();
	}

	events() {
		jQuery(($) => {
            var element = $(".fade-out-effect");
            var lastScrollTop = 0;

            $(window).scroll(function() {
				var scrollTop = $(this).scrollTop();
				$(element).css({
					opacity: function() {
						var elementHeight = $(this).height();
						return 0 + (elementHeight - scrollTop) / elementHeight;
					}
				});
            });
		});
	}
}

export default FrontPage;