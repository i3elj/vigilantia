import LeafMap from "./LeafMap";

const map = new LeafMap();

document
	.querySelector("#locationBtn")
	.addEventListener("click", map.setMapPosition);
