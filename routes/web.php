<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmpresaController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/crear-empresa', [App\Http\Controllers\EmpresaController::class, 'create'])->name('admin.empresas.create');
Route::get('/caja_registradora_JFfactory', [EmpresaController::class, 'index']);
Route::get('/crear-empresa/{id_pais}', [App\Http\Controllers\EmpresaController::class, 'buscar_pais'])->name('admin.empresas.create.buscar_pais');
