<?php

class Db
{
    private static $inst = null;

    static function getInstance()
    {
        if ( !isset($inst) )
        {
            self::$inst = new PDO(
                'mysql:host='.__DB_HOST__.';dbname='.__DB_SCHEMA__,
                __DB_USER__,
                __DB_PASSWORD__
            );
            self::$inst->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }

        return self::$inst;
    }
}