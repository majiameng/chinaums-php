<?php

namespace tinymeng\Chinaums\Provider;

/**
 * Chinaums
 * @method static \tinymeng\Chinaums\Service\Chinaums\Pos Pos(array $params) 刷卡支付【B扫C支付（被扫）】
 * @method static \tinymeng\Chinaums\Service\Chinaums\PosQuery PosQuery(array $params) 交易状态查询【B扫C支付（被扫）】
 * @method static \tinymeng\Chinaums\Service\Chinaums\PosRefund PosRefund(array $params) 交易退款【B扫C支付（被扫）】
 * @method static \tinymeng\Chinaums\Service\Chinaums\PosRefundQuery PosRefundQuery(array $params) 交易退款查询【B扫C支付（被扫）】
 * @method static \tinymeng\Chinaums\Service\Chinaums\PosVoid PosVoid(array $params) 支付撤销【B扫C支付（被扫）】
 * @method static \tinymeng\Chinaums\Service\Chinaums\Qrcode Qrcode(array $params) 扫码支付【C扫B支付（主扫）- 二维码获取】
 * @method static \tinymeng\Chinaums\Service\Chinaums\QrcodeUpdate QrcodeUpdate(array $params) 二维码更新【C扫B支付（主扫）】
 * @method static \tinymeng\Chinaums\Service\Chinaums\QrcodeClose QrcodeClose(array $params) 二维码关闭【C扫B支付（主扫）】
 * @method static \tinymeng\Chinaums\Service\Chinaums\QrcodeQuery QrcodeQuery(array $params) 查询二维码静态信息【C扫B支付（主扫）】
 * @method static \tinymeng\Chinaums\Service\Chinaums\BillQuery BillQuery(array $params) 账单状态查询【C扫B支付（主扫）】
 * @method static \tinymeng\Chinaums\Service\Chinaums\Refund Refund(array $params) 退款【C扫B支付（主扫）】
 * @method static \tinymeng\Chinaums\Service\Chinaums\RefundQuery RefundQuery(array $params) 退款查询【C扫B支付（主扫）】
 * @method static \tinymeng\Chinaums\Service\Chinaums\SecureComplete SecureComplete(array $params) 担保完成【C扫B支付（主扫）】
 * @method static \tinymeng\Chinaums\Service\Chinaums\SecureCancel SecureCancel(array $params) 担保撤销【C扫B支付（主扫）】
 * @method static \tinymeng\Chinaums\Service\Chinaums\PreauthComplete PreauthComplete(array $params) 预授权完成【C扫B支付（主扫）】
 * @method static \tinymeng\Chinaums\Service\Chinaums\PreauthCancel PreauthCancel(array $params) 预授权撤销【C扫B支付（主扫）】
 * @method static \tinymeng\Chinaums\Service\Chinaums\PreauthCompleteCancel PreauthCompleteCancel(array $params) 预授权完成撤销【C扫B支付（主扫）】
 * @method static \tinymeng\Chinaums\Service\Chinaums\DivisionConfirm DivisionConfirm(array $params) 异步分账确认【C扫B支付（主扫）】
 */
class Chinaums extends BaseProvider
{

}
