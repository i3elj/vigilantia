<?php

define("BASE_PATH", __DIR__ . "/");

spl_autoload_register(
	fn($className) => require BASE_PATH .
		"src/" .
		str_replace("\\", "/", $className) .
		".php",
);
