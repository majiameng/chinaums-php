<h1 align="center">tinymeng/chinaums</h1>
<p align="center">
<a href="https://scrutinizer-ci.com/g/majiameng/chinaums-php/?branch=master"><img src="https://scrutinizer-ci.com/g/majiameng/chinaums-php/badges/quality-score.png?b=master" alt="Scrutinizer Code Quality"></a>
<a href="https://scrutinizer-ci.com/g/majiameng/chinaums-php/build-status/master"><img src="https://scrutinizer-ci.com/g/majiameng/chinaums-php/badges/build.png?b=master" alt="Build Status"></a>
<a href="https://packagist.org/packages/tinymeng/chinaums"><img src="https://poser.pugx.org/tinymeng/chinaums/v/stable" alt="Latest Stable Version"></a>
<a href="https://github.com/majiameng/chinaums-php/tags"><img src="https://poser.pugx.org/tinymeng/chinaums/downloads" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/tinymeng/chinaums"><img src="https://poser.pugx.org/tinymeng/chinaums/v/unstable" alt="Latest Unstable Version"></a>
<a href="https://github.com/majiameng/chinaums-php/blob/master/LICENSE"><img src="https://poser.pugx.org/tinymeng/chinaums/license" alt="License"></a>
</p>


Welcome Star, welcome PR ！

> If you have any questions to communicate, please post them here ： [chinaums-php](https://github.com/majiameng/chinaums-php/issues/) exchange Or Send an email 666@majiameng.com

# 银联商务 支付 API
银联商务sdk 和网银支付接口不一样，请注意。

* 支持微信、支付宝、银联支付的API接口
* 支持自助签约采集接口 [点击查看文档](/src/Service/Contract/README.md)
* 如想申请更低费率请联系微信：itinymeng 

# 银联商务、微信支付、支付宝支付、云闪付

###  payment_method 支付方式

| 常量名      | 描述     |
|----------|--------|
| chinaums | 银联商务   |
| alipay   | 支付宝    |
| wechat   | 微信     |
| unionpay | 银联云闪付  |

支付目前直接内置支持以下快捷方式支付方法，对应的支付 method 如下：

| 支付方式<br/>payment_method | 支付类型<br/>method |      说明      |      参数      |    返回值     |
|:-----------------------:|:----------:|:------------:|:------------:|:----------:|
|          银联商务           |    scan    | 扫码支付（C扫B 主扫） | array $order |   array    |
|          银联商务           |    pos     | 刷卡支付（B扫C 被扫） | array $order | array |
|      微信、支付宝、银联云闪付       |     mp     |    公众号支付     | array $order | array |
|      微信、支付宝、银联云闪付       |     h5     |    H5 支付     | array $order | array |
|      微信、支付宝、银联云闪付       |    app     |    APP 支付    | array $order | array |
|      微信、支付宝、银联云闪付       |    mini    |    小程序支付     | array $order | array |

使用事例
```
$paymentMethod = 'wechat'; //微信支付
$method = 'mini'; // 小程序支付

$config = []; //配置文件
$data = []; //支付参数
$app = Factory::$paymentMethod($config)->$method();
$response = $app->request($data);
```

## 运行要求
* PHP 7.0版本以上

## 安装
```shell
composer require tinymeng/chinaums -vvv
```
## 使用示例
更多示例可查看[example](example/Wechat/)目录下的文件

```php
<?php
include_once '../../vendor/autoload.php';

use tinymeng\Chinaums\Factory;

date_default_timezone_set('PRC');

$config = [
    'mid' => '89********5678',// 商户号
    'tid' => '88*****01',// 终端号
    'appid' => '10037e************a5e5a0006',// 加密 APPID
    'appkey' => '1c4e3****************9e5b312e8',// 加密 KEY
    'md5key' => 'impARTx**************aKXDhCaTCXJ6'// 回调验证需要的md5key
];

$data = [];
// 报文请求时间
$data['requestTimestamp'] = date("YmdHis", time());
// 订单号
$data['merOrderId'] = time() . uniqid();
// 业务类型 机构商户号 MINIDEFAULT|QRPAYDEFAULT|YUEDANDEFAULT
$data['instMid'] = 'MINIDEFAULT';
 // 订单描述 展示在支付截图中
$data['orderDesc'] = '账单描述';
// 支付总金额
$data['totalAmount'] = 2; 
// 微信必填
$data['subAppId'] = 'wx0bd72821b0cxxxxx';  
// 微信必填  前端获取用户的openid 传给后台
$data['subOpenId'] = 'o4Sic5HPuB3j-LmnQTVIC4xxxxx';

$app = Factory::wechat($config)->mini();
$response = $app->request($data);
echo 'response:' . $response . PHP_EOL;


```

#### 订单配置参数
所有订单配置中，客观参数均不用配置，扩展包已经为大家自动处理了，比如，appid，sign 等参数，大家只需传入订单类主观参数即可。

所有订单配置参数和官方无任何差别，兼容所有功能，所有参数请参考以下文档

## 文档
[点击查看银联商务官方文档](https://open.chinaums.com/resources/?code=651539656974952&url=b7abc3a6-0c49-43d4-ad7d-f6dd16ff35eb)


