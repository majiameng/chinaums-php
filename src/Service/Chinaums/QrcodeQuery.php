<?php

namespace tinymeng\Chinaums\Service\Chinaums;

use tinymeng\Chinaums\Service\Common\Base;

/**
 * C扫B支付（主扫）- 查询二维码静态信息
 * 接口文档：https://open.chinaums.com/saas-doc/openplate/netpay/bills/bills/kpX9mjXr.html
 */
class QrcodeQuery extends Base
{
    /**
     * @var string 接口地址
     */
    protected $api = '/v1/netpay/bills/query-qrcode-info';
    
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
    protected $require = ['billNo','billDate'];
}

