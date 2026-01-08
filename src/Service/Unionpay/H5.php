<?php

namespace tinymeng\Chinaums\Service\Unionpay;

use tinymeng\Chinaums\Service\Common\Base;

/**
 * H5 支付
 */
class H5 extends Base
{
    /**
     * @var string 接口地址
     */
    protected $api = '/v1/netpay/uac/order';
    /**
     * @var array $body 请求参数
     */
    protected $body = [
    ];
    /**
     * 必传的值
     * @var array
     */
    protected $require = ['merOrderId',  'subAppId', 'subOpenId'];
}
