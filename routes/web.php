<?php

use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\ComentariosController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\EventosController;
use App\Http\Controllers\Backend\GeneroController;
use App\Http\Controllers\Backend\GoogleController;
use App\Http\Controllers\Backend\PerfilController;
use App\Http\Controllers\Backend\UsuariosController;
use App\Http\Controllers\Models\HomeController;
use App\Http\Controllers\Login\LoginController;
use App\Http\Controllers\Login\RegisterController;
use App\Http\Controllers\Backend\TipoObrasController;
use App\Models\Genero;
use App\Models\Obra;
use App\Models\TipoObra;
use App\Models\User;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Backend\FormularioContacto;


Route::get('/', [HomeController::class, 'home'])->name('inicio');

//Trae la obra por id de cada obra
Route::get('/artDetails/{id}',function($id){
    $obra = Obra::with('comentarios')->findOrFail($id);

    $obrasParaSlider = Obra::where('id', '!=', $id)
        ->orderBy('id', 'desc')
        ->take(5)
        ->get();

    return view('galery.artDetails',compact('obra','obrasParaSlider'));
})->name('obraDetails');

//Muestra todas la obras publicadas
Route::get('/ObrasArte', [\App\Http\Controllers\Backend\obraController::class, 'index'])->name('obras.index');

Route::get('/aboutUs',function(){
    return view('aboutUs');
});

Route::get('/contactUs',function(){
    return view('contactUs');
});

Route::get('contacto',function(){
    \Illuminate\Support\Facades\Mail::to('samuel.mem123@gmail.com')->send(new \App\Mail\ContactanosMailable());
    return 'Mensaje enviado';
});

Route::post('contactanos',[\App\Http\Controllers\Backend\ContactanosController::class,'store'])->name('contactanos.store');

Route::get('events', function () {
    $eventos = \App\Models\evento::orderBy('created_at', 'desc')->get();
    return view('eventsNews', compact('eventos'));
});


Route::get('/galeria',[HomeController::class,'galeria']);

Route::get('/perfil',[PerfilController::class,'index'])->middleware('auth')->name('perfil');


Route::get('/tipos-obra', [\App\Http\Controllers\Backend\TipoObrasController::class, 'index'])->name('tiposObra.index');

Route::post('/comentarios/{obra}',[\App\Http\Controllers\Backend\ComentariosController::class,'store'])->name('comentarios.store');

Route::post('/valorar/{obra}',[\App\Http\Controllers\Backend\Valoraciones::class,'store'])->name('valorar.store');

Route::post('/favoritos/{obra}', [\App\Http\Controllers\Backend\FavoritosController::class, 'toggle'])->middleware('auth')->name('favoritos.toggle');

Route::get('/filtrar-obras', [HomeController::class, 'filtrarObras'])->name('filtrar.obras');

Route::get('/generos',[GeneroController::class,'index'])->name('generos.index');

//IDIOMAS
Route::get('lang/{locale}', function ($locale) {
    if (! in_array($locale, array_values(config('app.available_locales')))) {
        abort(400);
    }

    Session::put('locale', $locale);
    App::setLocale($locale);
    Session::save();

    return redirect()->back();
})->name('lang.switch');

/*
 ADMINISTRADOR
*/
Route::middleware('auth')->prefix('admin')->group(function(){
    Route::middleware('adminLogueado:0')->group(function(){
        // Login
        Route::get('login', [AdminController::class, 'login'])->name('admin.login');
        Route::post('login', [AdminController::class, 'logear'])->name('admin.logear');
    });

    Route::middleware('adminLogueado:1')->group(function(){
        Route::get('/', [AdminController::class, 'home'])->name('admin.home');

         Route::get('logout', [AdminController::class, 'logout'])->name('admin.logout'); //Logout

        Route::resource('obras', \App\Http\Controllers\Backend\obraController::class);

        Route::get('obra',[AdminController::class,'indexObrasAdmin'])->name('admin.obra.index');

        Route::get('dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

        //comentarios
        Route::get('comentarios', [ComentariosController::class, 'index'])->name('comentarios.index');
        Route::patch('comentarios/{comentario}/aprobar', [ComentariosController::class, 'aprobar'])->name('comentarios.aprobar');
        Route::delete('/comentarios/{comentario}', [\App\Http\Controllers\Backend\ComentariosController::class, 'destroy'])->name('comentarios.destroy');

        //Eventos
        Route::get('eventos',[EventosController::class,'index'])->name('evento.index');
        Route::get('eventos/crear', [\App\Http\Controllers\Backend\EventosController::class, 'create'])->name('eventos.create');
        Route::post('eventos', [\App\Http\Controllers\Backend\EventosController::class, 'store'])->name('eventos.store');
        Route::get('/eventos/{evento}/editar', [EventosController::class, 'edit'])->name('eventos.edit');
        Route::put('/eventos/{evento}', [EventosController::class, 'update'])->name('eventos.update');
        Route::delete('/eventos/{evento}', [EventosController::class, 'destroy'])->name('eventos.destroy');

        //USUARIOS
        Route::get('usuarios',[UsuariosController::class,'index'])->name('usuarios.index');
        Route::get('usuarios/{usuarios}/editar', [UsuariosController::class, 'edit'])->name('usuarios.edit');
        Route::put('/usuarios/{usuarios}', [UsuariosController::class, 'update'])->name('usuarios.update');
        Route::delete('usuarios/{user}', [UsuariosController::class, 'destroy'])->name('usuarios.destroy');
    });
});

//Login and Register
Route::middleware('guest')->group(function(){
    //Login
     Route::get('login', [LoginController::class, 'loginForm'])->name('login');
     Route::post('login', [LoginController::class, 'login'])->name('login');

     //Register
    Route::get('register', [RegisterController::class, 'registerFormlog'])->name('register.form');
    Route::post('register', [RegisterController::class, 'register'])->name('register');

    //Login Google
    Route::get('/auth/google/redirect', [GoogleController::class, 'redirect'])->name('google.redirect');

    Route::get('/auth/google/callback', [GoogleController::class, 'callback'])->name('google.callback');

});

Route::middleware('auth')->put('/usuario/{id}', [PerfilController::class, 'update'])->name('usuario.update');


//Logout
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

