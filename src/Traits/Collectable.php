<?php
/**
 * Created by PhpStorm.
 * User: james.xue
 * Date: 2020/10/12
 * Time: 18:37
 */

namespace Vinhson\LaravelCollect\Traits;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

trait Collectable
{
    use Able;

    public function collects()
    {
        return $this->morphMany(config("collect.collect_model"), 'collectable');
    }

    public function isCollectByUser($model)
    {
        if (($model instanceof Authenticatable) && !($model instanceof Model)) {
            $model = app(config("collect.auth.users_model"))->whereKey($model->id)->firstOrFail();
        }

        return $this->relation($model)
                ->where("collectable_id", $this->getKey())
                ->where("collectable_type", $this->getMorphClass())
                ->where(config('collect.user_foreign_key'), $model->getKey())
                ->count() > 0;
    }

    public function collecters()
    {
        return $this->belongsToMany(
            config("collect.auth.users_model"),
            config('collect.collect_table'),
            'collectable_id',
            config('collect.user_foreign_key')
        )
            ->where('collectable_type', $this->getMorphClass())
            ->get();
    }
}