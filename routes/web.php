<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Middleware\Admin;
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
// For Home Routes
Route::get('/',[HomeController::class, 'home'])->name('home');
Route::get('/shop',[HomeController::class, 'shop'])->name('shop');
Route::get('/aboutus',[HomeController::class, 'aboutus'])->name('aboutus');
Route::get('/services',[HomeController::class, 'services'])->name('services');
Route::get('/blog',[HomeController::class, 'blog'])->name('blog');
Route::get('/contact',[HomeController::class, 'contact'])->name('contact');
Route::get('/cart',[HomeController::class, 'cart'])->name('cart');
Route::post('/contactus',[HomeController::class, 'contactus'])->name('contactus');


// For Admin Routes
Route::get('/adminhome',[AdminController::class, 'adminhome'])->name('adminhome')->middleware('admin');
Route::get('/users',[AdminController::class, 'users'])->name('adminusers')->middleware('admin');
Route::get('/usersview',[AdminController::class, 'usersview'])->name('adminusers.view')->middleware('admin');
Route::get('/deleteuser/{id}',[AdminController::class, 'deleteuser'])->name('deleteusers')->middleware('admin');
Route::get('/testimonial',[AdminController::class, 'testimonial'])->name('testimonial')->middleware('admin');
Route::get('/testimonialview',[AdminController::class, 'testimonialview'])->name('testimonial.view')->middleware('admin');
Route::post('/addtestimonial',[AdminController::class, 'addtestimonial'])->name('testimonialform')->middleware('admin');
Route::get('/deletecomment/{id}',[AdminController::class, 'deletecomment'])->name('deletecomment')->middleware('admin');
Route::get('/updatecomment/{id}',[AdminController::class, 'updatecomment'])->name('updatecomment')->middleware('admin');
Route::post('/updatecmtform/{id}',[AdminController::class, 'updatecmtform'])->name('updatecmtform')->middleware('admin');
Route::get('/adminblog',[AdminController::class, 'adminblog'])->name('adminblog')->middleware('admin');
Route::get('/adminblogview',[AdminController::class, 'adminblogview'])->name('adminblog.view')->middleware('admin');
Route::post('/addblog',[AdminController::class, 'addblog'])->name('addblog')->middleware('admin');
Route::get('/deleteblog/{id}',[AdminController::class, 'deleteblog'])->name('deleteblog')->middleware('admin');
Route::get('/updateblog/{id}',[AdminController::class, 'updateblog'])->name('updateblog')->middleware('admin');
Route::post('/updatetheblog/{id}',[AdminController::class, 'updatetheblog'])->name('updatetheblog')->middleware('admin');
Route::get('/admincontact',[AdminController::class, 'admincontact'])->name('admincontact')->middleware('admin');
Route::get('/admincontactview',[AdminController::class, 'admincontactview'])->name('admincontact.views')->middleware('admin');
Route::get('/deletecontact/{id}',[AdminController::class, 'deletecontact'])->name('deletecontact')->middleware('admin');
Route::get('/adminteam',[AdminController::class, 'adminteam'])->name('adminteam')->middleware('admin');
Route::get('/adminteamview',[AdminController::class, 'adminteamview'])->name('adminteam.view')->middleware('admin');
Route::post('/addteam',[AdminController::class, 'addteam'])->name('addteam')->middleware('admin');
Route::get('/deleteteam/{id}',[AdminController::class, 'deleteteam'])->name('deleteteam')->middleware('admin');
Route::get('/updateteam/{id}',[AdminController::class, 'updateteam'])->name('updateteam')->middleware('admin');
Route::post('/editteam/{id}',[AdminController::class, 'editteam'])->name('editteam')->middleware('admin');
Route::get('/adminshop',[AdminController::class, 'adminshop'])->name('adminshop')->middleware('admin');
Route::get('/adminshopview',[AdminController::class, 'adminshopview'])->name('adminshop.view')->middleware('admin');
Route::post('/additem',[AdminController::class, 'additem'])->name('additem')->middleware('admin');
Route::get('/deleteitem/{id}',[AdminController::class, 'deleteitem'])->name('deleteitem')->middleware('admin');
Route::get('/edititem/{id}',[AdminController::class, 'edititem'])->name('edititem')->middleware('admin');
Route::post('/updateitem/{id}',[AdminController::class, 'updateitem'])->name('updateitem')->middleware('admin');




Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
