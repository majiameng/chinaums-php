<?php
include_once '../../vendor/autoload.php';

use tinymeng\Chinaums\Factory;

date_default_timezone_set('PRC');

$config = include_once '../../config/chinaums.php';

$data = [
    'requestTimestamp' => date("YmdHis", time()),
    'merOrderId' => '101720220303143314904287',
    'targetOrderId' => '101720220223102617810382',
    'refundAmount' => 100,
];
Factory::config($config);
$response = Factory::Wechat()->refund($data);
echo 'response:' . $response . PHP_EOL;
