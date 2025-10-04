import "htmx.org";

document.addEventListener("hx-clearInputs", (e) => {
	const inputs = document.querySelectorAll('[data-select="input"]');

	for (let input of inputs) {
		input.value = "";
	}
});
