 jQuery(document).ready(() => {
    // Background effect
    var movementStrength = 50;
    var height = movementStrength / jQuery(window).height();
    var width = movementStrength / jQuery(window).width();

    jQuery(window).mousemove((e) => {
        var pageX = e.pageX - (jQuery(window).width() / 2);
        var pageY = e.pageY - (jQuery(window).height() / 2);
        var newValueX = width * pageX;
        var newValueY = height * pageY;
        jQuery('.hero-row canvas').css("right", newValueX + "px ");
        jQuery('.hero-row canvas').css("bottom", newValueY + "px");
        jQuery('.fixed-background canvas').css("right", newValueX + "px ");
        jQuery('.fixed-background canvas').css("bottom", newValueY + "px");
    });
});