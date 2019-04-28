document.querySelector("._sticky-logo a").addEventListener("click", function(e) {
	if(window.scrollY > 0) {
		e.preventDefault();
		window.scrollTo({
			"behavior": "smooth",
			"left": 0,
			"top": 0,
		});
		this.blur();
	}
});