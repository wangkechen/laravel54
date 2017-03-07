<?php

Route::get('/', 'PostsController@index');
Route::get('/posts/create', 'PostsController@create');
Route::post('/posts', 'PostsController@store');
Route::get('/posts/{post}', 'PostsController@show');
Route::post('/posts/{post}/comments', 'CommentsController@store');



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