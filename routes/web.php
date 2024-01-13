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
    return view('welcome');
})->middleware(['verify.shopify'])->name('home');

Route::get('/groups', [App\Http\Controllers\GroupController::class, 'groupIndex'])->middleware(['verify.shopify'])->name('groups.index');
Route::post('/groups', [App\Http\Controllers\GroupController::class, 'saveGroup'])->middleware(['verify.shopify'])->name('groups.store');

Route::get('/faqs/{group_id}', [App\Http\Controllers\FaqController::class, 'faqIndex'])->middleware(['verify.shopify'])->name('faqs.index');
Route::post('/faqs', [App\Http\Controllers\FaqController::class, 'saveFaq'])->middleware(['verify.shopify'])->name('faqs.store');

Route::get('/settings', [App\Http\Controllers\SettingController::class, 'settingIndex'])->middleware(['verify.shopify'])->name('settings.index');