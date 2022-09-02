<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClassesController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\FeedetailController;
use App\Http\Controllers\singlefeeController;

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

// Main Index Route
Route::get('/', function () {
    return view('index');
});
Route::get('index', function () {
    return view('index');
});
// Student Routes
Route::get('/student-form', function () {
    return view('student-form');
});
Route::post('/student-insert', [StudentController::class, 'store']);
Route::get('/student-datatable', [StudentController::class, 'showStudent']);
Route::get('/fetchall-students', [StudentController::class, 'studentrecord']);
Route::get('/student-edit', [StudentController::class, 'editstudent']);
Route::post('/student-update', [StudentController::class, 'updatestudent']);
Route::get('/fee-edit', [StudentController::class, 'feestudent']);
Route::get('/fee-edit-remaining', [StudentController::class, 'feeremaining']);
Route::get('/student/fee-history', [StudentController::class, 'student_feeHistory']);
// End Student Routes
// Programs (Classes) Routes
Route::get('/student-class', function () {
    return view('program');
});
Route::post('/program-insert', [ProgramController::class, 'program_insert']);
Route::get('/fetchall-programs', [ProgramController::class, 'FetchAll']);
Route::get('/program-edit', [ProgramController::class, 'edit']);
Route::post('/program-update', [ProgramController::class, 'parent_update']);
Route::get('/programs-dropdown', [StudentController::class, 'program_dropdown']);
//End  Programs (Classes) Routes
// Classes  view
Route::get('/student-section', function () {
    return view('classes');
});
Route::post('/class-insert', [ClassesController::class, 'classes_insert']);
Route::get('/fetchall-class', [ClassesController::class, 'FetchAll']);
Route::get('/class-edit', [ClassesController::class, 'edit']);
Route::post('/class-update', [ClassesController::class, 'classes_update']);
Route::post('/classes-dropdown', [StudentController::class, 'classes_dropdown']);
// End Classes  view
// Teachers Route
Route::get('/teachers', function () {
    return view('teachers-form');
});
Route::post('/teacher-insert', [TeacherController::class, 'store_teacher_data']);
Route::get('/teachers-data', [TeacherController::class, 'show_teacher_data']);
Route::get('/update/{uid}', [TeacherController::class, 'update_teacher_data']);
Route::post('/edit/{eid}', [TeacherController::class, 'edit_teacher_data']);
// End Teachers Route
// Extra Routes
Route::post('/ajaxstudent', [StudentController::class, 'student_ajax']);
Route::get('/fetch-programs', [ClassesController::class, 'fetch_programs']);
// End Extra Routes
// Route for Pdf
Route::get('voucher/{id}', [PDFController::class, 'generatePDF']);
// End Route for Pdf
// Start Section Vise Fee Structure
Route::get('/fee-data', function () {
    return view('classvise-fee');
});
Route::post('/ajaxfee', [FeedetailController::class, 'fee_ajax']);
Route::post('/ajaxfeetable', [FeedetailController::class, 'fee_ajax_table']);
Route::get('/fetchall-fee', [FeedetailController::class, 'feerecord']);
Route::post('/student-update-fee', [StudentController::class, 'update_fee']);
Route::post('/admission-update-fee', [StudentController::class, 'admission_update_fee']);
// End Start Section Vise Fee Structure
Route::get('/fee-history', [FeedetailController::class, 'feedetails']);

Route::get('index', function () {
    return view('index');
});
// Login Route
Route::get('auth-login', [AdminController::class, 'index']);
Route::post('auth-login', [AdminController::class, 'auth'])->name('auth');
Route::group(['middleware' => 'admin_auth'], function () {
});
//Subjects
// subjects View
Route::get('/subjects', function () {
    return view('subjects');
});
// subjects Route to show section dropdown
Route::post('/subjects/sections-dropdown', [SubjectController::class, 'sections_dropdown']);
// subjects populate- program dropdown
Route::get('/subjects/fetch_classes', [SubjectController::class, 'fetch_classes']);
// Subject Insert Route
Route::post('/subject-insert', [SubjectController::class, 'subject_insert']);
//students promotion view
Route::get('/student-promotion', function () {
    return view('promotion-student-form');
});
// promotion Insert Route
Route::post('/student-promotion/insert', [StudentController::class, 'student_promotion']);
Route::get('/fee-voucher-all', function () {
    return view('fee-voucher-all');
});
Route::post('/allClassvocuher', [PDFController::class, 'allClassvocuher']);
Route::get('voucher/{id}', [singlefeeController::class, 'generatesinglePDF']);
// Start of Manage Deactive Students Routes
Route::get('/student-deactive-data', function () {
    return view('manageDeactive');
});
Route::get('/fetchall-deactive-student', [StudentController::class, 'studentDeactiverecord']);
Route::get('/student-deactve-edit', [StudentController::class, 'editDeactivestudent']);
Route::post('/student-deactive-update', [StudentController::class, 'updateDeactivestudent']);
Route::post('/ajax_deactive', [StudentController::class, 'studentDeactiveajax']);
// End of Manage Deactive Students Routes
