<?php

use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\ComentariosController;
use App\Http\Controllers\Backend\PerfilController;
use App\Http\Controllers\Models\HomeController;
use App\Http\Controllers\Backend\TipoObrasController;
use App\Models\Obra;
use App\Models\TipoObra;
use Illuminate\Support\Facades\Route;


Route::get('/', [HomeController::class, 'home'])->name('inicio');

Route::get('/artDetails/{id}',function($id){
    $obra = Obra::with('comentarios')->findOrFail($id);

    $obrasParaSlider = Obra::where('id', '!=', $id)
        ->orderBy('id', 'desc')
        ->take(5)
        ->get();

    return view('galery.artDetails',compact('obra','obrasParaSlider'));
})->name('obraDetails');

Route::get('/ObrasArte', function () {
    $obras = Obra::all();
    $tiposObra = TipoObra::all();
    return view('galery.ObrasArte', compact('obras','tiposObra'));
});

Route::get('/aboutUs',function(){
    return view('aboutUs');
});

Route::get('/contactUs',function(){
    return view('contactUs');
});

Route::get('eventsNews',function(){
    return view('eventsNews');
});

Route::get('/galeria',[HomeController::class,'galeria']);

Route::get('/perfil',[PerfilController::class,'index'])->middleware('auth')->name('perfil');


Route::get('/tipos-obra', [\App\Http\Controllers\Backend\TipoObrasController::class, 'index'])->name('tiposObra.index');

Route::post('/comentarios/{obra}',[\App\Http\Controllers\Backend\ComentariosController::class,'store'])->name('comentarios.store');

Route::post('/valorar/{obra}',[\App\Http\Controllers\Backend\Valoraciones::class,'store'])->name('valorar.store');

Route::post('/favoritos/{obra}', [\App\Http\Controllers\Backend\FavoritosController::class, 'toggle'])->middleware('auth')->name('favoritos.toggle');

Route::get('/filtrar-obras', [HomeController::class, 'filtrarObras'])->name('filtrar.obras');

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

        Route::get('comentarios', [ComentariosController::class, 'index'])->name('comentarios.index');
        Route::patch('comentarios/{comentario}/aprobar', [ComentariosController::class, 'aprobar'])->name('comentarios.aprobar');
        Route::delete('/comentarios/{comentario}', [\App\Http\Controllers\Backend\ComentariosController::class, 'destroy'])->name('comentarios.destroy');

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
