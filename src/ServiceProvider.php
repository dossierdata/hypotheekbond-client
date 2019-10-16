<?php

namespace MortgageUnion;

use Illuminate\Contracts\Support\DeferrableProvider;

class ServiceProvider extends \Illuminate\Support\ServiceProvider implements DeferrableProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config/hypotheekbond.php' => config_path('hypotheekbond.php')
        ], 'config');
    }

    /**
     * Register any application services.
     *
     * This service provider is a great spot to register your various container
     * bindings with the application. As you can see, we are registering our
     * "Registrar" implementation here. You can add your own bindings too!
     *
     * @return void
     */
    public function register()
    {
        $this->registerSingletons();
        $this->registerBindings();
    }

    /**
     *
     */
    private function registerSingletons()
    {
        // Singletons
        $this->app->singleton(
            \MortgageUnion\Clients\MortgageUnion::class,
            \MortgageUnion\Clients\Implementation\MortgageUnion::class
        );

        $this->app->singleton(
            \MortgageUnion\Interfaces\Signal::class,
            \MortgageUnion\Models\Signals\Signal::class
        );

    }

    private function registerBindings()
    {
        // Storage
//        $this->app->bind(\Findesk\Contracts\Storage\AuthTokenStorage::class, \Findesk\Storage\AuthTokenStorage::class);
        // Services
        $this->registerServiceBindings();
        // Repositories
        $this->registerRepositoryBindings();
    }

    protected function registerServiceBindings()
    {
//        $this->app->bind(
//            \Findesk\Services\PingService::class,
//            \Findesk\Services\Implementation\PingService::class
//        );

    }

    protected function registerRepositoryBindings()
    {
        $this->app->bind(
            \MortgageUnion\Repositories\SignalRepository::class,
            \MortgageUnion\Repositories\Implementation\SignalRepository::class
        );

        $this->app->bind(
            \MortgageUnion\Repositories\XMLRepository::class,
            \MortgageUnion\Repositories\Implementation\XMLRepository::class
        );

        $this->app->bind(
            \MortgageUnion\Repositories\AgencyRepository::class,
            \MortgageUnion\Repositories\Implementation\AgencyRepository::class
        );

        $this->app->bind(
            \MortgageUnion\Repositories\BankRepository::class,
            \MortgageUnion\Repositories\Implementation\BankRepository::class
        );

        $this->app->bind(
            \MortgageUnion\Repositories\LenderRepository::class,
            \MortgageUnion\Repositories\Implementation\LenderRepository::class
        );

        $this->app->bind(
            \MortgageUnion\Repositories\CustomerRepository::class,
            \MortgageUnion\Repositories\Implementation\CustomerRepository::class
        );

        $this->app->bind(
            \MortgageUnion\Repositories\AuthRepository::class,
            \MortgageUnion\Repositories\Implementation\AuthRepository::class
        );
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [
            \MortgageUnion\Repositories\SignalRepository::class,
            \MortgageUnion\Repositories\XMLRepository::class,
            \MortgageUnion\Repositories\BankRepository::class,
            \MortgageUnion\Repositories\LenderRepository::class,
            \MortgageUnion\Repositories\CustomerRepository::class,
            \MortgageUnion\Clients\MortgageUnion::class,
            \MortgageUnion\Repositories\AgencyRepository::class,
            \MortgageUnion\Interfaces\Signal::class,
            \MortgageUnion\Repositories\AuthRepository::class
        ];
    }
}
