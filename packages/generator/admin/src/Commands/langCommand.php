<?php

namespace Generator\Admin\Commands;

use Illuminate\Console\Command;
use File;

class langCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'admin-generator:lang
                            {name : The name of the migration.}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new lang.';


    public function handle()
    {
        $bundle = $this->argument('name');

        $locales = config('app.locales');

        foreach ($locales as $loc)
        {
            $stub = dirname(__DIR__).'/stubs/lang.stubs';
            $file = resource_path().'/lang/'. $loc . '/' . lcfirst($bundle).'.php';
            File::copy($stub, $file);
        }
    }

}
