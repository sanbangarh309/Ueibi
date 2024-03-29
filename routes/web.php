<?php
// use Illuminate\Support\Facades\URL;
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
if (env('APP_ENV') === 'production') {
    // URL::forceSchema('https');
}

Route::get('/', function () {
    return redirect('/admin');
});

Route::get('files/{image}',function($image){
	return San_Help::get_file($image);
});

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
Route::group(['prefix' => 'admin'], function () {
    Route::resources([
        'calls' => 'CallController',
    ]);
    Route::resources([
        'orders' => 'OrderController',
    ]);
    Route::group(['prefix' => 'support'], function () {
        Route::get('/', 'OrderController@supportView');
        Route::get('upload', 'OrderController@orderView');
        Route::get('publish', 'OrderController@publishView');
        Route::get('history', 'OrderController@uploadHistory');
    });

    Route::group(['prefix' => 'marketing'], function () {
        Route::get('/', 'OrderController@commonView');
        Route::get('/employee', 'OrderController@commonView');
        // Route::get('upload', 'OrderController@orderView');
        // Route::get('publish', 'OrderController@publishView');
        // Route::get('history', 'OrderController@uploadHistory');
    });


    // Route::get('admin/presale', 'OrderController@commonView');
    Route::get('presale/gifts', 'OrderController@giftHistory');
    Route::get('presale', 'OrderController@commonView');
    Route::get('sale', 'OrderController@commonView');
    Route::get('published', 'OrderController@publishedOrders')->name('orders.published');
    Route::post('publish', 'OrderController@publishOrder');
    Route::post('saveRow', 'OrderController@saveRow');
});

