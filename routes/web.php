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

Route::get('/', function () {
	return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['web']], function () {
	Route::resource('admin/archives', 'Admin\\ArchivesController');
});

Route::post('/import-excel', 'Admin\\ArchivesController@importArchives');

Route::post('/import-file', 'Admin\\ArchivesController@importFile');

Route::get('/download/{id}', 'Admin\\ArchivesController@getDownload');

Route::group(['middleware' => ['web']], function () {
	Route::resource('admin/assigns', 'Admin\\AssignsController');
});

Route::get('api/archives', function(){

	$archives = App\Archive::select(['id', 'client_id', 'credit_id', 'group', 'status']);

	return Datatables::of($archives)
            ->addColumn('actions', function ($archive) {
                return '<a href="archives/'.$archive->id.'" class="btn btn-block btn-xs btn-primary"><i class="fa fa-eye"></i>VER</a>';
            })->rawColumns(['actions'])
            ->make(true);       

	//return Datatables::eloquent(App\Archive::query())->make(true);
});
