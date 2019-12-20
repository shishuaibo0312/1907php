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
//
//Route::get('/', function () {
//    return view('welcome');
//});


//路由视图
//Route::view('/','welcome' );

//
//Route::view('/hello','welcome',['welcome'=>'欢迎进来'] );
//
////get路由
//Route::get('login','admin\login@login');
//Route ::get('list/{id}/{name}','admin\add@add')->where(['id'=>'[0-9]+','name'=>'\w+']);
//Route ::get('lists/{name?}',function($name="zhangsan"){
//    return  $name;
//});
//
////post路由
// Route::post('logindo','admin\login@logindo')->name('yy');

//练习
		Route::prefix('assay')->group(function () {
		 	Route::get('add','andriod\assay@add');
			Route::post('add_do','andriod\assay@add_do');
			Route::get('list','andriod\assay@list');
			Route::get('destroy/{id}','andriod\assay@destroy');
			Route::get('update/{id}','andriod\assay@update');
			Route::post('update_do/{id}','andriod\assay@update_do');
			Route::post('checktitle','andriod\assay@checktitle');
		});
   

//电商后台
		//登录
		Route::prefix('login')->group(function () {
		 	Route::get('login','admin\login@login');
			Route::post('logindo','admin\login@logindo');
		});
		//后台的商品品牌
		Route::prefix('brand')->middleware('auth')->group(function () {
		 	Route::get('add','admin\brand@add');
			Route::post('add_do','admin\brand@add_do');
			Route::get('list','admin\brand@list');
			Route::get('delete/{brand_id}','admin\brand@delete');
			Route::get('update/{brand_id}','admin\brand@update');
			Route::post('update_do/{brand_id}','admin\brand@update_do');
		});
		//后台的商品分类
		Route::prefix('type')->middleware('checkLogin')->group(function () {
		 	Route::get('add','admin\type@add');
			Route::post('add_do','admin\type@add_do');
			 Route::get('list','admin\type@list');
			 Route::get('delete/{tid}','admin\type@destroy');
			 Route::get('update/{tid}','admin\type@update');
			 Route::post('update_do/{tid}','admin\type@update_do');
		});
		//后台的商品
		Route::prefix('goods')->middleware('checkLogin')->group(function () {
		 	Route::get('add','admin\goods@add');
			Route::post('add_do','admin\goods@add_do');
			 Route::get('list','admin\goods@list');
			 Route::get('delete/{gid}','admin\goods@destroy');
			 Route::get('update/{gid}','admin\goods@update');
			 Route::post('update_do/{gid}','admin\goods@update_do');
		});
		//管理员的添加
		Route::prefix('admin')->middleware('checkLogin')->group(function () {
		 	Route::get('add','admin\admin@add');
			Route::post('add_do','admin\admin@add_do');
			 Route::get('list','admin\admin@list');
			 Route::get('delete/{id}','admin\admin@destroy');
			 Route::get('update/{id}','admin\admin@update');
			 Route::post('update_do/{id}','admin\admin@update_do');
		});

Auth::routes();
Route::get('/home', 'HomeController@admin')->name('home');


//电商前台
Route::get('/','Index\Index@index');         //电商前台
Route::get('logins','Index\login@login');	 //登录
Route::post('login_do','Index\login@login_do');	 //登录的执行
Route::get('reg','index\login@reg');		//注册
Route::get('list/{tid}','index\goodlist@list');		//商品展示
Route::get('product/{gid}','index\goodlist@product');	//商品详情
Route::get('emailInfo','index\login@emailInfo');	    //邮箱
Route::get('send_email','MailController@send_email');    //邮箱
Route::post('caradd','index\car@caradd');			//购物车添加
Route::get('carlist','index\car@carlist');			//购物车展示
Route::get('cardel/{gid}','index\car@cardel');			//购物车删除
Route::get('mecenter','index\mecenter@list');		//个人中心
Route::get('siteadd','index\site@siteadd');			//收货地址的添加
Route::get('getPlaceInfo','index\site@getPlaceInfo');			//
Route::get('getplace/{id}','index\site@getplace');			//
Route::post('siteadd_do','index\site@siteadd_do');		//收货地址的添加执行
Route::get('sitelist','index\site@sitelist');		//收货地址的展示
Route::get('orderpay/{gid}','index\Orderpay@orderpay');			//订单支付
Route::get('ordersuccess/{gid}','index\ordersuccess@ordersuccess');		//订单支付成功
Route::get('ordersuccesslist','index\ordersuccess@ordersuccesslist');

Route::get('/phonepay/{order_id}','index\pay@phonepay');	  			//手机支付


