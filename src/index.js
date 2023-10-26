// SCSS import.
import "./scss/style.scss";

// Scripts import.
import FrontPage from "./js/FrontPage";
import Header from "./js/Header";
import Particles from "./js/Particles";
import StringEffect from "./js/StringEffect";

jQuery(document).ready(() => {
    const frontPage = new FrontPage();
    const header = new Header();
    const particles = new Particles();
	const stringEffect = new StringEffect(jQuery('#messenger'));
});