<?php

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
/*
Route::get('/', function () {
    return view('welcome');
});
*/

//tienda


Route::get('listado_tienda','TiendaController@listado'); //listado de los comics
Route::get('comprar/{id}','TiendaController@comprar')->where('id','[0-9]+'); //form modificar comic

//Panel de administración

//Route::get('/','ComicsController@index');
Route::resource('/','ComicsController');
Route::get('create','ComicsController@create'); //Form crear comic
Route::post('store','ComicsController@store');  //funcion crear comic
Route::get('store','ComicsController@index');
Route::get('listado','ComicsController@listado'); //listado de los comics
Route::get('update/{id}','ComicsController@update')->where('id','[0-9]+'); //form modificar comic
Route::post('store_update','ComicsController@store_update');//funcion modificar comic
Route::get('store_update','ComicsController@index');
Route::get('delete/{id}','ComicsController@delete')->where('id','[0-9]+');//borrar comic
Route::get('delete_img/{id}','ComicsController@delete_img')->where('id','[0-9]+');//borrar imagen

//loginController
Route::get('login', 'loginController@login'); //form login
Route::get('logout', 'loginController@logout');//destruimos sesion y redirigimos al login
Route::post('valida', 'loginController@valida');// comprueba login

// Route::post('listado','ComicsController@listado');
















//Route::get('/', function () {return view('login');});

/*
Route::get('/', 'ComicsController@login');
Route::get('/login', 'ComicsController@login');
//Route::get('/listado', 'ComicsController@login');
Route::get('/listado', function(){
    $comics= App\ListadoComics::all();
    return $comics;
});


Route::get('/comic', 'ComicsController@comic');

*/
