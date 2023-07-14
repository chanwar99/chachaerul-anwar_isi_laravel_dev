<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TransaksiController;

// use App\Http\Controllers\Register;
// use App\Http\Controllers\Article;
// use App\Http\Controllers\Process;

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

Route::get('/', [HomeController::class, 'index'])->middleware('auth')->name('pages.home');
Route::get('/user', [UserController::class, 'index'])->middleware(['auth', 'role.admin'])->name('pages.user');
Route::get('/transaksi', [TransaksiController::class, 'index'])->middleware(['auth'])->name('pages.transaksi');
Route::get('/get-data', [TransaksiController::class, 'getData'])->name('transaksi.getData');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');



// Route::get('/', [ProjectController::class, 'index'])->name('project.index');
// Route::get('/get-data', [ProjectController::class, 'getData'])->name('project.getData');
// Route::post('/', [ProjectController::class, 'store'])->name('project.store');
// Route::get('/{project_id}/edit', [ProjectController::class, 'edit'])->name('project.edit'); // fetch
// Route::put('/{project_id}', [ProjectController::class, 'update'])->name('project.update');
// Route::delete('/', [ProjectController::class, 'destroy'])->name('project.destroy');