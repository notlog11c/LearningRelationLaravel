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
    // $profile = Profile::create([
    //     'user_id' => 1,
    //     'phone' => '12345678',
    //     'address' => 'jl. kemana, No. 1'
    // ]);

    $user = User::find(2);

    $user->profile()->create([
        'phone' => '657483090',
        'address' => 'Jalanku ke kamu'
    ]);

    return $user;
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
    $user = User::find(1);

    $data = [
        'name' => $user->name,
        'phone' => $user->profile->phone,
        'address' => $user->profile->address
    ];

    return $data;
});

Route::get('/read_profile', function () {
    $profile = Profile::where('phone', '12345678')->first();

    // return $profile->user->name;

    $data = [
        'name' => $profile->user->name,
        'email' => $profile->user->email,
        'phone' => $profile->phone,
        'address' => $profile->address
    ];

    return $data;
});

Route::get('/update_profile', function () {
    $user = User::find(1);

    $data = [
        'phone' => '283741',
        'address' => 'Jl. dadali genks'
    ];

    $user->profile()->update($data);

    return $user;
});

Route::get('/delete_profile', function () {
    $user = User::find(2);

    $user->profile()->delete();

    return $user;
});

Route::get('/create_post', function () {

    $user = User::create([
        'name' => 'da',
        'email' => 'adsada@mail.com',
        'password' => bcrypt('232323')
    ]);

    $user->posts()->create([
        'title' => 'ini title',
        'body' => 'Hello World ini kolom body'
    ]);

    return 'success';
});