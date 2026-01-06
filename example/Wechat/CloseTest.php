<?php
include_once '../../vendor/autoload.php';

use tinymeng\Chinaums\Factory;

date_default_timezone_set('PRC');

$config = include_once '../../config/chinaums.php';

$data = [
    'requestTimestamp' => date("YmdHis", time()),//请求时间
    'merOrderId' => '101720220303143314904287',//商户订单号
    'instMid' => 'MINIDEFAULT',//业务类型 
];
Factory::config($config);
$response = Factory::Wechat()->close($data);
echo 'response:' . $response . PHP_EOL;
