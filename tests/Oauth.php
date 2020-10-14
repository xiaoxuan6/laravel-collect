<?php

namespace Tests;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Vinhson\LaravelCollect\Traits\Collect;

class Oauth extends Authenticatable
{
    use Notifiable, Collect;

    protected $guarded = [];

}
