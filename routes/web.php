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
Route::any('/search', 'FreelancerController@search')->name('search');

Route::any('/profile/{username}', 'ProfileController@show')->name('profile');
Route::get('/jobs/create', 'EmployerController@jobcreate')->name('jobs.create');
Route::post('/jobs', 'EmployerController@jobstore')->name('jobs.store');
Route::get('/profile/jobs/{job}', 'EmployerController@showjob')->name('employer.showjob');
Route::post('/jobs/applications/profile', 'EmployerController@showfreeprofile')->name('employer.showfreeprofile');
Route::post('/jobs/applications/accept', 'EmployerController@acceptapp')->name('employer.acceptapp');
Route::post('/jobs/applications/reject', 'EmployerController@rejectapp')->name('employer.rejectapp');
Route::get('/jobs/{job}', 'FreelancerController@showjob')->name('freelancer.showjob');
Route::post('/jobs/{job}', 'FreelancerController@applyjob')->name('freelancer.applyjob');
Route::put('/jobs/{job}', 'FreelancerController@canceljobapp')->name('freelancer.canceljobapp');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
