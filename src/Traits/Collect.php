<?php
/**
 * Created by PhpStorm.
 * User: james.xue
 * Date: 2020/10/12
 * Time: 17:27
 */

namespace Vinhson\LaravelCollect\Traits;

use InvalidArgumentException;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redis;

trait Collect
{
    use Able;

    public static $message;

    static public function setMessage($message)
    {
        self::$message = $message;
    }

    static public function getMessage()
    {
        return self::$message;
    }

    protected function userId()
    {
        return Auth::guard(config("collect.auth.guard"))->id() ?? 0;
    }

    public function collect(Model $model)
    {
        if (config("collect.is_user_redis")) {
            if (!Redis::set(config("collect.redis_prefix") . $this->userId() . '_' . $model->getKey(), 1, 'ex', config("collect.lock_time"), 'nx')) {
                self::setMessage('操作过于频繁，稍后再试！');
                return false;
            }
        }

        if ($this->hasCollected($model)) {
            self::setMessage('请勿重复收藏！');
            return false;
        } else {
            if (!method_exists($model, "collects")) {
                throw new InvalidArgumentException("Class {$model->getMorphClass()} not Use Collectable Trait!");
            }

            return $model->collects()->create([
                config("collect.user_foreign_key") => $this->userId()
            ]);
        }
    }

    public function unCollect(Model $model)
    {
        return $this->collects()
            ->where("collectable_id", $model->getKey())
            ->where("collectable_type", $model->getMorphClass())
            ->delete();
    }

    public function toggleCollect(Model $model)
    {
        return $this->hasCollected($model) ? $this->unCollect($model) : $this->collect($model);
    }

    public function hasCollected(Model $model)
    {
        $object = $this->relation($model);

        return $object->where("collectable_id", $model->getKey())
                ->where("collectable_type", $model->getMorphClass())
                ->where(config('collect.user_foreign_key'), $this->userId())
                ->count() > 0;
    }

    public function collects()
    {
        return $this->hasMany(config("collect.collect_model"), config('collect.user_foreign_key'), $this->getKeyName());
    }
}