<?php

use App\Http\Controllers\AdminAdminsController;
use App\Http\Controllers\AdminUsersController;
use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\AdminObatController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
    if(Auth::check()) {
        if(Auth::user()->hasRole('admin')) {
            return redirect()->route('admin.dashboard');
        } else if(Auth::user()->hasRole('user')) {
            return redirect()->route('user.dashboard');
        }
    } else {
        return redirect()->route('login');
    }
});

Route::get('/user', function () {
    return view('user.dashboard');
});

Route::prefix('admin')->name('admin.')->middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');
    Route::resource('users', AdminUsersController::class)->except(['show']);
    Route::resource('admins', AdminAdminsController::class)->except(['show']);
    Route::resource('category', AdminCategoryController::class)->except(['show']);
    Route::resource('obat', AdminObatController::class)->except(['show']);
});

Route::prefix('user')->name('user.')->middleware(['auth', 'role:user'])->group(function () {
    Route::get('/dashboard', function () {
        return view('user.dashboard');
    })->name('dashboard');
});

require __DIR__.'/auth.php';
