<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Order;

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
        //
        view()->composer(
            'layouts.app',
             function($view)
             {
                 $count = count(Order::where('status','Pending')->get());
                $view->with('count', $count);
            }    
        );
    }
}
