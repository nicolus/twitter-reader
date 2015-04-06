<?php
namespace TwitterClient;

use GuzzleHttp\Client;
use GuzzleHttp\Subscriber\Oauth\Oauth1;

class TwitterClient
{

    protected $client;

    public function __construct ($credentials){
        $this->client = new Client(['base_url' => 'https://api.twitter.com/1.1/', 'defaults' => ['auth' => 'oauth']]);
        $oauth = new Oauth1($credentials);
        $this->client->getEmitter()->attach($oauth);
    }

    public function getTweetsByUser($user){
        $res = $this->client->get('statuses/user_timeline.json', [
            'query' => ['screen_name' => $user]
        ]);

        return $res->json();
    }

}

