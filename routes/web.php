<?php

Route::get('/', 'PostsController@index');
Route::get('/posts/{posts}', 'PostsController@show');

Route::get('/tasks', 'TasksController@index');
Route::get('/tasks/{task}', 'TasksController@show');

/*
 * Route::get('/tasks', function () {


});
*/

/*
 * Route::get('/tasks/{task}', function ($id) {

    $task = DB::table('task')->find($id);

    return view('tasks.show',compact('task'));
});
*/