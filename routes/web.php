<?php

use Illuminate\Support\Facades\Route;

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

Route::get('Admin', function(){
    return view('admin.app');})->name('admin');

Route::get('Admin/newCLient', function(){
        return view('admin.newCLient');})->name('newClient');
 
Route::get('Admin/updateRole', function(){
            return view('admin.updateRole');})->name('updateRole');        

Route::get('/moi',[App\Http\Controllers\AdminController::class, 'show']);
Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
