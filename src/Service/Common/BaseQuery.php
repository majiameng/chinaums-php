<?php

namespace tinymeng\Chinaums\Service\Common;

/**
 * 查询接口
 */
class BaseQuery extends Base
{
    /**
     * @var string 接口地址
     */
    protected $api = '/v1/netpay/query';
    /**
     * @var array $body 请求参数
     */
    protected $body = [
    ];
    /**
     * 必传的值
     * @var array
     */
    protected $require = ['merOrderId', 'instMid'];
}
