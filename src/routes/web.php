<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;

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

Route::get('/', [ContactController::class, 'index']);
Route::post('/contacts/confirm', [ContactController::class, 'confirm'])
    ->name('contacts.confirm');
Route::post('/', [ContactController::class, 'edit'])
    ->name('edits');
Route::post('/contacts', [ContactController::class, 'store'])
    ->name('contacts.store');

Route::get('/administrations', [ContactController::class, 'search'])
    ->name('administrations.search');
Route::delete('/administrations/delete', [ContactController::class, 'destroy'])
    ->name('administrations.delete');
