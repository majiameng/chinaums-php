<?php

namespace tinymeng\Chinaums\Service\Chinaums;

use tinymeng\Chinaums\Service\Common\BaseRefund;

/**
 * C扫B支付（主扫）- 退款
 * 接口文档：https://open.chinaums.com/saas-doc/openplate/netpay/bills/bills/
 */
class Refund extends BaseRefund
{
    /**
     * @var string 接口地址
     */
    protected $api = '/v1/netpay/refund';
    
    /**
     * @var array $body 请求参数
     */
    protected $body = [];
    
    /**
     * 必传的值
     * @var array
     */
    protected $require = ['requestTimestamp', 'merOrderId', 'mid', 'tid', 'instMid', 'refundAmount'];
}

