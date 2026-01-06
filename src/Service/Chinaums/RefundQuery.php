<?php

namespace tinymeng\Chinaums\Service\Chinaums;

use tinymeng\Chinaums\Service\Common\BaseRefundQuery;

/**
 * C扫B支付（主扫）- 退款查询
 * 接口文档：https://open.chinaums.com/saas-doc/openplate/netpay/bills/bills/
 */
class RefundQuery extends BaseRefundQuery
{
    /**
     * @var string 接口地址
     */
    protected $api = '/v1/netpay/refund-query';
    
    /**
     * @var array $body 请求参数
     */
    protected $body = [];
    
    /**
     * 必传的值
     * @var array
     */
    protected $require = ['requestTimestamp', 'merOrderId', 'mid', 'tid', 'instMid'];
}

