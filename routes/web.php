<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Qui definiamo le route della tua applicazione Laravel.
| Per una SPA React, qualsiasi route deve ritornare la stessa view 'app'.
|
*/

// Route per tutte le richieste
Route::get('/{any?}', function () {
    // Deve esistere resources/views/app.blade.php
    return view('app');
})->where('any', '.*');
