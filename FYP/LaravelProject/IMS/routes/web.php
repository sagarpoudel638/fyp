<?php

use App\Http\Controllers\AdminReportsController;
use App\Http\Controllers\AdminSettingsController;

use App\Http\Controllers\RegisterStudentController;
use App\Http\Controllers\SMSController;
use App\Http\Controllers\StaffSettingsController;
use App\Http\Controllers\StudentDetailsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserAuthController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AdminCourseSettingsController;
use App\Http\Controllers\AdminStaffSettingsController;
use App\Http\Controllers\POSController;

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







Route::any('/admin', [AdminSettingsController::class, 'AdminSettingsDashboard'])->name('adminsettings')->middleware('isLoggedAdmin');
Route::any('/AdminSettings', [AdminSettingsController::class, 'AdminSettingsDashboard'])->name('SettingsAdmin')->middleware('isLoggedAdmin');
Route::any('/AdminReports', [AdminReportsController::class, 'AdminReportsDashboard'])->name('adminreports')->middleware('isLoggedAdmin');
Route::any('/AdminStaffSettings', [AdminStaffSettingsController::class, 'AdminStaffSettingsDashboard'])->name('adminstaff')->middleware('isLoggedAdmin');
Route::any('/AdminCourseSettings', [AdminCourseSettingsController::class, 'AdminCourseSettingsDashboard'])->name('course')->middleware('isLoggedAdmin');

Route::get('/', [RegisterStudentController::class, 'RegisterStudentDashboard'])->name('RegisterStudentDashboard')->middleware('isLogged');
//Route::get('/POS', [POSController::class, 'POSDashboard'])->middleware('isLogged');
Route::get('/StaffSettings', [StaffSettingsController::class, 'StaffSettingsDashboard'])->name('StaffSettings')->middleware('isLogged');
Route::get('/SMS', [SMSController::class, 'SMSDashboard'])->middleware('isLogged');
Route::get('/StudentDetails', [StudentDetailsController::class, 'StudentDetailsDashboard'])->middleware('isLogged');
Route::get('/studentDetails/simple', [StudentDetailsController::class, 'simple'])->name('search')->middleware('isLogged');



Route::get('/login', [UserAuthController::class, 'login']);
Route::post('create', [UserAuthController::class, 'create'])->name('auth.create');
Route::post('check', [UserAuthController::class, 'check'])->name('auth.check');
Route::get('logout', [UserAuthController::class, 'logout'])->middleware('isLogged');


Route::any('deleteuser/{user_id?}', [AdminStaffSettingsController::class, 'deleteUser'])->name('deleteUser')->middleware('isLoggedAdmin');
Route::any('edituser/{user_id?}', [AdminStaffSettingsController::class, 'editUser'])->name('editUser')->middleware('isLoggedAdmin');
Route::any('edit_action_user', [AdminStaffSettingsController::class, 'editActionUser'])->name('editActionUser')->middleware('isLoggedAdmin');


Route::any('updatepassword/{user_id?}', [AdminStaffSettingsController::class, 'updatePassword'])->name('updatePassword')->middleware('isLoggedAdmin');
Route::any('update_password_action', [AdminStaffSettingsController::class, 'updatePasswordAction'])->name('updatePasswordAction')->middleware('isLoggedAdmin');


Route::any('update_adminpassword', [AdminSettingsController::class, 'updateAdminPassword'])->name('updateAdminPassword')->middleware('isLoggedAdmin');
Route::any('update_staffpassword', [StaffSettingsController::class, 'updateStaffPassword'])->name('updateStaffPassword')->middleware('isLogged');



Route::get('/adminlogin', [AdminAuthController::class, 'adminlogin']);
Route::post('admincheck', [AdminAuthController::class, 'admincheck'])->name('admin.check');
Route::get('logoutadmin', [AdminAuthController::class, 'adminlogout'])->middleware('isLoggedAdmin');



Route::any('/edit', [AdminCourseSettingsController::class, 'editCourse'])->name('editCourse')->middleware('isLoggedAdmin');
Route::any('add', [AdminCourseSettingsController::class, 'addCourse'])->name('addCourse')->middleware('isLoggedAdmin');
Route::any('delete/{user_id?}', [AdminCourseSettingsController::class, 'deleteCourse'])->name('deleteCourse')->middleware('isLoggedAdmin');
Route::any('edit/{user_id?}', [AdminCourseSettingsController::class, 'editCourse'])->name('editCourse')->middleware('isLoggedAdmin');
Route::any('edit_action', [AdminCourseSettingsController::class, 'editAction'])->name('editActionCourse')->middleware('isLoggedAdmin');


Route::get('home', [UserAuthController::class, 'homedata']);
//{{$LoggedUserInfo->firstname}}

Route::get('/courseview',[RegisterStudentController::class, 'course']);
Route::get('/findfee',[RegisterStudentController::class, 'FindFee']);

Route::any('registerStudent', [RegisterStudentController::class, 'registerStudent'])->name('registerStudent')->middleware('isLogged');













Route::get('/POS', [POSController::class, 'index'])->middleware('isLogged');
Route::get('/POS/simple', [POSController::class, 'simple'])->name('simple_search')->middleware('isLogged');
