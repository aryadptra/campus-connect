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

Route::get('/', function () {
    return view('frontend.index');
});

Route::get('/', 'UniversityController@index')->name('home');
Route::get('/universities-all', 'UniversityController@all')->name('universities');
Route::get('/university/detail/{university}', 'UniversityController@show')->name('detail');
Route::post('/university/add-favorite/{university}', 'UniversityController@addFavorite')->name('favorite');
Route::post('/university/remove-favorite/{university}', 'UniversityController@removeFavorite')->name('unfavorite');

// Blog
Route::get('/blog', 'UniversityBlogController@index')->name('blog');

// User
Route::get('/user', 'UserController@index')->name('user');
Route::put('/user/update', 'UserController@update')->name('user.update');


Route::group(['middleware' => 'admin'], function () {
    Route::get('/dashboard', function () {
        return view('backend.pages.dashboard');
    })->name('dashboard');

    Route::resource('universities', 'Admin\UniversityController');

    Route::resource('university-faculties', 'Admin\UniversityFacultyController');
    Route::get('university/{university}/university-faculties/create', 'Admin\UniversityFacultyController@create')->name('university-faculties.create');

    Route::resource('university-study-program', 'Admin\UniversityStudyProgramsController');
    Route::get('university-faculty/{universityFaculty}/university-study-program/create', 'Admin\UniversityStudyProgramsController@create')->name('university-study-program.create');

    // Route::resource('university-register-schedule', 'Admin\UniversityRegisterSchedulesController');

    Route::resource('university-register-snm', 'Admin\UniversityRegisterSnmController');
    Route::resource('university-register-sbm', 'Admin\UniversityRegisterSbmController');
    Route::resource('university-register-mandiri', 'Admin\UniversityRegisterMandiriController');

    Route::resource('university-blog', 'Admin\UniversityBlogController');
    Route::get('university/{university}/university-blog/create', 'Admin\UniversityBlogController@create')->name('university-blog.create');
});


require __DIR__ . '/auth.php';
