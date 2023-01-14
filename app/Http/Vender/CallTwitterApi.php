<?php

namespace App\Http\Vender;

use Illuminate\Http\Request;
use Abraham\TwitterOAuth\TwitterOAuth;
use DateTime;
use DateTimeZone;
use Exception;

class callTwitterApi
{
    
    private $t;
    
    public function __construct()
    {
        $this->t = new TwitterOAuth(
            config('twitter.twitter_client_id',''),
            config('twitter.twitter_client_secret',''),
            config('twitter.twitter_client_id_access_token',''),
            config('twitter.twitter_client_id_access_token_secret',''));
    }
    
    // ツイート検索
    public function serachTweets(String $searchWord)
    {
        $d = $this->t->get("search/tweets", [
            'q' => $searchWord,
            'count' => 3,
         ]);
        
        return $d->statuses;
    }
}