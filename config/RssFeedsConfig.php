<?php

namespace Dseegers\Config;

use Dseegers\ValueObjects\Feed;

class RssFeedsConfig
{
    private static $feeds =
        [
            [
                'url' => 'https://stitcher.io/rss',
                'type' => 'atom'
            ]
        ];

    public static function getFeeds()
    {
        foreach (self::$feeds as $feed) {
            $feedOv = new Feed();
            $feedOv->setUrl($feed['url']);
            $feedOv->isType($feed['type']);
            $feedOvs[] = $feedOv;
            $feedOv = null;
        }

        return $feedOvs;
    }
}