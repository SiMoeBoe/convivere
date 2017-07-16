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

Route::get( '/', function () {
  return view( 'welcome' );
} );

Auth::routes();

Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index')->name( 'logs' );

Route::get('locale/{locale?}', 'LocaleController@setLocale')->name( 'locale.setLocale' );

Route::get( 'home', 'HomeController@index' )->name( 'home' );

Route::get( 'members/indexajax', 'MemberController@indexAjax' )->name( 'members.indexAjax' );
Route::get( 'members/selector/{selector?}', 'MemberController@setSelector' )->name( 'members.setSelector' );
Route::post( 'members/{member}/restore', 'MemberController@restore' )->name('members.restore');
Route::resource('members', 'MemberController');

Route::get( 'rooms', 'RoomController@index' )->name( 'rooms' );
Route::get( 'honoraryposts', 'HonoraryPostController@index' )->name( 'honoraryposts' );
