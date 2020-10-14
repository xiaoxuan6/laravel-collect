<?php
/**
 * Created by PhpStorm.
 * User: james.xue
 * Date: 2020/10/12
 * Time: 17:03
 */

namespace Vinhson\LaravelCollect;

use Illuminate\Database\Eloquent\Model;

class Collect extends Model
{
    protected $guarded = [];

    public function __construct(array $attributes = [])
    {
        $this->setTable(config('collect.collect_table'));
        parent::__construct($attributes);
    }

    public function collectable()
    {
        return $this->morphTo();
    }

}