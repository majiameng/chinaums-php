<?php
include_once '../../vendor/autoload.php';

use tinymeng\Chinaums\Factory;

date_default_timezone_set('PRC');

$config = include_once '../../config/chinaums.php';

Factory::config($config);

// 二维码更新
$response = Factory::Chinaums()->scanUpdate([
    'requestTimestamp' => date('Y-m-d H:i:s'),
    'msgId' => '800000000010',
    'billNo' => '8888',
    // ... 其他参数
])->request();

// 二维码关闭
$response = Factory::Chinaums()->scanClose([
    'requestTimestamp' => date('Y-m-d H:i:s'),
    'msgId' => '800000000010',
    'billNo' => '8888',
])->request();

// 退款
$response = Factory::Chinaums()->scanRefund([
    'requestTimestamp' => date('Y-m-d H:i:s'),
    'merOrderId' => '订单号',
    'refundAmount' => '100',
])->request();

// 其他接口类似...