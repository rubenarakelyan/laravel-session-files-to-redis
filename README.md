# Transfer Session Files to Redis command for Laravel

This package provides an Artisan command for Laravel to migrate existing session from file-based storage to Redis. It is intended to be used during a migration from file-based to Redis session management, in order to preserve existing sessions.

### Requirements

- PHP 5.5
- Laravel 4 or 5

### Installation

**Composer**

Run the following to include this via Composer

```shell
composer require rubenarakelyan/laravel-session-files-to-redis
```

#### Laravel Configuration

To install into a Laravel project, first do the composer install then add the following class to your config/app.php service providers list.

```php
RubenArakelyan\LaravelSessionFilesToRedis\LaravelServiceProvider::class,
```

**Artisan Command**

The Artisan command registered by this command is `session:transfer-session-files-to-redis`. Running this command will output Redis protocol-compatible commands. By default, the command outputs to the standard console output. To run the output commands in Redis, you need to pipe the output of this command to the `redis-cli` application as follows:

```shell
php artisan session:transfer-session-files-to-redis | redis-cli --pipe
```

Once this has been completed successfully, you can switch the Laravel session configuration to use Redis, and delete the old session files.

### Contribution Guidelines

When contributing please consider the following guidelines:

- Please conform to the code style of the project.
- All methods and classes must contain docblocks.
- When planning a pull request to add new functionality, it may be wise to [submit a proposal](https://github.com/rubenarakelyan/laravel-session-files-to-redis/issues/new) to ensure compatibility with the project's goals.

### Maintainer

This package is maintained by [Ruben Arakelyan](https://ruben.am/).

### License

This package is licensed under the [MIT license](https://github.com/rubenarakelyan/laravel-session-files-to-redis/blob/master/LICENSE).
