<?php

namespace tinymeng\Chinaums\Service\Common;

/**
 * 扫码支付
 */
class BaseScan extends Base
{

    /**
     * @var string 接口地址
     */
    protected $api = '/v1/netpay/bills/get-qrcode';
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
