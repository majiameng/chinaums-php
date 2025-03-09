<?php

use PHPUnit\Framework\TestCase;
use tinymeng\Chinaums\Factory;

/**
 * IntelligentParseTest
 */
class WechatTest extends TestCase
{
    public function testAddress()
    {
        $data = [];
        // 报文请求时间
        $data['requestTimestamp'] = date("YmdHis", time());
        // 订单号
        $data['merOrderId'] = '33XF'.time() . uniqid();
        // 业务类型 机构商户号 MINIDEFAULT|QRPAYDEFAULT|YUEDANDEFAULT
        $data['instMid'] = 'MINIDEFAULT';
        // 订单描述 展示在支付截图中
        $data['orderDesc'] = '账单描述';
        // 支付总金额
        $data['totalAmount'] = 2;
        // 微信必填
        $data['subAppId'] = 'wxca3a56d63895b431';
        // 微信必填  前端获取用户的openid 传给后台
        $data['subOpenId'] = 'o4Sic5HPuB3j-LmnQTVIC4G_oYqY';
        $data['tradeType'] = 'JSAPI';

        $config = [
            'mid' => '8982****5678',// 商户号
            'tid' => '88****01',// 终端号
            'appid' => '10037e6****5e5a0006',// 加密 APPID
            'appkey' => '1c4e3b1606****6a09e5b312e8',// 加密 KEY
            'md5key' => 'impA***********hCaTCXJ6'// 回调验证需要的md5key
        ];
        Factory::config($config);
        $app = Factory::Wechat()->mini();
        $reponse = $app->request($data);
        echo 'response:' . $reponse . PHP_EOL;
    }

}