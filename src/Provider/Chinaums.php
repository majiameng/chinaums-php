<?php

namespace tinymeng\Chinaums\Provider;

/**
 * Chinaums
 * B扫C支付（被扫）
 * @method static \tinymeng\Chinaums\Service\Chinaums\Pos pos(array $params) 刷卡支付
 * @method static \tinymeng\Chinaums\Service\Chinaums\PosQuery posQuery(array $params) 交易状态查询
 * @method static \tinymeng\Chinaums\Service\Chinaums\PosRefund posRefund(array $params) 交易退款
 * @method static \tinymeng\Chinaums\Service\Chinaums\PosRefundQuery posRefundQuery(array $params) 交易退款查询
 * @method static \tinymeng\Chinaums\Service\Chinaums\PosVoid posVoid(array $params) 支付撤销
 * C扫B支付（主扫）
 * @method static \tinymeng\Chinaums\Service\Chinaums\Scan scan(array $params) 扫码支付(二维码获取)
 * @method static \tinymeng\Chinaums\Service\Chinaums\ScanUpdate scanUpdate(array $params) 二维码更新
 * @method static \tinymeng\Chinaums\Service\Chinaums\ScanClose scanClose(array $params) 二维码关闭
 * @method static \tinymeng\Chinaums\Service\Chinaums\ScanQuery scanQuery(array $params) 查询二维码静态信息
 * @method static \tinymeng\Chinaums\Service\Chinaums\ScanRefund scanRefund(array $params) 退款
 * @method static \tinymeng\Chinaums\Service\Chinaums\BillQuery billQuery(array $params) 账单状态查询
 * @method static \tinymeng\Chinaums\Service\Chinaums\SecureComplete secureComplete(array $params) 担保完成
 * @method static \tinymeng\Chinaums\Service\Chinaums\SecureCancel secureCancel(array $params) 担保撤销
 * @method static \tinymeng\Chinaums\Service\Chinaums\PreauthComplete preauthComplete(array $params) 预授权完成
 * @method static \tinymeng\Chinaums\Service\Chinaums\PreauthCancel preauthCancel(array $params) 预授权撤销
 * @method static \tinymeng\Chinaums\Service\Chinaums\PreauthCompleteCancel preauthCompleteCancel(array $params) 预授权完成撤销
 * @method static \tinymeng\Chinaums\Service\Chinaums\SubOrderConfirm subOrderConfirm(array $params) 异步分账确认
 * 公用接口
 * @method static \tinymeng\Chinaums\Service\Chinaums\Refund refund(array $params) 退款
 */
class Chinaums extends BaseProvider
{

}
