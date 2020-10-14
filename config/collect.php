<?php
/**
 * Created by PhpStorm.
 * User: james.xue
 * Date: 2020/10/12
 * Time: 17:05
 */

return [
    /**
     *  Auth
     */
    "auth"             => [
        "guard"      => config("auth.defaults.guard"),
        "users_model" => config('auth.providers.users.model')
    ],

    /*
     * Set redis prefix
     */
    "redis_prefix"     => 'collect:',

    /*
     * Is user redis lock
     */
    "is_user_redis"    => false,

    /*
     * set lock time(s)
     */
    "lock_time"        => 2,

    /*
     * User tables foreign key name.
     */
    "user_foreign_key" => "user_id",

    /*
     * Table name for collects records.
     */
    "collect_table"    => "collects",

    /*
     * Model name for collect record.
     */
    'collect_model'    => \Vinhson\LaravelCollect\Collect::class,
];