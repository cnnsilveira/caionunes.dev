class FrontPage {

    constructor() {
        this.events();
    }

    events() {
        window.onload = () => {
            var box = document.getElementById('hero-content');
            
            window.addEventListener( 'scroll', function() {
                var scrolled = false;
                var transformValue;

                scrolled = (window.scrollY) / 100;
        
                transformValue = 'scale('+scrolled+')';
          
                box.style.WebkitTransform = transformValue;
                box.style.MozTransform = transformValue;
                box.style.OTransform = transformValue;
                box.style.transform = transformValue;
              
            }, false);
        }
    }
}

export default FrontPage;