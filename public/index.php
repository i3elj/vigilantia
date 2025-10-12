<?php declare(strict_types=1);

use Agmen\Router;
use Handlers\CrimesApiHandler;
use Handlers\HomeHandler;
use Handlers\ReportHandler;

require "../config.php";
require "../vendor/autoload.php";
require '../translation-file.php';

const r = new Router();
r->path("/", "home", [], HomeHandler::class);
r->path("/report", "report", [], ReportHandler::class);
r->path("/crimes", "crimes", [], CrimesApiHandler::class);
r->handle();
