<?php

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


// Site
Route::get('/', function () {
    return view('site.index');
});

Route::get('/cockpit','RegisterController@cockpit');


Route::get('/cadastro', 'RegisterController@create');

Route::post('/cadastro', 'RegisterController@store');

Route::get('/login', 'RegisterController@login');

Route::post('/login', 'RegisterController@storeLogin');

Route::get('/perguntas', 'AwnseredController@index')->name('question');

Route::post('/perguntas/{question}/salvar', 'AwnseredController@store');

Route::get('/gabarito', 'FeedbackController@index');

Route::get('/parabens', 'FeedbackController@congratualtions');

// Admin

Route::prefix('admin')->group(function(){

// 0 - Autenticação
    Route::get('/register', 'AdminController@create');

    Route::post('/register', 'AdminController@store');

    Route::get('/login', 'SessionController@index')->name('login');

    Route::post('/login', 'SessionController@store');

    Route::get('/logout', 'SessionController@destroy');


// 1 - Quiz
    Route::get('/', 'QuizController@index')->name('home');

    Route::get('/quiz/create', 'QuizController@create');

    Route::post('/quiz/create', 'QuizController@store');

    Route::get('/quiz/{quiz}', 'QuizController@edit');

    Route::patch('/quiz/{quiz}', 'QuizController@update');

    Route::patch('/quiz/{quiz}/delete', 'QuizController@destroy');


// 2 - Questões

    Route::get('/question/{quiz}', 'QuestionController@index');

    Route::get('/question/{quiz}/create', 'QuestionController@create');

    Route::post('/question/{quiz}/create', 'QuestionController@store');

    Route::get('/question/{quiz}/{question}', 'QuestionController@edit')->name('edit-question');

    Route::patch('/question/{quiz}/{question}', 'QuestionController@update');

    Route::patch('/question/{quiz}/{question}/delete', 'QuestionController@destroy');


// 3 - Respostas
    Route::post('/question/{question}/answer', 'AnswerController@store');

    Route::patch('/question/{quiz}/orderUpdate', 'QuestionController@orderUpdate');

    //Route::patch('/question/{quiz}/{question}/delete', 'QuizController@destroy');


// 4 Usuários
    Route::get('/users', 'UserController@index');

    Route::get('/users/create', 'UserController@create');

    Route::post('/users/create', 'UserController@store');

    Route::get('/users/{user}', 'UserController@edit');

    Route::patch('/users/{user}', 'UserController@update');

    Route::patch('/users/{user}/delete', 'UserController@destroy');


// 5 Winners
    Route::get('/winners', 'WinnerController@index');

    Route::get('/winners/{register}', 'WinnerController@edit');

    Route::patch('/winners/{register}', 'WinnerController@update');

    Route::patch('/winners/{register}/delete', 'WinnerController@destroy');

    Route::get('/winners/{register}/pdf', 'WinnerController@generatePDF');

    Route::get('/winners/{register}/corrigir', 'WinnerController@generatePDFCorrigido');



});

Auth::routes();

//Route::get('/admin/register', function () {
//    return view('admin.auth.register');
//});



//Route::get('/home', 'HomeController@index')->name('home');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
