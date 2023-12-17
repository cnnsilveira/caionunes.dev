// SCSS import.
import "./scss/styles.scss";

// Scripts import.
import FrontPage from "./js/FrontPage";
import Header from "./js/Header";
import Particles from "./js/Particles";
import StringEffect from "./js/StringEffect";
import ScrollingEvents from "./js/ScrollingEvents";

jQuery(document).ready(() => {
    const frontPage = new FrontPage();
    const header = new Header();
    const particles = new Particles();
	const scrollingEvents = new ScrollingEvents();
	const stringEffect = new StringEffect(jQuery('.string-effect'));
});