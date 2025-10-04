import LeafMap from "./LeafMap";

const mural = document.querySelector("#mural");
const fileInput = document.querySelector('input[name="evidences"]');
const imagePlaceholder = document.querySelector("#imagePlaceholder");
const datetimeInput = document.querySelector('input[name="datetime"]');
const justNowBtn = document.querySelector("#justNowBtn");
const occurrenceCoord = document.querySelector('input[name="coords"]');
const map = new LeafMap();

map.setMapPosition();
map.whenClicked((e) => {
	const { lat, lng } = e.latlng;
	map.setMarker(lat, lng);
	occurrenceCoord.value = JSON.stringify({ lat: `${lat}`, lng: `${lng}` });
});

document.addEventListener("hx-clearInputs", (e) => map.lastMarker.remove());

justNowBtn.addEventListener("click", (e) => {
	const today = new Date();
	const year = today.getFullYear();
	const month = String(today.getMonth() + 1).padStart(2, "0");
	const day = String(today.getDate()).padStart(2, "0");
	const hours = String(today.getHours()).padStart(2, "0");
	const minutes = String(today.getMinutes()).padStart(2, "0");
	datetimeInput.value = `${year}-${month}-${day}T${hours}:${minutes}`;
});

fileInput.addEventListener("change", (e) => {
	mural
		.querySelectorAll("img:not([id='imagePlaceholder'])")
		.forEach((img) => img.remove());

	for (let file of fileInput.files) {
		const newImage = imagePlaceholder.cloneNode(true);
		newImage.src = URL.createObjectURL(file);

		mural.appendChild(newImage);
		newImage.classList.remove("hidden");
		newImage.removeAttribute("id");
	}
});
