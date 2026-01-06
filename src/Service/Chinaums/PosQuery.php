<?php

namespace tinymeng\Chinaums\Service\Chinaums;

use Exception;
use tinymeng\Chinaums\Exception\TException;
use tinymeng\Chinaums\Service\Common\Base;
use tinymeng\Chinaums\Tools\Http;

/**
 * B扫C支付（被扫）- 交易状态查询
 * 接口文档：https://open.chinaums.com/saas-doc/openplate/poslink/poslink-v6/transaction-v6/
 */
class PosQuery extends Base
{
    protected $gateway_type = 'wh_open';
    
    /**
     * @var string 接口地址
     */
    protected $api = '/v6/poslink/transaction/query';
    
    /**
     * @var array $body 请求参数
     */
    protected $body = [];
    
    /**
     * 必传的值
     * @var array
     */
    protected $require = ['merchantCode', 'terminalCode'];

    /**
     * 重写 request 方法，复用父类逻辑，仅调整数据加载部分以适配银联商务参数
     * @return false|mixed|string
     */
    public function request($params = [])
    {
        if(!empty($params)){
            $this->params = $params;
        }

        try {
            // 使用银联商务的参数格式加载数据
            $data = $this->loadChinaumsData();
            $sign = $this->generateSign($data);
            $gateway  = $this->gateway . $this->api;

            if ('cli' == php_sapi_name()) {
                echo 'api:' . $gateway . PHP_EOL;
                echo 'request:' . $data . PHP_EOL;
            }
            $headers = [
                'Content-Type: application/json',
                'Content-Length: ' . strlen($data),
                'Authorization: ' . $sign
            ];
            $options = [
                CURLOPT_HTTPHEADER => $headers,
                CURLOPT_TIMEOUT => 60,
                CURLOPT_CONNECTTIMEOUT => 30
            ];
            $response = Http::post($gateway, $data, $options);
            return $response;
        } catch (Exception $e) {
            if ('cli' == php_sapi_name()) {
                echo $e->getMessage() . PHP_EOL;
            }
            throw new TException("Chinaums request error:".$e->getMessage());
        }
    }

    /**
     * 加载银联商务 API 数据（使用 merchantCode 和 terminalCode）
     * @return false|string
     * @throws Exception
     */
    private function loadChinaumsData()
    {
        $data = $this->params;
        // 银联商务使用 merchantCode 和 terminalCode，而不是 mid 和 tid
        if (!isset($data['merchantCode']) && isset($this->config['mid'])) {
            $data['merchantCode'] = $this->config['mid'];
        }
        if (!isset($data['terminalCode']) && isset($this->config['tid'])) {
            $data['terminalCode'] = $this->config['tid'];
        }
        if ($data) {
            $this->body = array_merge($this->body, $data);
        }
        $this->validate();
        $data = $this->body;
        $data = json_encode($data);
        return $data;
    }
}

