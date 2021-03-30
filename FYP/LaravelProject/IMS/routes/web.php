<?php

use App\Http\Controllers\AdminReportsController;
use App\Http\Controllers\AdminSettingsController;
use App\Http\Controllers\POSController;
use App\Http\Controllers\RegisterStudentController;
use App\Http\Controllers\SMSController;
use App\Http\Controllers\StaffSettingsController;
use App\Http\Controllers\StudentDetailsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserAuthController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AdminCourseSettingsController;
use App\Http\Controllers\AdminStaffSettingsController;

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







Route::get('/admin', [AdminSettingsController::class, 'AdminSettingsDashboard'])->middleware('isLoggedAdmin');
Route::get('/AdminSettings', [AdminSettingsController::class, 'AdminSettingsDashboard'])->middleware('isLoggedAdmin');
Route::get('/AdminReports', [AdminReportsController::class, 'AdminReportsDashboard'])->middleware('isLoggedAdmin');
Route::get('/AdminStaffSettings', [AdminStaffSettingsController::class, 'AdminStaffSettingsDashboard'])->middleware('isLoggedAdmin');
Route::get('/AdminCourseSettings', [AdminCourseSettingsController::class, 'AdminCourseSettingsDashboard'])->name('course')->middleware('isLoggedAdmin');

Route::get('/', [RegisterStudentController::class, 'RegisterStudentDashboard'])->name('RegisterStudentDashboard')->middleware('isLogged');
Route::get('/POS', [POSController::class, 'POSDashboard'])->middleware('isLogged');
Route::get('/StaffSettings', [StaffSettingsController::class, 'StaffSettingsDashboard'])->middleware('isLogged');
Route::get('/SMS', [SMSController::class, 'SMSDashboard'])->middleware('isLogged');
Route::get('/StudentDetails', [StudentDetailsController::class, 'StudentDetailsDashboard'])->middleware('isLogged');

Route::get('/login', [UserAuthController::class, 'login']);
Route::post('create', [UserAuthController::class, 'create'])->name('auth.create');
Route::post('check', [UserAuthController::class, 'check'])->name('auth.check');
Route::get('logout', [UserAuthController::class, 'logout'])->middleware('isLogged');

Route::get('/adminlogin', [AdminAuthController::class, 'adminlogin']);
Route::post('admincheck', [AdminAuthController::class, 'admincheck'])->name('admin.check');
Route::get('logoutadmin', [AdminAuthController::class, 'adminlogout'])->middleware('isLoggedAdmin');


Route::any('/edit', [AdminCourseSettingsController::class, 'editCourse'])->name('editCourse')->middleware('isLoggedAdmin');
Route::any('add', [AdminCourseSettingsController::class, 'addCourse'])->name('addCourse')->middleware('isLoggedAdmin');
Route::any('delete/{user_id?}', [AdminCourseSettingsController::class, 'deleteCourse'])->name('deleteCourse')->middleware('isLoggedAdmin');
Route::any('edit/{user_id?}', [AdminCourseSettingsController::class, 'editCourse'])->name('editCourse');
Route::any('edit_action', [AdminCourseSettingsController::class, 'editAction'])->name('editActionUser')->middleware('isLoggedAdmin');





