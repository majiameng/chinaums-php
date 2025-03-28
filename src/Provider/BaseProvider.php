<?php

namespace tinymeng\Chinaums\Provider;

use tinymeng\Chinaums\Exception\TException;
use tinymeng\Chinaums\Interfaces\ProviderInterface;
use tinymeng\Chinaums\Tools\Str;
use tinymeng\Chinaums\Tools\Verify;

/**
 * BaseProvider
 */
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
    public function __call(string $shortcut, array $params=[])
    {
        $class = str_replace('Provider','Service',static::class).'\\' . Str::studly($shortcut);
        if(!class_exists($class)){
            throw new TException("Chinaums:{$class}类不存在");
        }

        return new $class($this->config,$params[0]??[]);
    }

    /**
     * @param $contents
     * @return bool
     */
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

    /**
     * @return string
     */
    public function success()
    {
        return 'SUCCESS';
    }
}
