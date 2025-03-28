<?php
include_once '../../vendor/autoload.php';

use tinymeng\Chinaums\Factory;

date_default_timezone_set('PRC');

$config = include_once './Config/Config.php';

$data = [
    'request_date' => date('YmdHis'),//请求时间
    // 'ums_reg_id'=>'8983102500071141',
    'accesser_acct' => 'd158ca13-5886-45',
    'request_seq' => uniqid(), 
];
Factory::config($config);
$response = Factory::Contract()->ApplyQry($data);
echo 'response:' . $response . PHP_EOL;
