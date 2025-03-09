<?php
namespace tinymeng\Chinaums;

define('CHINAUMS_ROOT_PATH', dirname(__DIR__));
use Exception;
use tinymeng\tools\StringTool;

class Factory
{

    /**
     * @var array $config
     */
    protected static $config;

    /**
     * @param $gateway
     * @param $config
     * @return mixed
     * @throws Exception
     */
    public static function init($gateway, $config=[])
    {
        $gateway = StringTool::uFirst($gateway);
        $class = __NAMESPACE__ . '\\Provider\\' . $gateway;
        if (class_exists($class)) {
            if(empty(self::$config)) self::config($config);
            $objcet = new $class(self::$config);
            return $objcet;
        } else {
            throw new Exception("err:{$class}类不存在");
        }
    }

    /**
     * @param $config
     * @return false|void
     */
    public static function config($config)
    {
        $configFile = CHINAUMS_ROOT_PATH."/config/chinaums.php";
        if (!file_exists($configFile)) {
            return false;
        }
        $baseConfig = require $configFile;
        self::$config = array_replace_recursive($baseConfig,$config);
    }

    /**
     * @param $gateway
     * @param $config
     * @return mixed
     * @throws Exception
     */
    public static function __callStatic($gateway, $config=[])
    {
        return self::init($gateway, ...$config);
    }
}
