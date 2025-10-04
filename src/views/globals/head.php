<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title><?= $title ?? "Default Title" ?></title>

		<!-- LEAFLET -->
		<!-- css -->
		<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
			integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
			crossorigin=""/>

		<script src="https://cdn.jsdelivr.net/npm/@phosphor-icons/web@2.1.2"></script>

		<link href="/css/output.css" rel="stylesheet"/>
		<script defer type="module" src="/js/imports.js"></script>

		<?php foreach ($styles ?? [] as $style): ?>
			<link href="<?= $style ?>" rel="stylesheet"/>
		<?php endforeach; ?>

		<?php foreach ($scripts ?? [] as $script): ?>
			<script defer type="module" src="<?= $script ?>"></script>
		<?php endforeach; ?>
	</head>

	<body class="flex items-center justify-center bg-base-200 min-w-screen min-h-screen">
		<div id="notification-container" class="absolute top-sm right-sm z-99"></div>
