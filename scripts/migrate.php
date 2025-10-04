<?php

use Agmen\Database;

require "config.php";
require "vendor/autoload.php";

$crimeTable = BASE_PATH . "src/Resources/Crimes/schema.sql";
$crimeImagesTable = BASE_PATH . "src/Resources/CrimeImages/schema.sql";

$db = Database::connect();
$db->fsql($crimeTable);
$db->fsql($crimeImagesTable);
