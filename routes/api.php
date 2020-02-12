<?php
use Illuminate\Http\Request;
/*API Routes
|--------------------------------------------------------------------------
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API! */

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});
Route::group(['middleware'=>'cors'],function(){
    //-----------------------------------------LOCALES----------------------------------------------
    //dv un local por id:http://localhost:8000/api/locales/{1}
    //dv todos los locales:http://localhost:8000/api/locales
    Route::resource('/locales','LocalesController');

    //dv resutados de una busqueda:http://localhost:8000/api/ruta/?ubicacion=peru
    Route::get('/ruta', 'LocalesController@ObtenerLocal');

    //-------------------------------------------RESERVAS-------------------------------------------
    //dv todas las reservas:http://localhost:8000/api/reservas
    //Para insertar una reserva:http://localhost:8000/api/reservas + (algo por POST)--- 
    //Para actualisar una reserva://http://localhost:8000/api/reservas/{id} + (algo por PUT)---
    //dv una reserva por id: http://localhost:8000/api/reservas/{id}
    Route::resource('/reservas','ReservasController');

    //dv una reserva por codigo:http://localhost:8000/api/reservas/buscarReserva/T188VFB7
    Route::get('/reservas/buscarReserva/{reserva_codigo}','ReservasController@buscarReservaPorCodigo');

    //Para borrar una reserva: http://localhost:8000/api/reservas/borrar/6
    Route::get('/reservas/borrar/{id}','ReservasController@BorradoLogico');  
    
    //login de modificar una reserva:http://localhost:8000/api/reservas/loginModificarReserva
    Route::post('/reservas/loginModificarReserva','ReservasController@LoginParaModificarReserva');
    
    //ruta para modificar/actualisar una reserva:
    Route::post('/reservas/modificarReserva','ReservasController@ActualizarUnaReserva');

    //ruta para insertar una reserva:
    Route::post('/reservas/insertarReserva','ReservasController@store');
    
    //--------------------------------------------UNIDADES------------------------------------------
    //dv todas las unidades:http://localhost:8000/api/unidades
    Route::apiResource('/unidades','UnidadController');
});
