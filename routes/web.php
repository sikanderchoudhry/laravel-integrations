<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IntegrationsController;

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

Route::get('/mailchimp', function () {
    return view('admin.mailchimp');
});

Route::post('/config-mailchimp', [IntegrationsController::class, 'config_mailchimp']);
Route::get('/test-mailchimp', [IntegrationsController::class, 'test_mailchimp']);
