<?php

if (!function_exists('clearCache')) {
    function clearCache() {
        $cachedViewsDirectory = base_path() . '/storage/framework/views/';
        $files = glob($cachedViewsDirectory . '*');
        foreach ($files as $file) {
            if (is_file($file)) {
                File::delete($file);
            }
        }
    }
}

// getCurrentURL
if (!function_exists('getCurrentURL')) {
    function getCurrentURL($partname = '', $siteurl_perfix = false) {
        return Lib::getCurrentURL($partname, $siteurl_perfix);
    }
}

//  alert
if (!function_exists('alert')) {
    function alert($msg) {
        return Lib::alert($msg);
    }
}

//  upper case space first
if (!function_exists('upperCaseSpacefirst')) {
    function upperCaseSpacefirst($str) {
        return Lib::upperCaseSpacefirst($str);
    }
}
//  is_Auth
if (!function_exists('is_Auth')) {
    function is_Auth($role) {
        return Lib::is_Auth($role);
    }
}

//  is_Auth
if (!function_exists('getLocale')) {
    function getLocale() {
        return Lib::getLocale();
    }
}

//  is_Auth
if (!function_exists('ftArray')) {
    function ftArray($bundle, $controller, $file = 'list') {
        return Lib::ftArray($bundle, $controller , $file);
    }
}

