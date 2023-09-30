<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsTestController;
use App\Http\Controllers\ExcelImportController;
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

Route::get('/', [ProductsTestController::class, 'index'])->name('products.index');

Route::get('/upload-excel', [ExcelImportController::class, 'showUploadForm'])->name('upload.excel');
Route::post('/import-excel', [ExcelImportController::class, 'importExcel'])->name('import.excel');

