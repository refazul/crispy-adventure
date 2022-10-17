# Laravel PHP Framework

[![Build Status](https://travis-ci.org/laravel/framework.svg)](https://travis-ci.org/laravel/framework)
[![Total Downloads](https://poser.pugx.org/laravel/framework/d/total.svg)](https://packagist.org/packages/laravel/framework)
[![Latest Stable Version](https://poser.pugx.org/laravel/framework/v/stable.svg)](https://packagist.org/packages/laravel/framework)
[![Latest Unstable Version](https://poser.pugx.org/laravel/framework/v/unstable.svg)](https://packagist.org/packages/laravel/framework)
[![License](https://poser.pugx.org/laravel/framework/license.svg)](https://packagist.org/packages/laravel/framework)

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable, creative experience to be truly fulfilling. Laravel attempts to take the pain out of development by easing common tasks used in the majority of web projects, such as authentication, routing, sessions, queueing, and caching.

Laravel is accessible, yet powerful, providing tools needed for large, robust applications. A superb inversion of control container, expressive migration system, and tightly integrated unit testing support give you the tools you need to build any application with which you are tasked.

## Official Documentation

Documentation for the framework can be found on the [Laravel website](http://laravel.com/docs).

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](http://laravel.com/docs/contributions).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell at taylor@laravel.com. All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).

## Original package.json

```
{
  "private": true,
  "scripts": {
    "prod": "gulp --production",
    "dev": "gulp watch"
  },
  "devDependencies": {
    "bootstrap-sass": "^3.3.7",
    "gulp": "^3.9.1",
    "jquery": "^3.1.0",
    "laravel-elixir": "^6.0.0-9",
    "laravel-elixir-vue-2": "^0.2.0",
    "laravel-elixir-webpack-official": "^1.0.2",
    "lodash": "^4.16.2",
    "vue": "^2.0.1",
    "vue-resource": "^1.0.3",
    "fine-uploader": "^5.11.5"
  }
}
```

## Original composer.json

```
"require": {
    "php": ">=5.6.4",
    "laravel/framework": "5.3.*",
    "barryvdh/laravel-ide-helper": "^2.2",
    "doctrine/dbal": "^2.5",
    "yajra/laravel-datatables-oracle": "~6.0",
    "fineuploader/php-traditional-server": "^1.2",
    "league/flysystem-aws-s3-v3": "~1.0",
    "maatwebsite/excel": "~2.1.0"
},
"require-dev": {
    "fzaninotto/faker": "~1.4",
    "mockery/mockery": "0.9.*",
    "phpunit/phpunit": "~5.0",
    "symfony/css-selector": "3.1.*",
    "symfony/dom-crawler": "3.1.*"
},
"scripts": {
    "post-root-package-install": [
        "php -r \"file_exists('.env') || copy('.env.example', '.env');\""
    ],
    "post-create-project-cmd": [
        "php artisan key:generate"
    ],
    "post-install-cmd": [
        "Illuminate\\Foundation\\ComposerScripts::postInstall",
        "php artisan optimize"
    ],
    "post-update-cmd": [
        "Illuminate\\Foundation\\ComposerScripts::postUpdate",
        "php artisan optimize"
    ]
},
```

## Troubleshooting

```
php artisan cache:clear
php artisan view:clear
php artisan config:clear
```

Make sure following empty directories exist

```
storage/framework/sessions
storage/framework/views
storage/framework/cache
bootstrap/cache
```
