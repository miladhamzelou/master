<?php

$segment = Request::segment(1);
// set locale and prefix
if (in_array($segment, Config::get('app.locales'))) {
    App::setLocale($segment);
    $locale = $segment;
    $prefix = Request::segment(2);
} else {
    $prefix = $segment ;
    $locale = NULL;
}
// locale and prefix identified  and set dir
$dir = App::getLocale() == 'fa' ? 'rtl' : 'ltr';
Config::set('app.dir', $dir);

// start app router
Route::group(['prefix' => $locale], function () use ($prefix) {
    if($prefix == 'Auth') {
        Route::group(['prefix' => $prefix], function () use ($prefix) {
            Route::auth();
        });
    } elseif($prefix == 'Admin') {
        Route::group(['prefix' => $prefix ,'namespace' => studly_case($prefix)], function () use ($prefix) {
            Route::any('/', function() use ($prefix) {
                return Lib::callAction($prefix);
            });
            Route::any('{action?}/{args?}', function ($action = 'index', $args = '') use($prefix) {
                return Lib::callAction($prefix, '', '', $action, $args);
            })->where([
                'action'     => '[^/]+',
                'args'       => '[^?$]+'
            ]);
            Route::any('{bundle?}/{controller?}/{action?}/{args?}', function ($bundle, $controller, $action = 'index', $args = '') use($prefix) {
                return Lib::callAction($prefix, $bundle ,$controller, $action, $args);
            })->where([
                'bundle'     => '[^/]+',
                'controller' => '[^/]+',
                'action'     => '[^/]+',
                'args'       => '[^?$]+'
            ]);
        });
    } else {

    }
});