<?php


if (! function_exists( 'config_keys') ) {
    function config_keys($key) {
        return array_keys(config($key));
    }
}


if(! function_exists('isBackend')) {
    function isBackend() {
        static  $isBackend;
        if(is_null($isBackend)) {
            $isBackend = false; //request()->root() == config('app.url');
        }
        return $isBackend;
    }
}
