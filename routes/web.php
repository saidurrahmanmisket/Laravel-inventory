<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Models\User;
use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Auth;
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





Route::get('/dashboard', function () {
    $id = Auth::user()->id;
    $user = User::find($id);
    return view('admin.index', compact('user'));
})->middleware(['auth', 'verified'])->name('dashboard');




Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';




Route::controller(AdminController::class)->group(function(){

    Route::get('/logout', 'destroy')->name('logout');
    Route::get('/profile', 'profile')->name('admin.profile');
    Route::get('/edit/profile', 'editProfile')->name('admin.edit.profile');
    Route::post('/update/profile', 'updateProfile')->name('admin.update.profile');
    Route::get('/edit/password', 'editPassword')->name('admin.edit.password');
    Route::post('/update/password', 'updatePassword')->name('admin.update.password');

});