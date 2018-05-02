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

use App\User;
use App\Profile;

Route::get('/create_user', function () {
    $user = User::create([
        'name' => 'ampas',
        'email' => 'ampas@mail.com',
        'password' => bcrypt('pass')
    ]);

    return $user;
});

Route::get('/create_profile', function () {
    $profile = Profile::create([
        'user_id' => 1,
        'phone' => '12345678',
        'address' => 'jl. kemana, No. 1'
    ]);

    return $profile;
});

Route::get('/create_user_profile', function () {
    $user = User::find(2);

    $profile = new Profile ([
        'phone' => '1234567',
        'address' => 'Jl. Kesini No. 2'
    ]);
    
    $user->profile()->save($profile);

    return $user;
});

Route::get('/read_user', function () {
    
});