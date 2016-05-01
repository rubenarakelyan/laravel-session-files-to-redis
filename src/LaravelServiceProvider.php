<?php namespace RubenArakelyan\LaravelSessionFilesToRedis;

use Illuminate\Support\ServiceProvider;

/**
 * Class LaravelServiceProvider
 * @package RubenArakelyan\LaravelSessionFilesToRedis
 */
class LaravelServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
    protected $defer = true;

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

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides() {
        return [
	        \RubenArakelyan\LaravelSessionFilesToRedis\TransferSessionFilesToRedisCommand::class,
        ]
    }
}
