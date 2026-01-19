<?php

namespace tinymeng\Chinaums\Service\Chinaums;

use tinymeng\Chinaums\Service\Common\Base;

/**
 * 异步分账确认
 * 接口文档：https://open.chinaums.com/saas-doc/openplate/netpay/bills/bills/pqXbmy8v.html
 */
class SubOrderConfirm extends Base
{
    /**
     * @var string 接口地址
     */
    protected $api = '/v1/netpay/sub-orders-confirm';
    
    /**
     * @var array $body 请求参数
     */
    protected $body = [
    ];
    
    /**
     * 必传的值
     * @var array
     */
    protected $require = ['merOrderId'];
}

