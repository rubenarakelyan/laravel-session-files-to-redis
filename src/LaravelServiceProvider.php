<?php namespace RubenArakelyan\LaravelSessionFilesToRedis;

use Illuminate\Support\ServiceProvider;

/**
 * Class LaravelServiceProvider
 * @package RubenArakelyan\LaravelSessionFilesToRedis
 */
class LaravelServiceProvider extends ServiceProvider {

    protected $defer = true;

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot() {
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register() {
        $this->commands([
            \RubenArakelyan\LaravelSessionFilesToRedis\TransferSessionFilesToRedisCommand::class,
        ]);
    }
}
