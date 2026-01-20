<?php

namespace tinymeng\Chinaums\Service\Chinaums;

use Exception;
use tinymeng\Chinaums\Service\Common\BaseScan;

/**
 * C扫B支付（主扫）- 扫码支付（二维码获取）
 * 接口文档：https://open.chinaums.com/saas-doc/openplate/netpay/bills/bills/je24KjzL.html
 */
class Scan extends BaseScan
{
    /**
     * @var string 接口地址
     */
    protected $api = '/v1/netpay/bills/get-qrcode';

    /**
     * @var array $body 请求参数
     */
    protected $body = [
        'instMid'=>'QRPAYDEFAULT',
    ];

    /**
     * 必传的值
     * 根据文档：requestTimestamp, mid, tid, instMid,
     * @var array
     */
    protected $require = ['billNo','requestTimestamp', 'mid', 'tid'];

}

