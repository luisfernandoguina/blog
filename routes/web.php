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

use App\Mail\Welcome;
use App\User;
use Illuminate\Mail\Message;
use Illuminate\Support\Facades\Mail;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');
Route::get('/welcome',function (){
    $user = new User([
        'name'=>'Luis Fernando',
        'email'=>'luisfernandoguina@gmail.com',

    ]);


    Mail::to($user->email,$user->name)
        ->send(new Welcome($user));
});

Auth::routes();

Route::get('/home', 'HomeController@index');
