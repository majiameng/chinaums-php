<?php

namespace tinymeng\Chinaums\Service\Chinaums;

use tinymeng\Chinaums\Service\Common\Base;

/**
 * C扫B支付（主扫）- 预授权完成
 * 接口文档：https://open.chinaums.com/saas-doc/openplate/netpay/bills/bills/
 */
class PreauthComplete extends Base
{
    /**
     * @var string 接口地址
     */
    protected $api = '/v1/netpay/preauth-complete';
    
    /**
     * @var array $body 请求参数
     */
    protected $body = [];
    
    /**
     * 必传的值
     * @var array
     */
    protected $require = ['requestTimestamp', 'merOrderId', 'mid', 'tid', 'instMid', 'completedAmount'];
}

