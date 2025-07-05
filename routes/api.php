<?php

use App\Http\Controllers\ExportReportController;
use App\Http\Controllers\OpenAISuggestionController;
use App\Http\Controllers\ProductServiceController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('/products', [ProductServiceController::class, 'fetchProducts'])->name('fetch-all-products');
Route::post('/suggestion', [OpenAISuggestionController::class, 'suggestion'])->name('ai.suggestion');

Route::group(['prefix'=>'report','as'=>'report.'], function(){
    Route::post('/export-quote-summary', [ExportReportController::class, 'exportReport'])->name('export');
});
