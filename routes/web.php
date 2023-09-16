<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginRegisterController;
use App\Http\Controllers\Auth\ContactsController;
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
    return view('welcome');
});

Route::controller(LoginRegisterController::class)->group(function () {
    Route::get('/register', 'register')->name('register');
    Route::post('/store', 'store')->name('store');
    Route::get('/login', 'login')->name('login');
    Route::post('/authenticate', 'authenticate')->name('authenticate');
    Route::get('/dashboard', 'dashboard')->name('dashboard');
    Route::post('/logout', 'logout')->name('logout');
});


Route::controller(ContactsController::class)->group(function () {
    Route::get('/index', 'index')->name('index');
    // return the form for adding a post
    Route::get('/contacts/create', 'create')->name('form_add');
    // add a post to the database
    Route::post('/contacts', 'store')->name('contacts_store');
    // Update a post to the database
    Route::get('/contacts/{contacts}/edit', 'edit')->name('contacts_edit');
    //show detail of a contact
    Route::get('/contacts/{contacts}/detail', 'detail')->name('contacts_detail');
    // updates a post
    Route::post('/contacts/{contacts}', 'update')->name('contacts_update');
    // // returns a page that shows a full post
    Route::get('/contacts/all', 'show')->name('show_all');
    // // returns the form for editing a post
    
    // // deletes a post
    Route::get('/contacts/{id}', 'destroy')->name('contacts_destroy');
});