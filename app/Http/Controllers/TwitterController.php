<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Vender\CallTwitterApi;

class TwitterController extends Controller
{
    // 投稿
    public function index(Request $request)
    {
        $t = new CallTwitterApi();
        $d = $t->serachTweets("おはよう");
        return view('twitters/twitter', ['twitter' => $d]);
    }
}