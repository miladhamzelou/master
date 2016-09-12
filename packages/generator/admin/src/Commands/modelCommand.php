<?php

namespace Generator\Admin\Commands;

use Illuminate\Console\GeneratorCommand;

class modelCommand extends GeneratorCommand
{

    protected $signature = 'admin-generator:model
                            {name : The name of the model.}
                            {Bundle : bundle name.}
                            {table : The name of the table.}
                            {pk : The name of the primary key.}';

    protected $description = "generate model";


    protected $type = 'model';

    /**
     * @return string
     */
    protected function getStub()
    {
        return dirname(__DIR__).'/stubs/model.stubs';
    }

    /**
     * Get the destination class path.
     *
     * @param  string  $name
     *
     * @return string
     */
    protected function getPath($name)
    {
        return app_path().'/Http/Controllers/' . $this->argument('Bundle') . '/Model/' . $this->argument('name') . '.php';
    }

    /**
     * @param string $name
     * @return mixed
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    protected function  buildClass($name)
    {
        $stub = $this->files->get($this->getStub());
        $bundle = $this->argument('Bundle');
        $table = $this->argument('table');
        $pk = $this->argument('pk');
        return $this->replaceBundle($stub, $bundle)
            ->replaceTable($stub, $table)
            ->replacePK($stub, $pk)
            ->replaceClass($stub, $name);
    }

    /**
     * @param $stub
     * @param $bundle
     * @return $this
     */
    protected function replaceBundle(&$stub, $bundle)
    {
        $stub = str_replace('{{bundle}}', $bundle, $stub);
        return $this;
    }

    /**
     * @param $stub
     * @param $table
     * @return $this
     */
    public function replaceTable(&$stub, $table)
    {
        $stub = str_replace('{{table}}', $table, $stub);
        return $this;
    }

    /**
     * @param $stub
     * @param $pk
     * @return $this
     */
    public function replacePK(&$stub, $pk)
    {
        $stub = str_replace('{{primaryKey}}', $pk, $stub);
        return $this;
    }


}