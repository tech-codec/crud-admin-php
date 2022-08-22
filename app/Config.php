<?php

namespace App;

class Config
{
    private $settings = [];

    private static $_instance;

    public static function getInstance($file)
    {
        if (is_null(self::$_instance)) {
            self::$_instance = new Config($file);
        }
        return self::$_instance;
    }

    public function __construct($file)
    {
        $this->settings = require($file); //dirname(__DIR__) . '/config/config.php';
    }

    public function get($key)
    {
        if (!isset($key)) {
            return null;
        }
        return $this->settings[$key];
    }
}
