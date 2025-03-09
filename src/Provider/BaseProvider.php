<?php

namespace tinymeng\Chinaums\Provider;

use tinymeng\Chinaums\Interfaces\ProviderInterface;
use tinymeng\Chinaums\Tools\Str;
use tinymeng\Chinaums\Tools\Verify;

use Exception;

class BaseProvider implements ProviderInterface
{
    protected $config = [];
    public function __construct($config)
    {
        $this->config = $config;
    }

    /**
     * @param string $shortcut
     * @param array $params
     * @return mixed
     */
    public function __call(string $shortcut, array $params)
    {
        $class = '\\tinymeng\\Chinaums\\Service\\'.__CLASS__.'\\' . Str::studly($shortcut);
        $service = new $class();
        $service->setConfig($this->config);
        return $service;
    }


    public function pay($order)
    {
        return $this->__call('Mini', [])->request($order);
    }

    public function find($order)
    {
        return $this->__call('Query', [])->request($order);
    }

    public function cancel($order)
    {
        throw new Exception("Wechat does not support cancel api");
    }

    public function close($order)
    {
        return $this->__call('Close', [])->request($order);
    }

    public function refund($order)
    {
        return $this->__call('Refund', [])->request($order);
    }

    public function callback($contents)
    {
        $params = array_map(function ($value) {
            return urldecode($value);
        }, $contents);
        $md5Key = $this->config['md5key'];
        $sign = Verify::makeSign($md5Key, $params);
        $notifySign = array_key_exists('sign', $params) ? $params['sign'] : '';
        if (strcmp($sign, $notifySign) == 0) {
            return true;
        }
        return false;
    }

    public function success()
    {
        return 'SUCCESS';
    }
}
