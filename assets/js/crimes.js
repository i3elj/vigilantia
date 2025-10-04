import LeafMap from "./LeafMap";

(async function () {
	const res = await fetch("/crimes");
	const hps = (await res.json()).map((hp) => ({
		lat: hp.latitude,
		lng: hp.longitude,
	}));
	const leafMap = new LeafMap();
	leafMap.addMultipleHP(hps);
})();
