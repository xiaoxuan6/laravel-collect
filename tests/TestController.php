<?php
/**
 * Created by PhpStorm.
 * User: james.xue
 * Date: 2020/10/13
 * Time: 11:05
 */

namespace Tests;

use App\Http\Controllers\Controller;

class TestController extends Controller
{
    public function test_collect()
    {
        if(!$result = (new Oauth())->collect(Good::query()->firstOrFail())) {
            dd(Oauth::getMessage());
        }
        dd($result);
    }

    public function test_unCollect()
    {
        dd($result = Oauth::query()->whereKey(2)->firstOrFail()->unCollect(Good::query()->firstOrFail()));
    }

    public function test_toggleCollect()
    {
        dd($result = Oauth::query()->whereKey(2)->firstOrFail()->toggleCollect(Good::query()->firstOrFail()));
    }

    public function test_collects()
    {
        dd($result = Oauth::query()->whereKey(2)->firstOrFail()->collects()->get()->toArray());
    }

    public function test_collects_count()
    {
        dd($result = Oauth::query()->whereKey(2)->firstOrFail()->collects()->count());
    }

    public function test_isCollectByUser()
    {
        dd(Good::query()->firstOrFail()->isCollectByUser(Oauth::query()->findOrFail(2)));
        // or
        dd(Good::query()->firstOrFail()->isCollectByUser(\Auth::guard()->user()));
    }

    public function test_collecters()
    {
        dd(Good::query()->firstOrFail()->collecters());
    }
}