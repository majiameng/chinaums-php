<?php

namespace tinymeng\Chinaums\Service\Unionpay;
use tinymeng\Chinaums\Service\Common\Base;

/**
 * 小程序下单接口
 */
class Mini extends Base
{
    /**
     * @var string 接口地址
     */
    protected $api = '/v1/netpay/uac/mini-order';
    /**
     * @var array $body 请求参数
     */
    protected $body = [
        'tradeType' => 'MINI'
    ];
    /**
     * 必传的值
     * @var array
     */
    protected $require = ['requestTimestamp', 'merOrderId', 'mid', 'tid', 'subAppId', 'subOpenId', 'tradeType'];
}
