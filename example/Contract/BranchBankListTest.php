<?php
include_once '../../vendor/autoload.php';

use tinymeng\Chinaums\Factory;

date_default_timezone_set('PRC');

$config = include_once './Config/Config.php';

$data = [
    'request_date' => date('YmdHis'), //请求时间
    'areaCode' => '110100',
    'request_seq' => uniqid(),
    'key' => '张江',
];
Factory::config($config);
$response = Factory::Contract()->BranchBankList()->request($data);
echo 'response:' . $response . PHP_EOL;
