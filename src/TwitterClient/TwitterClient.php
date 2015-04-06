<?php
namespace TwitterClient;

use GuzzleHttp\Client;
use GuzzleHttp\Subscriber\Oauth\Oauth1;

class TwitterClient
{

    protected $client;

    public function __construct ($credentials){
        $client = new Client(['base_url' => 'https://api.twitter.com', 'defaults' => ['auth' => 'oauth']]);
        $oauth = new Oauth1($credentials);
        $client->getEmitter()->attach($oauth);
    }

}

