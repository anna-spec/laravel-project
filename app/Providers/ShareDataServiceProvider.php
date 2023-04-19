<?php
namespace App\Providers;
use App\Views\Composers\UserDataComposer;
use Illuminate\Support\ServiceProvider;
class ShareDataServiceProvider extends ServiceProvider {
    /**
     * Register services.
     */
    public function register() {
    }
    /**
     * Bootstrap services.
     */
    public function boot() {

            view()->composer(['includes.nav'], UserDataComposer::class);

    }
}
