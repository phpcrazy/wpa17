<?php

define('DD', __DIR__ . '/..');

require DD . '/vendor/autoload.php';

use Wpa17\Core\Application;

$app = new Application();
$app["version"] = "1.0";

$app->run();

unset($app);


?>