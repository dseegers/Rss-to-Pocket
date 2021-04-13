<?php

namespace Dseegers\Agent;

use Dseegers\Config\PocketConfig;
use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;

class PocketAgent
{
    private $token;
    private $redirectUri;

    private function setToken($token): void
    {
        $this->token = $token;
    }

    private function setRedirectUri($redirectUri): void
    {
        $this->redirectUri = $redirectUri;
    }

    private function getRedirectUri(): string
    {
        return $this->redirectUri;
    }

    private function getToken(): string
    {
        return $this->token;
    }

    public function handleCallBack()
    {
        $hello = \Flight::request();

    }

    public function authenticate(): string
    {
        $consumerKey = PocketConfig::getConsumerKey();
        $authUri = 'http://localhost:1234/callback';

        $client = new Client();
        $res = $client->request('POST', 'https://getpocket.com/v3/oauth/request', [
            RequestOptions::JSON =>
                [
                    'consumer_key' => $consumerKey,
                    'redirect_uri' => $authUri,
                    'content-type' => 'application/json'
                ]]);

        $token = $res->getBody()->getContents();

        $token = str_replace('code=', "", $token);
        $cacheAgent = new CacheAgent();

        $cacheAgent->save('token', $token);

        return 'https://getpocket.com/auth/authorize?request_token=' . $token . '&redirect_uri=' . $authUri;

    }


    public function pushNewToPocket($collectionOrReturnFeedsValueObjects)
    {


    }
}