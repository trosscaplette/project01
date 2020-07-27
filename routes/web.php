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

//Jobs
Route::get('/', 'JobController@index');
Route::get('jobs/create','JobController@create')->name('jobs.create');
Route::post('jobs/create','JobController@store')->name('jobs.store');
Route::get('/jobs/{id}/edit','JobController@edit')->name('jobs.edit');
Route::post('/jobs/{id}/edit','JobController@update')->name('jobs.update');
Route::get('/jobs/{id}/{job}','JobController@show')->name('jobs.show');
Route::get('/jobs/my-job','JobController@myjob')->name('my.jobs');

Route::get('/jobs/applications','JobController@applicant')->name('applicants');
Route::get('/jobs/alljobs','JobController@allJobs')->name('alljobs');

//Search Routes
Route::get('/jobs/search','JobController@searchJobs')->name('searchjobs');


Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');

//Company
Route::get('/company/{id}/{company}','CompanyController@index')->name('company.index');
Route::get('company/create','CompanyController@create')->name('company.view');
Route::post('company/create','CompanyController@store')->name('company.store');
Route::post('company/coverphoto','CompanyController@coverPhoto')->name('company.cover.photo');
Route::post('company/logo','CompanyController@companyLogo')->name('company.logo');

//User Profile
Route::get('user/profile','UserProfileController@index')->name('profile.view');
Route::get('/user/profile/{id}/{profile}','UserProfileController@show')->name('profile.show');
Route::get('user/featured-companies','UserProfileController@company')->name('profile.company');
Route::get('user/featured-jobs','UserProfileController@featuredjobs')->name('profile.featuredjobs');
Route::post('user/profile/create','UserProfileController@store')->name('profile.create');
Route::post('user/coverletter','UserProfileController@coverletter')->name('cover.letter');
Route::post('user/resume','UserProfileController@resume')->name('resume');
Route::post('user/avatar','UserProfileController@avatar')->name('avatar');
Route::post('user/coverphoto','UserProfileController@coverphoto')->name('cover.photo');

//User Profile Lessons


//Employer View
Route::view('employer/register','auth.employer-register')->name('employer.register');
Route::post('employer/register','EmployerRegisterController@employerRegister')->name('emp.register');
Route::post('/applications/{id}','JobController@apply')->name('apply');

//Save and Unsave Routes
Route::post('/save/{id}','FavouriteController@saveJob');
Route::post('/unsave/{id}','FavouriteController@unsaveJob');

//NameCard View
Route::get('/namecards', 'NameCardController@index')->name('namecards.index');
Route::get('namecard/create','NameCardController@create')->name('namecards.view');
Route::post('namecard/create','NameCardController@store')->name('namecards.store');
//Route::get('/namecard/{id}/{namecard}','NameCardController@show')->name('namecards.show');
//Route::get('/namecard/{id}/edit','NameCardController@edit')->name('namecards.edit');
//Route::post('/namecard/{id}/edit','NameCardController@update')->name('namecards.update');

//Email Routes
Route::post('/job/send', 'EmailController@send')->name('mail');

//Admin Routes
Route::get('/dashboard','DashboardController@index')->middleware('admin');
Route::get('/dashboard/trash','DashboardController@trash')->middleware('admin');
//Admin Job Views
Route::get('/dashboard/jobs','DashboardController@getAllJobs')->middleware('admin');
Route::get('/dashboard/{id}/jobs','DashboardController@changeJobStatus')->name('job.status')->middleware('admin');
//Admin User Views
Route::get('/dashboard/users','DashboardController@getAllUsers')->middleware('admin');
