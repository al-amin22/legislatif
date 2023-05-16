<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TpsController;
use App\Http\Controllers\pemilihController;
use App\Http\Controllers\alamatTpsController;
use App\Http\Controllers\Tps;
use App\Http\Controllers\GrafikController;

use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;

use App\Http\Controllers\AuthController;


use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\User\DashboardController as UserDashboardController;
use App\Http\Middleware\RoleMiddleware;
use App\Http\Controllers\Auth\RegisterController;




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
})->name('index');




    // ... tambahkan route lainnya yang memerlukan akses admin
    Route::get('/tps/getNomorTps/{id}', [pemilihController::class, 'getNomorTps'])->name('getNomorTps');

    //route untuk TPS
    Route::resource('tps', TpsController::class)->names([
        'index' => 'tps.index',
        'create' => 'tps.create',
        'store' => 'tps.store',
        'show' => 'tps.show',
        'edit' => 'tps.edit',
        'update' => 'tps.update',
        'destroy' => 'tps.destroy'
    ]);
    Route::resource('pemilih', pemilihController::class)->names([
        'index' => 'pemilih.index',
        'create' => 'pemilih.create',
        'store' => 'pemilih.store',
        'show' => 'pemilih.show',
        'edit' => 'pemilih.edit',
        'update' => 'pemilih.update',
        'destroy' => 'pemilih.destroy',
        
        ]);
        Route::get('/alamat-tps', [alamatTpsController::class, 'index'])->name('alamat-tps.index');
        Route::get('/alamat-tps/create', [alamatTpsController::class, 'create'])->name('alamat-tps.create');
        Route::post('/alamat-tps', [alamatTpsController::class, 'store'])->name('alamat-tps.store');
        Route::get('/alamat-tps/{id}/edit', [AlamatTpsController::class, 'edit'])->name('alamat-tps.edit');
        Route::put('/alamat-tps/{id}', [AlamatTpsController::class, 'update'])->name('alamat-tps.update');
        Route::delete('/alamat-tps/{id}', [AlamatTpsController::class, 'destroy'])->name('alamat-tps.destroy');
        Route::get('/alamat-tps/{id}', [AlamatTpsController::class, 'show'])->name('alamat-tps.show');


        Route::get('/grafik', [GrafikController::class, 'chart'])->name('chart');
        Route::get('/chart', [GrafikController::class, 'index'])->name('chart.index');  
 

    



    // Rute-rute untuk user di sini
        Route::get('/', [GrafikController::class, 'chart'])->name('chart');
        Route::get('/chart', [GrafikController::class, 'index'])->name('chart.index');














Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
