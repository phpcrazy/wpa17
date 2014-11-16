<?php 
define('DD', __DIR__ . '/..');

require DD . '/vendor/autoload.php';

$title = Config::site('foo.bar');
$dbname = Config::database('dbname');
$name = Config::products('name');
var_dump($name);


 ?>