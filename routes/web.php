<?php

use App\Http\Controllers\ProfileController;
use App\Livewire\Cashflow;
use App\Livewire\EmployeeManagement;
use App\Livewire\Auth\Login;
use App\Livewire\Bank;
use App\Livewire\Customer;
use App\Livewire\Dashboard;
use App\Livewire\Departement;
use App\Livewire\MenuManagement;
use App\Livewire\ReportServiceOperational;
use App\Livewire\RolesPermissions;
use App\Livewire\Service;
use App\Livewire\ServiceDetail;
use App\Livewire\ServiceOperational;
use App\Livewire\Sparepart as LivewireSparepart;
use App\Livewire\User;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/login');
});
Route::get('/login', Login::class)->name('login');
Route::get('/logout', [Login::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', Dashboard::class)->name('dashboard');
    Route::get('/user', User::class)->name('user');
    Route::get('/customer', Customer::class)->name('customer');
    Route::get('/employee', EmployeeManagement::class)->name('employee');
    Route::get('/departement', Departement::class)->name('departement');
    Route::get('/bank', Bank::class)->name('bank');
    Route::get('/menu', MenuManagement::class)->name('menu');
    Route::get('/service', Service::class)->name('service');
    Route::get('/roles',RolesPermissions::class)->name('role');
    Route::get('/sparepart', LivewireSparepart::class)->name('sparepart');
    Route::get('/serviceoperational', ServiceOperational::class)->name('serviceoperational');
    Route::get('/serviceinvoice/{id}', [ServiceOperational::class, 'getInvoice'])->name('serviceinvoice');
    Route::get('/servicedetail', ServiceDetail::class)->name('servicedetail');
    Route::get('/servicefinalize/{id}', [ServiceDetail::class, 'finalize'])->name('servicefinalize');
    Route::get('/report-service-operational', ReportServiceOperational::class)->name('report-serviceoperational');
    Route::get('cashflow',Cashflow::class)->name('cashflow');
    Route::get('/test', MenuManagement::class)->name('test');
});
Route::fallback(function () {
    return response()->view('errors.404', [], 404);
});