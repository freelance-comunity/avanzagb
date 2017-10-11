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

Route::post('/returnArchive', 'Admin\\ArchivesController@returnArchive');

Route::group(['middleware' => ['web']], function () {
	Route::resource('admin/assigns', 'Admin\\AssignsController');
});

// Route::get('api/archives', function(){

// 	$collection = App\Archive::select(['id', 'client_id', 'credit_id', 'group', 'status','source_of_funding'])->orderBy('client_id');

// 	$archives = $collection;

// 	return Datatables::of($archives)
//             ->addColumn('actions', function ($archive) {
//                 return '<a href="archives/'.$archive->id.'" class="btn btn-block btn-xs btn-primary"><i class="fa fa-eye"></i>VER</a>';
//             })->rawColumns(['actions'])
//             ->make(true);       
// });

Route::get('api/archives','Admin\\ArchivesController@apiArchives');
Route::get('returnFinafim','Admin\\ArchivesController@returnFinafim');
Route::get('api/finafim','Admin\\ArchivesController@finafim');
Route::get('returnFommur','Admin\\ArchivesController@returnFommur');
Route::get('api/fommur', 'Admin\\ArchivesController@fommur');
Route::get('returnAbc1', 'Admin\\ArchivesController@returnAbc1');
Route::get('api/abc1', 'Admin\\ArchivesController@abc1');
Route::get('returnAbc2', 'Admin\\ArchivesController@returnAbc2');
Route::get('api/abc2', 'Admin\\ArchivesController@abc2');
Route::get('returnSof', 'Admin\\ArchivesController@returnSof');
Route::get('api/sof', 'Admin\\ArchivesController@sof');
Route::get('returnSofsc', 'Admin\\ArchivesController@returnSofsc');
Route::get('api/sofsc', 'Admin\\ArchivesController@sofsc');
Route::get('returnFin', 'Admin\\ArchivesController@returnSoffin');
Route::get('api/sofin', 'Admin\\ArchivesController@soffin');
Route::get('returnLegales', 'Admin\\ArchivesController@returnLegales');
Route::get('api/legales', 'Admin\\ArchivesController@legales');


Route::get('testCarbon', function(){
	$now = Carbon\Carbon::today()->toDateString();

	echo $now;
});
