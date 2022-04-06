<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

//Dashboard
Route::get('/', 'App\Http\Controllers\HomeController@index');
Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home');
Route::get('/config', 'App\Http\Controllers\ConfigController@index')->name('config');
Route::put('/config/update/{id}', 'App\Http\Controllers\ConfigController@update')->name('config.update');

//perfiles
Route::group(['namespace' => 'App\Http\Controllers\Profile'], function (){ 
	Route::get('/profile', 'ProfileController@index')->name('profile');
	Route::put('/profile/update/profile/{id}', 'ProfileController@updateProfile')->name('profile.update.profile');
	Route::put('/profile/update/password/{id}', 'ProfileController@updatePassword')->name('profile.update.password');
	Route::put('/profile/update/avatar/{id}', 'ProfileController@updateAvatar')->name('profile.update.avatar');
});

//Errores del sistema
Route::group(['namespace' => 'App\Http\Controllers\Error'], function (){ 
	Route::get('/unauthorized', 'ErrorController@unauthorized')->name('unauthorized');
});

//usuarios
Route::group(['namespace' => 'App\Http\Controllers\User'], function (){ 
	//Users
	Route::get('/user', 'UserController@index')->name('user');
	Route::get('/user/create', 'UserController@create')->name('user.create');
	Route::post('/user/store', 'UserController@store')->name('user.store');
	Route::get('/user/edit/{id}', 'UserController@edit')->name('user.edit');
	Route::put('/user/update/{id}', 'UserController@update')->name('user.update');
	Route::get('/user/edit/password/{id}', 'UserController@editPassword')->name('user.edit.password');
	Route::put('/user/update/password/{id}', 'UserController@updatePassword')->name('user.update.password');
	Route::get('/user/show/{id}', 'UserController@show')->name('user.show');
	Route::get('/user/destroy/{id}', 'UserController@destroy')->name('user.destroy');
	// Roles
	Route::get('/role', 'RoleController@index')->name('role');
	Route::get('/role/create', 'RoleController@create')->name('role.create');
	Route::post('/role/store', 'RoleController@store')->name('role.store');
	Route::get('/role/edit/{id}', 'RoleController@edit')->name('role.edit');
	Route::put('/role/update/{id}', 'RoleController@update')->name('role.update');
	Route::get('/role/show/{id}', 'RoleController@show')->name('role.show');
	Route::get('/role/destroy/{id}', 'RoleController@destroy')->name('role.destroy');

});

//Cursos
Route::group(['namespace' => 'App\Http\Controllers\Course'], function (){ 
	//Courses
	Route::get('/course', 'CourseController@index')->name('course');
	Route::get('/course/create', 'CourseController@create')->name('course.create');
	Route::post('/course/store', 'CourseController@store')->name('course.store');
	Route::get('/course/edit/{id}', 'CourseController@edit')->name('course.edit');
	Route::put('/course/update/{id}', 'CourseController@update')->name('course.update');
	Route::get('/course/show/{id}', 'CourseController@show')->name('course.show');
	Route::get('/course/destroy/{id}', 'CourseController@destroy')->name('course.destroy');
});

//Empresas
Route::group(['namespace' => 'App\Http\Controllers\Company'], function (){ 
	//Empresas
	Route::get('/company', 'CompanyController@index')->name('company');
	Route::get('/company/create', 'CompanyController@create')->name('company.create');
	Route::post('/company/store', 'CompanyController@store')->name('company.store');
	Route::get('/company/edit/{id}', 'CompanyController@edit')->name('company.edit');
	Route::put('/company/update/{id}', 'CompanyController@update')->name('company.update');
	Route::get('/company/show/{id}', 'CompanyController@show')->name('company.show');
	Route::get('/company/destroy/{id}', 'CompanyController@destroy')->name('company.destroy');
	Route::get('/company/view_home_course_assing/{id}', 'CompanyController@view_home_course_assing')->name('company.assign_course');
	Route::post('/company/view_home_course_assing_store', 'CompanyController@view_home_course_assing_store')->name('company.view_home_course_assing_store');
	Route::get('/company/destroy_view_home_course/{id}', 'CompanyController@view_home_course_assing_destroy')->name('company.view_home_course_assing_destroy');
});

//Estancias
Route::group(['namespace' => 'App\Http\Controllers\Estancias'], function (){ 
	//Empresas
	Route::get('/estancias', 'EstanciasController@index')->name('estancias');
	Route::get('/estancias/create', 'EstanciasController@create')->name('estancias.create');
	Route::post('/estancias/store', 'EstanciasController@store')->name('estancias.store');
	Route::get('/estancias/edit/{id}', 'EstanciasController@edit')->name('estancias.edit');
	Route::put('/estancias/update/{id}', 'EstanciasController@update')->name('estancias.update');
	Route::get('/estancias/show/{id}', 'EstanciasController@show')->name('estancias.show');
	Route::get('/estancias/destroy/{id}', 'EstanciasController@destroy')->name('estancias.destroy');
});

//Pagina principal de curso
Route::group(['namespace' => 'App\Http\Controllers\Home'], function (){ 
	Route::get('/course/home', 'CourseHomeController@index')->name('home_course');
	Route::get('/course/view-into-course-prev/{id}', 'CourseHomeController@view_home_course_prev')->name('company.view_into_course-prev');
	Route::get('/course/view-into-course/{id}', 'CourseHomeController@view_home_course')->name('company.view_into_course');
	Route::get('/course/view-into-course-inter/{id}', 'CourseHomeController@view_home_course_inter')->name('company.view_into_course_inter');
	Route::get('/course/view-into-course-info/{id}', 'CourseHomeController@view_home_course_info')->name('company.view_into_course_info');
	Route::get('/course/view-into-course-view/{id}', 'CourseHomeController@view_home_course_view')->name('company.view_into_course_view');
});