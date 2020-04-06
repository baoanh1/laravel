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
Route::get('home-chat', 'HomeController@chatIndex')->name('home.chat.index');

Route::get('users', 'UserController@index')->name('user.list');

Route::get('private-chat/{chatroom}/{productid}', 'PrivateChatController@index')->name('private.chat.index');

Route::get('get-private-chat/{chatroom}/{productid}', 'PrivateChatController@getdata')->name('get.private.chat.index');

Route::get('get-private-chatroom', 'PrivateChatController@getchatroomtodelete')->name('fetch-private.chatroom');

Route::get('delete-private-chatroom', 'PrivateChatController@deletechatrooms')->name('delete-private.chatroom');

Route::post('private-chat/{chatroom}/{productid}', 'PrivateChatController@store')->name('private.chat.store');
Route::get('fetch-private-chat/{chatroom}/', 'PrivateChatController@get')->name('fetch-private.chat');

Route::get('fetch-private-messages', 'PrivateChatController@getMessages')->name('fetch-private.messages');

Route::get('get-list-private-chat', 'PrivateChatController@listchat')->name('get-list-private.chat');


Route::get('public-chat', 'PublicChatController@index')->name('public.chat.index');
Route::post('public-chat/{chatroom}', 'PublicChatController@store')->name('public.chat.store');
Route::get('fetch-public-chat/{chatroom}/', 'PublicChatController@get')->name('fetch-public.chat');

Route::get('test', function() {
	$senderId = auth()->user()->id;

	$receiverIds = App\Models\User::where('id', '!=', $senderId)->get(['id'])->pluck('id')->toArray();
	$receiverIds = implode(',', $receiverIds);
	dd($receiverIds);
});



// Route::get('/home', 'HomeController@index')->name('home');

// /////////////////////////////////////////////
	Route::group(['prefix'=>'admin'],function(){
			Auth::routes();
	});
route::get('admin',['as'=>'admin.admin.getIndex','uses'=>'HomeController@getIndex']);
	Route::get('admin', function () {
    	return redirect('admin/login');
	});
	

//Route::group(['middleware' => 'auth'], function () {
//    Route::get('/laravel-filemanager', '\UniSharp\LaravelFilemanager\Controllers\LfmController@show');
//    Route::post('/laravel-filemanager/upload', '\UniSharp\LaravelFilemanager\Controllers\UploadController@upload');
    // list all lfm routes here...
//});

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () { '\vendor\UniSharp\LaravelFilemanager\Lfm::routes()'; });





/* catagory controller */
// Route::get('category/index', 'Admin\CategoryController@show');

// Route::get('category/create', 'Admin\CategoryController@getcreate');
// Route::post('category/create', 'Admin\CategoryController@postcreate');

// Route::get('category/edit/{id}', 'Admin\CategoryController@getedit');
// Route::post('category/edit/{id}', 'Admin\CategoryController@postedit');

// Route::get('category/delete/{id}', 'Admin\CategoryController@getdelete');

Route::get('active', 'Admin\CategoryController@Active');



/* content controller */
// Route::get('content/index', 'Admin\ContentController@show');

// Route::get('content/create', 'Admin\ContentController@getcreate');
// Route::post('content/create', 'Admin\ContentController@postcreate');

// Route::get('content/edit/{id}', 'Admin\ContentController@getedit');
// Route::post('content/edit/{id}', 'Admin\ContentController@postedit');

// Route::get('content/delete/{id}', 'Admin\ContentController@getdelete');

Route::namespace('Admin')->group(function () {
	Route::group(['prefix'=>'admin','middleware'=>'isAdmin'],function(){
		Route::group(['prefix'=>'catepro'],function(){
			route::get('index',['as'=>'admin.catepro.index','uses'=>'CateproController@show']);
			route::get('create',['as'=>'admin.catepro.getcreate','uses'=>'CateproController@getcreate']);
			route::post('create',['as'=>'admin.catepro.postcreate','uses'=>'CateproController@postcreate']);
			route::get('edit/{id}',['as'=>'admin.catepro.getedit','uses'=>'CateproController@getedit']);
			route::post('edit/{id}',['as'=>'admin.catepro.postedit','uses'=>'CateproController@postedit']);
			route::get('delete/{id}',['as'=>'admin.catepro.getdelete','uses'=>'CateproController@getdelete']);
		});
		Route::group(['prefix'=>'product'],function(){
			route::get('index',['as'=>'admin.product.index','uses'=>'ProductController@show']);
			route::get('create',['as'=>'admin.product.getcreate','uses'=>'ProductController@getcreate']);
			route::post('create',['as'=>'admin.product.postcreate','uses'=>'ProductController@postcreate']);
			route::get('edit/{id}',['as'=>'admin.product.getedit','uses'=>'ProductController@getedit']);
			route::post('edit/{id}',['as'=>'admin.product.postedit','uses'=>'ProductController@postedit']);
			route::get('delete/{id}',['as'=>'admin.product.getdelete','uses'=>'ProductController@getdelete']);
		});
		Route::group(['prefix'=>'category'],function(){
			route::get('index',['as'=>'admin.category.index','uses'=>'CategoryController@show']);
			route::get('create',['as'=>'admin.category.getcreate','uses'=>'CategoryController@getcreate']);
			route::post('create',['as'=>'admin.category.postcreate','uses'=>'CategoryController@postcreate']);
			route::get('edit/{id}',['as'=>'admin.category.getedit','uses'=>'CategoryController@getedit']);
			route::post('edit/{id}',['as'=>'admin.category.postedit','uses'=>'CategoryController@postedit']);
			route::get('delete/{id}',['as'=>'admin.category.getdelete','uses'=>'CategoryController@getdelete']);
		});
		Route::group(['prefix'=>'content'],function(){
			route::get('index',['as'=>'admin.content.index','uses'=>'ContentController@show']);
			route::get('create',['as'=>'admin.content.getcreate','uses'=>'ContentController@getcreate']);
			route::post('create',['as'=>'admin.content.postcreate','uses'=>'ContentController@postcreate']);
			route::get('edit/{id}',['as'=>'admin.content.getedit','uses'=>'ContentController@getedit']);
			route::post('edit/{id}',['as'=>'admin.content.postedit','uses'=>'ContentController@postedit']);
			route::get('delete/{id}',['as'=>'admin.content.getdelete','uses'=>'ContentController@getdelete']);
		});
		route::get('index',['as'=>'admin.index.getIndex','uses'=>'HomeController@getIndex']);

		route::get('/',['as'=>'admin.home.getIndex','uses'=>'HomeController@getIndex']);


		
	});
	route::get('admin',['as'=>'admin.admin.getIndex','uses'=>'HomeController@getIndex'])->middleware('isAdmin');
}); 

// Route::get('admin','Admin\HomeController@getIndex')->middleware('isAdmin');
Route::group(['prefix'=>'user'],function(){
			route::get('index',['as'=>'admin.user.show','uses'=>'Admin\UserController@show']);
			route::get('create',['as'=>'admin.user.getcreate','uses'=>'Admin\UserController@getcreate']);
			route::post('create',['as'=>'admin.user.postcreate','uses'=>'Admin\UserController@postcreate']);
			route::get('edit/{id}',['as'=>'admin.user.getedit','uses'=>'Admin\UserController@getedit']);
			route::post('edit/{id}',['as'=>'admin.user.postedit','uses'=>'Admin\UserController@postedit']);
			route::get('delete/{id}',['as'=>'admin.user.getdelete','uses'=>'Admin\UserController@getdelete']);
			route::get('member',['as'=>'user.member.showProfile','uses'=>'Member\MembersController@showProfile']);
			// Route::post('member', 'Member\MembersController@showProfile');
		});





Route::namespace('Client')->group(function () {
		Route::get('/', 'HomeController@show')->name('index');
		Route::post('loginform', 'LoginUserController@postLogin')->name('signupUser');
		Route::post('signupform', 'SignupUserController@postSignup')->name('signupUser');
		Route::get('/getlacation', 'GetLocationController@getLacation')->name('client.getlacation');

		Route::get('/danh-muc-san-pham/{id}', 'PaginationController@index')->name('client.category.pagination.index');
		Route::get('danh-muc-san-pham/{id}/fetch_data', 'PaginationController@fetch_data')->name('client.category.pagination.detail');;


		Route::group(['prefix'=>'product'],function(){
			route::get('index',['as'=>'client.product.index','uses'=>'ProductController@show']);
			route::get('create',['as'=>'client.product.getcreate','uses'=>'ProductController@getcreate']);
			route::post('create',['as'=>'client.product.postcreate','uses'=>'ProductController@postcreate']);
			route::get('edit/{id}',['as'=>'client.product.getedit','uses'=>'ProductController@getedit']);
			route::post('edit/{id}',['as'=>'client.product.postedit','uses'=>'ProductController@postedit']);
			route::get('delete/{id}',['as'=>'client.product.getdelete','uses'=>'ProductController@getdelete']);
			// Route::get('chi-tiet-danh-muc/{id}', 'DetailProductCategotyController@show')->name('client.detail.getdetail');
			Route::get('chi-tiet-san-pham/{metetitle}/{id}', 'ProductController@Detail')->name('client.product.detail.getdetail');

		});
});
Route::group(['prefix'=>'member'],function(){
		route::get('member',['as'=>'user.member.showProfile','uses'=>'Member\MembersController@showProfile']);
		Route::get('user-page/{id}', 'Member\MembersController@userDetailPage')->name('user.detail.page');
	});


// Route::get('catepro/create', 'Admin\CateproController@getcreate');
// Route::post('catepro/create', 'Admin\CateproController@postcreate');

// Route::get('catepro/edit/{id}', 'Admin\CateproController@getedit');
// Route::post('catepro/edit/{id}', 'Admin\CateproController@postedit');

// Route::get('catepro/delete/{id}', 'Admin\CateproController@getdelete');



/* content controller */
// Route::get('product/index', 'Admin\ProductController@show');

// Route::get('product/create', 'Admin\ProductController@getcreate');
// Route::post('product/create', 'Admin\ProductController@postcreate');

// Route::get('product/edit/{id}', 'Admin\ProductController@getedit');
// Route::post('product/edit/{id}', 'Admin\ProductController@postedit');

// Route::get('product/delete/{id}', 'Admin\ProductController@getdelete');

// Route::get('home', 'Admin\HomeController@show');



// Route::get('login','Admin\LoginController@getLogin');
// Route::post('login','Admin\LoginController@postLogin');
// Route::get('admin','Admin\HomeController@getIndex')->middleware('isAdmin');


// Đăng nhập và xử lý đăng nhập
// Route::get('login', [ 'as' => 'login', 'uses' => 'Auth\LoginController@getLogin']);
// Route::post('login', [ 'as' => 'login', 'uses' => 'Auth\LoginController@postLogin'])->name('login');




Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');



/* content controller */
// Route::get('index', 'Client\HomeController@show')->name('indexs');
// Route::get('chi-tiet-danh-muc/{id}', 'Client\DetailProductCategotyController@show');
// Route::get('chi-tiet-san-pham/{metetitle}/{id}', 'Client\ProductController@Detail');


Route::get('them-gio-hang/{productid}/{quantity}', 'Client\Cartcontroller@AddItem');
Route::get('update', 'Client\Cartcontroller@Update');
Route::get('deleteall', 'Client\Cartcontroller@DeleteAll');
Route::get('delete', 'Client\Cartcontroller@Delete');


Route::get('test', 'Client\Cartcontroller@mytest');
// Route::get('index', 'Client\HomeController@show');
Route::get('thanh-toan', 'Client\Cartcontroller@GetPayment');
Route::post('thanh-toan', 'Client\Cartcontroller@PostPayment');
Route::post('thankyou', 'Client\Cartcontroller@Payment');
Route::get('gio-hang', 'Client\Cartcontroller@Index');
