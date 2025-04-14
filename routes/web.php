<?php

use App\Http\Controllers\Backend\AdminController;
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


/*
 ADMINISTRADOR
*/
Route::prefix('admin')->group(function(){
    Route::middleware('adminLogueado:0')->group(function(){
        // Login
        Route::get('login', [AdminController::class, 'login'])->name('admin.login');
        Route::post('login', [AdminController::class, 'logear'])->name('admin.logear');
    });

    Route::middleware('adminLogueado:1')->group(function(){
        Route::get('/', [AdminController::class, 'home'])->name('admin.home');

         Route::get('logout', [AdminController::class, 'logout'])->name('admin.logout'); //Logout

        Route::resource('obras', \App\Http\Controllers\Backend\obraController::class);
    });
});


Route::get('crearUsuario',function(){
   $user = new \App\Models\User();
   $user->name = 'Samuel';
   $user->apellido = 'Membreño';
   $user->email = 'samuel@gmail.com';
   $user->password = \Illuminate\Support\Facades\Hash::make('123');
   $user->save();
});
