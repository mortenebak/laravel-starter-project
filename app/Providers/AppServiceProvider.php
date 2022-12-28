<?php

namespace App\Providers;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
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
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Below are settings adapted from https://planetscale.com/blog/laravels-safety-mechanisms

        // As these are concerned with application correctness,
        // leave them enabled all the time.
        Model::preventAccessingMissingAttributes();
        Model::preventSilentlyDiscardingAttributes();

        // Since this is a performance concern only, don't halt
        // production for violations.
        Model::preventLazyLoading(! $this->app->isProduction());


        Builder::macro('search', function ($field, $string) {
            if (is_array($field)) {
                foreach ($field as $item) {
                    $this->orWhere($item, 'like', '%'.$string.'%');
                }
                return $this;
            } else {
                return $string ? $this->where($field, 'like', '%'.$string.'%') : $this;
            }
        });
    }
}
