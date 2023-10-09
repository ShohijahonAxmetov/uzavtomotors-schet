<?php

use Illuminate\Support\Facades\Route;

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
    $counter = 0;

    while(true) {
        if($counter == 10) {
            break;
        }

        $chatId = '-4043523229';
        $message = 'test';
        $botToken = '6353136141:AAE28DY7AHPmI5trQLj8zRfJaZLLUMwxtrA';
        $res = \Illuminate\Support\Facades\Http::get('https://api.telegram.org/bot'.$botToken.'/sendMessage?chat_id='.$chatId.'&text='.$message);

        dd($res->json());

        $counter ++;
        sleep(3);
    }
    return view('welcome');
});
