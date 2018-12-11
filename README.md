# Sluggable

This is a very small trait. It is an elegant wrapper of [cviebrock/eloquent-sluggable](https://github.com/cviebrock/eloquent-sluggable).

It defines a default slug source attribute (`title`) and adds a scope to find a model by the slug.

## Installation

You can install the package via composer:

```bash
composer require pawelmysior/laravel-sluggable
```

## Preparation

Use the trait on the model:

```php
<?php
 
namespace App;
  
use Illuminate\Database\Eloquent\Model;
use PawelMysior\Sluggable\Sluggable;
 
class Post extends Model
{
    use Sluggable;
}
```

By default the slug is created from the `title` attribute, but you can easily change it by overwriting the `getSlugSourceAttribute()` method from the trait on your model like so:

```php
<?php
 
namespace App;
  
use Illuminate\Database\Eloquent\Model;
use PawelMysior\Sluggable\Sluggable;
 
class Post extends Model
{
    use Sluggable;

    protected function getSlugSourceAttribute(): string
    {
        return $this->name;
    }
}
```

## Usage

The slugs will now be created. There is also a scope defined in the trait that lets you find a post by slug:

```php
Post::findBySlug('slug');
```

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
