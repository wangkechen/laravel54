<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;

class Taskscontroller extends Controller
{
    public function index()
    {
        $tasks = Task::all();
        return view('tasks.index',compact('tasks'));
    }

    public function show(Task $task)
    {
        //路由中传的变量为$task,名称必须一致
        //Route::get('/tasks/{task}', 'TasksController@show');
        /*
            return $task;
        */
        //相当于$task = Task::find($id);
        return view('tasks.show',compact('task'));
    }

}
