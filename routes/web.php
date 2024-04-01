<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\IncomeController;
use App\Http\Controllers\IncomeCategoryController;
use App\Http\Controllers\ExpenseController;

use App\Http\Controllers\RecycleController;
use App\Http\Controllers\ReportController;



Route::get('/', function () {
    return view('welcome');
});

Route::get('dashboard',[AdminController::class,'index'])->name('dashboard');

Route::get('dashboard/user',[UserController::class,'index'])->name('user');
Route::get('dashboard/user/add',[UserController::class,'add'])->name('user.add');
Route::get('dashboard/user/edit',[UserController::class,'edit'])->name('user.edit');
Route::get('dashboard/user/view',[UserController::class,'view'])->name('user.view');
Route::post('dashboard/user/submit',[UserController::class,'insert'])->name('user.submit');
Route::post('dashboard/user/update',[UserController::class,'update'])->name('user.update');
Route::post('dashboard/user/softdelete',[UserController::class,'softdelete'])->name('softdelete');
Route::post('dashboard/user/restore',[UserController::class,'restore'])->name('user.restore');
Route::post('dashboard/user/delete',[UserController::class,'delete'])->name('user.delete');

Route::get('dashboard/income',[IncomeController::class,'index'])->name('income');
Route::get('dashboard/income/add',[IncomeController::class,'add'])->name('income.add');
Route::get('dashboard/income/edit',[IncomeController::class,'edit'])->name('income.edit');
Route::get('dashboard/income/view',[IncomeController::class,'view'])->name('income.view');
Route::post('dashboard/income/submit',[IncomeController::class,'insert'])->name('income.submit');
Route::post('dashboard/income/update',[IncomeController::class,'update'])->name('income.update');
Route::post('dashboard/income/softdelete',[IncomeController::class,'softdelete'])->name('income.softdelete');
Route::post('dashboard/income/restore',[IncomeController::class,'restore'])->name('income.restore');
Route::post('dashboard/income/delete',[IncomeController::class,'delete'])->name('income.delete');

Route::get('dashboard/income/category',[IncomeCategoryController::class,'index'])->name('income.category');
Route::get('dashboard/income/category/add',[IncomeCategoryController::class,'add'])->name('income.category.add');
Route::get('dashboard/income/category/edit/{slug}',[IncomeCategoryController::class,'edit'])->name('income.category.edit');
Route::get('dashboard/income/category/view/{slug}',[IncomeCategoryController::class,'view'])->name('income.category.view');
Route::post('dashboard/income/category/submit',[IncomeCategoryController::class,'insert'])->name('income.category.submit');
Route::post('dashboard/income/category/update',[IncomeCategoryController::class,'update'])->name('income.category.update');
Route::post('dashboard/income/category/softdelete',[IncomeCategoryController::class,'softdelete'])->name('income.category.softdelete');
Route::post('dashboard/income/category/restore',[IncomeCategoryController::class,'restore'])->name('income.category.restore');
Route::post('dashboard/income/category/delete',[IncomeCategoryController::class,'delete'])->name('income.category.delete');

Route::get('dashboard/expense',[ExpenseController::class,'index'])->name('expense');
Route::get('dashboard/expense/add',[ExpenseController::class,'add'])->name('expense.add');
Route::get('dashboard/expense/edit',[ExpenseController::class,'edit'])->name('expense.edit');
Route::get('dashboard/expense/view',[ExpenseController::class,'view'])->name('expense.view');
Route::post('dashboard/expense/submit',[ExpenseController::class,'insert'])->name('expense.submit');
Route::post('dashboard/expense/update',[ExpenseController::class,'update'])->name('expense.update');
Route::post('dashboard/expense/softdelete',[ExpenseController::class,'softdelete'])->name('expense.softdelete');
Route::post('dashboard/expense/restore',[ExpenseController::class,'restore'])->name('expense.restore');
Route::post('dashboard/expense/delete',[ExpenseController::class,'delete'])->name('expense.delete');

Route::get('dashboard/recycle',[RecycleController::class,'index'])->name('recycle');
Route::get('dashboard/recycle/user',[RecycleController::class,'index'])->name('recycle.user');
Route::get('dashboard/recycle/income',[RecycleController::class,'index'])->name('recycle.income');
Route::get('dashboard/recycle/income/category',[RecycleController::class,'income_category'])->name('recycle.income.category');

Route::get('dashboard/report',[ReportController::class,'index'])->name('report');


require __DIR__.'/auth.php';
