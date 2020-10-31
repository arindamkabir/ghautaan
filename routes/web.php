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

// Profile Routes Start

Route::get('/profile/{username}', 'ProfileController@viewprofile')->name('profile.view');
Route::get('/profile/{username}/edit', 'ProfileController@editprofile')->name('profile.edit');
Route::put('/profile/{username}/edit', 'ProfileController@updateprofile')->name('profile.update');

// Password Change Routes
Route::get('/profile/{username}/edit/password', 'ProfileController@editpassword')->name('profile.password.edit');

// Profile Picture Routes
Route::post('/profile/edit/upload', 'ProfileController@store_pro_pic')->name('profile.pro_pic.store');
Route::put('/profile/edit/upload', 'ProfileController@delete_pro_pic')->name('profile.pro_pic.delete');

// Profile Routes End



Route::get('/jobs/create', 'EmployerController@jobcreate')->name('jobs.create');
Route::post('/jobs', 'EmployerController@jobstore')->name('jobs.store');
Route::get('/profile/jobs/{job}', 'EmployerController@showjob')->name('employer.showjob');
Route::post('/jobs/applications/profile', 'EmployerController@show_free_prof')->name('employer.show_free_prof');
Route::get('/jobs/ongoing/{job}', 'EmployerController@show_ongoing_job')->name('employer.jobs.ongoing.show');
Route::post('/jobs/ongoing/profile', 'EmployerController@ongoing_freelancer_profile')->name('employer.jobs.ongoing.show.profile');
Route::post('/jobs/ongoing/jobs/', 'EmployerController@mark_job_completed')->name('employer.jobs.mark_completed');
Route::post('/jobs/applications/accept', 'EmployerController@acceptapp')->name('employer.acceptapp');
Route::post('/jobs/applications/reject', 'EmployerController@rejectapp')->name('employer.rejectapp');
Route::get('/jobs/{job}', 'FreelancerController@showjob')->name('freelancer.showjob');
Route::post('/jobs/{job}', 'FreelancerController@applyjob')->name('freelancer.applyjob');
Route::put('/jobs/{job}', 'FreelancerController@canceljobapp')->name('freelancer.canceljobapp');
Route::get('/manage_sales', 'FreelancerController@manage_sales')->name('freelancer.sales.view');

//Admin Routes
Route::get('/admin', 'AdminController@index')->name('admin.dashboard');
Route::get('/admin/jobapplications', 'AdminController@jobs')->name('admin.jobs');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
