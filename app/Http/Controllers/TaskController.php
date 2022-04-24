<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use  App\models\Task;


class TaskController extends Controller
{


    public function index()
    {
        //$tasks=DB::table('tasks')->get();

        $tasks = Task::all()->sortBy('name');
        return view('tasks.index', compact('tasks'));
    }
    public function show($id)
    {
        $task = DB::table('tasks')->find($id);
        return view('tasks.show', compact('task'));
    }
    public function store(Request $request)
    {
        //     $task = DB::table('tasks')->insert([
        //'name'=>$request->name
        $validated = $request->validate([

            'name' => 'required|min:4|max:30',
        ]);

        $task = new Task();
        $task->name = $request->name;
        $task->save();


        return redirect()->back();
    }



    public function destroy($id)
    {
        //  DB::table('tasks')->where('id','=',$id)->delete();
        Task::find($id)->delete();
        return redirect()->back();
    }
    public function edit($id)
    {

        $task = Task::find($id);
        $tasks = Task::all()->sortBy('name');
        return view('tasks.edit', compact('task', 'tasks'));
    }

    public function update(Request $request, $id)
    {

        $tasks = Task::all()->sortBy('name');
        $task = Task::find($id);
        $task->name = $request->name;
        $task->save();
        return redirect('/');
    }
}