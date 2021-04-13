<?php

namespace Dseegers\ValueObjects;

class FeedReturn
{

    private $content;
    private $link;
    private $title;

    public function setContent($content)
    {
        $this->content = $content;
    }

    public function setLink($link)
    {
        $this->link = $link;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function getContent()
    {
        return $this->content;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getLink()
    {
        return $this->link;
    }

}

