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

Route::get('/', 'HomeController@index')->name('home');

Auth::routes();
Route::get('/logout', 'Auth\LoginController@logout')->name('logout_get');

Route::get('/verification/{v_code}', 'Auth\RegisterController@verification')->name('verification');
Route::post('/area/save', 'AreaController@saveArea')->name('area.save');
Route::post('/area/gettext', 'AreaController@getAreaText')->name('area.gettext');
//Урлы профиля
Route::get('/profile/{id}', 'ProfileController@show')->name('profile.show');
Route::get('/profile', 'ProfileController@myprofile')->name('profile.myprofile');
Route::post('/profile/edit', 'ProfileController@edit')->name('profile.edit');
Route::post('/profile/avatar_save', 'GalleryController@avatar_save')->name('profile.avatar_save');
Route::post('/profile/image_save', 'GalleryController@add_image')->name('profile.image_save');
Route::get('/messages', 'MessageController@index')->name('messages.index');
Route::get('/friends', 'ProfileController@friendPage')->name('profile.friend');
Route::get('/guest', 'ProfileController@guestPage')->name('profile.guest');
Route::get('/profile/{id}/add-friend', 'FriendController@addFriend')->name('profile.add_friend');
Route::get('/profile/{id}/del-friend', 'FriendController@delFriend')->name('profile.del_friend');
// Route::get('/test', 'TestController@ebanumba')->name('ebanumba');
//likes
Route::post('/toggle-like', 'GalleryController@toggle_like')->name('profile.toggle_like');
//Коментарии картинок
Route::post('/add-comment', 'GalleryController@add_comment')->name('profile.add_comment');
Route::post('/del-comment', 'GalleryController@del_comment')->name('profile.del_comment');
Route::post('/del-image', 'GalleryController@del_image')->name('profile.del_image');
//Поиск
Route::get('/search', 'HomeController@search_page')->name('profile.search');
Route::post('/search', 'HomeController@search');
//Черный список
Route::post('/toblacklist', 'FriendController@ToBlacklist')->name('toblacklist');
Route::get('/blacklist', 'ProfileController@blacklistpage')->name('blacklistpage');
//Меседжер
Route::get('/messages', 'MessageController@index')->name('messages.index');
Route::post('/send-message', 'MessageController@send_message')->name('send_message');
