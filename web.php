<?php

try{

	Route::get('/', function () {
	    return view('welcome');
	});
	// Route::get('/', ['as' => '/','uses' => 'Auth\LoginController@showLoginForm']);

	Route::get('home',function(){
		return view('welcome');
	});

	Route::get('login', ['as' => 'login','uses' => 'Auth\LoginController@showLoginForm']);

	Route::group(['middleware' => ['Access']], function () {

		Route::post('login',['as'=>'login','uses'=>'Auth\LoginController@LoginAuth']);

		Route::get('admin-dashboard',['as'=>'admin-dashboard','uses'=>'Auth\LoginController@Admindashboard'])->middleware('auth');

		


		Route::get('forgot-password',['as'=>'forgot-password','uses'=>'Auth\ResetPasswordController@showLinkRequestForm'])->middleware('auth');

		Route::get('logout',['as'=>'logout', 'uses'=>'Auth\LoginController@logout'])->middleware('auth');

		// Route::get('register',['as'=>'register', 'uses'=>'Auth\RegisterController@register'])->middleware('Auth');

		// Route::post('register',['as'=>'register','uses'=>'Auth\RegisterController@registerAuth'])->middleware('Auth');

		Route::get('{designation}/profile',['as'=>'profile','uses'=>'Auth\LoginController@AdminProfile'])->middleware('auth');

		Route::post('admin/edit/{username}',['as'=>'admin/edit','uses'=>'Auth\LoginController@edit'])->middleware('auth');

		Route::get('admin/edit/{username}',['as'=>'admin/edit','uses'=>'Auth\LoginController@edit'])->middleware('auth');

		// Route::get('admin/update',['as'=>'admin/update','uses'=>'Auth\LoginController@update'])->middleware('auth');

		Route::post('admin/update',['as'=>'admin/update','uses'=>'Auth\LoginController@update'])->middleware('auth');

		Route::get('admin/register-manager-or-employee-intern-other',['as'=>'admin/register-manager-or-employee-intern-other','uses'=>'Auth\RegisterController@show'])->middleware('auth');

		Route::post('admin/register',['as'=>'admin.register','uses'=>'Auth\RegisterController@create_reg'])->middleware('auth');

		Route::get('manager-dashboard/{id}',['as'=>'manager-dashboard', 'uses'=>'ManagerController@show']);
		Route::get('manager-dashboard',['as'=>'manager-dashboard', 'uses'=>'ManagerController@show']);
		Route::any('manager/profile/{id}',['as'=>'manager/profile','uses'=>'ManagerController@profile']);

		Route::get('employee-dashboard/{id}',['as'=>'employee.dashboard', 'uses'=>'EmployeeController@show']);

		Route::get('admin/exiting-project',['as'=>'admin/exiting-project','uses'=>'AdminController@ShowProject'])->middleware('auth');

		Route::get('admin/new-project', ['as' => 'admin/new-project','uses' => 'AdminController@AddProject'])->middleware('auth');

		Route::post('admin/create-project', ['as' => 'admin/create-project','uses' => 'AdminController@SaveProject'])->middleware('auth');

		Route::get('project/{project_title}',['as'=>'project', 'uses'=>'ManagerController@project'])->middleware('auth');

		Route::post('manager-dashboard',['as'=>'manager-dashboard', 'uses'=>'ManagerController@show'])->middleware('auth');

		Route::post('admin/search',['as'=>'admin.search','uses'=>'AdminController@search'])->middleware('auth');

		Route::any('manager/taskmanage/{project}',['as'=>'manager/taskmanage','uses'=>'ManagerController@task'])->middleware('auth');

		Route::post('manager/task',['as'=>'manager/task','uses'=>'ManagerController@taskstore'])->middleware('auth');

		Route::get('task/title={title}',['as'=>'task/title','uses'=>'ManagerController@task_details']);

		Route::get('admin/add-tag',['as'=>'admin/add-tag','uses'=>'AdminController@Addtags']);

		Route::post('admin/tag',['as'=>'admin.tag','uses'=>'AdminController@save_tag']);

		Route::any('update/task{id}',['as'=>'update/task','uses'=>'ProjectController@update']);


	});

}
catch(Exception $e) {
  echo 'Message: ' .$e->getMessage();
}