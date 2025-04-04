<?php

/* REMOVED  */

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use Dadata\DadataClient;

class DadataServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(DadataClient::class, function(){
            return new \Dadata\DadataClient(
                config('dadata.token'), 
                config('dadata.secret')
            );
        });
    }

    public function boot(): void
    {
        //
    }
}
