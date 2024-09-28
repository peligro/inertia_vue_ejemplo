<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
//https://github.com/JonVadar/YouTube_videos/tree/main/Web%20developer%20path%20videos/laravel_Inertia_Vue
//https://www.youtube.com/watch?v=BFSqV5DUVeY&list=PL38wFHH4qYZXCW2rlBLNdHi5cv-v_qlXO&index=18
use App\Models\User;
use Illuminate\Http\Request;
/*
Route::get('/', function () {
    //sleep(2);//para probar progress-indicators
    return Inertia::render('Home');
})->name("ruta_home");*/
//Route::inertia('/', 'Home', ['users'=>User::orderBy('id', 'desc')->paginate(5)])->name("ruta_home");
/*Route::get('/', function(Request $request)
{
    return Inertia('Home', ['users'=>User::when($request->search, function($query) use ($request){
        $query->where('name', 'like', '%'.$request->search.'%');
    })->orderBy('id', 'desc')->paginate(5)]);
})->name("ruta_home");*/
Route::get('/', [HomeController::class, 'index'])->name('ruta_home');

/*
Route::get('/about', function () {
    return Inertia('About', ['user'=>'Mike Ñandú']);
});

*/


Route::middleware(['guest'])->group(function () {
    //otra forma de llamar a la página y sus props
Route::inertia('/about', 'About', ['user'=>'César Cancino'])->name("ruta_about");
    Route::inertia('/register', 'Auth/Register')->name("ruta_register");
    Route::post('/register', [AuthController::class, 'register'])->name('ruta_register_post');
    Route::inertia('/login', 'Auth/Login')->name("ruta_login");
    Route::post('/login', [AuthController::class, 'login'])->name('ruta_login_post');
});


Route::middleware(['auth'])->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('ruta_logout_post');

    Route::inertia('/dashboard', 'Dashboard')->name("ruta_dashboard");
});
