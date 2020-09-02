import "@theme/front/init.scss";

import "lightbox2/dist/css/lightbox.css";
import lightbox from "lightbox2/dist/js/lightbox";

import "./lazysizes";

import 'bootstrap/js/dist/collapse';

const $nav = document.querySelector("#navbar");
const $scrollTopBtn = document.querySelector("#scrollTopBtn");
const $navbarCollapse = document.querySelector("#navbarToggler");
const $navbarLinks = document.querySelectorAll("#navbarToggler .nav-link");

//close nav
$navbarLinks.forEach(item => {
	item.addEventListener('click', function() {
		$navbarCollapse.classList.remove("show");
	});
});

var prevScrollpos = window.pageYOffset;
window.onscroll = function() {
	var currentScrollPos = window.pageYOffset;
	if (prevScrollpos > currentScrollPos) {
		$nav.style.top = "0";
	} else {
		if (!$navbarCollapse.classList.contains('show')) {
			$nav.style.top = "-130px";
		}
	}
	prevScrollpos = currentScrollPos;


	if (currentScrollPos > 200 && window.innerWidth > 1000) {
		$nav.style.backgroundColor = "#177098";
	} else if (currentScrollPos < 1) {
		$nav.style.backgroundColor = "unset";
	}

	if (currentScrollPos > window.innerHeight) {
		$scrollTopBtn.style.display = "block";
	} else {
		$scrollTopBtn.style.display = "none";
	}

};


const $footer = document.querySelector('footer');
const $body = document.querySelector('body');
window.addEventListener('load', function() {
	if ($body.offsetHeight < screen.height) {
		$footer.style.position = "absolute";
		$footer.style.bottom = "0";
	}

});

$(document).ready(function(){

	// smooth scroll
	// Add smooth scrolling to all links
	$(".scroll").on("click", function(event) {

		// Make sure this.hash has a value before overriding default behavior
		if (this.hash !== "") {
			// Prevent default anchor click behavior
			event.preventDefault();

			// Store hash
			var hash = this.hash;

			// Using jQuery's animate() method to add smooth page scroll
			// The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
			$("html, body").animate({
				scrollTop: $(hash).offset().top
			}, 800, function(){

				// Add hash (#) to URL when done scrolling (default click behavior)
				window.location.hash = hash;
			});
		} // End if
	});
});



