class FrontPage {

    constructor() {
        this.events();
    }

    events() {
        window.onload = () => {
            var box = document.getElementById('hero-content');
            var docHeight = document.documentElement.offsetHeight;
            
            window.addEventListener( 'scroll', function() {
                // normalize scroll position as percentage
                var scrolled = false;
                var transformValue;

                scrolled = window.scrollY;
        
                transformValue = scrolled+'%';
          
                box.style.WebkitTransform = transformValue;
                box.style.MozTransform = transformValue;
                box.style.OTransform = transformValue;
                box.style.zoom = transformValue;
              
            }, false);
        }
    }
}

export default FrontPage;