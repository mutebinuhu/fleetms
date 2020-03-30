<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

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
<<<<<<< HEAD
         
||||||| merged common ancestors
          if ($this->app->isLocal()) {
        $this->app->register(TelescopeServiceProvider::class);
    }
=======
       
>>>>>>> 8d7dcda5f32183ae5dfb9f8e621ecc3af586bfc8
        
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
