<?php

define("BASE_PATH", __DIR__ . "/");
define("ENV", parse_ini_file(BASE_PATH . ".env"));

spl_autoload_register(
	fn($className) => require BASE_PATH .
		"src/" .
		str_replace("\\", "/", $className) .
		".php",
);
