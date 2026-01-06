<?php

namespace tinymeng\Chinaums\Service\Chinaums;

use tinymeng\Chinaums\Service\Common\Base;

/**
 * C扫B支付（主扫）- 二维码关闭
 * 接口文档：https://open.chinaums.com/saas-doc/openplate/netpay/bills/bills/
 */
class QrcodeClose extends Base
{
    /**
     * @var string 接口地址
     */
    protected $api = '/v1/netpay/bills/close-qrcode';
    
    /**
     * @var array $body 请求参数
     */
    protected $body = [];
    
    /**
     * 必传的值
     * @var array
     */
    protected $require = ['requestTimestamp', 'mid', 'tid', 'instMid', 'msgId', 'billNo'];
}

