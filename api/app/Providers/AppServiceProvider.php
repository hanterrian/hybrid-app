<?php

namespace App\Providers;

use App\Models\Media;
use Awcodes\Curator\Facades\Curator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        Curator::mediaModel(Media::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
