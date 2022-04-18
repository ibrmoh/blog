<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\taskcontroller;
use Illuminate\Support\Facades\DB;
Route::post('/tasks/update/{id}', [taskcontroller::class,'update'])->name('task.update');
Route::put('/{id}', [taskcontroller::class,'edit'])->name('task.edit');
