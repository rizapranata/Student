<?php

namespace App\Providers;

use Request;
use Illuminate\Support\ServiceProvider;

class StudentAppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $halaman = '';
        if(Request::segment(1) == 'siswa'){
            $halaman = 'siswa';
        }

        if(Request::segment(1) == 'about'){
            $halaman = 'about';
        }
        view()->share('halaman','halaman');
    }
}
