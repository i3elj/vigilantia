<?php

define("BASE_PATH", __DIR__ . "/");
define("ENV", parse_ini_file(BASE_PATH . ".env"));

spl_autoload_register(function ($className) {
	$file = BASE_PATH . "src/" . str_replace("\\", "/", $className) . ".php";

	if (file_exists($file)) {
		require $file;
		return true;
	}

	return false;
});
