<?php

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\URL;

if (!function_exists('localized_url')) {
    function localized_url($path = '', $parameters = []) {
        $locale = App::getLocale();
        $query = array_merge(Request::query(), ['lang' => $locale]);

        return URL::to($path) . '?' . http_build_query($query);
    }
}

if (!function_exists('localized_route')) {
    function localized_route($name, $parameters = []) {
        $locale = app()->getLocale();
        $query = array_merge(request()->query(), ['lang' => $locale]);
        return route($name, $parameters) . '?' . http_build_query($query);
    }
}

?>
