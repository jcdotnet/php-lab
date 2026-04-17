<?php

use Illuminate\Support\Facades\Route;
use App\Models\Skill;

Route::get('/', function () {
    return view('home', [
        'skills' => Skill::all()
    ]);
});
Route::get('/laravel', function () {
    return view('welcome');
});
