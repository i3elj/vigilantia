<?php declare(strict_types=1);

use Agmen\Router;
use handlers\HomeHandler;

require "../config.php";
require "../vendor/autoload.php";

const r = new Router();
r->path("/", "home", [], HomeHandler::class);
r->handle();
