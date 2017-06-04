<?php

namespace Mass6\LaravelStateWorkflows;

use Illuminate\Support\ServiceProvider;

class StateWorkflowsServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../../migrations/2017_06_01_000000_create_transition_events_table.php' => database_path('/migrations/2017_06_01_000000_create_transition_events_table.php'),
        ]);
    }
}
