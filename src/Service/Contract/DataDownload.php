<?php

namespace tinymeng\Chinaums\Service\Contract;

use tinymeng\Chinaums\Service\Contract\Base;
use tinymeng\Chinaums\Tools\DES;
use Exception;

/**
 * 省市区行业数据下载接口
 */
class DataDownload extends Base
{
    /**
     * @var string 接口地址
     */
    protected $api = '/self-contract-nmrs/interface/autoReg';
    /**
     * @var array $body 请求参数
     */
    protected $body = [
        'service' => 'data_download',
        'sign_type' => 'SHA-256',
    ];
    /**
     * 必传的值
     * @var array
     */
    protected $require = ['service', 'accesser_id', 'sign_type', 'request_date', 'request_seq', 'data_type'];

    /**
     * @return false|mixed|string
     */
    public function request()
    {
        $data = $this->params;
        $data['accesser_id'] = $this->config['accesser_id'];
        $key = $this->config['private_key'];
        if ($data) {
            $this->body = array_merge($this->body, $data);
        }
        try {
            $this->validate();
            $data = $this->body;
            $gateway  = $this->config['gateway'] . $this->api;
            $data = json_encode($data);
            $sign = hash('sha256', $data);
            $method = $this->method;
            $des = new DES($key, $method, DES::OUTPUT_HEX);
            // 加密
            $str = $des->encrypt($data);
            $url = $gateway . '?sign_data=' . $sign . '&json_data=' . $str . '&accesser_id=' . $this->config['accesser_id'];
            return json_encode(['res_code' => '0000', 'res_msg' => 'success', 'url' => $url], JSON_UNESCAPED_SLASHES);
        } catch (Exception $e) {
            return json_encode(['res_code' => -1, 'res_msg' => $e->getMessage(), 'request_seq' => null]);
        }
    }
}
