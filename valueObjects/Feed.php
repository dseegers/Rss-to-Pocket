<?php

namespace Dseegers\ValueObjects;

class Feed
{

    private $url;
    private $type = 'rss';

    public function setUrl($url)
    {
        $this->url = $url;
    }

    public function isAtom(): bool
    {
      return  $this->type === 'atom';
    }

    public function getUrl()
    {
        return $this->url;
    }

    public function isType($type)
    {
        $this->type = $type;
    }

    public function getType()
    {
        return $this->type;
    }


}

