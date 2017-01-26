jQuery(document).ready(function($) {
	$("#footer").ffccMobile({
		button: "#nav_toggle", // what button toggles the nav
		breakPoint: 800, // what is your mobile breakpoint? default: 800
		closeOnResize: true, // when you increase browser size, remove .open classes? default: true
		openClass: "open", // what class is added when the menu is active? Default: open
		openExclusive: true // close other menus if this one is open? default: false
	});
});