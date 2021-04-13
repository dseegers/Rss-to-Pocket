<?php

namespace Dseegers\Agent;

class CacheAgent
{
    public function __construct()
    {
        $this->cacheDriver = new \Doctrine\Common\Cache\PhpFileCache(
            dirname(__FILE__) . '/../cache'
        );
    }

    public function save($id, $data)
    {
        return $this->cacheDriver->save($id, $data);
    }

    public function get($id)
    {
        return $this->cacheDriver->fetch($id);
    }

}