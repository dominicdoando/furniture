<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\DB;

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
    $sliders = DB::table('sliders')->latest()->get();
    return view('frontend.index' , compact('sliders'));
});
//ADMIN ROUTER
Route::get('/admin', function () {
   
    return view('admin.dashboard');
});

Route::get('/slider/all', [HomeController::class, 'AllSlider'])->name('all.slider');
Route::get('/slider/add', [HomeController::class, 'AddSlider'])->name('slider.add');
Route::post('/slider/storage', [HomeController::class, 'StorageSlider'])->name('slider.storage');
Route::get('/slider/edit/{id}', [HomeController::class, 'EditSlider']);
Route::post('/slider/update/{id}', [HomeController::class, 'UpdateSlider']);
Route::get('/slider/delete/{id}', [HomeController::class, 'DeleteSlider']);

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
