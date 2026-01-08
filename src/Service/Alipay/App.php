<?php

namespace tinymeng\Chinaums\Service\Alipay;
use tinymeng\Chinaums\Service\Common\Base;

/**
 * App下单接口
 */
class App extends Base
{
    /**
     * @var string 接口地址
     */
    protected $api = '/v1/netpay/trade/precreate';
    /**
     * @var array $body 请求参数
     */
    protected $body = [
        'tradeType' => 'MINI_PAY'
    ];
    /**
     * 必传的值
     * @var array
     */
    protected $require = ['merOrderId',  'subAppId', 'subOpenId', 'tradeType'];
}
