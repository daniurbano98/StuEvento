<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\RegisterController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/', function () {
    return view('main');
});

//LOGIN
Route::get('login',[LoginController::class,'index'])->name('login');
Route::post('login',[LoginController::class,'store']);

//REGISTER
Route::get('register',[RegisterController::class,'index'])->name('register');
Route::post('register',[RegisterController::class,'register']);




Route::middleware('auth')->group(function () { //le añadimos el middleware para impedir el acceso a las rutas sin loguearse
    //LOGOUT
    Route::post('logout',[LogoutController::class,'store'])->name('logout');
     //EVENTS
    Route::get('/events/{id}', [EventController::class,'show'])->name('show');
    Route::get('create', [EventController::class,'create'])->name('create');
    Route::get('{user:name}', [EventController::class,'index'])->name('index');
    Route::get('/events/{id}/register',[EventController::class,'register'])->name('eventRegister'); //form para registrar un nuevo asistente al evento
    Route::post('/events', [EventController::class, 'store'])->name('store');
    Route::post('/events/{id}/attendees',[EventController::class,'storeAttendee'])->name('storeAttendee'); 
    Route::get('edit/{id}', [EventController::class, 'edit'])->name('editEvent');
    Route::put('update/{id}', [EventController::class, 'update'])->name('updateEvent');
    Route::delete('destroy/{id}', [EventController::class, 'destroy'])->name('destroyEvent');    
});
