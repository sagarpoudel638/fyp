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
use App\Http\Controllers\BookDetailsController;
use App\Http\Controllers\POSController;
use App\Http\Controllers\CustomerDetailsController;


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
Route::get('/POS', [POSController::class, 'POSDashboard'])->name('POS')->middleware('isLogged');
Route::get('/StaffSettings', [StaffSettingsController::class, 'StaffSettingsDashboard'])->name('StaffSettings')->middleware('isLogged');
Route::get('/SMS', [SMSController::class, 'SMSDashboard'])->name('SMS')->middleware('isLogged');
Route::get('/StudentDetails', [StudentDetailsController::class, 'StudentDetailsDashboard'])->name('student')->middleware('isLogged');
Route::get('/studentDetails/simple', [StudentDetailsController::class, 'searchstudents'])->name('search')->middleware('isLogged');
Route::get('/BookDetails', [BookDetailsController::class, 'BookDetailsDashboard'])->name('bookDetails')->middleware('isLogged');


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
Route::get('/findfee',[StudentDetailsController::class, 'FindFee']);

Route::any('registerStudent', [RegisterStudentController::class, 'registerStudent'])->name('registerStudent')->middleware('isLogged');
Route::any('deletestudent/{User_id?}', [StudentDetailsController::class, 'deleteStudent'])->name('deleteStudent')->middleware('isLogged');
Route::any('editstudent/{User_id?}', [StudentDetailsController::class, 'editStudent'])->name('editStudent')->middleware('isLogged');
Route::any('edit_action_student', [StudentDetailsController::class, 'editActionStudentDetails'])->name('editActionStudentDetails')->middleware('isLogged');


Route::any('registerBook', [BookDetailsController::class, 'registerBook'])->name('registerBook')->middleware('isLogged');




Route::any('generatebarcode/{Book_id?}', [BookDetailsController::class, 'generatebarcode'])->name('generatebarcode')->middleware('isLogged');
Route::any('generatebarcodeAction', [BookDetailsController::class, 'generatebarcodeAction'])->name('generatebarcodeAction')->middleware('isLogged');





Route::get('/adminstudentreport', [AdminReportsController::class, 'AdminStudentReportsDashboard'])->name('StudentReport')->middleware('isLoggedAdmin');
Route::get('/adminfeereport', [AdminReportsController::class, 'AdminFeeReportsDashboard'])->name('FeeReport')->middleware('isLoggedAdmin');

Route::get('/studentprint', [AdminReportsController::class, 'StudentReportPrint'])->name('StudentReportPrint')->middleware('isLoggedAdmin');
Route::get('/feeprint', [AdminReportsController::class, 'FeeReportPrint'])->name('FeeReportPrint')->middleware('isLoggedAdmin');



Route::any('paystudent/{User_id?}', [StudentDetailsController::class, 'payStudent'])->name('payStudent')->middleware('isLogged');
Route::any('pay_action_student', [StudentDetailsController::class, 'payStudentAction'])->name('payStudentAction')->middleware('isLogged');


Route::any('registerCustomer', [CustomerDetailsController::class, 'registerCustomer'])->name('registerCustomer')->middleware('isLogged');
Route::get('CustomerDetailsDashboard', [CustomerDetailsController::class, 'CustomerDetailsDashboard'])->name('CustomerDetailsDashboard')->middleware('isLogged');
Route::get('/CustomerDetails/searchcustomer', [CustomerDetailsController::class, 'searchcustomer'])->name('searchcustomer')->middleware('isLogged');

Route::any('POSCustomer/{customer_id?}', [BookDetailsController::class, 'POSCustomer'])->name('POSCustomer')->middleware('isLogged');
