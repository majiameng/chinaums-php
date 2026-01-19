<?php

namespace tinymeng\Chinaums\Service\Chinaums;

use tinymeng\Chinaums\Service\Common\Base;

/**
 * C扫B支付（主扫）- 预授权完成撤销
 * 接口文档：https://open.chinaums.com/saas-doc/openplate/netpay/bills/bills/9m8w9xzk.html
 */
class PreauthCompleteCancel extends Base
{
    /**
     * @var string 接口地址
     */
    protected $api = '/v1/netpay/bills/preauthed-cancel';
    
    /**
     * @var array $body 请求参数
     */
    protected $body = [
        'instMid'=>'QRPAYDEFAULT',
    ];
    
    /**
     * 必传的值
     * @var array
     */
    protected $require = ['merOrderId',  'instMid'];
}

