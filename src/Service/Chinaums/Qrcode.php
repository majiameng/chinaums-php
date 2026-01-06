<?php

namespace tinymeng\Chinaums\Service\Chinaums;

use Exception;
use tinymeng\Chinaums\Service\Common\BaseScan;

/**
 * C扫B支付（主扫）- 扫码支付（二维码获取）
 * 接口文档：https://open.chinaums.com/saas-doc/openplate/netpay/bills/bills/je24KjzL.html
 */
class Qrcode extends BaseScan
{
    /**
     * @var string 接口地址
     */
    protected $api = '/v1/netpay/bills/get-qrcode';
    
    /**
     * @var array $body 请求参数
     */
    protected $body = [];
    
    /**
     * 必传的值
     * 根据文档：requestTimestamp, mid, tid, instMid, msgId, billNo/billDate(至少一个), totalAmount
     * @var array
     */
    protected $require = ['requestTimestamp', 'mid', 'tid', 'instMid', 'msgId', 'totalAmount'];

    /**
     * 重写验证方法，添加 billNo 和 billDate 的至少一个验证
     * @return true
     * @throws Exception
     */
    protected function validate()
    {
        // 先执行父类的验证
        parent::validate();
        
        // 验证 billNo 和 billDate 至少存在一个
        $key = array_keys($this->body);
        if (!in_array('billNo', $key) && !in_array('billDate', $key)) {
            throw new Exception('billNo 或 billDate 至少需要提供一个');
        }
        
        return true;
    }
}

