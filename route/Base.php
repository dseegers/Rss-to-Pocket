<?php

namespace Dseegers\Route;

use Dseegers\Agent\CacheAgent;
use Dseegers\Agent\PocketAgent;

class Base
{
    public static function registerRoutes()
    {
        $cacheAgent = new CacheAgent();
        $cacheAgent->save('aa', 'dasasdsdsa');

        $pocketAgent = new PocketAgent();

        \Flight::route('/auth', function () use ($pocketAgent) {
            echo $pocketAgent->authenticate();
        });

        \Flight::route('/callback', function () use ($pocketAgent) {
            $pocketAgent = new PocketAgent();
            echo $pocketAgent->handleCallBack();
        });

        \Flight::start();
    }

}