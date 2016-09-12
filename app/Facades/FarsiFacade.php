<?php
namespace App\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \App\Services\Farsi
 */
class FarsiFacade extends Facade {

    protected static function getFacadeAccessor() { return 'farsi'; }

}