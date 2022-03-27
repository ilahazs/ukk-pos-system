<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\LogActivityController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UsersController;
use App\Http\Livewire\Categories\CategoriesComponent;
use App\Http\Livewire\Employees\EmployeesComponent;
use App\Http\Livewire\Products\ProductsComponent;
use App\Http\Livewire\Users\UsersComponent;
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

Route::middleware(['guest'])->group(function () {

    Route::get('/template', function () {
        return view('layouts.app', ['title' => 'Template']);
    });

    Route::get('/', function () {
        return view('auth.sign-in', ['title' => 'Sign In']);
    });
});



Route::middleware(['auth'])->group(function () {
    Route::get('dashboard', [DashboardController::class, 'dashboard'])->name('dashboard.index');
});

// dengan checkrole apabila ada user memaksa masuk maka akan dilempar ke RouteServiceProvider::HOME
Route::middleware(['auth', 'checkrole:admin'])->group(function () {
    // Route::resource('users', UsersController::class);
    Route::get('users', UsersComponent::class)->name('users.index');
});

Route::middleware(['auth', 'checkrole:manajer'])->group(function () {
    Route::get('manajer', function () {
        return view('manajer.index', ['title' => 'Manajer']);
    })->name('manajer.index');

    Route::get('categories', CategoriesComponent::class)->name('categories.index');
    Route::get('categories_pdf', [CategoryController::class, 'cetak_pdf'])->name('categories.pdf');
    Route::get('view_categories_pdf', [CategoryController::class, 'view_cetak_pdf'])->name('categories.view-pdf');

    Route::get('products', ProductsComponent::class)->name('products.index');
    Route::get('products_pdf', [ProductController::class, 'cetak_pdf'])->name('products.pdf');
    Route::get('view_products_pdf', [ProductController::class, 'view_cetak_pdf'])->name('products.view-pdf');

    Route::get('employees', EmployeesComponent::class)->name('employees.index');
    Route::get('employees_pdf', [EmployeeController::class, 'cetak_pdf'])->name('employees.pdf');
    Route::get('view_employees_pdf', [EmployeeController::class, 'view_cetak_pdf'])->name('employees.view-pdf');

    // Route::controller(LogActivityController::class)->group(function() {
    // });
    Route::get('log_users', [LogActivityController::class, 'users_log'])->name('log.users');
    Route::get('log_users_pdf', [LogActivityController::class, 'users_log_pdf'])->name('log.users-pdf');
    Route::get('view_log_users', [LogActivityController::class, 'view_users_log_pdf'])->name('log.view-users-pdf');

    Route::get('log_categories', [LogActivityController::class, 'categories_log'])->name('log.categories');
    Route::get('log_categories_pdf', [LogActivityController::class, 'categories_log_pdf'])->name('log.categories-pdf');

    Route::get('log_products', [LogActivityController::class, 'products_log'])->name('log.products');
    Route::get('log_product_pdf', [LogActivityController::class, 'products_log_pdf'])->name('log.product-pdf');
});

Route::middleware(['auth', 'checkrole:kasir'])->group(function () {
    Route::get('kasir', function () {
        return view('kasir.index', ['title' => 'Kasir']);
    })->name('kasir.index');
});

Route::middleware(['auth', 'checkrole:pelanggan'])->group(function () {
    Route::get('pelanggan', function () {
        return view('pelanggan.index', ['title' => 'Pelanggan']);
    })->name('pelanggan.index');
});
