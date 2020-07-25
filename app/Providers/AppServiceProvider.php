<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\{View, Schema};
use App\Models\Setting;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if(Schema::hasTable('settings')) {

            View::composer('*', function($view){

                $settings = Setting::first();

                $view->with('shared', [
                    'custom_styles' => $settings->css ?? '',
                    'header_scripts' => $settings->header_scripts ?? '',
                    'footer_scripts' => $settings->footer_scripts ?? '',
                    'logo' => $settings->logo ?? '',
                    'favicon' => $settings->favicon ?? '',
                    'title' => $settings->title ?? '',
                    'desc' => $settings->description ?? '',
                ]);

            });
        }
    }
}
