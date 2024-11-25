<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmpresaController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.index')->middleware('auth');

Route::get('/crear-empresa', [App\Http\Controllers\EmpresaController::class, 'create'])->name('admin.empresas.create');
Route::get('/caja_registradora_JFfactory', [EmpresaController::class, 'index']);
Route::get('/crear-empresa/pais/{id_pais}', [App\Http\Controllers\EmpresaController::class, 'buscar_estado'])->name('admin.empresas.create.buscar_estado');
Route::get('/crear-empresa/estado/{id_estado}', [App\Http\Controllers\EmpresaController::class, 'buscar_ciudad'])->name('admin.empresas.create.buscar_ciudad');

Route::post('/crear-empresa/create', [App\Http\Controllers\EmpresaController::class, 'store'])->name('admin.empresas.store');