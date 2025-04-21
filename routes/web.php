<?php

use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Models\homeController;
use App\Models\Obra;
use Illuminate\Support\Facades\Route;


Route::get('/', [HomeController::class, 'index'])->name('inicio');

Route::get('/artDetails/{id}',function($id){
    $obra = Obra::findOrFail($id);
    return view('galery.artDetails',compact('obra'));
})->name('obraDetails');

Route::get('/ aboutUs',function(){
    return view('aboutUs');
});

Route::get('/contactUs',function(){
    return view('contactUs');
});

Route::get('eventsNews',function(){
    return view('eventsNews');
});

Route::get('/galeria',[homeController::class,'galeria']);

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

//Login and Register
Route::middleware('guest')->group(function(){
    //Login
     Route::get('login', [App\Http\Controllers\Login\LoginController::class, 'loginForm'])->name('login');
     Route::post('login', [App\Http\Controllers\Login\LoginController::class, 'login'])->name('login');

     //Register
    Route::get('register', [App\Http\Controllers\Login\RegisterController::class, 'registerForm'])->name('register');
    Route::post('register', [App\Http\Controllers\Login\RegisterController::class, 'register'])->name('register');
});

//Logout
Route::post('logout', [App\Http\Controllers\Login\LoginController::class, 'logout'])->name('logout');



Route::get('crearUsuario',function(){
   $user = new \App\Models\User();
   $user->name = 'Samuel';
   $user->apellido = 'Membreño';
   $user->email = 'samuel@gmail.com';
   $user->password = \Illuminate\Support\Facades\Hash::make('123456');
   $user->save();
});
