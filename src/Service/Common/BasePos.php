<?php

namespace tinymeng\Chinaums\Service\Common;

/**
 * 刷卡支付
 */
class BasePos extends Base
{

    protected $gateway_type = 'wh_open';
    /**
     * @var string 接口地址
     */
    protected $api = '/v6/poslink/transaction/pay';
    /**
     * @var array $body 请求参数
     */
    protected $body = [
    ];
    /**
     * 必传的值
     * @var array
     */
    protected $require = ['requestTimestamp', 'merOrderId', 'mid', 'tid', 'subAppId', 'subOpenId'];
}
