<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NotificationesController;
use Symfony\Component\Routing\Annotation\Route as AnnotationRoute;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Rutas Protegidas
Route::group(['middleware' => ['auth','verified']], function () {

    //Rutas Vacantes

Route::get('/vacantes', [App\Http\Controllers\VacanteController::class,'index'])->name('vacantes.index');
Route::get('/vacantes/create', [App\Http\Controllers\VacanteController::class,'create'])->name('vacantes.create');
Route::post('/vacantes', [App\Http\Controllers\VacanteController::class,'store'])->name('vacantes.store');

//Rutas Candidato
Route::post('/candidatos',[App\Http\Controllers\CandidatoController::class,'store'])->name('candidatos.store');

//Subir imagenes

Route::post('/vacantes/imagen', [App\Http\Controllers\VacanteController::class,'imagen'])->name('vacantes.imagen');

Route::post('/vacantes/borrarimagen', [App\Http\Controllers\VacanteController::class,'borrar'])->name('vacantes.borrarimagen');

//notificaciones invoque
Route::get('/notificaciones', NotificationesController::class )->name('notificaciones');

//Estado 
Route::post('/activos/{vacante}', [App\Http\Controllers\VacanteController::class,'EstadoVacante'])->name('vacantes.estado');


});

//Muestra los trabajos del frontend sin autenticacion
Route::get('/vacantes/{vacante}', [App\Http\Controllers\VacanteController::class,'show'])->name('vacantes.show');
Route::get('/candidatos/{id}',[App\Http\Controllers\CandidatoController::class,'index'])->name('candidatos.index');


