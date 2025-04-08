<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::get('/artDetails',function(){
    return view('artDetails');
});

Route::get('/ aboutUs',function(){
    return view('aboutUs');
});

Route::get('/contactUs',function(){
    return view('contactUs');
});

Route::get('eventsNews',function(){
    return view('eventsNews');
});