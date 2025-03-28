<?php
namespace tinymeng\Chinaums\Provider;

use tinymeng\Chinaums\Tools\Str;

/**
 * Unionpay
 * @method static \tinymeng\Chinaums\Service\Unionpay\App App(array $params) App支付
 * @method static \tinymeng\Chinaums\Service\Unionpay\Close Close(array $params) 关闭支付
 * @method static \tinymeng\Chinaums\Service\Unionpay\H5 H5(array $params) H5支付
 * @method static \tinymeng\Chinaums\Service\Unionpay\Mini Mini(array $params) 小程序支付
 * @method static \tinymeng\Chinaums\Service\Unionpay\Pos Pos(array $params) 刷卡支付
 * @method static \tinymeng\Chinaums\Service\Unionpay\PosRefund PosRefund(array $params) 刷卡退款
 * @method static \tinymeng\Chinaums\Service\Unionpay\Query Query(array $params) 查询订单
 * @method static \tinymeng\Chinaums\Service\Unionpay\Refund Refund(array $params) 退款
 * @method static \tinymeng\Chinaums\Service\Unionpay\RefundQuery RefundQuery(array $params) 退款查询
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
