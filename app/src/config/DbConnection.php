<?php

namespace m2i\ecommerce\Config;

class DbConnection
{
    /**
     * @var \PDO
     */
    private static $pdoInstance;

    public static function getPDO(){
        if( ! isset(self::$pdoInstance)){
           self::$pdoInstance = new \PDO(
               DSN,
                DB_USER,
               DB_PASS,
               [\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION]
           );
        }

        return self::$pdoInstance;
    }
}