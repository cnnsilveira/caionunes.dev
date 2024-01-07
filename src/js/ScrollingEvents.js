const basicScroll = require('basicscroll');

class ScrollingEvents {

    constructor() {
        this.events();
    }

    events() {
        jQuery( function( $ ) {
			const aboutSectionFade = basicScroll.create({
				elem: document.querySelector('.cndev__section[data-content="about"]'),
				from: 'top-bottom',
				to: 'middle-middle',
				props: {
					'--opacity': {
						from: .0,
						to: 1
					}
				}
			})
			
			aboutSectionFade.start();
		});
    }
}

export default ScrollingEvents;