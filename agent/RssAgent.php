<?php

namespace Dseegers\Agent;

use Dseegers\Config\RssFeedsConfig;
use Dseegers\ValueObjects\Feed;
use Dseegers\ValueObjects\FeedReturn;


class RssAgent
{
    public static function runRssAgentsBasedOnConfigFile()
    {
        $feeds = RssFeedsConfig::getFeeds();

        $collectionOrReturnFeedsValueObjects = [];

        foreach ($feeds as $feed) {
            $collectionOrReturnFeedsValueObjects[] = self::fetch($feed);
        }

       $pocketAgent =  new PocketAgent();
//var_dump( $pocketAgent->authenticate());

    }

    private static function fetch(Feed $feed)
    {
        if ($feed->isAtom()) {
            $atomFeed = \Feed::loadAtom($feed->getUrl());
            $atomArray = $atomFeed->toArray()['entry'];
            $collectionOfReturnFeeds = [];
            foreach ($atomArray as $item) {
                $feedReturn = new FeedReturn();
                $feedReturn->setTitle($item['title']);
                $feedReturn->setLink($item['id']);
                $collectionOfReturnFeeds[] = $feedReturn;
            }

            return $collectionOfReturnFeeds;
        }
    }
}