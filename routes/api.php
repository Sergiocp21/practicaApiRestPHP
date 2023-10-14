<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RestaurantController;


Route::post('/restaurant', ['App\Http\Controllers\RestaurantController', 'create']); // Ruta para crear un restaurante (esta así porque necesita un json para crearse y no se ponen los datos en la propia url, ocurre lo mismo en update)
Route::get('/restaurant', 'App\Http\Controllers\RestaurantController@readAll'); // Ruta para leer todos los restaurantes
Route::get('/restaurant/{id}', 'App\Http\Controllers\RestaurantController@read'); // Ruta para leer un restaurante por ID
Route::put('/restaurant/{id}', ['App\Http\Controllers\RestaurantController', 'update']); // Ruta para actualizar un restaurante por ID
Route::delete('/restaurant/{id}', 'App\Http\Controllers\RestaurantController@delete'); // Ruta para eliminar un restaurante por ID


