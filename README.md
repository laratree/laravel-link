# Laravel Links

[![Latest Version on Packagist](https://img.shields.io/packagist/v/laratree/laravel-link.svg?style=flat-square)](https://packagist.org/packages/laratree/laravel-link)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/laratree/laravel-link/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/laratree/laravel-link/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/:vendor_slug/:package_slug/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/:vendor_slug/:package_slug/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/laratree/laravel-link.svg?style=flat-square)](https://packagist.org/packages/laratree/laravel-link)

Associate models with URL links.

## Installation

You can install the package via composer:

```bash
composer require laratree/laravel-link
```

You can publish and run the migrations with:

```bash
php artisan vendor:publish --tag="laravel-link-migrations"

php artisan migrate
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag=":laravel-link"
```

This is the contents of the published config file:

```php
return [
    'table' => 'links',
];
```

## Usage

```php

// Register Trait on User model.
use HasLink;

// Attach Link to User
$user = User::latest()->first();
$user->attachLink($url = 'https://portfolio.com');

// Delete Link
$user->deleteLink('https://portfolio.com');
```

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

- [MimisK13](https://github.com/mimisk13)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
