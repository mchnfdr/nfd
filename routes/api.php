<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;
use Itsmattch\Nfd\Http\Controllers\Company\DestroyCompanyController;
use Itsmattch\Nfd\Http\Controllers\Company\IndexCompanyController;
use Itsmattch\Nfd\Http\Controllers\Company\ShowCompanyController;
use Itsmattch\Nfd\Http\Controllers\Company\StoreCompanyController;
use Itsmattch\Nfd\Http\Controllers\Company\UpdateCompanyController;
use Itsmattch\Nfd\Http\Controllers\Employee\DestroyEmployeeController;
use Itsmattch\Nfd\Http\Controllers\Employee\IndexEmployeeController;
use Itsmattch\Nfd\Http\Controllers\Employee\ShowEmployeeController;
use Itsmattch\Nfd\Http\Controllers\Employee\StoreEmployeeController;
use Itsmattch\Nfd\Http\Controllers\Employee\UpdateEmployeeController;

/*
 * REVIEW: We use invokable controllers for each route to keep them atomic and minimal.
 * Although resource controllers might seem appealing here, in larger applications
 * they can grow exponentially in complexity.
 */

Route::get('/companies', IndexCompanyController::class)->name('companies.index');
Route::post('/companies', StoreCompanyController::class)->name('companies.store');
Route::get('/companies/{company}', ShowCompanyController::class)->name('companies.show');
Route::put('/companies/{company}', UpdateCompanyController::class)->name('companies.update');
Route::delete('/companies/{company}', DestroyCompanyController::class)->name('companies.destroy');

Route::get('/companies/{company}/employees', IndexEmployeeController::class)->name('companies.employees.index');
Route::post('/companies/{company}/employees', StoreEmployeeController::class)->name('companies.employees.store');
Route::get('/companies/{company}/employees/{employee}', ShowEmployeeController::class)->name('companies.employees.show');
Route::put('/companies/{company}/employees/{employee}', UpdateEmployeeController::class)->name('companies.employees.update');
Route::delete('/companies/{company}/employees/{employee}', DestroyEmployeeController::class)->name('companies.employees.destroy');
