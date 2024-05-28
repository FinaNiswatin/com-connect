<?php

use App\Models\Kegiatan;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RewardController;
use App\Http\Controllers\VoucherController;
use App\Http\Controllers\KegiatanController;

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
    $kegiatan = Kegiatan::where('status', 0)->get();
    return view('index', compact('kegiatan'));
});
Route::get('/about', function () {
    return view('about');
});
Route::get('/features', function () {
    return view('features');
});
Route::get('/blog', function () {
    $kegiatan = Kegiatan::where('status', 0)->get();
    return view('blog', compact('kegiatan'));
});
Route::get('/login', function () {
    return view('login');
})->name('login');
Route::get('/register', function () {
    
    return view('register', compact('user'));
});
Route::get('/edit', function () {
    $user = Auth::user();
    return view('editprofile',compact('user'));
})->middleware('auth');
Route::post('/register', [UserController::class, 'store'])->name('user.regist');
Route::post('/login', [UserController::class, 'login'])->name('user.login');
Route::get('/profile', [UserController::class, 'profile'])->middleware('auth');
Route::get('/poin', [UserController::class, 'poin'])->middleware('auth');
Route::get('/logout', [UserController::class, 'Logout'])->middleware('auth');
Route::get('/history', [UserController::class, 'history'])->middleware('auth');
Route::put('/edit/{id}',[UserController::class, 'update'])->name('user.update')->middleware('auth');
Route::post('/voucherclaim', [UserController::class, 'claim'])->name('voucher.claim')->middleware('auth');
Route::get('/rewards', [RewardController::class, 'show'])->name('reward.all');
Route::post('/rewardclaim/{id}', [UserController::class, 'claimReward'])->name('reward.claim');
Route::post('/kegiatanadd',[KegiatanController::class, 'store'])->name('kegiatan.add')->middleware('auth');
Route::put('/kegiatanupdate/{id}',[KegiatanController::class,'update'])->name('kegiatan.update')->middleware('auth');
Route::delete('/kegiatandelete/{id}',[KegiatanController::class,'delete'])->name('kegiatan.delete')->middleware('auth');
Route::post('/join/{id}',[UserController::class, 'JoinActivity'])->name('user.join')->middleware('auth');
Route::middleware('admin')->prefix('admin')->group( function(){
    Route::get('/', [AdminController::class, 'index']);
    Route::get('/user', [AdminController::class, 'user']);
    Route::delete('/user/delete/{id}',[AdminController::class, 'deleteUser'])->name('user.delete');
    Route::put('/user/edit/{id}',[AdminController::class, 'editUser'])->name('user.edit');
    Route::get('/reward', [AdminController::class, 'reward']);
    Route::post('/reward/add', [RewardController::class, 'store'])->name('reward.add');
    Route::delete('/reward/delete/{id}',[RewardController::class, 'delete'])->name('reward.delete');
    Route::put('/reward/edit/{id}',[RewardController::class, 'update'])->name('reward.update');
});

