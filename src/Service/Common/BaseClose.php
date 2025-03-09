<?php

namespace tinymeng\Chinaums\Service\Common;


/**
 * 关闭接口
 */
class BaseClose extends Base
{
    /**
     * @var string 接口地址
     */
    protected $api = '/v1/netpay/close';
    /**
     * @var array $body 请求参数
     */
    protected $body = [
    ];
    /**
     * 必传的值
     * @var array
     */
    protected $require = ['requestTimestamp', 'merOrderId', 'mid', 'tid','instMid'];
}
