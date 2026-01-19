<?php

namespace tinymeng\Chinaums\Provider;

/**
 * Chinaums
 * B扫C支付（被扫）
 * @method static \tinymeng\Chinaums\Service\Chinaums\Pos Pos(array $params) 刷卡支付
 * @method static \tinymeng\Chinaums\Service\Chinaums\PosQuery PosQuery(array $params) 交易状态查询
 * @method static \tinymeng\Chinaums\Service\Chinaums\PosRefund PosRefund(array $params) 交易退款
 * @method static \tinymeng\Chinaums\Service\Chinaums\PosRefundQuery PosRefundQuery(array $params) 交易退款查询
 * @method static \tinymeng\Chinaums\Service\Chinaums\PosVoid PosVoid(array $params) 支付撤销
 * C扫B支付（主扫）
 * @method static \tinymeng\Chinaums\Service\Chinaums\Qrcode Qrcode(array $params) 扫码支付(二维码获取)
 * @method static \tinymeng\Chinaums\Service\Chinaums\QrcodeUpdate QrcodeUpdate(array $params) 二维码更新
 * @method static \tinymeng\Chinaums\Service\Chinaums\QrcodeClose QrcodeClose(array $params) 二维码关闭
 * @method static \tinymeng\Chinaums\Service\Chinaums\QrcodeQuery QrcodeQuery(array $params) 查询二维码静态信息
 * @method static \tinymeng\Chinaums\Service\Chinaums\BillQuery BillQuery(array $params) 账单状态查询
 * @method static \tinymeng\Chinaums\Service\Chinaums\QrcodeRefund qrcodeRefund(array $params) 退款
 * @method static \tinymeng\Chinaums\Service\Chinaums\SecureComplete SecureComplete(array $params) 担保完成
 * @method static \tinymeng\Chinaums\Service\Chinaums\SecureCancel SecureCancel(array $params) 担保撤销
 * @method static \tinymeng\Chinaums\Service\Chinaums\PreauthComplete PreauthComplete(array $params) 预授权完成
 * @method static \tinymeng\Chinaums\Service\Chinaums\PreauthCancel PreauthCancel(array $params) 预授权撤销
 * @method static \tinymeng\Chinaums\Service\Chinaums\PreauthCompleteCancel PreauthCompleteCancel(array $params) 预授权完成撤销
 * @method static \tinymeng\Chinaums\Service\Chinaums\SubOrderConfirm SubOrderConfirm(array $params) 异步分账确认
 */
class Chinaums extends BaseProvider
{

}
