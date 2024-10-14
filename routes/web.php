<?php
use Illuminate\Support\Facades\URL;

use App\Http\Controllers\MedicamentoController;
use Illuminate\Support\Facades\Route;

Route::get('/', MedicamentoController::class .'@index')->name('medicamentos.index');

Route::get('/medicamentos/create', MedicamentoController::class . '@create')->name('medicamentos.create');

Route::post('/medicamentos', MedicamentoController::class .'@store')->name('medicamentos.store');

Route::get('/medicamentos/{Medicamento}', MedicamentoController::class .'@show')->name('medicamentos.show');
 Route::get('/medicamentos/{Medicamento}/edit', MedicamentoController::class .'@edit')->name('medicamentos.edit');

Route::put('/Medicamentos/{Medicamento}', MedicamentoController::class .'@update')->name('medicamentos.update');

Route::delete('/medicamentos/{Medicamento}', MedicamentoController::class .'@destroy')->name('medicamentos.destroy');
