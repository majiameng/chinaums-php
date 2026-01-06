<?php
include_once '../../vendor/autoload.php';

use tinymeng\Chinaums\Factory;

date_default_timezone_set('PRC');

$config = include_once '../../config/chinaums.php';

Factory::config($config);


// 1. 支付
$response = Factory::Chinaums()->Pos([
    'merchantOrderId' => '订单号',
    'totalAmount' => 100, // 金额（分）
    'qrCode' => '付款码',
    // ... 其他参数
])->request();

// 2. 交易状态查询
$response = Factory::Chinaums()->PosQuery([
    'merchantOrderId' => '订单号',
    // 或使用 originalOrderId
])->request();

// 3. 交易退款
$response = Factory::Chinaums()->PosRefund([
    'merchantOrderId' => '订单号',
    'refundAmount' => 100, // 退款金额（分）
])->request();

// 4. 交易退款查询
$response = Factory::Chinaums()->PosRefundQuery([
    'merchantOrderId' => '订单号',
])->request();

// 5. 支付撤销
$response = Factory::Chinaums()->PosVoid([
    'merchantOrderId' => '订单号',
    // 或使用 originalOrderId
])->request();