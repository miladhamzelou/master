<?php

namespace Generator\Admin\Commands;

use Illuminate\Console\GeneratorCommand;

class controllerCommand extends GeneratorCommand
{
    protected $signature = "admin-generator:controller 
                            {name : controller name.}
                            {Model : model name.}
                            {NameBundle : bundle name.}
                            {Prefix : Prefix name.}";

    protected $description = 'controller generator';


    protected $type = 'controller';


    protected function getStub()
    {
        return dirname(__DIR__).'/stubs/controller.stubs';
    }

    /**
     * @param string $name
     * @return string
     */
    protected function getPath($name)
    {
        return app_path().'/Http/Controllers/' . $this->argument('NameBundle') . '/' . $this->argument('Prefix') . '/' . $this->argument('name') . '.php';
    }

    /**
     * @param string $name
     * @return string
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    protected function buildClass($name)
    {
        $stub = $this->files->get($this->getStub());

        $model = $this->argument('Model');
        $bundle = $this->argument('NameBundle');
        $prefix = $this->argument('Prefix');

        return $this->replacePrefix($stub, $prefix)
                    ->replaceBundle($stub, $bundle)
                    ->replaceModel($stub, $model)
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

    /***
     * @param $stub
     * @param $model
     * @return $this
     */
    protected function replaceModel(&$stub, $model)
    {
        $stub = str_replace('{{model}}', $model, $stub);
        return $this;
    }

    /**
     * @param $stub
     * @param $prefix
     * @return $this
     */
    protected function replacePrefix(&$stub, $prefix)
    {
        $stub = str_replace('{{prefix}}', $prefix, $stub);
        return $this;
    }




}
?>