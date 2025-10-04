import LocationProvider from "./LocationProvider";
import L from "leaflet";
import "./leaflet-heat";

export default class LeafMap {
	static instance;

	constructor() {
		if (LeafMap.instance !== undefined) {
			return LeafMap.instance;
		}

		this.map = L.map("map").setView([0, 0], 4);
		L.tileLayer("https://tile.openstreetmap.org/{z}/{x}/{y}.png", {
			minZoom: 4,
			attribution:
				'&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>',
		}).addTo(this.map);

		LeafMap.instance = this;
	}

	async setMapPosition() {
		try {
			const [lat, lon] = await LocationProvider.getPosition();
			this.map.setView([lat, lon], 15);
		} catch (error) {
			console.error("Failed to get location:", error);
		}
	}

	setMarker(lat, lng) {
		if (this.lastMarker !== undefined) {
			this.lastMarker.remove();
		}
		this.lastMarker = L.marker([lat, lng]).addTo(this.map);
	}

	whenClicked(f) {
		this.map.addEventListener("click", (e) => f(e));
	}

	addHP(lat, lng) {
		L.heatLayer([[lat, lng]]).addTo(this.map);
	}

	addMultipleHP(coords) {
		L.heatLayer(coords).addTo(this.map);
	}
}
