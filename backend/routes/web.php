<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return response()->json([
        'message' => 'Covid Vaccine Registration API',
        'status' => 200,
        'language' => 'PHP ' . phpversion(),
        'framework' => config('app.name') . ' ' . app()->version()
    ]);
});
