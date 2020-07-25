<?php

use App\Repositories\TodoRepositoryInterface;

Route::get('/', function () {
    return view('welcome');
});

// Route::match(['get', 'post'], '/botman', 'BotManController@handle');
Route::match(['get', 'post'], '/botman', 'TodosController@handle');
Route::get('/botman/tinker', 'BotManController@tinker');


Route::get('test', function(TodoRepositoryInterface $repository) {

    $todo = [
        'title' => 'Title 3',
        'description' => 'dddd'
    ];

    $repository->store($todo);
    
    dd($repository->all());
});