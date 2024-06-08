<?php

namespace App\Providers;

use App\Models\berita;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\Login;
use App\Models\Program_Kerja;

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
    public function boot(): void
    {
        Gate::define('sekertaris',function(Login $logins) {
            return $logins->bidang === "SEKERTARIS";
        });
        Gate::define('kepaladesa',function(Login $logins) {
            return $logins->bidang === "KEPALA DESA";
        });
        Gate::define('kasikesra',function(Login $logins) {
            return $logins->bidang === "KASI KESEJAHTERAAN MASYARAKAT";
        });
        Gate::define('kasikemasyarakatan',function(Login $logins) {
            return $logins->bidang === "KASI KEMASYARAKATAN";
        });
        Gate::define('kasipemerintahan',function(Login $logins) {
            return $logins->bidang === "KASI PEMERINTAHAN";
        });
        Paginator::useBootstrapFour();
    }
}
