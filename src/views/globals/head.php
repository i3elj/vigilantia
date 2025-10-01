<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title><?= $title ?? "Default Title" ?></title>
		<link href="/css/output.css" rel="stylesheet"/>
		<script defer type="module" src="/js/main.js"></script>

		<?php foreach ($styles as $style): ?>
			<link href="<?= $style ?>" rel="stylesheet"/>
		<?php endforeach; ?>

		<?php foreach ($scripts as $script): ?>
			<script defer type="module" src="<?= $script ?>"></script>
		<?php endforeach; ?>
	</head>
	<body class="bg-base-200 min-w-screen min-h-screen">
