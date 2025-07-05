<?php

use App\Models\Report;
use Illuminate\Support\Facades\Log;
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
});
Route::get('/download-report/{report}', function (Report $report) {
    $path = storage_path('app/public/reports/' . $report->name);
    
    if (!file_exists($path)) {
        abort(404, 'File not found');
    }
    
    return response()->download($path, $report->name);
})->name('download.report');
