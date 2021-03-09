<?php

use Illuminate\Support\Facades\Route;

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



Route::get('/login', function () {
    return view('StaffLogin');
});

Route::get('/staff', function () {
    return view('StaffLogin');
});

Route::get('/admin', function () {
    return view('AdminLogin');
});

Route::get('/', function () {
    return view('staff.RegisterStudent');
});

Route::get('/RegisterStudent', function () {
    return view('staff.RegisterStudent');
});

Route::get('/POS', function () {
    return view('staff.POS');
});

Route::get('/SMS', function () {
    return view('staff.SMS');
});

Route::get('/StudentDetails', function () {
    return view('staff.StudentDetails');
});

Route::get('/Settings', function () {
    return view('staff.Settings');
});


Route::get('/AdminReports', function () {
    return view('admin.AdminReports');
});

Route::get('/AdminSettings', function () {
    return view('admin.AdminSettings');
});