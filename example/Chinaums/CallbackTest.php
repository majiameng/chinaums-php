<?php
include_once '../../vendor/autoload.php';

use tinymeng\Chinaums\Factory;

date_default_timezone_set('PRC');

$config = include_once '../../config/chinaums.php';

$data = [];
Factory::config($config);
$response = Factory::chinaums()->callback($data);
echo Factory::chinaums()->success().PHP_EOL;
echo 'response:' . (int)$response . PHP_EOL;
