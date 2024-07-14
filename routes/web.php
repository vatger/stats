<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('df', function () {
    dd(\VatsimDatafeed\Datafeed::get());
});
