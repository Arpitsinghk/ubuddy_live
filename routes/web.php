<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;

Route::get('/', function () {
    return view('index');
});

if (file_exists($adminRoutes = __DIR__.'/admin.php')) {
    require $adminRoutes;
}
Auth::routes();

Route::middleware(['auth', 'user-access:employee'])->group(function () {
  
    Route::get('/home', [HomeController::class, 'index'])->name('home');
});

// Route::middleware(['auth', 'user-access:superadmin'])->group(function () {
  
//     Route::get('/admin/home', [HomeController::class, 'adminHome'])->name('admin.home');
// });
  