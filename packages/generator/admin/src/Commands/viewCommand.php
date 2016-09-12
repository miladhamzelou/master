<?php

namespace Generator\Admin\Commands;

use Illuminate\Console\Command;
use File;

class viewCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'admin-generator:view
                            {NameBundle : The name of the bundle.}
                            {Controller : The name of the controller.}
                            {Prefix : The name of the prefix.}
                            ';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create viewes.';


    public function handle()
    {
        $bundle = $this->argument('NameBundle');
        $controller = $this->argument('Controller');
        $prefix = $this->argument('Prefix');

        // create config file

        $cnf_path = app_path().'/Http/Controllers/' . $bundle . '/Config';
        if (!File::isDirectory($cnf_path)) {
            File::makeDirectory($cnf_path, 0755, true);
        }

        $cnf_file = ['list'];

        foreach ($cnf_file as $file)
        {
            $stub = dirname(__DIR__).'/stubs/config/'. $file . '.stubs';
            $file = app_path().'/Http/Controllers/' . $bundle . '/Config/' . lcfirst($controller).'_'.$file .'.php';
            File::copy($stub, $file);
        }

        $path = resource_path().'/views/'. lcfirst($bundle) . '/' . lcfirst($controller) . '/' . lcfirst($prefix);
        if (!File::isDirectory($path)) {
            File::makeDirectory($path, 0755, true);
        }
        $files = ['index', 'ajax', 'edit', 'show', 'search'];
        foreach ($files as $file)
        {
            $stub = dirname(__DIR__).'/stubs/view/'. $file . '.stubs';
            $file = resource_path().'/views/'. lcfirst($bundle) . '/' . lcfirst($controller) . '/' . lcfirst($prefix) .'/' . $file .'.blade.php';
            File::copy($stub, $file);
        }
    }

}
