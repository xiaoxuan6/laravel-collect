<?php

namespace Tests;

use Illuminate\Database\Eloquent\Model;
use Vinhson\LaravelCollect\Traits\Collectable;

class Good extends Model
{
    use Collectable;

    protected $guarded = [];
}
