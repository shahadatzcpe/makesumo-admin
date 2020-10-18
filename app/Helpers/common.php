<?php


if (! function_exists( 'config_keys') ) {
    function config_keys($key) {
        return array_keys(config($key));
    }
}
