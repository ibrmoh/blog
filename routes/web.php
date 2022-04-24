<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\TaskController;


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


Route::get('/about', function(){
$name ='ibrahim';
$age ='22';

    // return view('about',[
    //     'name' => $name,
    //     'age' => $age
    // ]);
return view('about')->with('name',$name)->with('age',$age);
    //return view('about',compact('name','age'));
});





Route::get('tasks', function () {
    $tasks= [
        '1'=>'task 1',
        '2'=>'task 2',
        '3'=> 'task 3',
        '4'=>'task 4',
    ];
    return view('tasks',compact('tasks'));
});

Route::get('/show/{id}', function ($id) {
    $tasks= [
      '1'=>  'task 1',
      '2'=>  'task 2',
      '3'=> 'task 3',
      '4'=> 'task 4',
    ];
    $task = $tasks[$id];
    return view('tasks',compact('task'));
});


Route::post('/tasks', function () {
    $name= $_POST['name'];
    return view('tasks',compact('name'));
});


Route::get('tasks', function () {
    $tasks= DB::table('tasks')->get();

    return view('tasks',compact('tasks'));
});

Route::get('/task/{id}', function($id) {
    $task= DB::table('tasks')->find($id);

    return view('task',compact('task'));
});

Route::get('/', [TaskController::class,'index'])->name('task.index');
Route::get('/task/{id}', [TaskController::class,'show']);
Route::post('/task/store', [TaskController::class,'store'])->name('task.store');
Route::delete('/task/destroy/{id}', [TaskController::class,'destroy'])->name('task.destroy');
Route::post('/tasks/edit/{id}', [TaskController::class, 'edit'])->name('task.edit');
Route::put('/tasks/update/{id}',[TaskController::class,'update'])->name('task.update');