<?php

use Illuminate\Support\Facades\Route;

Route::get("/post", function () {
    return "Hello Poat";
})->middleware('age:10');
