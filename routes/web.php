<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InicioController;
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



Auth::routes(['verify' => true]);



//Rutas Protegidas
Route::group(['middleware' => ['auth','verified']], function () {

    //Rutas Vacantes

Route::get('/vacantes', [App\Http\Controllers\VacanteController::class,'index'])->name('vacantes.index');
Route::get('/vacantes/create', [App\Http\Controllers\VacanteController::class,'create'])->name('vacantes.create');
Route::post('/vacantes', [App\Http\Controllers\VacanteController::class,'store'])->name('vacantes.store');
Route::get('/vacantes/{vacante}/edit', [App\Http\Controllers\VacanteController::class,'edit'])->name('vacantes.edit');
Route::put('/vacante/{vacante}', [App\Http\Controllers\VacanteController::class,'update'])->name('vacantes.update');
//Rutas Candidato
Route::post('/candidatos',[App\Http\Controllers\CandidatoController::class,'store'])->name('candidatos.store');

//Subir imagenes

Route::post('/vacantes/imagen', [App\Http\Controllers\VacanteController::class,'imagen'])->name('vacantes.imagen');

Route::post('/vacantes/borrarimagen', [App\Http\Controllers\VacanteController::class,'borrar'])->name('vacantes.borrarimagen');

//notificaciones invoque
Route::get('/notificaciones', NotificationesController::class )->name('notificaciones');

//Estado
Route::post('/activos/{vacante}', [App\Http\Controllers\VacanteController::class,'EstadoVacante'])->name('vacantes.estado');

//eliminar Vacantes
Route::delete('/vacantes/{vacante}', [App\Http\Controllers\VacanteController::class,'destroy'])->name('vacantes.destroy');



});

//Pagina de Inicio
Route::get('/', InicioController::class)->name('inicio');

Route::get('/categorias/{categoria}',[App\Http\Controllers\CategoriaController::class,'show'])->name('categoria.show');

//Muestra los trabajos del frontend sin autenticacion
Route::get('/vacantes/{vacante}', [App\Http\Controllers\VacanteController::class,'show'])->name('vacantes.show');
Route::get('/candidatos/{id}',[App\Http\Controllers\CandidatoController::class,'index'])->name('candidatos.index');

//buscador
Route::get('/busqueda/buscarresul', [App\Http\Controllers\VacanteController::class,'resultado'])->name('vacantes.resultado');
Route::post('/busqueda/buscar', [App\Http\Controllers\VacanteController::class,'buscar'])->name('vacantes.buscar');

