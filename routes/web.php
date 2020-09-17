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

Route::post('/search', 'FreelancerController@search')->name('search');
Route::put('/advanced_search', 'FreelancerController@advanced_search')->name('advanced_search');

Route::get('/users/{username}/profile', 'ProfileController@viewprofile')->name('viewprofile');
Route::get('/users/{username}/profile/edit', 'ProfileController@editprofile')->name('editprofile');
Route::put('/users/{username}/profile/edit', 'ProfileController@updateprofile')->name('profile.updateprofile');
Route::get('/users/{username}/profile/edit/password', 'ProfileController@editpassword')->name('editpassword');
Route::post('/profile/edit/upload', 'ProfileController@store_pro_pic')->name('profile.store_pro_pic');
Route::put('/profile/edit/upload', 'ProfileController@delete_pro_pic')->name('profile.delete_pro_pic');
Route::get('/users/{username}/manage_sales', 'FreelancerController@manage_sales')->name('freelancer.manage_sales');
Route::get('/jobs/create', 'EmployerController@jobcreate')->name('jobs.create');
Route::post('/jobs', 'EmployerController@jobstore')->name('jobs.store');
Route::get('/profile/jobs/{job}', 'EmployerController@showjob')->name('employer.showjob');
Route::post('/jobs/applications/profile', 'EmployerController@show_free_prof')->name('employer.show_free_prof');
Route::post('/jobs/applications/accept', 'EmployerController@acceptapp')->name('employer.acceptapp');
Route::post('/jobs/applications/reject', 'EmployerController@rejectapp')->name('employer.rejectapp');
Route::get('/jobs/{job}', 'FreelancerController@showjob')->name('freelancer.showjob');
Route::post('/jobs/{job}', 'FreelancerController@applyjob')->name('freelancer.applyjob');
Route::put('/jobs/{job}', 'FreelancerController@canceljobapp')->name('freelancer.canceljobapp');

//Admin Routes
Route::get('/admin', 'AdminController@index')->name('admin.dashboard');
Route::get('/admin/jobapplications', 'AdminController@jobs')->name('admin.jobs');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
