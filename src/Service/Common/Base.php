<?php

namespace tinymeng\Chinaums\Service\Common;

use Exception;
use tinymeng\Chinaums\Tools\Http;
use tinymeng\tools\FileTool;

class Base
{
    /**
     * @var array $config 网关
     */
    protected $config = [];

    protected $gateway;
    protected $gateway_type = 'default';

    /**
     * @var string 接口地址
     */
    protected $api;
    /**
     * @var array $body 请求参数
     */
    protected $body;
    /**
     * 必传的值
     * @var array
     */
    protected $require = [];

    /**
     * @param $config
     */
    public function __construct($config=[])
    {
        if(!empty($config)){
            $this->config = $config;
            $this->loadConfigGateway();
        }
    }

    /**
     * 加载多网关
     * @return Base
     */
    private function loadConfigGateway()
    {
        $gateway = $this->config['gateway'];// 正式环境
        if($this->config['sandbox'] === false){
            $this->gateway = isset($gateway[$this->gateway_type]) ? $gateway[$this->gateway_type] : $gateway['default'];// 沙箱环境
        }else{
            $this->gateway = $gateway['sandbox'];// 沙箱环境
        }

        return $this;
    }

    /**
     * @param $data
     * @return string
     * @throws Exception
     */
    private function loadData($data)
    {
        $data['mid'] = $this->config['mid'];
        $data['tid'] = $this->config['tid'];
        if ($data) {
            $this->body = array_merge($this->body, $data);
        }
        $this->validate();
        $data = $this->body;
        return json_encode($data);
    }

    /**
     * @param array $data
     * @return false|mixed|string
     */
    public function request(array $data = [])
    {
        try {
            $data = $this->loadData($data);
            $sign = $this->generateSign($data);
            $gateway  = $this->gateway . $this->api;

            if ('cli' == php_sapi_name()) {
                echo 'api:' . $gateway . PHP_EOL;
                echo 'request:' . $data . PHP_EOL;
            }
            $this->writeLog('api:' . $gateway);
            $this->writeLog('request:' . $data);

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
            $this->writeLog('response:' . $response);
            return $response;
        } catch (Exception $e) {
            return json_encode(['errCode' => -1, 'errMsg' => $e->getMessage(), 'responseTimestamp' => null]);
        }
    }

    /**
     * @param array $data
     * @return string
     * @throws Exception
     */
    public function formRequest(array $data = [])
    {
        try {
            $data = $this->loadData($data);
            $params = $this->generateSign($data,true);
            $gateway  = $this->gateway . $this->api;

            $data = json_encode($data);
            if ('cli' == php_sapi_name()) {
                echo 'api:' . $gateway . PHP_EOL;
                echo 'request:' . $data . PHP_EOL;
            }
            $this->writeLog('api:' . $gateway);
            $this->writeLog('request:' . $data);

            $options = [
                CURLOPT_TIMEOUT => 60,
                CURLOPT_CONNECTTIMEOUT => 30
            ];
            $response = Http::get($gateway,$params,$options);
            $this->writeLog('response:' . $response);
            return $response;
        } catch (Exception $e) {
            return json_encode(['errCode' => -1, 'errMsg' => $e->getMessage(), 'responseTimestamp' => null]);
        }
    }

    /**
     * @param $config
     * @return $this
     */
    public function setConfig($config)
    {
        $this->config = $config;
        $this->loadConfigGateway();
        return $this;
    }

    /**
     * @param $value
     * @return $this
     */
    public function setBody($value)
    {
        $this->body = array_merge($this->body, $value);
        return $this;
    }

    /**
     * @return true
     * @throws Exception
     */
    protected function validate()
    {
        $require = $this->require;
        $key = array_keys($this->body);
        foreach ($require as $v) {
            if (!in_array($v, $key)) {
                throw new Exception($v . ' is require！！');
            }
        }
        return true;
    }

    /**
     * 根绝类型生成sign
     * @param $body
     * @param bool $openForm
     * @return string|array
     */
    public function generateSign($body,$openForm=false)
    {
        $body = (!is_string($body)) ? json_encode($body) : $body;
        $appid = $this->config['appid'];
        $appkey = $this->config['appkey'];
        $timestamp = date("YmdHis", time());
        $nonce = md5(uniqid(microtime(true), true));
        $str = bin2hex(hash('sha256', $body, true));
        $signature = base64_encode(hash_hmac('sha256', "$appid$timestamp$nonce$str", $appkey, true));
        $authorization = "OPEN-BODY-SIG AppId=\"$appid\", Timestamp=\"$timestamp\", Nonce=\"$nonce\", Signature=\"$signature\"";
        if($openForm){
            return [
                'appId'=>$appid,
                'timestamp'=>$timestamp,
                'nonce'=>$nonce,
                'content'=>$body,
                'signature'=>$signature,
                'authorization'=>'OPEN-FORM-PARAM',
            ];
        }
        return $authorization;
    }

    /**
     * @param $name
     * @param $value
     * @return void
     */
    public function __set($name, $value)
    {
        $this->body[$name] = $value;
    }

    /**
     * @param $message
     * @return void
     */
    public function writeLog($message,$fileName='chinaums')
    {
        FileTool::writeLog($message,$fileName);
    }
}
