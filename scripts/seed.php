<?php declare(strict_types=1);
use Resources\Crimes\Crimes;

require "config.php";
require "vendor/autoload.php";

$centers = [
	["lat" => -23.55, "lng" => -46.63], // São Paulo
	["lat" => -22.9, "lng" => -43.2],   // Rio de Janeiro
	["lat" => -12.97, "lng" => -38.5],  // Salvador
];

function randomPointNear($center, $spread = 0.08)
{
	return [
		"lat" => $center["lat"] + (mt_rand() / mt_getrandmax() - 0.5) * $spread,
		"lng" => $center["lng"] + (mt_rand() / mt_getrandmax() - 0.5) * $spread,
	];
}

for ($i = 0; $i < 10000; $i++) {
	$center = $centers[array_rand($centers)];
	$point = randomPointNear($center);
	$date = date("Y-m-d H:i:s", time() - rand(0, 365 * 24 * 60 * 60));

	Crimes::insert("RandomOccurrence", "random crime", $point, $date);
}
