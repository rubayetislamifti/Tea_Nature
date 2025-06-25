<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('*', function ($view) {

            // Cache forever (until you decide to clear it)
            $text = Cache::rememberForever('marquee_text', function () {
                return DB::table('marqueetexts')->first();
            });

            $contact = Cache::rememberForever('contact_info', function () {
                return DB::table('contacts')->first();
            });

            // Make $text and $contact available to all Blade files
            $view->with(compact('text', 'contact'));
        });
    }
}
