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

// Route::get('/', function () {
//     return view('Home');
// });
Route::get('/','HomeController@HomeIndex')->middleware('loginCheck');

Route::get('/visitor','VisitiorController@VisitorIndex')->middleware('loginCheck');

// ..............Admin panel service Management route..............

Route::get('/services','ServiceController@ServiceIndex')->middleware('loginCheck');

Route::get('/getServicesData','ServiceController@getServiceData')->middleware('loginCheck');

// Route::get('/servicesDelete','ServiceController@serviceDelete')->middleware('loginCheck');

Route::post('/servicesDelete','ServiceController@serviceDelete')->middleware('loginCheck');

Route::post('/servicesDetails','ServiceController@getServiceDetails')->middleware('loginCheck');

Route::post('/servicesUpdate','ServiceController@getServiceUpdate')->middleware('loginCheck');

Route::post('/servicesAdd','ServiceController@getServiceAdd')->middleware('loginCheck');

//..............admin panel courses management........

Route::get('/courses','CoursesController@CoursesIndex')->middleware('loginCheck');
Route::get('/getCoursesData','CoursesController@getCoursesData')->middleware('loginCheck');
Route::post('/coursesDelete','CoursesController@CourseDelete')->middleware('loginCheck');
Route::post('/coursesDetails','CoursesController@getCourseDetails')->middleware('loginCheck');
Route::post('/coursesUpdate','CoursesController@getCourseUpdate')->middleware('loginCheck');
Route::post('/coursesAdd','CoursesController@getCourseAdd')->middleware('loginCheck');

//......Admin panel for projects management.......

Route::get('/projects','ProjectsController@ProjectsIndex')->middleware('loginCheck');

Route::get('/getProjectsData','ProjectsController@getProjectsData')->middleware('loginCheck');

Route::post('/projectDelete','ProjectsController@projectDelete')->middleware('loginCheck');

Route::post('/projectDetails','ProjectsController@getProjectDetails')->middleware('loginCheck');

Route::post('/projectsUpdate','ProjectsController@getProjectUpdate')->middleware('loginCheck');

Route::post('/projectAdd','ProjectsController@getProjectAdd')->middleware('loginCheck');

//..............admin panel routes for contacts management.........

Route::get('/contacts','ContactsController@ContactsIndex')->middleware('loginCheck');

Route::get('/getContactsData','ContactsController@getContactsData')->middleware('loginCheck');

Route::post('/contactDelete','ContactsController@contactDelete')->middleware('loginCheck');

Route::post('/projectDetails','ContactsController@getProjectDetails')->middleware('loginCheck');

Route::post('/projectsUpdate','ContactsController@getProjectUpdate')->middleware('loginCheck');

Route::post('/projectAdd','ContactsController@getProjectAdd')->middleware('loginCheck');

//...................Admin panel routes for reviews management..............

Route::get('/reviews','ReviewController@reviewIndex')->middleware('loginCheck');

Route::get('/getReviewsData','ReviewController@getReviewsData')->middleware('loginCheck');

Route::post('/reviewDelete','ReviewController@reviewDelete')->middleware('loginCheck');

Route::post('/reviewDetails','ReviewController@getReviewDetails')->middleware('loginCheck');

Route::post('/reviewsUpdate','ReviewController@getReviewUpdate')->middleware('loginCheck');

Route::post('/reviewAdd','ReviewController@getReviewAdd')->middleware('loginCheck');

//......................Login ....................

Route::get('/login','LoginController@loginIndex');

Route::post('/onLogin','LoginController@onLogin');

Route::get('/logout','LoginController@onLogout');

//..............Admin photo management....

Route::get('/photo','PhotoController@photoIndex')->middleware('loginCheck');

Route::post('/photoUpload','PhotoController@photoUpload')->middleware('loginCheck');

Route::get('/photoJSON','PhotoController@photoJSON')->middleware('loginCheck');

Route::get('/photoJSONById/{id}','PhotoController@photoJSONById')->middleware('loginCheck');

Route::post('/photoDelete','PhotoController@photoDelete')->middleware('loginCheck');
