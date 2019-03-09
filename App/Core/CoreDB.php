<?php
namespace App\Core;

use \Illuminate\Database\Capsule\Manager as Capsule;

class CoreDB
{
    protected static $capsule;
    /**
     * @param mixed $config
     */
    public static function init($config)
    {
        if (!self::$capsule) {
            self::$capsule = new Capsule;
            self::$capsule->addConnection($config);
        }
        self::$capsule->setAsGlobal();
        self::$capsule->bootEloquent();
    }
}
