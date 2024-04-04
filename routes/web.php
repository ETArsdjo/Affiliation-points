<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\ChartController;


use App\Models\employee;
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
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
// Route::get('/dashboard', [AdminController::class, 'homeDashboard'])->name('dashboard');
// Route::get('/dashboard', [AdminController::class, 'userChart'])->name('dashboard');
// Route::get('/dashboard', [AdminController::class, 'categorySalesChart'])->name('dashboard');
Route::get('/dashboard', [AdminController::class, 'homeDashboard'])->name('dashboard');



Route::resource('user_admin', UserController::class);
Route::resource('branch_admin', BranchController::class);
Route::resource('employee_admin', EmployeeController::class);
Route::resource('category_admin', CategoriesController::class);
// Route::get('/bar_chart', [ChartController::class, 'categorySalesChart']);


require __DIR__.'/auth.php';
