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

// 场馆列表
Route::get('/venue/list', 'home\VenueController@list');
Route::get('/venue/type/{id}', 'home\VenueController@type');

// 场馆详情
Route::get('/venue/detail/{id}', 'home\VenueController@detail');

// 创建场馆
Route::get('/venue/create', 'home\VenueController@create');
Route::post('/venue/save', 'home\VenueController@save');

// 我的场馆
Route::get('/venue/my_venues', 'home\VenueController@my_venues');
Route::get('/venue/delete/{id}', 'home\VenueController@delete');

// 修改场馆
Route::get('/venue/edit/{id}', 'home\VenueController@edit');
Route::post('/venue/update', 'home\VenueController@update');

//头像设置
Route::get('/user/set_icon', 'home\UserController@set_icon');
Route::post('/user/save_icon', 'home\UserController@save_icon');

// 关注场馆
Route::get('/venue/follow/{id}', 'home\VenueController@follow');
Route::get('/venue/unfollow/{id}', 'home\VenueController@unfollow');
Route::get('/venue/unfollow2/{id}', 'home\VenueController@unfollow2');

// 我的关注
Route::get('/venue/my_follows', 'home\VenueController@my_follows');

// 初始化价格
Route::get('/price/init/{id}', 'home\PriceController@init');

// 设置场馆价格
Route::get('/price/set/{id}', 'home\PriceController@set');
Route::post('/price/save_price', 'home\PriceController@save_price');


// 场馆预定
Route::post('/order/save', 'home\OrderController@save');


//移动首页
//初始化价格
Route::get('/m',function (){
    return view("m/master");
});
Route::get('/venue/m_list', 'home\VenueController@m_list');
Route::get('/venue/m_detail/{id}', 'home\VenueController@m_detail');


//场馆搜索
Route::post('/venue/m_search', 'home\VenueController@m_search');

//保存活动
Route::post('/game/m_save', 'home\GameController@m_save');

//获取活动列表
Route::get('/game/m_list', 'home\GameController@m_list');
//活动详情
Route::get('/game/m_detail/{id}', 'home\GameController@m_detail');

//关注场馆(m)
Route::get('/venue/m_follow/{id}', 'home\VenueController@m_follow');
//取消关注（m）
Route::get('/venue/m_unfollow/{id}', 'home\VenueController@m_unfollow');
//我的关注（m）
Route::get('/venue/m_my_follows', 'home\VenueController@m_my_follows');