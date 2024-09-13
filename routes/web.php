<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InternController;

Route::get('/', [InternController::class, 'index'])->name('intern#index');
Route::get('/basic-webtoon',[InternController::class, 'basicWebtoon'])->name('course#basic');
Route::get('/introduction', [InternController::class, 'intro'])->name('course#introduction');
Route::get('/basic-sketchup', [InternController::class, 'basicSketchup'])->name('course#basicSketchup'); 
Route::get('/sketchup-photoshop', [InternController::class, 'sketchupPhotoshop'])->name('course#sketchupPhotoshop');




