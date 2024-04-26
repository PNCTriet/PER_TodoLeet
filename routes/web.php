<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('tasks.index'); // Chuyển hướng trang chủ đến trang dashboard
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Auth::routes(); // Chỉ cần một lần

Route::get('/tasks', [App\Http\Controllers\TasksController::class, 'index']);
Route::get('/', [App\Http\Controllers\TasksController::class, 'index']);


Route::get('/tasks/create', [App\Http\Controllers\TasksController::class, 'create']);

Route::post('/tasks', [App\Http\Controllers\TasksController::class, 'store']);

Route::patch('/tasks/{id}', [App\Http\Controllers\TasksController::class, 'update']);

Route::delete('/tasks/{id}', [App\Http\Controllers\TasksController::class, 'delete']);


// Route::get('/tasks/create', function () {
//     return view('tasks.create'); 
// });
?>