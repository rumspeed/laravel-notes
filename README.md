# Laravel Notes
[![Latest Version on Packagist](https://img.shields.io/packagist/v/rumspeed/laravel-notes.svg?style=flat-square)](https://packagist.org/packages/rumspeed/laravel-notes)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/rumspeed/laravel-notes/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/rumspeed/laravel-notes/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/rumspeed/laravel-notes/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/rumspeed/laravel-notes/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/rumspeed/laravel-notes.svg?style=flat-square)](https://packagist.org/packages/rumspeed/laravel-notes)

Easily add notes to your Eloquent models.

## Installation

You can install the package via composer:

```bash
composer require rumspeed/laravel-notes
```

You can publish and run the migrations with:

```bash
php artisan vendor:publish --tag="notes-migrations"
php artisan migrate
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="notes-config"
```

This is the contents of the published config file:

```php
return [

    /* -----------------------------------------------------------------
     |  Models
     | -----------------------------------------------------------------
     */

    'authors' => [
        'table' => 'users',
        'model' => App\Models\User::class,
    ],

    'notes' => [
        'table' => 'notes',
        'model' => Rumspeed\LaravelNotes\Models\Note::class,
    ],
];
```

## Usage

First things first, edit your eloquent model by using the `Rumspeed\LaravelNotes\Traits\HasManyNotes` trait.

```php
<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Rumspeed\LaravelNotes\Traits\HasManyNotes;

class Post extends Model {
    use HasManyNotes;

    // Other stuff ...
}
```

You can also use the `Rumspeed\LaravelNotes\Traits\HasOneNote` trait if you want to manage one note for your model.

#### Add a note to a model.

You can call the `createNote()` method on your Eloquent model like below:

```php
$post = App\Post::first();
$note = $post->createNote('Hello world #1');
```

#### Add With a Author/ User

```php
$user = App\User::first();
$post = App\Post::first();
$note = $post->createNote('Hello world #1', $user);
```

You can also specify how you want to add the `author` id by using the `getCurrentAuthorId()`:

```php
<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Rumspeed\LaravelNotes\Traits\HasManyNotes;

class Post extends Model {
    use HasManyNotes;

    // Other stuff ...

    /**
     * Get the current author's id.
     *
     * @return int|null
     */
     protected function getCurrentAuthorId()
     {
         return auth()->id();
     }
}
```

#### Getting Notes

```php
$post  = App\Post::first();
$notes = $post->notes;
```

> **NOTE :** `$post->notes` relation property is only available in the `HasManyNotes` trait. If you're using `HasOneNote` trait, use `$post->note` instead.    

#### Getting the author's notes

You can also retrieve all the author's notes by using the `Rumspeed\LaravelNotes\Traits\AuthoredNotes` Trait in your User model (for example).

```php
$user = App\User::first();
$post = App\Post::first();
$post->createNote('Hello world #1', $user);

$notes = $user->authoredNotes;
```

#### Finding a note with a specific ID

```php
$post = App\Post::first();
$note = $post->findNote(1);
```

> **NOTE :** The `findNote()` method is only available in the `HasManyNotes` trait.

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Scot Rumery](https://github.com/rumspeed)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
