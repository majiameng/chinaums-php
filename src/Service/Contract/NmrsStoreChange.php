<?php

namespace tinymeng\Chinaums\Service\Contract;

use tinymeng\Chinaums\Service\Contract\Base;

/**
 * 商户分店信息变更接口
 */
class NmrsStoreChange extends Base
{
    /**
     * @var string 接口地址
     */
    protected $api = '/self-contract-nmrs/interface/autoReg';
    /**
     * @var array $body 请求参数
     */
    protected $body = [
        'service' => 'nmrs_store_change',
        'sign_type' => 'SHA-256',
    ];
    /**
     * 必传的值
     * @var array
     */
    protected $require = ['service', 'accesser_id', 'sign_type', 'request_date', 'request_seq', 'merNo'];
}
