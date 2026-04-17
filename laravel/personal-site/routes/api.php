<?php

use App\Http\Controllers\CategoryRestController;
use App\Http\Controllers\SkillRestController;
use App\Http\Middleware\BasicAuthMiddleware;
//use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//Route::get('/user', function (Request $request) {
//    return $request->user();
//})->middleware('auth:sanctum');


Route::get('/categories', [CategoryRestController::class, 'index']);
Route::get('/categories/skills', [CategoryRestController::class, 'indexWithSkills']);
Route::get('/categories/{id}', [CategoryRestController::class, 'show']);
Route::get('/categories/{id}/skills', [CategoryRestController::class, 'showWithSkills']);
Route::get('/categories/slug/{slug}', [CategoryRestController::class, 'showBySlug']);
Route::get('/categories/slug/{slug}/skills',[CategoryRestController::class, 'showBySlugWithSkills']);

Route::get('/skills', [SkillRestController::class, 'index']);
Route::get('/skills/{id}', [SkillRestController::class, 'show']);
Route::get('/skills/{id}/experiences', [SkillRestController::class, 'showWithExperiences']);
Route::post('/skills', [SkillRestController::class, 'store'])->middleware(BasicAuthMiddleware::class);
Route::delete('/skills/{id}', [SkillRestController::class, 'destroy'])->middleware(BasicAuthMiddleware::class);