<?php

use Illuminate\Support\Facades\Route;

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

/*
    // Define Route 
Route::get('/', function () {
    return 'home Page';
});

Route::get('/contact', function() {
    return 'Contact';
});
*/
//     //  Naming Route 
// Route::get('/', function () {
//     return view('home.index');
// })->name('home.index');
    
// Route::get('/', function() {
//     return view('home.contact');
// })->name('home.contact');

// Route Parameters
/*
Route::get('/posts/1', function(){
    return 'Blog post 1';
});

Route::get('/posts/2', function(){
    return 'Blog post 2';
});

Route::get('/posts/3', function(){
    return 'Blog post 3'; 
});
*/

/*
Route::get('/posts/{id}', function($id){
    return 'Blog post ' . $id;
})->name('posts.show');
*/
    //Optional Route Parameters
Route::get('/recent-posts/{days_ago?}', function($daysAgo = 20){
    return 'Posts from ' . $daysAgo . ' days ago';
})->name('posts.recent.index');

    //Simple View Rendering Routes
Route::view('/','home.index')
    ->name('home.index');

Route::view('/contact','home.contact')
    ->name('home.contact');

    //Constraining Possible Route Parameters Values
Route::get('/posts/{id}', function($id) {
    $posts = [
        1 => [
            'title' => 'intro to laravel',
            'content' => 'this is a short intro to laravel',
            'is_new' => true,
            'has_comments' => true 
        ],

        2 => [
            'title' => 'intro to PHP',
            'content' => 'this is a short intro to php',
            'is_new' => false
        ],
        3 => [
            'title' => 'intro to python',
            'content' => 'this is a short intro to python',
            'is_new' => true
        ]
    ];

    abort_if(!isset($posts[$id]), 404);

    return view('posts.show', ['post' => $posts[$id]]); 
})
    // ->where([
    // 'id' => '[0-9]+'
    // ])
    ->name('posts.show');


    //-- 003 Passing and Rendering Data in Templates

