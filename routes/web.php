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
	Route::get('/user/import', 'UserController@import')->name('user.import');
	Route::post('/user/store_import', 'UserController@store_import')->name('user.store_import');
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

//Carreras
Route::group(['namespace' => 'App\Http\Controllers\Carrers'], function (){ 
	//Carreras
	Route::get('/carrers', 'CarrersController@index')->name('carrers');
	Route::get('/carrers/create', 'CarrersController@create')->name('carrers.create');
	Route::post('/carrers/store', 'CarrersController@store')->name('carrers.store');
	Route::get('/carrers/edit/{id}', 'CarrersController@edit')->name('carrers.edit');
	Route::put('/carrers/update/{id}', 'CarrersController@update')->name('carrers.update');
	Route::get('/carrers/show/{id}', 'CarrersController@show')->name('carrers.show');
	Route::get('/carrers/destroy/{id}', 'CarrersController@destroy')->name('carrers.destroy');
	Route::get('/carrers/add_semestre/{id}', 'CarrersController@add_semestre')->name('carrers.add_semestre');
});

Route::group(['namespace' => 'App\Http\Controllers\Semestre'], function (){ 
	//Semestre
	Route::get('/semestre', 'SemestreController@index')->name('semestre');
	Route::get('/semestre/create/{id}', 'SemestreController@create')->name('semestre.create');
	Route::post('/semestre/store', 'SemestreController@store')->name('semestre.store');
	Route::get('/semestre/edit/{id}', 'SemestreController@edit')->name('semestre.edit');
	Route::put('/semestre/update/{id}', 'SemestreController@update')->name('semestre.update');
	Route::get('/semestre/show/{id}', 'SemestreController@show')->name('semestre.show');
	Route::get('/semestre/destroy/{id}', 'SemestreController@destroy')->name('semestre.destroy');
	Route::get('/semestre/add_materias/{id}', 'SemestreController@add_materias')->name('semestre.add_materias');
});

Route::group(['namespace' => 'App\Http\Controllers\Materias'], function (){ 
	//Materias
	Route::get('/materias', 'MateriasController@index')->name('materias');
	Route::get('/materias/create/{id}', 'MateriasController@create')->name('materias.create');
	Route::post('/materias/store', 'MateriasController@store')->name('materias.store');
	Route::get('/materias/edit/{id}', 'MateriasController@edit')->name('materias.edit');
	Route::put('/materias/update/{id}', 'MateriasController@update')->name('materias.update');
	Route::get('/materias/show/{id}', 'MateriasController@show')->name('materias.show');
	Route::get('/materias/destroy/{id}', 'MateriasController@destroy')->name('materias.destroy');
});

Route::group(['namespace' => 'App\Http\Controllers\Instructores'], function (){ 
	//Instructores
	Route::get('/instructores', 'InstructoresController@index')->name('instructores');
	Route::get('/instructores/create', 'InstructoresController@create')->name('instructores.create');
	Route::post('/instructores/store', 'InstructoresController@store')->name('instructores.store');
	Route::get('/instructores/edit/{id}', 'InstructoresController@edit')->name('instructores.edit');
	Route::put('/instructores/update/{id}', 'InstructoresController@update')->name('instructores.update');
	Route::get('/instructores/show/{id}', 'InstructoresController@show')->name('instructores.show');
	Route::get('/instructores/destroy/{id}', 'InstructoresController@destroy')->name('instructores.destroy');
});

Route::group(['namespace' => 'App\Http\Controllers\Capacitaciones'], function (){ 
	//Capacitaciones
	Route::get('/capacitaciones', 'CapacitacionesController@index')->name('capacitaciones');
	Route::get('/capacitaciones/create', 'CapacitacionesController@create')->name('capacitaciones.create');
	Route::post('/capacitaciones/store', 'CapacitacionesController@store')->name('capacitaciones.store');
	Route::get('/capacitaciones/edit/{id}', 'CapacitacionesController@edit')->name('capacitaciones.edit');
	Route::put('/capacitaciones/update/{id}', 'CapacitacionesController@update')->name('capacitaciones.update');
	Route::get('/capacitaciones/show/{id}', 'CapacitacionesController@show')->name('capacitaciones.show');
	Route::get('/capacitaciones/destroy/{id}', 'CapacitacionesController@destroy')->name('capacitaciones.destroy');
});

Route::group(['namespace' => 'App\Http\Controllers\Certificaciones'], function (){ 
	//Certificaciones
	Route::get('/certificaciones', 'CertificacionesController@index')->name('certificaciones');
	Route::get('/certificaciones/create', 'CertificacionesController@create')->name('certificaciones.create');
	Route::post('/certificaciones/store', 'CertificacionesController@store')->name('certificaciones.store');
	Route::get('/certificaciones/edit/{id}', 'CertificacionesController@edit')->name('certificaciones.edit');
	Route::put('/certificaciones/update/{id}', 'CertificacionesController@update')->name('certificaciones.update');
	Route::get('/certificaciones/show/{id}', 'CertificacionesController@show')->name('certificaciones.show');
	Route::get('/certificaciones/destroy/{id}', 'CertificacionesController@destroy')->name('certificaciones.destroy');
});

Route::group(['namespace' => 'App\Http\Controllers\Pagos'], function (){ 
	//Pagos
	Route::get('/pagos', 'PagosController@index')->name('pagos');
	Route::get('/pagos/create', 'PagosController@create')->name('pagos.create');
	Route::post('/pagos/store', 'PagosController@store')->name('pagos.store');
	Route::get('/pagos/edit/{id}', 'PagosController@edit')->name('pagos.edit');
	Route::put('/pagos/update/{id}', 'PagosController@update')->name('pagos.update');
	Route::get('/pagos/show/{id}', 'PagosController@show')->name('pagos.show');
	Route::get('/pagos/destroy/{id}', 'PagosController@destroy')->name('pagos.destroy');
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

# /routes/api.php

// Get list of meetings.
Route::get('/meetings', 'App\Http\Controllers\Zoom\MeetingController@list');
Route::get('/meetings/create', 'App\Http\Controllers\Zoom\MeetingController@create_view_zoom');
Route::get('/meetings/view', 'App\Http\Controllers\Zoom\MeetingController@view_zoom_meeting');

// Create meeting room using topic, agenda, start_time.
Route::post('/meetings', 'App\Http\Controllers\Zoom\MeetingController@create');

// Get information of the meeting room by ID.
Route::get('/meetings/{id}', 'App\Http\Controllers\Zoom\MeetingController@get')->where('id', '[0-9]+');
Route::patch('/meetings/{id}', 'App\Http\Controllers\Zoom\MeetingController@update')->where('id', '[0-9]+');
Route::delete('/meetings/{id}', 'App\Http\Controllers\Zoom\MeetingController@delete')->where('id', '[0-9]+');