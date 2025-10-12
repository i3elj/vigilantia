export default class LocationProvider {
	static providers = [
		{
			name: 'navigator',
			getPosition: () => navigator.geolocation.getCurrentPosition(
				(pos) => [pos.coords.latitude, pos.coords.longitude],
				(_err) => false,
			)
		},
	];


	static getPosition() {
		return new Promise((resolve, reject) => {
			for (let provider of this.providers) {
				var res = provider.getPosition();

				if (res) {
					resolve(res);
				}
			}

			reject(false);
		});
	}
}
