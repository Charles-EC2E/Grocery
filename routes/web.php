<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Models\Product;

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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', 'HomeController@home')->name('home');
Route::get('/dashboard', 'HomeController@getChartData')->name('getChartData');
//Route::get('/dashboard', 'HomeController@getAllTypes')->name('types');
Route::get('/', function(){
    $types = Product::groupBy('type')
        ->select('type')
        ->get();
    return view('home', [
        'types' => $types,
    ]);
});