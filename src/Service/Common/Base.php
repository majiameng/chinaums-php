<?php

namespace tinymeng\Chinaums\Service\Common;

use Exception;
use tinymeng\Chinaums\Exception\TException;
use tinymeng\Chinaums\Tools\Http;
use tinymeng\tools\FileTool;

/**
 * Base
 * @method static \tinymeng\Chinaums\Service\Common\Base request(array $params) 创建请求
 */
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
     * 代码传输过来的请求参数
     * @var
     */
    protected $params;
    /**
     * 必传的值
     * @var array
     */
    protected $require = [];

    /**
     * @param $config
     * @param $params
     */
    public function __construct($config=[],$params=[])
    {
        if(!empty($config)){
            $this->config = $config;
            $this->loadConfigGateway();
        }
        $this->params = $params;
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
     * @return false|string
     * @throws Exception
     */
    private function loadData()
    {
        $data = $this->params;
        $data['mid'] = $this->config['mid'];
        $data['tid'] = $this->config['tid'];
        $data['requestTimestamp'] = date("YmdHis", time());
        if ($data) {
            $this->body = array_merge($this->body, $data);
        }
        $this->validate();
        $data = $this->body;
        $data = json_encode($data);
        return $data;
    }

    /**
     * @return false|mixed|string
     */
    public function request($params = [])
    {
        if(!empty($params)){
            $this->params = $params;
        }

        try {
            $data = $this->loadData();
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
            $this->writeLog('Request url:'.$gateway.PHP_EOL.'params:'.json_encode($data).PHP_EOL.'options:'.json_encode($options).PHP_EOL.'response'.$response);
            return $response;
        } catch (Exception $e) {
            if ('cli' == php_sapi_name()) {
                echo $e->getMessage() . PHP_EOL;
            }
            throw new TException("Chinaums request error:".$e->getMessage());
        }
    }

    /**
     * @return string
     */
    public function formRequest()
    {
        try {
            $data = $this->loadData();
            $params = $this->generateSign($data,true);
            $gateway  = $this->gateway . $this->api;

            $data = json_encode($data);
            if ('cli' == php_sapi_name()) {
                echo 'api:' . $gateway . PHP_EOL;
                echo 'request:' . $data . PHP_EOL;
            }

            $options = [
                CURLOPT_TIMEOUT => 60,
                CURLOPT_CONNECTTIMEOUT => 30
            ];
            $response = Http::get($gateway,$params,$options);
            $this->writeLog('formRequest url:'.$gateway.PHP_EOL.'params:'.json_encode($data).PHP_EOL.'options:'.json_encode($options).PHP_EOL.'response'.$response);
            return $response;
        } catch (Exception $e) {
            throw new TException("Chinaums formRequest error:".$e->getMessage());
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
     * @param $params
     * @param string $signType
     * @return string
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
            $params = [
                'appId'=>$appid,
                'timestamp'=>$timestamp,
                'nonce'=>$nonce,
                'content'=>$body,
                'signature'=>$signature,
                'authorization'=>'OPEN-FORM-PARAM',
            ];
            return $params;
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
     * @param $file_name
     * @return void
     */
    private function writeLog($message,$file_name = 'chinaums')
    {
        FileTool::writeLog($message,$file_name);
    }
}
