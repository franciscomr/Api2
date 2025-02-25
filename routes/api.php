<?php

use App\Http\Controllers\Api\Company\BranchController;
use App\Http\Controllers\Api\Company\CompanyController;
use App\Http\Middleware\Api\ValidateJsonApiRequestFormat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::controller(CompanyController::class)->group(function () {
    Route::get('companies', 'index')->name('companies.index');
    Route::get('companies/{id}', 'show')->name('companies.show');
    Route::post('companies', 'store')->middleware(ValidateJsonApiRequestFormat::class)->name('companies.store');
    Route::patch('companies/{id}', 'update')->middleware(ValidateJsonApiRequestFormat::class)->name('companies.update');
});

Route::controller(BranchController::class)->group(function () {
    Route::get('branches', 'index')->name('branches.index');
    Route::get('branches/{id}', 'show')->name('branches.show');
    Route::post('branches', 'store')->middleware(ValidateJsonApiRequestFormat::class)->name('branches.store');
    Route::patch('branches/{id}', 'update')->middleware(ValidateJsonApiRequestFormat::class)->name('branches.update');
});
