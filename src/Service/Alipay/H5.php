<?php

namespace tinymeng\Chinaums\Service\Alipay;

use tinymeng\Chinaums\Service\Common\Base;

/**
 * H5 支付
 */
class H5 extends Base
{
    /**
     * @var string 接口地址
     */
    protected $api = '/v1/netpay/trade/h5-pay';
    /**
     * @var array $body 请求参数
     */
    protected $body = [
        'instMid'=>'H5DEFAULT',
    ];
    /**
     * 必传的值
     * @var array
     */
    protected $require = ['requestTimestamp', 'merOrderId', 'mid', 'tid'];

    /**
     * @param array $data
     * @return false|mixed|string
     * @throws \Exception
     */
    public function request(array $data = [])
    {
        return $this->formRequest($data);
    }
    
}
