<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Back\DefaultController;
use App\Http\Controllers\Back\SettingsController;
use App\Http\Controllers\Back\BlogController;
use App\Http\Controllers\Back\UserController;
use App\Http\Controllers\Back\LangController;



Route::get('/', function () {
   return view('welcome');
});



Route::prefix('manage')->group(function(){
   Route::get('/',[DefaultController::class, 'index'])->name('manage.index')->middleware('user');
   Route::get('/sw',[DefaultController::class, 'sw'])->name('manage.sw');
   Route::get('/login',[DefaultController::class, 'login'])->name('manage.login');
   Route::get('/logout',[DefaultController::class, 'logout'])->name('manage.logout');
   Route::post('/login',[DefaultController::class, 'authenticate'])->name('manage.authenticate');

//SETTİNG
Route::middleware('user')->group(function(){
Route::get('settings/{id}',[SettingsController::class , 'destroy'])->whereNumber('id')->name('settings.destroy');
Route::resource('settings',SettingsController::class);

//BLOG
   Route::get('blog/{id}',[BlogController::class , 'destroy'])->whereNumber('id')->name('blog.destroy');
   Route::resource('blog',BlogController::class);

//USERS
   Route::get('user/{id}',[UserController::class , 'destroy'])->whereNumber('id')->name('user.destroy');
   Route::resource('user',UserController::class);

//TRANSLATE
   Route::get('language/{id}',[LangController::class , 'destroy'])->whereNumber('id')->name('language.destroy');
   Route::resource('language',LangController::class);

});
});
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
