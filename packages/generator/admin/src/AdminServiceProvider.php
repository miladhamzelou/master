<?php

namespace Generator\Admin;

use Illuminate\Support\ServiceProvider;

class AdminServiceProvider extends ServiceProvider
{

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->commands([
            'Generator\Admin\Commands\migrationCommand',//1
            'Generator\Admin\Commands\modelCommand', // 2
             // make:form                             //3 edit create form and search form
            'Generator\Admin\Commands\controllerCommand',//4
            'Generator\Admin\Commands\viewCommand',
            'Generator\Admin\Commands\langCommand',
        ]);
    }
}
?>