<?php

use Illuminate\Support\Facades\Route;
use SimpleSoftwareIO\QrCode\Facades\QrCode;



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

Route::get('qrcode', function () {
    $code = md5(time(). mt_rand(1,100000));
//    return  \QrCode::generate($code,);
$image = \QrCode::format('png')
                 ->size(200)->errorCorrection('H')
                 ->generate('A simple example of QR code!');
$output_file = '/img/qr-code/img-' . time() . '.png';
return Storage::disk('local')->put($output_file, $image);

});
