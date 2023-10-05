<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\demoController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Home\HomeSliderController;
use App\Http\Controllers\Home\AboutController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('frontend.index');
});
Route::controller(demoController::class)->group(function(){
Route::get('/about','Index')->name('about.page')->middleware('check');
Route::get('/contact','Index2')->name('contact.page');

});

//Admin All route
Route::controller(AdminController::class)->group(function(){
Route::get('/admin/logout','destroy')->name('admin.logout');
Route::get('/admin/profile','Profile')->name('admin.profile');
Route::get('/edit/profile','EditProfile')->name('edit.profile');
Route::post('/store/profile','StoreProfile')->name('store.profile');
Route::get('/change/password','ChangePassword')->name('change.password');
Route::post('/update/password','UpdatePassword')->name('update.password');
});


//Home All route
Route::controller(HomeSliderController::class)->group(function(){
    Route::get('/home/slide','HomeSlider')->name('home.slide');
    Route::post('/update/slide','UpdateSlider')->name('update.slide');
});
//About page all controller
Route::controller(AboutController::class)->group(function(){
    Route::get('/about/page','AboutPage')->name('about.pages');
    Route::post('/update/about','UpdateAbout')->name('update.about');
    Route::get('/abouts','HomeAbout')->name('home.about');
    Route::get('/abouts/multi/image','AboutMultiImage')->name('about.multi.image');
    Route::post('/store/multi/image','StoreMultiImage')->name('store.multi.image');
    Route::get('/all/multi/image','AllMultiImage')->name('all.multi.image');

});

    


Route::get('/dashboard', function () {
    return view('admin.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
