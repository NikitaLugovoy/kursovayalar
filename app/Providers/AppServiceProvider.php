<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Services\AddressParser\DadataParser;
use App\Services\AddressParser\FakeParser;
use App\Services\AddressParser\ParserInterface;
use Dadata\DadataClient;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Blade;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        /* $this->app->singleton(ParserInterface::class, function(){
            return new DadataParser(new DadataClient(
                config('dadata.token'), 
                config('dadata.secret')
            ));
        }); */

        $this->app->singleton(ParserInterface::class, function(){
            return new FakeParser();
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        /* \Illuminate\Support\Facades\DB::beforeExecuting(function($query, $params){
            Log::info("DB: $query with params " . json_encode($params));
        }); */
        $blade = $this->app['view']->getEngineResolver()->resolve('blade')->getCompiler();

        $blade->extend(function($value){
            $value = preg_replace('/@icon\(.+?\)/', '{here}', $value);
            return $value;
        });

        // preg_replace_callback('/@icon\(([a-z-]+)\)/', function($matches)

       /*  Blade::directive('icon', function ($expression) {
            $params =  explode(',', $expression);
            $modifier = '';
            if(isset($params[1])){
                $p = trim($params[1]); // убираем пробел в случае передачи @icon(user, lg)
                $modifier = "fa-$p";
            }
            return "<i class='fa fa-solid fa-$params[0] $modifier'></i>";
            // получится как здесь  https://fontawesome.com/icons/user?f=classic&s=solid&sz=lg

        }); */
        
        
    }

}
