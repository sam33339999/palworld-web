<?php

namespace App\Providers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Model::setEventDispatcher($this->app['events']);

        $processId = rand(10000, 99999);
        \DB::listen(function ($query) use ($processId) {
            $sql = $query->sql;
            $time = $query->time;
            $bindings = $query->bindings;

            foreach ($bindings as $index => $binding) {
                if (is_bool($binding)) {
                    $bindings[$index] = ($binding) ? ('1') : ('0');
                } elseif (is_string($binding)) {
                    $bindings[$index] = "'$binding'";
                }
            }

            $sql = preg_replace_callback('/\?/', function () use (&$bindings) {
                return array_shift($bindings);
            }, $sql);

            \Log::info('Process:' . $processId . ' Time: ' . $time . ' Query: ' . $sql);
        });
    }
}
