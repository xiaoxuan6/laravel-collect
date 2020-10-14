<?php
/**
 * Created by PhpStorm.
 * User: james.xue
 * Date: 2020/10/12
 * Time: 18:46
 */

namespace Vinhson\LaravelCollect\Traits;

use Illuminate\Database\Eloquent\Model;

trait Able
{
    protected function relation(Model $model)
    {
        return $model->relationLoaded("collects") ? $model->collects : $model->collects();
    }
}