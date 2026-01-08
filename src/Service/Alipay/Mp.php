<?php

namespace tinymeng\Chinaums\Service\Alipay;

use tinymeng\Chinaums\Service\Common\Base;

/**
 * 公众号支付
 */
class Mp extends Base
{
    /**
     * @var string 接口地址
     */
    protected $api = '/v1/netpay/trade/create';
    /**
     * @var array $body 请求参数
     */
    protected $body = [
        'tradeType' => 'JSAPI',
        'instMid' => 'YUEDANDEFAULT',
    ];
    /**
     * 必传的值
     * @var array
     */
    protected $require = ['merOrderId',  'subAppId', 'subOpenId', 'tradeType','instMid'];
}
