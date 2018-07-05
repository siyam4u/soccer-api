<?php

namespace App\Providers;

use App\Repositories\Player\EloquentPlayer;
use App\Repositories\Player\PlayerRepository;
use App\Repositories\Team\EloquentTeam;
use App\Repositories\Team\TeamRepository;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(TeamRepository::class, EloquentTeam::class);
        $this->app->singleton(PlayerRepository::class, EloquentPlayer::class);
    }
}
