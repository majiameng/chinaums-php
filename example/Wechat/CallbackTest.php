<?php
include_once '../../vendor/autoload.php';

use tinymeng\Chinaums\Factory;

date_default_timezone_set('PRC');

$config = include_once './Config/Config.php';

$data = [];
Factory::config($config);
$response = Factory::Wechat()->callback($data);
echo Factory::Wechat()->success().PHP_EOL;
echo 'response:' . (int)$response . PHP_EOL;
