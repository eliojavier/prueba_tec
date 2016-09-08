<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\File;
use App\Gallery;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        view()->composer('pages.partials._buttons', function($view){

            $view
                ->with('calendar', File::isbutton()->where('display_name','calendario')->first())
                ->with('admission', File::isbutton()->where('display_name','pre-admision')->first());
        });

        view()->composer('layouts.app', function($view){

            $view->with('galleries', Gallery::all())
            ->with('register', File::isbutton()->where('display_name','Inscripción')->first());
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
