<?php

namespace Dseegers\Config;

class PocketConfig
{
    private static $consumerKey = 'xxxxx';

    public static function getConsumerKey(): string
    {
        return self::$consumerKey;
    }

}