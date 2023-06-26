<?php

use App\Http\Controllers\ChemicalController;
use App\Http\Controllers\RawMaterialController;
use App\Models\RawMaterial;
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Raw Material
Route::get('raw_material', [RawMaterialController::class, 'index'])->name('raw_material.index');
Route::get('raw_material/create', [RawMaterialController::class, 'create'])->name('raw_material.create');
Route::post('raw_material', [RawMaterialController::class, 'store'])->name('raw_material.store');




//Chemical
Route::get('/chemical', [ChemicalController::class, 'index'])->name('chemical.index');
