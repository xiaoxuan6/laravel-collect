# laravel-collect

[![Latest Stable Version](https://poser.pugx.org/james.xue/laravel-collect/v/stable.svg)](https://packagist.org/packages/james.xue/laravel-collect) 
[![Total Downloads](https://poser.pugx.org/james.xue/laravel-collect/downloads.svg)](https://packagist.org/packages/james.xue/laravel-collect) 
[![Latest Unstable Version](https://poser.pugx.org/james.xue/laravel-collect/v/unstable.svg)](https://packagist.org/packages/james.xue/laravel-collect) 
[![License](https://poser.pugx.org/james.xue/laravel-collect/license.svg)](https://packagist.org/packages/james.xue/laravel-collect)

## Install

```shell
composer require "james.xue/laravel-collect"

php artisan vendor:publish --tag=collect
```

## Usage
### Traits
```php
Vinhson\LaravelCollect\Traits\Collect
```
```php
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Vinhson\LaravelCollect\Traits\Collect;

class Oauth extends Authenticatable
{
    use Notifiable, Collect;

    protected $guarded = [];

}
```
```php
Vinhson\LaravelCollect\Traits\Collectable
```
```php
use Illuminate\Database\Eloquent\Model;
use Vinhson\LaravelCollect\Traits\Collectable;

class Good extends Model
{
    use Collectable;

    protected $guarded = [];
}
```
### Api
[laravel-collect/api](https://github.com/xiaoxuan6/laravel-collect/blob/master/tests/TestController.php)

### About 
`xiaoxuan6/laravel-collect` specific configuration and use, refer to: [xiaoxuan6/laravel-collect](https://github.com/xiaoxuan6/laravel-collect)

## License

MIT
