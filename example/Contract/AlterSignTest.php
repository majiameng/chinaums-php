<?php
include_once '../../vendor/autoload.php';

use tinymeng\Chinaums\Factory;

date_default_timezone_set('PRC');

$config = include_once './Config/Config.php';

$data = [
    'request_date' => date('YmdHis'),//请求时间
    'ums_reg_id'=>'20181218161925001674',
    'request_seq' => uniqid(), 
];
Factory::config($config);
$reponse = Factory::Contract()->AlterSign()->request($data);
// $url = Factory::Contract()->AlterSign()->getUrl($data);
echo 'response:' . $reponse . PHP_EOL;
echo 'url:' . $url . PHP_EOL;
