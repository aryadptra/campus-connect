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
    return view('welcome');
});



Route::group(['middleware' => 'admin'], function () {
    Route::get('/dashboard', function () {
        return view('backend.pages.dashboard');
    })->name('dashboard');

    Route::resource('universities', 'Admin\UniversityController');
    
    Route::resource('university-faculties', 'Admin\UniversityFacultyController');
    Route::get('university/{university}/university-faculties/create', 'Admin\UniversityFacultyController@create')->name('university-faculties.create');

    Route::resource('university-study-program', 'Admin\UniversityStudyProgramsController');
    Route::get('university-faculty/{universityFaculty}/university-study-program/create', 'Admin\UniversityStudyProgramsController@create')->name('university-study-program.create');
});


require __DIR__ . '/auth.php';