# Spanel

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Build Status][ico-travis]][link-travis]
[![Coverage Status][ico-scrutinizer]][link-scrutinizer]
[![Quality Score][ico-code-quality]][link-code-quality]
[![Total Downloads][ico-downloads]][link-downloads]

```Ömer``` ```HaN``` ```www.shiftajans.com``` ```omerhan@outlook.com``` ```omerhan``` ```spanel``` ```Admin Panel For Laravel 5.5 By Shift```

## Yükleme

Via Composer

``` bash
$ composer require omerhan/spanel

app.php services provider ekleme

$ Omerhan\Spanel\SpanelServiceProvider::class,

$ 'Spanel' => Omerhan\Spanel\Facades\SpanelFacade::class,

```

## Usage

``` php

php artisan make:auth

php artisan migrate

php artisan db:seed --class=Omerhan\Spanel\database\seeds\DatabaseSeeder

php artisan vendor:publish --tag=public --force

```

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/:vendor/:package_name.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/:vendor/:package_name/master.svg?style=flat-square
[ico-scrutinizer]: https://img.shields.io/scrutinizer/coverage/g/:vendor/:package_name.svg?style=flat-square
[ico-code-quality]: https://img.shields.io/scrutinizer/g/:vendor/:package_name.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/:vendor/:package_name.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/omerhan/spanel
[link-travis]: https://travis-ci.org/:vendor/:package_name
[link-scrutinizer]: https://scrutinizer-ci.com/g/:vendor/:package_name/code-structure
[link-code-quality]: https://scrutinizer-ci.com/g/:vendor/:package_name
[link-downloads]: https://packagist.org/packages/:vendor/:package_name
[link-author]: https://github.com/:author_username
[link-contributors]: ../../contributors
