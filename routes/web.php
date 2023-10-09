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

        $availableCarsList = getCars();
        sendMessageToTelegram($availableCarsList);

        $counter ++;
        sleep(3);
    }
});

function getCars(): array
{
    $url = 'https://savdo.uzavtosanoat.uz/#/main';
    $data = [
        'is_web' => 'Y',
        'lang_code' => 'ru',
        'filial_id' => 100

    ];
    $availableCars = \Illuminate\Support\Facades\Http::post($url, $data);

    return $availableCars->json();
}

function sendMessageToTelegram($availableCars): void
{
    $chatId = '-4043523229';
    $message = 'test';
    $botToken = '6353136141:AAE28DY7AHPmI5trQLj8zRfJaZLLUMwxtrA';

    \Illuminate\Support\Facades\Http::get('https://api.telegram.org/bot'.$botToken.'/sendMessage?chat_id='.$chatId.'&text='.$message);
}
