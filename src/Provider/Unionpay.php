<?php
namespace tinymeng\Chinaums\Provider;

use tinymeng\Chinaums\Tools\Str;

/**
 * Unionpay
 * @method static \tinymeng\Chinaums\Service\Alipay\App App(array $params) App支付
 * @method static \tinymeng\Chinaums\Service\Alipay\Close Close(array $params) 关闭支付
 * @method static \tinymeng\Chinaums\Service\Alipay\H5 H5(array $params) H5支付
 * @method static \tinymeng\Chinaums\Service\Alipay\Mini Mini(array $params) 小程序支付
 * @method static \tinymeng\Chinaums\Service\Alipay\Pos Pos(array $params) 刷卡支付
 * @method static \tinymeng\Chinaums\Service\Alipay\PosRefund PosRefund(array $params) 刷卡退款
 * @method static \tinymeng\Chinaums\Service\Alipay\Query Query(array $params) 查询订单
 * @method static \tinymeng\Chinaums\Service\Alipay\Refund Refund(array $params) 退款
 * @method static \tinymeng\Chinaums\Service\Alipay\RefundQuery RefundQuery(array $params) 退款查询
 */
class Unionpay extends BaseProvider
{

    /**
     * @param string $shortcut
     * @param array $params
     * @return mixed
     */
    public function __call(string $shortcut, array $params)
    {
        $class = '\\tinymeng\\Chinaums\\Service\\Unionpay\\' . Str::studly($shortcut);
        $service = new $class($this->config);
        return $service->request($params);
    }

}
