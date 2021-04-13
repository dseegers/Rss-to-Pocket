<?php

namespace Dseegers\RrsToPocket;

use Dseegers\Agent\RssAgent;
use Dseegers\Route\Base;

class Bootloader
{
    public static function boot()
    {
        Base::registerRoutes();
        RssAgent::runRssAgentsBasedOnConfigFile();
    }
}