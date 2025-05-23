 
<?php


use App\Http\Controllers\StudentsController;
use Illuminate\Support\Facades\Route;


Route::get('/students.create', [StudentsController::class, 'create'])->name('students.create');
Route::post('/students', [StudentsController::class, 'store'])->name('students.store');
Route::post('/students/list', [StudentsController::class, 'index'])->name('students.list');
Route::get('extra', [StudentsController::class, 'extra'])->name('extra');
Route::get('extra1', [StudentsController::class, 'extra1'])->name('extra1');
Route::get('extra2', [StudentsController::class, 'extra2'])->name('extra2');
