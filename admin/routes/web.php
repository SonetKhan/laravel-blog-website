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
Route::get('/','HomeController@HomeIndex');

Route::get('/visitor','VisitiorController@VisitorIndex');

// ..............Admin panel service Management route..............

Route::get('/services','ServiceController@ServiceIndex');

Route::get('/getServicesData','ServiceController@getServiceData');

// Route::get('/servicesDelete','ServiceController@serviceDelete');

Route::post('/servicesDelete','ServiceController@serviceDelete');

Route::post('/servicesDetails','ServiceController@getServiceDetails');

Route::post('/servicesUpdate','ServiceController@getServiceUpdate');

Route::post('/servicesAdd','ServiceController@getServiceAdd');

//..............admin panel courses management........

Route::get('/courses','CoursesController@CoursesIndex');
Route::get('/getCoursesData','CoursesController@getCoursesData');
Route::post('/coursesDelete','CoursesController@CourseDelete');
Route::post('/coursesDetails','CoursesController@getCourseDetails');
Route::post('/coursesUpdate','CoursesController@getCourseUpdate');
Route::post('/coursesAdd','CoursesController@getCourseAdd');

//......Admin panel for projects management.......

Route::get('/projects','ProjectsController@ProjectsIndex');

Route::get('/getProjectsData','ProjectsController@getProjectsData');

Route::post('/projectDelete','ProjectsController@projectDelete');

Route::post('/projectDetails','ProjectsController@getProjectDetails');

Route::post('/projectsUpdate','ProjectsController@getProjectUpdate');

Route::post('/projectAdd','ProjectsController@getProjectAdd');

//..............admin panel routes for contacts management.........

Route::get('/contacts','ContactsController@ContactsIndex');

Route::get('/getContactsData','ContactsController@getContactsData');

Route::post('/contactDelete','ContactsController@contactDelete');

Route::post('/projectDetails','ContactsController@getProjectDetails');

Route::post('/projectsUpdate','ContactsController@getProjectUpdate');

Route::post('/projectAdd','ContactsController@getProjectAdd');