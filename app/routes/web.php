<?php

use Illuminate\Support\Facades\Route;

Route::get('info', function () {
    phpinfo();
});

Route::get('{any}', function ($urlParam, $r = '') {
    return view('app');
})->where('any',  '^((?!admin).)*?');
