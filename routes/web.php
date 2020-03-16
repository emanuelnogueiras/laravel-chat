<?php

use Illuminate\Support\Facades\Route;

Route::get("/", "HomeController@index");
Route::get("/test", function(){
    event(new \App\Events\NuevoMensaje('{"usuario": "Emanuel", "mensaje": "hola"}'));
    return "Enviado..." . now();
});
